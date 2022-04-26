<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Params;
use app\models\Users;
use app\models\Zayavka;
use app\models\Actions;
use yii\helpers\Url;
use app\models\ActionsUserView;
use app\models\SingleZayavkaClass;
use app\models\ZayavkaActionsClass;
use rmrevin\yii\fontawesome\FAR;
use rmrevin\yii\fontawesome\FAS;

$this->title = 'Мои заявки';
$this->params['breadcrumbs'][''] = $this->title;
$settings = new Params();
$settings->loadSettings();
$user_group = Users::findGroupById(Yii::$app->user->getId());
?>
<style>
.name {
    font-size: 16px;
    color: <?=$settings->sign_color ?>;
}

.text_italic {
    font-size: 13px;
    color: <?=$settings->comment_color ?>;
    font-style: italic;
}

.text {
    font-size: 18px;
    padding-right: 10px;
    color: <?=$settings->comment_color ?>;
}

.text_otkaz {
    font-size: 16px;
    color: <?=$settings->otkaz_color ?>;
}
</style>
<?php
if ($model->userActive) {
    echo "<h2>Ваши заявки на чистоту:</h2><br>";
    // echo "<div class='row  my-zayavki'>";
    echo "<ul class=\"list-group list-group-flush mb-3\">";
    if (sizeof($model->allZayavki) > 0) {
        //creating array of arrays
        $allZ = array();
        $prev_id = -1;
        $single_zayavka = new SingleZayavkaClass();
        foreach ($model->allZayavki as $zayavka) {
            if ($zayavka->id == $prev_id) {
                $single_actions = new ZayavkaActionsClass();
                $single_actions->id = $zayavka->action_id;
                $single_actions->action = $zayavka->action;
                $single_actions->active = $zayavka->action_active;
                $single_actions->date = $zayavka->action_date;
                $single_actions->notes = $zayavka->notes;
                $single_actions->username = $zayavka->dragonusername;
                $single_actions->alias = $zayavka->dragonalias;
                array_push($single_zayavka->actions, $single_actions);
            } else {
                if ($single_zayavka->id > 0) {
                    array_push($allZ, $single_zayavka);
                }
                //new zayavka started
                $prev_id = $zayavka->id;
                $single_zayavka = new SingleZayavkaClass();
                $single_zayavka->id = $zayavka->id;
                $single_zayavka->user_id = $zayavka->user_id;
                $single_zayavka->category = $zayavka->category;
                $single_zayavka->city = $zayavka->city;
                $single_zayavka->proverka_city = $zayavka->proverka_city;
                $single_zayavka->type = $zayavka->type;
                $single_zayavka->active = $zayavka->active;
                $single_zayavka->date_added = $zayavka->date_added;
                $single_zayavka->status = $zayavka->status;
                $single_zayavka->date_last_update = $zayavka->date_last_update;
                $single_zayavka->otkaz_text = $zayavka->otkaz_text;
                $single_actions = new ZayavkaActionsClass();
                $single_actions->id = $zayavka->action_id;
                $single_actions->action = $zayavka->action;
                $single_actions->active = $zayavka->action_active;
                $single_actions->date = $zayavka->action_date;
                $single_actions->notes = $zayavka->notes;
                $single_actions->username = $zayavka->dragonusername;
                $single_actions->alias = $zayavka->dragonalias;
                array_push($single_zayavka->actions, $single_actions);
            }
        }
        //push last item
        array_push($allZ, $single_zayavka);


        foreach ($allZ as $zayavka) {
            ?>

<!-- col-sm-12 col-md-6  col-lg-4 -->
<!-- <div class=" col-sm-12 col-md-6  col-xl-6 mb-4 ">
     -->
<li class="list-group-item">
    <div class="card application h-100 " style=" background-color: <?= $settings->own_z_color ?>; <?php
            if ($zayavka->status == "new") {
                echo "box-shadow: 0 0 15px  grey";
            }
            if ($zayavka->status == "cancelled") {
                echo "box-shadow: 0 0 15px  " . $settings->color_cancelled;
            }
            if ($zayavka->status == "inprogress") {
                echo "box-shadow: 0 0 15px  " . $settings->color_inprogress;
            }
            if ($zayavka->status == "otkaz") {
                echo "box-shadow: 0 0 15px  " . $settings->color_otkaz;
            }
            if ($zayavka->status == "chist") {
                echo "box-shadow: 0 0 15px  " . $settings->color_chist;
            }
            if ($zayavka->status == "katorga") {
                echo "box-shadow: 0 0 15px  " . $settings->color_killed;
            }
            if ($zayavka->status == "prokli") {
                echo "box-shadow: 0 0 15px  " . $settings->color_killed;
            }
            if ($zayavka->status == "block") {
                echo "box-shadow: 0 0 15px  " . $settings->color_killed;
            }
            ?> ">

        <div class=" card-header zayavka-head">
            <p class="text-muted zayavka-id">
                <?php
                        if ($user_group > 1) {
                            echo Html::a(
                                    '#' . $zayavka->id, Url::to([
                                        '/site/sitem', 'id' => $zayavka->id
                                    ])
                            );
                        } else {
                            echo "#" . $zayavka->id;
                        }
                        ?>
            </p>
            <p class="text-muted zayavka-time">
                <?php echo FAR::icon('clock');
                      ?>
                <?= $zayavka->date_added ?>
            </p>
        </div>
        <div class="card-body application-body ">

            <div>
                <h5 class="card-title zayavka-title"> <?= $zayavka->type ?><br></h5>
                <div class="card-subtitle zayavka-subtitle  ">
                    <?php
                        if (strlen($zayavka->city) > 0) {
                            echo "Город: " . $zayavka->city;
                        }
                        ?>
                </div>
            </div>
            <p class="card-text otmetka">
                <?php
                        if ($user_group > 1) {
                            echo getReadOnlyActions($zayavka);
                        } else {
                            echo getReadOnlyActionsWithAliases($zayavka);
                        }
                        ?>
            </p>


        </div>

        <div class="card-footer my-zayvka-footer ">
            <div class="subfooter">
                <p class="text-muted text pr-5"> <?php
                        echo Html::a(
                                FAR::icon('eye'), Url::to([
                                    '/site/zlist', 'action' => 'show', 'zayavka' => $zayavka->id
                                ]), [
                            'style' => [
                                'color' => '#666',
                                'cursor' => 'pointer',
                                // 'display' => 'block',
                                 'font-size' => '18px',
                                'font-weight' => 'bold',
                                'line-height' => 'normal',
                                'text-decoration' => 'underline',
                               
                            ],
                            'title' => 'Показать в топе проверок'
                                ]
                        );
                        ?></p>
                <p class="text-muted text">Статус:
                    <!-- <?= getStatus($zayavka->status) ?> -->
                    <?php
                    if ($zayavka->status == "new") {
                          
                        echo FAS::icon('plus-circle',['class'=>'icon-status','title'=>'Новая заявка']);
                         }
                    if ($zayavka->status == "cancelled") {
                        echo FAR::icon('times-circle',
                        ['class' => 'cancelled icon-status','title'=>'Отменена пользователем']);
                         }
                    if ($zayavka->status == "inprogress") {
                        echo FAR::icon('hourglass',['class' => 'inprogress-zayavka icon-status','title'=>'проверяется'])->spin(20);  
                           }
                    if ($zayavka->status == "otkaz") {
                        echo FAS::icon('ban',['class' => 'otkaz-zayavka icon-status','title'=>'Отказ']);  
                        }
                    if ($zayavka->status == "chist") {
                        echo FAR::icon('check-circle',['class' => 'chist-zayavka icon-status', 'title'=>'чистота выдана']);  
                     }
                    if ($zayavka->status == "katorga") {
                        echo FAS::icon('ban',['class' => 'otkaz-zayavka icon-status','title'=>'Наказан каторгой']);  
                        }
                    if ($zayavka->status == "block") {
            
                        echo FAS::icon('ban',['class' => 'otkaz-zayavka icon-status','title'=>'Наказан блоком'
                            ]);  
                     }
            ?>
                </p>
            </div>
            <div class="">
                <?php
               
                if ($zayavka->active === 1) {
                    ?>
                <?php
                            $form = ActiveForm::begin([
                                        'id' => 'login-form',
                                        // 'layout' => 'horizontal',
                                        'fieldConfig' => [
                                            'template' => "{label}{input}",
                                            'options' => ['class' => 'form-label'],
                                        ],
                            ]);
                            ?>
                <?php $model->action = 'cancelZayavka'; ?>
                <?php $model->z_id = $zayavka->id; ?>
                <?php $model->city = 0; ?>
                <?php $model->type = 0; ?>
                <?= $form->field($model, 'action')->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'city')->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'type')->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'z_id')->hiddenInput()->label(false) ?>
                <?= Html::submitButton(
                      Yii::t('app', '{icon} Отмена', ['icon' => FAR::icon('window-close',['class' => ''])->fixedWidth()]),

                      ['name' => 'login-button',
                      'class' => 'btn btn-primary btn-sm cancel-button',
                       'onclick' => 'return confirm("Отмена заявки безвозвратна. Вы уверены?")',], 
                       ['id' => 'submit']) ?>



                <?php
                            ActiveForm::end();
                            ?>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
    <!-- </div> -->
</li>

<?php

        }
       
    //   echo"</div>";
        echo"</ul>";
   
    } else {
        echo "<h2>У вас нет ни одной поданной заявки на чистоту</h2>";
    }
    
} else {
    echo "<center><br><h2>Ваш аккаунт ещё не был проверен и активирован. Подождите немного</h2></center>";
   
   ?>

<p>Ваш код подтверждения: <span style="color: red"><?php echo $approveKey; ?></span></p>
<p>Не забудьте добавить код подтверждения в видимую всем часть инфы персонажа.</p>
<p>В случае отсутствия кода подтверждения в инфе персонажа Вам будет отказано в регистрации.</p>
<p>В случае отказа в регистрации Вам <b>НЕ</b> будет отправлено никаких уведомления.</p>
<p>Если при попытке входа на сайт под Вашим логином и выданным паролем Вы увидите ошибку входа на сайт - значит Вам
    отказано в регистрации. Внимательно изучите правила регистрации и попытайтесь заново.</p>
<p>Вы сможете <b>самостоятельно</b> изменить пароль для входа на сайт и форум <b>после активации Вашего аккаунта</b>.
</p>
<?php
}

//-------------------------------- F U N C T I O N S ----------------------------------

function getReadOnlyActions($zayava) {
    $result = "";
    $allActions = $zayava->actions;
    $counter = 0;
    if (sizeof($allActions) > 0) {
        foreach ($allActions as $action) {
            $counter++;
            if (strpos($action->action, "sm") !== false) {
                if (sizeof($allActions) == $counter) {
                    $result .= "<span class=\"name\">";
                    $result .= "См *" . $action->username . "<br>";
                    $result .= "</span>";
                }
            }
            if (strpos($action->action, "recheck_") !== false) {
                if (sizeof($allActions) == $counter) {
                    $result .= "<span class=\"name\">";
                    $result .= "См *" . $action->username . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "b_recheck") {
                $result .= "<span class=\"name\">";
                $result .= "Б *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "bp_done") {
                $result .= "<span class=\"name\">";
                $result .= "Б/П *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "dopproverka_bp") {
                $result .= "<span class=\"name\">";
                $result .= "Б/П *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "dopproverka_p") {
                $result .= "<span class=\"name\">";
                $result .= "П *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "otkaz") {
                $result .= "<span class=\"name\">";
                $result .= "Отказ *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "b_done") {
                $result .= "<span class=\"name\">";
                $result .= "Б *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "p_done") {
                $result .= "<span class=\"name\">";
                $result .= "П *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "b_done_p_recheck") {
                $result .= "<span class=\"name\">";
                $result .= "Б/П *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "bp_done_recheck") {
                $result .= "<span class=\"name\">";
                $result .= "Б/П *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "p_done_recheck") {
                $result .= "<span class=\"name\">";
                $result .= "П *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "b_done_recheck") {
                $result .= "<span class=\"name\">";
                $result .= "Б *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "nevid_done_chist") {
                $result .= "<span class=\"name\">";
                $result .= "Доппроверка/Чист *" . $action->username . ". " . $action->date . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "nevid_done_katorga") {
                $result .= "<span class=\"name\">";
                $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан каторгой *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "nevid_done_prokli") {
                $result .= "<span class=\"name\">";
                $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан комплектом проклятий *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "nevid_done_block") {
                $result .= "<span class=\"name\">";
                $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан блоком *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "nevid_done_otkaz") {
                $result .= "<span class=\"name\">";
                $result .= "Доппроверка/Отказ. *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "done_chist") {
                $result .= "<span class=\"name\">";
                $result .= "Чист *" . $action->username . ". " . $action->date . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "done_katorga") {
                $result .= "<span class=\"name\">";
                $result .= "Отказ. Нарушения. Наказан каторгой *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "done_prokli") {
                $result .= "<span class=\"name\">";
                $result .= "Отказ. Нарушения. Наказан комплектом проклятий *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "done_block") {
                $result .= "<span class=\"name\">";
                $result .= "Отказ. Нарушения. Наказан блоком *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "done_otkaz") {
                $result .= "<span class=\"name\">";
                $result .= "Отказ. *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
        }
    }
    if ($zayava->status == "cancelled") {
        $result .= "<p class=\"card-text align-self-end\">Отменена персонажем " . $zayava->date_last_update . "</p>";
    }
    return $result;
}

function getReadOnlyActionsWithAliases($zayava) {
    $result = "";
    $allActions = $zayava->actions;
    $counter = 0;
    if (sizeof($allActions) > 0) {
        foreach ($allActions as $action) {
            $result .= "<span class=\"name\">";
            $counter++;
            if (strpos($action->action, "sm") !== false) {
                if (sizeof($allActions) == $counter) {
                    $result .= "См *" . $action->alias . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "p_done") {
                $result .= "П *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if (strpos($action->action, "recheck_") !== false) {
                if (sizeof($allActions) == $counter) {
                    $result .= "См *" . $action->alias . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "b_recheck") {
                $result .= "Б *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "bp_done") {
                $result .= "Б/П *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "dopproverka_bp") {
                $result .= "Б/П *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "dopproverka_p") {
                $result .= "П *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "otkaz") {
                $result .= "Отказ *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "b_done") {
                $result .= "Б *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "b_done_p_recheck") {
                $result .= "Б/П *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "bp_done_recheck") {
                $result .= "Б/П *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "p_done_recheck") {
                $result .= "П *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "b_done_recheck") {
                $result .= "Б *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "nevid_done_chist") {
                $result .= "Доппроверка/Чист *" . $action->alias . ". " . $action->date . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "nevid_done_katorga") {
                $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан каторгой *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "nevid_done_prokli") {
                $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан комплектом проклятий *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "nevid_done_block") {
                $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан блоком *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "nevid_done_otkaz") {
                $result .= "Доппроверка/Отказ. *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "done_chist") {
                $result .= "Чист *" . $action->alias . ". " . $action->date . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "done_katorga") {
                $result .= "Отказ. Нарушения. Наказан каторгой *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "done_prokli") {
                $result .= "Отказ. Нарушения. Наказан комплектом проклятий *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "done_block") {
                $result .= "Отказ. Нарушения. Наказан блоком *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "done_otkaz") {
                $result .= "Отказ. *" . $action->alias . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_otkaz\">";
                    $result .= $action->notes . "<br>";
                    $result .= "</span>";
                }
            }
        }
    }
    if ($zayava->status == "cancelled") {
        $result .= "<p class=\"card-text \">Отменена персонажем " . $zayava->date_last_update . "</p>";
    }
    return $result;
}

function getStatus($status) {
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