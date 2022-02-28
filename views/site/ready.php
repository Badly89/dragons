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
        color: <?= $settings->sign_color ?>;
    }

    .text_italic {
        font-size: 13px;
        color: <?= $settings->comment_color ?>;
        font-style: italic;
    }

    .text {
        font-size: 14px;
        color: <?= $settings->comment_color ?>;
    }

    .text_otkaz {
        font-size: 14px;
        color: <?= $settings->otkaz_color ?>;
    }


</style>
<script src="<?= Yii::$app->request->baseUrl ?>/js/clipboard.min.js"></script>
<div class="site-about">
    <br/>
    <?php
    if (sizeof($model->zayavkiArray) > 0) {
    //MAIN WORK HERE
    foreach ($model->zayavkiArray as $zayavka) {
    echo "<center>";
    $actions = ActionsUserView::findActionsByZid($zayavka->zId);
    ?>
    <table style="width:800px; border: 0px none; padding: 5px; background-color: <?= $settings->color_background ?>;
    <?php
    if ($zayavka->status == "new") {
        echo "box-shadow: 0 0 20px  grey";
    }
    if ($zayavka->status == "cancelled") {
        echo "box-shadow: 0 0 20px  " . $settings->color_cancelled;
    }
    if ($zayavka->status == "inprogress") {
        echo "box-shadow: 0 0 20px  " . $settings->color_inprogress;
    }
    if ($zayavka->status == "otkaz") {
        echo "box-shadow: 0 0 20px  " . $settings->color_otkaz;
    }
    if ($zayavka->status == "chist") {
        echo "box-shadow: 0 0 20px  " . $settings->color_chist;
    }
    if ($zayavka->status == "katorga") {
        echo "box-shadow: 0 0 20px  " . $settings->color_killed;
    }
    if ($zayavka->status == "prokli") {
        echo "box-shadow: 0 0 20px  " . $settings->color_killed;
    }
    if ($zayavka->status == "block") {
        echo "box-shadow: 0 0 20px  " . $settings->color_killed;
    }
    ?>
            ">
        <tr style="height: 40px">
            <td width="10%" style="padding: 5px;"><?php
                if (!Yii::$app->user->isGuest) {
                    if (true) {
                        echo Html::a(
                            '#' . $zayavka->zId, Url::to([
                            '/site/sitem', 'id' => $zayavka->zId
                        ])
                        );
                        ?>
                        <button class="btn_<?= $zayavka->zId ?>" style="
                                        position: relative;
                                        display: inline-block;
                                        padding: 2px 4px;
                                        font-size: 13px;
                                        font-weight: bold;
                                        line-height: 20px;
                                        color: #333;
                                        white-space: nowrap;
                                        vertical-align: middle;
                                        cursor: pointer;
                                        background-color: #eee;
                                        background-image: linear-gradient(#fcfcfc,#eee);
                                        border: 1px solid #d5d5d5;
                                        border-radius: 3px;
                                        -webkit-user-select: none;
                                        -moz-user-select: none;
                                        -ms-user-select: none;
                                        user-select: none;
                                        -webkit-appearance: none;
                                        ">
                            <img width="14px" src="<?= Yii::$app->request->baseUrl ?>/img/clippy.svg"
                                 alt="Copy to clipboard">
                        </button>
                        <script>
                            var clipboard = new Clipboard('.btn_<?= $zayavka->zId ?>', {
                                text: function () {
                                    return 'http://<?= Yii::$app->getRequest()->serverName ?><?= Yii::$app->getHomeUrl() ?>sitem/<?= $zayavka->zId ?>/';
                                }
                            });

                            clipboard.on('success', function (e) {
                                console.log(e);
                            });

                            clipboard.on('error', function (e) {
                                console.log(e);
                            });
                        </script>
                        <?php
                    } else {
                        echo "#" . $zayavka->zId;
                    }
                } else {
                    echo "#" . $zayavka->zId;
                }
                ?>
            </td>
            <td width="25%" style="padding: 5px;"><a
                        href="http://newforest.apeha.ru/info.html?nick=<?= urlencode(iconv("UTF-8", "CP1251", $zayavka->username)) ?>"
                        target="_blank"><?= $zayavka->username ?></a></td>
            <td width="35%" style="padding: 5px;">Статус: <?= getStatus($zayavka->status) ?></td>
            <td align="right" width="30%" style="padding: 5px;">Подана: <?= $zayavka->date_added ?></td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 5px;">
                <?= switchType($professions, $zayavka->type) ?>
            </td>
            <td colspan="2" style="padding: 5px;">
                <?= switchCity($zayavka->city) ?>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="padding:15px">
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
                }
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
                <span style="font-size:13px; text-decoration: underline; cursor: pointer"
                      onclick="toggleView('finish_recheck_<?= $zayavka->zId ?>')">Закрыть заявку</span><br>
                <div style="padding:15px; display:none" id="finish_recheck_<?= $zayavka->zId ?>">

                    <?php
                    $items = [
                        'done_chist' => 'Чист',
                        'done_katorga' => 'Каторга',
                        'done_prokli' => 'Прокли',
                        'done_block' => 'Блок',
                        'done_otkaz' => 'Отказ',
                    ];

                    echo Html::beginForm(['/site/ready'], 'post');
                    echo Html::dropDownList('Ready[action]', null, $items);
                    echo "<br><br>";
                    echo Html::hiddenInput('Ready[z_id]', $zayavka->zId);
                    echo Html::textarea('Ready[comment]', '', ['cols' => '105']);
                    echo "<br><br>";
                    echo Html::submitButton(
                        'Закрыть заявку', ['class' => 'button', 'onclick' => 'return confirm("Продолжаем?")']
                    );
                    echo Html::endForm();
                    ?>
                </div>
</div>
<?php
}
?>
    </td>
    </tr>
    </table>
<br/><br/>




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