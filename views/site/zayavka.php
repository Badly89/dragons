<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Zayavka;
use app\models\Actions;
use app\models\Params;
use app\models\Users;
use rmrevin\yii\fontawesome\FAR;
use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Url;

$height = "260px";
$this->title = 'Подача заявки на чистоту.';
$this->params['breadcrumbs'][] = $this->title;

$settings = new Params();
$settings->loadSettings();
if ($model->userActive) {
    ?>
<center>
    <div class="site-login">
        <h1><?= Html::encode($this->title) ?></h1>

        <!--<p>Пожалуйста, заполните все поля для входа:</p>-->
        <?php
    if ($model->allowNewZayavka) {
        if (getUserZayavkiToday() < $settings->max_z_per_day) {
            $form = ActiveForm::begin([
                'id' => 'login-form',
                // 'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "<table><tr><td nowrap>{label}</td></tr><tr><td>{input}</td></tr></table>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]);
            ?>

        <?php $model->action = 'saveZayavka'; ?>
        <?php $model->z_id = -1; ?>
        <?= $form->field($model, 'action')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'z_id')->hiddenInput()->label(false) ?>

        <table width="40%">
            <tr width="100%">
                <td valign="top" width="50%">
                    <?=
                        $form->field($model, 'city')->listBox([
                            'kovcheg' => 'Ковчег',
                            'smorye' => 'Среднеморье',
                            'utes' => 'Утёс дракона',
                            'common' => 'Единые'
                        ], [
                            'style' => 'height:' . $height . '; width:200px',
                            'onchange' => 'changeValue(this)',
                            'id' => 'city',
                            'text' => 'Please select',
                            'unselect' => false,
                        ])
                        ?>
                </td>
                <td valign="top" width="50%">
                    <?=
                        $form->field($model, 'type')->listBox([], [
                            'id' => 'type',
                            'style' => 'height:' . $height . '; width:250px',
                        ])
                        ?>
                </td>
            </tr>
        </table>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Подать заявку', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return validateForm()',], ['id' => 'submit']) ?>
            </div>

        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <?php
        } else {
            ?>
    </div>
    <h3>Вы достигли лимита подачи заявок в сутки (<?= $settings->max_z_per_day ?>). Приходите завтра.</h3>
    <?php
        }
    } else {
        ?>
</center>
Уже есть поданная Вами заявка на чистоту. Согласно правил подачи заявки на чистоту, игрок не может подать более одной
заявки на чистоту.
<br>
Вы можете использовать полученную по заявке чистоту как угодно, после того, как используете её по назначению.
Т.е., подав заявку на вступление в клан, Вы можете после вступления в клан по этой же чистоте купить профессию.
<br><br>
<span style="font-size:18px"><b>Ваша заявка на рассмотрении:</b></span><br><br>
<div class="">

</div>
<ul class="list-group list-group-flush mb-3">
    <li class="list-group-item">

        <div class="card application h-100 " style="background-color: <?= $settings->own_z_color ?>;
            <?php
            if ($model->activeZayavka->status == "new") {
                echo "box-shadow: 0 0 15px  grey";
            }
            if ($model->activeZayavka->status == "cancelled") {
                echo "box-shadow: 0 0 15px  " . $settings->color_cancelled;
            }
            if ($model->activeZayavka->status == "inprogress") {
                echo "box-shadow: 0 0 15px  " . $settings->color_inprogress;
            }
            if ($model->activeZayavka->status == "otkaz") {
                echo "box-shadow: 0 0 15px  " . $settings->color_otkaz;
            }
            if ($model->activeZayavka->status == "chist") {
                echo "box-shadow: 0 0 15px  " . $settings->color_chist;
            }
            if ($model->activeZayavka->status == "katorga") {
                echo "box-shadow: 0 0 15px  " . $settings->color_killed;
            }
            if ($model->activeZayavka->status == "prokli") {
                echo "box-shadow: 0 0 15px  " . $settings->color_killed;
            }
            if ($model->activeZayavka->status == "block") {
                echo "box-shadow: 0 0 15px  " . $settings->color_killed;
            }
            ?>
                    ">


            <div class=" card-header zayavka-head">
                <p class="text-muted zayavka-id">
                    <?php
               
                if (Users::findGroupById(Yii::$app->user->getId()) > 1) {
                            echo Html::a(
                                '#' . $model->activeZayavka->id, Url::to([
                                '/site/sitem', 'id' => $model->activeZayavka->id
                            ])
                            );
                        } else {
                            echo "#" . $model->activeZayavka->id;
                        }
                        ?>
                </p>
                <p class="text-muted text">Статус:

                    <?php
                    if ($model->activeZayavka->status == "new") {
                          
                        echo FAS::icon('plus-circle',['title'=>'Новая заявка']);
                         }
                    if ($model->activeZayavka->status == "cancelled") {
                        echo FAR::icon('times-circle',
                        ['class' => 'cancelled','title'=>'Отменена пользователем']);
                         }
                    if ($model->activeZayavka->status == "inprogress") {
                        echo FAR::icon('hourglass',['class' => 'inprogress-zayavka','title'=>'проверяется'])->spin(20);  
                           }
                    if ($model->activeZayavka->status == "otkaz") {
                        echo FAS::icon('ban',['class' => 'otkaz-zayavka','title'=>'Отказ']);  
                        }
                    if ($model->activeZayavka->status == "chist") {
                        echo FAR::icon('check-circle',['class' => 'chist-zayavka', 'title'=>'чистота выдана']);  
                     }
                    if ($model->activeZayavka->status == "katorga") {
                        echo FAS::icon('ban',['class' => 'otkaz-zayavka','title'=>'Наказан каторгой']);  
                        }
                    if ($model->activeZayavka->status == "block") {
            
                        echo FAS::icon('ban',['class' => 'otkaz-zayavka','title'=>'Наказан блоком'
                            ]);  
                     }
            ?>
                </p>
                <p class="text-muted zayavka-time">
                    <?php echo FAR::icon('clock');
                      ?>
                    <?= $model->activeZayavka->date_added ?>
                </p>
            </div>
            <div class="card-body application-body ">

                <div>
                    <h5 class="card-title zayavka-title"> <?= $model->activeZayavka->type ?></h5>
                    <div class="card-subtitle zayavka-subtitle  ">
                        <?php
                        if (strlen($model->activeZayavka->city) > 0) {
                            echo "Город: " . $model->activeZayavka->city;
                        }
                        ?>
                    </div>
                </div>
                <p class="card-text otmetka">
                    <?php
                        if (Users::findGroupById(Yii::$app->user->getId()) > 1) {
                            echo getReadOnlyActions($model->activeZayavka->id);
                        } else {
                            echo getReadOnlyActionsWithAliases($model->activeZayavka->id);
                        }
                        ?>
                </p>


            </div>

            <div class="card-footer my-zayvka-footer ">
                <div class="subfooter">
                    <p class="text-muted text pr-5">
                        <?php
                                echo Html::a(
                                FAR::icon('eye'), Url::to([
                                    '/site/zlist', 'action' => 'show', 'zayavka' => $model->activeZayavka->id
                                ]), [
                                'style' => [
                                        'color' => '#666',
                                        'cursor' => 'pointer',
                                        // 'display' => 'block',
                                        'font-size' => '16px',
                                        'font-weight' => 'bold',
                                        'line-height' => 'normal',
                                        'text-decoration' => 'underline',
                                   ],
                                'title' => 'Показать в топе проверок',
                                

                                ]
                        );
                        ?>
                    </p>

                </div>
                <div class="btn-cancel">

                    <?php
                      if ($model->activeZayavka->active === 1) {
                            $form = ActiveForm::begin([
                                'id' => 'login-form',
                                // 'layout' => 'horizontal',
                                'fieldConfig' => [
                                    'template' => "{label}{input}",
                                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                                ],
                            ]);
                            ?>
                    <?php $model->action = 'cancelZayavka'; ?>
                    <?php $model->z_id = $model->activeZayavka->id; ?>
                    <?php $model->city = 0; ?>
                    <?php $model->type = 0; ?>
                    <?= $form->field($model, 'action')->hiddenInput()->label(false) ?>
                    <?= $form->field($model, 'city')->hiddenInput()->label(false) ?>
                    <?= $form->field($model, 'type')->hiddenInput()->label(false) ?>
                    <?= $form->field($model, 'z_id')->hiddenInput()->label(false) ?>
                    <div class="form-group">
                        <div style="margin-left: 30px">
                            <?= Html::submitButton('Отменить проверку по данной заявке', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return confirm("Отмена заявки безвозвратна. Вы уверены?")',], ['id' => 'submit']) ?>
                        </div>
                    </div>
                    <?php
                            ActiveForm::end();
                        }?>
                </div>
            </div>
        </div>
    </li>
</ul>



<?php
    }
} else {
    echo "<center><br><h2>Ваш аккаунт ещё не был проверен и активирован. Подождите немного</h2></center>";
}

function getUserZayavkiToday()
{
    return Zayavka::getUserZayavkaTodayCount(Yii::$app->user->getId());
}

function getReadOnlyActions($zId)
{
    $result = "";
    $zayava = Zayavka::findZayavkaById($zId);
    $allActions = Actions::findActionsByZid($zId);
    $counter = 0;
    if (sizeof($allActions) > 0) {
        foreach ($allActions as $action) {
            $counter++;
            if (strpos($action->action, "sm") !== false) {
                if (sizeof($allActions) == $counter) {
                    $result .= "См *" . Users::findById($action->dragon_id)->username . "<br>";
                }
            }
            if (strpos($action->action, "recheck_") !== false) {
                if (sizeof($allActions) == $counter) {
                    $result .= "См *" . Users::findById($action->dragon_id)->username . "<br>";
                }
            }
            if ($action->action == "b_recheck") {
                $result .= "Б *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "bp_done") {
                $result .= "Б/П *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "dopproverka_bp") {
                $result .= "Б/П *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "dopproverka_p") {
                $result .= "П *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "otkaz") {
                $result .= "Отказ *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "b_done") {
                $result .= "Б *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "b_done_p_recheck") {
                $result .= "Б/П *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "bp_done_recheck") {
                $result .= "Б/П *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "p_done_recheck") {
                $result .= "П *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "b_done_recheck") {
                $result .= "Б *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "nevid_done_chist") {
                $result .= "Доппроверка/Чист *" . Users::findById($action->dragon_id)->username . ". " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "nevid_done_katorga") {
                $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан каторгой *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "nevid_done_prokli") {
                $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан комплектом проклятий *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "nevid_done_block") {
                $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан блоком *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "nevid_done_otkaz") {
                $result .= "Доппроверка/Отказ. *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "done_chist") {
                $result .= "Чист *" . Users::findById($action->dragon_id)->username . ". " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "done_katorga") {
                $result .= "Отказ. Нарушения. Наказан каторгой *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "done_prokli") {
                $result .= "Отказ. Нарушения. Наказан комплектом проклятий *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "done_block") {
                $result .= "Отказ. Нарушения. Наказан блоком *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "done_otkaz") {
                $result .= "Отказ. *" . Users::findById($action->dragon_id)->username . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
        }
    }
    if ($zayava->status == "cancelled") {
        $result .= "<i>Отменена персонажем " . $zayava->date_last_update . "</i>";
    }
    return $result;
}

function getReadOnlyActionsWithAliases($zId)
{
    $result = "";
    $zayava = Zayavka::findZayavkaById($zId);
    $allActions = Actions::findActionsByZid($zId);
    $counter = 0;
    if (sizeof($allActions) > 0) {
        foreach ($allActions as $action) {
            $counter++;
            if (strpos($action->action, "sm") !== false) {
                if (sizeof($allActions) == $counter) {
                    $result .= "См *" . Users::findById($action->dragon_id)->alias . "<br>";
                }
            }
            if (strpos($action->action, "recheck_") !== false) {
                if (sizeof($allActions) == $counter) {
                    $result .= "См *" . Users::findById($action->dragon_id)->alias . "<br>";
                }
            }
            if ($action->action == "b_recheck") {
                $result .= "Б *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "bp_done") {
                $result .= "Б/П *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "dopproverka_bp") {
                $result .= "Б/П *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "dopproverka_p") {
                $result .= "П *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "otkaz") {
                $result .= "Отказ *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "b_done") {
                $result .= "Б *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "b_done_p_recheck") {
                $result .= "Б/П *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "bp_done_recheck") {
                $result .= "Б/П *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "p_done_recheck") {
                $result .= "П *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "b_done_recheck") {
                $result .= "Б *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "nevid_done_chist") {
                $result .= "Доппроверка/Чист *" . Users::findById($action->dragon_id)->alias . ". " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "nevid_done_katorga") {
                $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан каторгой *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "nevid_done_prokli") {
                $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан комплектом проклятий *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "nevid_done_block") {
                $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан блоком *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "nevid_done_otkaz") {
                $result .= "Доппроверка/Отказ. *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "done_chist") {
                $result .= "Чист *" . Users::findById($action->dragon_id)->alias . ". " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "done_katorga") {
                $result .= "Отказ. Нарушения. Наказан каторгой *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "done_prokli") {
                $result .= "Отказ. Нарушения. Наказан комплектом проклятий *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "done_block") {
                $result .= "Отказ. Нарушения. Наказан блоком *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "done_otkaz") {
                $result .= "Отказ. *" . Users::findById($action->dragon_id)->alias . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
        }
    }
    if ($zayava->status == "cancelled") {
        $result .= "<i>Отменена персонажем " . $zayava->date_last_update . "</i>";
    }
    return $result;
}

function getStatus($status)
{
    switch ($status) {
        case "cancelled":
            $result = "Отменена";
            break;
        case "inprogress":
            $result = "На проверке";
            break;
        case "closed":
            $result = "Закрыта";
            break;
        case "new":
            $result = "Новая";
            break;
        case "otkaz":
            $result = "Отказано";
            break;
        case "chist":
            $result = "Чистота выдана";
            break;
        case "katorga":
            $result = "Нарушения. Наказан каторгой";
            break;
        case "prokli":
            $result = "Нарушения. Наказан комплектом проклятий";
            break;
        case "block":
            $result = "Нарушения. Наказан блоком";
            break;
    }
    return $result;
}

?>


<script>
function validateForm() {
    result = false;
    cityField = document.getElementById('city');
    typeField = document.getElementById('type');
    if (cityField.value !== '' && typeField.value !== '') {
        return confirm('Вы уверены, что хотите подать заявку на чистоту?');
    } else {
        alert('Что-то не выбрано. Проверьте свой выбор.');
        return false;
    }
}

function changeValue(obj) {
    select = document.getElementById('type');
    if (obj.value === 'common') {
        select.innerHTML = "<?php echo $model->commonProfessionsOptions?>";
    }
    if (obj.value === 'kovcheg') {
        select.innerHTML = "<?php echo $model->kovchegProfessionsOptions?>";
    }
    if (obj.value === 'smorye') {
        select.innerHTML = "<?php echo $model->smoryeProfessionsOptions?>";
    }
    if (obj.value === 'utes') {
        select.innerHTML = "<?php echo $model->utesProfessionsOptions?>";
    }
}
</script>