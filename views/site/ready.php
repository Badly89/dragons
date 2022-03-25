<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Settings;
use app\models\Params;
use app\models\ActionsUserView;
use app\models\Zayavka;
use app\models\Users;
use app\models\Actions;
use yii\helpers\Url;

use rmrevin\yii\fontawesome\FAR;
use rmrevin\yii\fontawesome\FAS;

$settings = new Params();
$settings->loadSettings();
$td_bg_color = "#FEFFFA";
$active_bg = "#3AF265";
$active_shadow = "#00FF04";
$this->title = 'Б/П заявки';
$this->params['breadcrumbs'][] = ['label' => 'Заявки на чистоту', 'url' => ['zlist']];
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
    font-size: 14px;
    color: <?=$settings->comment_color ?>;
}

.text_otkaz {
    font-size: 14px;
    color: <?=$settings->otkaz_color ?>;
}
</style>
<script src="<?= Yii::$app->request->baseUrl ?>/js/clipboard.min.js"></script>
<div class=" row">
    <br />
    <?php
    if (sizeof($model->zayavkiArray) > 0) {
    //MAIN WORK HERE
    foreach ($model->zayavkiArray as $zayavka) {
    $actions = ActionsUserView::findActionsByZid($zayavka->zId);
    ?>
    <div class="col-xl-6 col-md-6 col-sm-12 mb-4 ">
        <div class="card application h-100" style=" background-color: <?= $settings->color_background ?>;
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
                      echo "box-shadow: 0 0 20px  " . $settings->color_killed;
                  }
            ?>
        ">
            <div class="card-header">
                <div class="buttons-nick-time">
                    <?php
                if (!Yii::$app->user->isGuest) {
                    if (true) {
                       
                        ?>
                    <button class="btn_<?= $zayavka->zId ?> btn-outline-info btn btm-sm btn-zlist mr-1">
                        <?php echo FAS::icon('clipboard')?>
                    </button>
                    <script>
                    var clipboard = new Clipboard('.btn_<?= $zayavka->zId ?>', {
                        text: function() {
                            return 'http://<?= Yii::$app->getRequest()->serverName ?><?= Yii::$app->getHomeUrl() ?>sitem/<?= $zayavka->zId ?>/';
                        }
                    });

                    clipboard.on('success', function(e) {
                        console.log(e);
                    });

                    clipboard.on('error', function(e) {
                        console.log(e);
                    });
                    </script>
                    <?php
                    } 
                } 
                ?>

                    <p><a href="http://kovcheg2.apeha.ru/info.html?nick=<?= urlencode(iconv("UTF-8", "CP1251", $zayavka->username)) ?>"
                            class="zlistNick text-decoration-none" target="_blank"><?= $zayavka->username ?></a></p>

                    <p class="text-muted zayavka-time pr-1">
                        <?php  echo FAR::icon('clock',['title'=>'Время подачи заявки']); ?>
                        <?= $zayavka->date_added ?></p>
                </div>
            </div>
            <div class="card-body application-body">
                <div class="zlist-sub p-2">
                    <h5 class="card-title zayavka-title"> <?= switchType($professions, $zayavka->type) ?> </h5>
                    <div class="card-subtitle zayavka-subtitle  "><?= switchCity($zayavka->city) ?>
                    </div>
                </div>
                <?php
                $boiDone = false;
                $perDone = false;
                $boiRecheck = false;
                $perRecheck = false;
                $dopproverka = false;
                $otkaz = false;
                $allowToTake = true;
                $allowToFinish = false;
                $stagerId = "";
                $stagerName = "";
                $st_note = "";
                $nevid_action = "";
                $chist = false;
                $nevid_done = false;
                $katorga = false;
                $prokli = false;
                if (sizeof($actions) > 0) {
                    ?>
                <p class="card-text otmetka">
                    <?php
                    //START FOREACH
                    foreach ($actions as $action) {
                        if ($action->action == "b_done") {
                            $boiDone = true;
                            $stagerId = $action->dragon_id;
                            $stagerName = $action->username;
                            $st_note = $action->notes;
                        }
                        if ($action->action == "p_done") {
                            $perDone = true;
                            $st_note = $action->notes;
                        }
                        if ($action->action == "bp_done") {
                            $boiDone = true;
                            $perDone = true;
                        }
                        if ($action->action == "b_recheck") {
                            $boiRecheck = true;
                            $stagerId = $action->dragon_id;
                            $stagerName = $action->username;
                            $st_note = $action->notes;
                        }
                        if ($action->action == "b_done_p_recheck") {
                            $boiDone = true;
                            $perRecheck = true;
                            $stagerId = $action->dragon_id;
                            $stagerName = $action->username;
                            $st_note = $action->notes;
                        }
                        if ($action->action == "otkaz") {
                            $otkaz = true;
                        }
                        if ($action->action == "dopproverka_p") {
                            $dopproverka = true;
                            $nevid_action = "p";
                        }
                        if ($action->action == "dopproverka_bp") {
                            $dopproverka = true;
                            $nevid_action = "bp";
                        }
                    }
                } ?>
                    <?php
                $stager_text = "";
                $stager_comment = "";
                if ($stagerId != "") {
                    foreach ($actions as $action) {
                        if ($action->dragon_id == $stagerId) {
                            if ($action->action == "b_done") {
                                $stager_text = "Б *" . $action->username;
                                $stager_comment = $action->notes;
                            }
                            if ($action->action == "b_recheck") {
                                $stager_text = "Б *" . $action->username;

                                $stager_comment = $action->notes;
                            }
                            if ($action->action == "b_done_p_recheck") {
                                $stager_text = "Б/П *" . $action->username;
                                $stager_comment = $action->notes;
                            }
                        }
                    }
                }
                
                if (strlen($stager_text) > 1) {
                    ?>

                    <span style="font-size:13px; color: green"><b><?= $stager_text ?></b><br></span>
                    <?php
                    if (strlen($stager_comment) > 1) {
                        ?>
                    <span style="font-size:13px; color: red"><b><?= returnComment($stager_comment) ?></b><br></span>

                    <?php
                    }
                }
                $dragon_text = "";
                $dragon_notes = "";
                foreach ($actions as $action) {
                    if ($action->action != "b_done_p_recheck" && $action->action != "b_recheck" && $action->action != "b_done_p_recheck") {
                        $dragon_notes = $action->notes;
                        $dragon_text = "";
                        if ($nevid_action == "p") {
                            $dragon_text = "П *" . $action->username;
                        }
                        if ($nevid_action == "bp") {
                            $dragon_text = "Б/П *" . $action->username;
                        }
                        if ($action->action == "bp_done") {
                            $dragon_text = "Б/П *" . $action->username;
                        }
                        if ($action->action == "p_done") {
                            $dragon_text = "П *" . $action->username;
                        }
                    }
                }
                ?>
                    <span style="font-size:13px; color: green"><b><?= $dragon_text ?></b><br></span>

                    <?php
                if (strlen($dragon_notes) > 1) {
                    ?>
                    <span style="font-size:13px; color: red"><b><?= returnComment($dragon_notes) ?></b><br></span>

                    <?php
                }
                //END DISPLAYING PROVERKA INFO
                //CHECK IF DRAGON HAS RIGHTS TO PERFORM NEVID ACITON
                if ($dragonRights->chistota == 1) {
                ?>


                <div class="dropdown align-self-end">
                    <a class="btn btn-outline-info btn-sm btn-finish btn-sm dropdown-toggle" type="button"
                        id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Закрыть заявку
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <?php
                    $items = [
                        'done_chist' => 'Чист',
                        'done_katorga' => 'Каторга',
                        'done_prokli' => 'Прокли',
                        'done_block' => 'Блок',
                        'done_otkaz' => 'Отказ',
                    ];

                    echo Html::beginForm(['/site/ready'], 'post',['class' => 'px-4 py-3 d-flex flex-column ']);
                    echo Html::dropDownList('Ready[action]', null, $items,['class' => 'mb-2 ']);
                    echo Html::hiddenInput('Ready[z_id]', $zayavka->zId,['class'=>'form-control']);
                    echo Html::textarea('Ready[comment]', '', ['cols' => '25'],['class'=>'form-control mb-2']);
                    echo Html::submitButton(
                        'Закрыть заявку', ['class' => 'btn btn-outline-danger btn-sm mt-2', 'onclick' => 'return confirm("Продолжаем?")']
                    );
                    echo Html::endForm();
                    ?>
                    </div>
                </div>


                </p>
                <?php
}
?>
            </div>
            <div class="card-footer zlist-footer">
                <p class="text-muted text">
                    Статус:
                    <?php
                    if ($zayavka->status == "new") {
                          
                        echo FAS::icon('plus-circle',['title'=>'Новая заявка']);
                         }
                    if ($zayavka->status == "cancelled") {
                        echo FAR::icon('times-circle');
                         }
                    if ($zayavka->status == "inprogress") {
                        echo FAR::icon('hourglass',['title'=>'проверяется'])->spin(20);  
                           }
                    if ($zayavka->status == "otkaz") {
                        echo FAS::icon('ban',['class' => 'skull-crossbones','title'=>'Отказ']);  
                        }
                    if ($zayavka->status == "chist") {
                        echo FAR::icon('check-circle',['title'=>'чистота выдана']);  
                     }
                    if ($zayavka->status == "katorga") {
                        echo FAS::icon('ban',['class' => 'skull-crossbones','title'=>'Наказан каторгой']);  
                        }
                    if ($zayavka->status == "block") {
            
                        echo FAS::icon('ban',['class' => 'skull-crossbones','title'=>'Наказан блоком'
                            ]);  
                     }
            ?>
                </p>

                <?php   
                    if (!Yii::$app->user->isGuest) {
                    if (true) {
                    ?> <p class="text-muted zayavka-id">
                    <?php
                 echo Html::a(
                            '#' . $zayavka->zId, Url::to([
                            '/site/sitem', 'id' => $zayavka->zId
                        ])
                        ); }
                        
                    }
                   
                ?>
                </p>
            </div>

        </div>
    </div>

    <?php
}
} else {
    echo "<p>Нет заявок для закрытия</p>";
}

function getStatus($status)
{
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

function switchCity($city)
{
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

function returnComment($comment)
{
    $result = "";
    $split = explode(' ', $comment);
    if (sizeof($split) > 0) {
        foreach ($split as $str) {
            if (strpos($str, "http://dragons.apeha.ru/forum") !== false) {
                $result .= "<a href=\"" . $str . "\" target=\"_blank\">" . $str . "</a> ";
            } else {
                $result .= $str . " ";
            }
        }
    } else {
        if (strpos($comment, "http://dragons.apeha.ru/forum") !== false) {
            $result .= "<a href=\"" . $comment . "\" target=\"_blank\">" . $comment . "</a> ";
        } else {
            $result .= $comment;
        }
    }
    return $result;
}

?>

</div>


<script>
function toggleView($id) {
    $element = document.getElementById($id);
    if ($element.style.display === 'none') {
        $element.style.display = 'block';
    } else {
        $element.style.display = 'none';
    }
}
</script>