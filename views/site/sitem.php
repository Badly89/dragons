<?php

use yii\helpers\Html;
use app\models\Zayavka;
use app\models\Users;
use app\models\Actions;
use yii\bootstrap4\ActiveForm;
use app\models\Params;
use rmrevin\yii\fontawesome\FAR;
use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Url;

$settings = new Params();
$settings->loadSettings();

if ($model->id) {
    $this->title = 'Заявка на чистоту #' . $model->id;
} else {
    $this->title = 'Поиск заявки на чистоту';
}
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.name {
    font-size: 14px;
    color: <?=$settings->sign_color ?>;
}

.text_italic {
    font-size: 13px;
    color: <?=$settings->comment_color ?>;
    font-style: italic;
}

.text {
    font-size: 18px;
    color: <?=$settings->comment_color ?>;
}

.text_otkaz {
    font-size: 14px;
    color: <?=$settings->otkaz_color ?>;
}
</style>
<?php
if (Zayavka::findZayavkaById($model->id)) {
    $zayavka = Zayavka::findZayavkaById($model->id);
    $user = Users::findById($zayavka->user_id);
    ?>
<ul class="list-group list-group-flush mb-3">
    <li class="list-group-item">

        <div class="card application h-100 " style="background-color:<?= $settings->color_background ?>; 
        <?php
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
        ?>
               ">
            <div class="card-header">

                <div class="buttons-nick-time">
                    <?php
                    if (Users::findGroupById(Yii::$app->user->getId()) > 1) {
                        echo Html::a(
                                '#' . $zayavka->id, Url::to([
                                    '/site/sitem', 'id' => $zayavka->id
                                ])
                        );
                    } else {
                        echo "#" . $zayavka->id;
                    }
                    ?>

                    <h5 class="card-title"><a href="http://apeha.ru/info.html?user=<?= $user->apeha_id ?>"
                            target="_blank"><?= $user->username ?></a></h5>
                    <p class="text-muted zayavka-time pr-1">
                        <?php  echo FAR::icon('clock',['title'=>'Время подачи заявки']); ?>
                        <?= $zayavka->date_added ?>
                    </p>
                </div>
            </div>
            <div class="card-body application-body">
                <div class="zlist-sub p-2">
                    <h5 class="card-title zayavka-title"> <?= switchType($professions, $zayavka->type) ?></h5>
                    <div class="card-subtitle zayavka-subtitle  ">
                        <?= switchCity($zayavka->city) ?>

                    </div>
                </div>
                <div class="card-text otmetka ">
                    <?= getAllActions($zayavka) ?>
                </div>
            </div>
            <div class="card-footer zlist-footer">
                <p class="text-muted text pr-5">
                    <?php
                        echo Html::a(
                                FAR::icon('eye'), Url::to([
                                    '/site/zlist', 'action' => 'show', 'zayavka' => $zayavka->id
                                ]), [
                            'style' => [
                                'color' => '#666',
                                'cursor' => 'pointer',
                                // 'display' => 'block',
                                 'font-size' => '18px',
                                // 'font-weight' => 'bold',
                                'line-height' => 'normal',
                                'text-decoration' => 'none',
                               
                            ],
                            'title' => 'Показать в топе проверок',
                            'class' =>'link-status'
                                ]
                        );
                        ?>
                </p>
                <p class="text-muted text status"> Статус:
                    <!-- <?= getStatus($zayavka->status) ?> -->
                    <?php
                    if ($zayavka->status == "new") {
                          
                        echo FAS::icon('plus-circle',['title'=>'Новая заявка']);
                         }
                    if ($zayavka->status == "cancelled") {
                        echo FAR::icon('times-circle');
                         }
                    if ($zayavka->status == "inprogress") {
                        echo FAR::icon('hourglass',['class' => 'inprogress-zayavka','title'=>'проверяется'])->spin(20);  
                           }
                    if ($zayavka->status == "otkaz") {
                        echo FAS::icon('ban',['class' => 'otkaz-zayavka','title'=>'Отказ']);  
                        }
                    if ($zayavka->status == "chist") {
                        echo FAR::icon('check-circle',['class' => 'chist-zayavka', 'title'=>'чистота выдана']);  
                     }
                    if ($zayavka->status == "katorga") {
                        echo FAS::icon('ban',['class' => 'otkaz-zayavka','title'=>'Наказан каторгой']);  
                        }
                    if ($zayavka->status == "block") {
            
                        echo FAS::icon('ban',['class' => 'otkaz-zayavka','title'=>'Наказан блоком'
                            ]);  
                     }
            ?>
                </p>
            </div>
        </div>
    </li>
</ul>

<?php
    if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
        $form = ActiveForm::begin([
                    'method' => 'post',
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-1 control-label'],
                    ],
        ]);
        $model->action = "cleanZayavka";
        echo $form->field($model, 'action')->hiddenInput()->label(false);
        echo $form->field($model, 'id')->hiddenInput()->label(false);
        ?>
<center>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Удалить все данные по проверке и обнулить статус заявки', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return confirm("ДЕЙСТВИЕ НЕОБРАТИМО. ПРОДОЛЖАЕМ?")'], ['id' => 'submit']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <hr>
</center>
<?php
    }
} else {
    //search item
}

function getAllActions($zayavka) {
    $result = "";
    $actions = Actions::findActionsByZid($zayavka->id);
    if (sizeof($actions) > 0) {
        foreach ($actions as $action) {
            if (strpos($action->action, "sm") !== false) {
                $result .= "См *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
            }
            if (strpos($action->action, "recheck_") !== false) {
                $result .= "См *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
            }
            if ($action->action == "b_recheck") {
                $result .= "Б *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "flashStatus") {
                $result .= "Сброс заявки *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
            }
            if ($action->action == "bp_done") {
                $result .= "Б/П *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "p_done") {
                $result .= "П *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }            
            if ($action->action == "dopproverka_bp") {
                $result .= "Б/П *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "dopproverka_p") {
                $result .= "П *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "otkaz") {
                $result .= "Отказ *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "b_done") {
                $result .= "Б *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "b_done_p_recheck") {
                $result .= "Б/П *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "bp_done_recheck") {
                $result .= "Б/П *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "p_done_recheck") {
                $result .= "П *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "b_done_recheck") {
                $result .= "Б *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
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
                $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан каторгой *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "nevid_done_prokli") {
                $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан комплектом проклятий *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "nevid_done_block") {
                $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан блоком *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "nevid_done_otkaz") {
                $result .= "Доппроверка/Отказ. *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "done_chist") {
                $result .= "Чист *" . Users::findById($action->dragon_id)->username . ". " . $action->date . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "done_katorga") {
                $result .= "Отказ. Нарушения. Наказан каторгой *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "done_prokli") {
                $result .= "Отказ. Нарушения. Наказан комплектом проклятий *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "done_block") {
                $result .= "Отказ. Нарушения. Наказан блоком *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
            if ($action->action == "done_otkaz") {
                $result .= "Отказ. *" . Users::findById($action->dragon_id)->username . " " . $action->date . "<br>";
                if (strlen($action->notes) > 1) {
                    $result .= $action->notes . "<br>";
                }
            }
        }
    }
    if ($zayavka->status == "cancelled") {
        $result .= "<i>Отменена персонажем " . $zayavka->date_last_update . "</i>";
    }
    return $result;
}

function getStatus($status) {
    $result = "";
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

function switchCity($city) {
    $result = "";
    switch ($city) {
        case 'kovcheg':
            $result = "Ковчег";
            break;
        case 'smorye':
            $result = "Среднеморье";
            break;
        case 'utes':
            $result = "Утёс дракона";
            break;
        case 'common':
            $result = "";
            break;
    }
    return $result;
}

function switchType($professions, $type)
{
    foreach ($professions as $pr) {
        if ($pr->system_name == $type) {
            return $pr->view_name;
        }
    }
    return $type;
}
?>