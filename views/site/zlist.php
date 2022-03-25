<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Zayavka;
use app\models\Users;
use app\models\Actions;
use app\components\ZlistLinkPager;
use app\models\Settings;
use app\models\Params;
use yii\helpers\Url;
use app\models\ActionsUserView;
use rmrevin\yii\fontawesome\FAR;
use rmrevin\yii\fontawesome\FAS;
use yii\bootstrap4\Tabs;

$this->title = 'Заявки на чистоту';
$this->params['breadcrumbs'][] = $this->title;
$settings = new Params();
$settings->loadSettings();
$td_bg_color = "#FEFFFA";
$active_bg = "#3AF265";
$active_shadow = "#00FF04";
global $dragonR;
$dragonR = $dragonRights;


?>
<style>
.text_italic {
    font-size: 13px;
    color: <?=$settings->comment_color ?>;
    font-style: italic;
}

.text {
    font-size: 16px;
    color: <?=$settings->comment_color ?>;
}

.text_otkaz {
    font-size: 16px;
    color: <?=$settings->otkaz_color ?>;
}

.name {
    font-size: 16px;
    color: <?=$settings->sign_color ?>;
}
</style>
<script src="<?= Yii::$app->request->baseUrl ?>/js/clipboard.min.js"></script>
<script src="<?= Yii::$app->request->baseUrl ?>/js/jquery-3.6.0.min.js"></script>
<script src="<?= Yii::$app->request->baseUrl ?>/js/readmore.min.js"></script>
<div class="zlist-tabs">
    <div class="mb-3 d-none">
        <?php 
        $itemsCity=[];
        if($city =='kovcheg'){
            $itemsCity[]=[
                'encodeLabels'=>false,
                'label'=>'Ковчег',
                'url' =>['/site/zlist', 'city' => 'kovcheg', 'type' => $type],
                'active' =>true,
                'linkOptions'=>['class'=>'link-city']
               
            ];
          
        } else{
             $itemsCity[]= [
                'label'=>'Ковчег',
                'url' =>['/site/zlist', 'city' => 'kovcheg', 'type' => $type ],
                'active' =>false,
                
                
           ];
        }

        if($city =='smorye'){
           $itemsCity[]= [
                'label'=>'Среднеморье',
                'url' =>['/site/zlist', 'city' => 'smorye', 'type' => $type ],
                'active' =>true,
                 'linkOptions'=>['class'=>'link-city']
           ];
        } else{
            $itemsCity[]=[
                'label'=>'Среднеморье',
                'url' =>['/site/zlist', 'city' => 'smorye', 'type' => $type ],
                'active' =>false
           ];
        }
         if($city =='utes'){
           $itemsCity[]=[
                'label'=>'Утес',
                'url' =>['/site/zlist', 'city' => 'utes', 'type' => $type ],
                'active' =>true,
                'encode'=>false,
                'linkOptions'=>[
                    'class'=>'link-city'
               ]
           ];
        } else{
            $itemsCity[]=[
                'label'=>'Утес',
                'url' =>['/site/zlist', 'city' => 'utes', 'type' => $type ],
                'active' =>false
           ];
        }
    ?>

        <?= Tabs::widget([
        'navType' =>'nav-pills',
        'items'=>$itemsCity,
        
    ])     
     ?>
    </div>
    <div>
        <?php 
    $itemsProf =[];
    if($type=='klan'){
        $itemsProf[]=[
            'label'=>'Кланы',            
            'active' =>true,
            'url'=>['/site/zlist', 'city' => $city, 'type' => 'klan'],
            'linkOptions'=>[
                    'class'=>'link-prof'
               ]
        ];
    } else{
        $itemsProf[]=[
            'label'=>'Кланы',            
            'active' =>false,
            'url'=>['/site/zlist', 'city' => $city, 'type' => 'klan']
        ];
    }
    if($type=='naim'){
        $itemsProf[]=[
            'label'=>'Наймы',            
            'active' =>true,
            'url'=>['/site/zlist', 'city' => $city, 'type' => 'naim'],
            'linkOptions'=>[
                   'class'=>'link-prof'
               ]
        ];
    } else{
        $itemsProf[]=[
            'label'=>'Наймы',            
            'active' =>false,
            'url'=>['/site/zlist', 'city' => $city, 'type' => 'naim']
        ];
    }
     if($type=='trav'){
        $itemsProf[]=[
            'label'=>'Травники',            
            'active' =>true,
            'url'=>['/site/zlist', 'city' => $city, 'type' => 'trav'],
            'linkOptions'=>[
                   'class'=>'link-prof'
               ]
        ];
    } else{
        $itemsProf[]=[
            'label'=>'Травники',            
            'active' =>false,
            'url'=>['/site/zlist', 'city' => $city, 'type' => 'trav']
        ];
    }
    if($type=='common'){
        $itemsProf[]=[
            'label'=>'Общие',            
            'active' =>true,
            'url'=>['/site/zlist', 'city' => $city, 'type' => 'common'],
            'linkOptions'=>[
                   'class'=>'link-prof'
               ]
        ];
    } else{
        $itemsProf[]=[
            'label'=>'Общие',            
            'active' =>false,
            'url'=>['/site/zlist', 'city' => $city, 'type' => 'common']
        ];
    }

    ?>
        <?= Tabs::widget([
        'navType' =>'nav-pills',
        'items'=>$itemsProf,
        
    ])     
     ?>
    </div>
</div>

<br />
<?php
echo "<div aria-label='navigation' class=\"zlist-pagination mb-3\"> ";
echo ZlistLinkPager::widget([
    'maxButtonCount' => 10,
    'pagination' => $pagination,
    'firstPageLabel' => '<<',
    'lastPageLabel' => '>>',
    'prevPageLabel' => '<',
    'nextPageLabel' => '>',
    'city' => $city,
    'type' => $type,
    
]);
echo "</div>";
// echo"<div class=\"row mb-3\">";
echo "<ul class=\"list-group list-group-flush mb-3\">";
foreach ($zayavki as $zayavka) {
    //if (sizeof($dragonRights) > 0) {
    if ($dragonRights != null) {
        $actions = ActionsUserView::findActionsByZid($zayavka->zId);
    } else {
        $actions = ActionsUserView::findActiveActionsByZid($zayavka->zId);
    }
    ?>


<!-- начало списка заявок -->
<!-- <div class="col-xl-6 col-sm-12 col-md-6 mb-3"> -->
<li class="list-group-item">
    <div class="card h-100 application" style=" background-color:
           /* выставляем цвета */
           <?php
                if ($zayavka->user_id == Yii::$app->user->getId()) {
                echo $settings->own_z_color;
                } else {
                echo $settings->color_background;
                }
                echo ";";
                ?>

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


        <div class="card-header">

            <div class="buttons-nick-time">
                <?php
             if (!Yii::$app->user->isGuest) {
                     if ($model->user_group > 9) { 
                         ?>
                <script>
                function updateSpecText(type, id) {
                    buttonDiv = document.getElementById('spec_button_' + id + '_div');
                    div = document.getElementById('spectext_' + id);
                    profText = div.innerHTML;
                    buttonDiv.style.display = "block";
                    if (type === "bp") {
                        div.innerHTML = "Б/П - чисто. " + profText +
                            " http://<?= Yii::$app->getRequest()->serverName ?><?= Yii::$app->getHomeUrl() ?>sitem/<?= $zayavka->zId ?>/";
                    }
                    if (type === "p") {
                        div.innerHTML = "П - чисто. " + profText +
                            " http://<?= Yii::$app->getRequest()->serverName ?><?= Yii::$app->getHomeUrl() ?>sitem/<?= $zayavka->zId ?>/";
                    }
                    if (type === "b") {
                        div.innerHTML = "Б - чисто. " + profText +
                            " http://<?= Yii::$app->getRequest()->serverName ?><?= Yii::$app->getHomeUrl() ?>sitem/<?= $zayavka->zId ?>/";
                    }

                }
                </script>
                <div class="zlist-head-buttons">
                    <button class="btn_<?= $zayavka->zId ?> btn-outline-info btn btn-sm btn-zlist mr-1" style="">
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
                     if ($zayavka->status == "inprogress") {
                                    ?>
                    <!-- <div id="spec_button_<?= $zayavka->zId ?>_div" style="display: none;"> -->
                    <button id="spec_button_<?= $zayavka->zId ?>_div" style="display: none;"
                        class="ext_btn_<?= $zayavka->zId ?> btn btn-outline-danger btn-sm btn-zlist-danger">
                        <?php echo FAS::icon('clipboard')?>
                        <!-- <img width="14px" src="<?= Yii::$app->request->baseUrl ?>/img/clippy_red.png"
                        alt="Copy to clipboard"> -->
                    </button>
                    <div id="spectext_<?= $zayavka->zId ?>" style="display: none">
                        <?= switchType($professions, $zayavka->type) ?>
                        <?= switchCity($zayavka->city) ?>
                    </div>
                    <script>
                    var clipboard = new Clipboard('.ext_btn_<?= $zayavka->zId ?>', {
                        text: function() {
                            text = document.getElementById(
                                    'spectext_<?= $zayavka->zId ?>')
                                .innerHTML;
                            return text;
                        }
                    });

                    clipboard.on('success', function(e) {
                        console.log(e);
                    });

                    clipboard.on('error', function(e) {
                        console.log(e);
                    });
                    </script>
                    <!-- </div> -->
                    <?php } 
                    echo"</div>";
                       }
                    }?>
                    <h5 class="card-title">
                        <a href="http://kovcheg2.apeha.ru/info.html?nick=<?= urlencode(iconv("UTF-8", "CP1251", $zayavka->username)) ?>"
                            target="_blank" class="zlistNick text-decoration-none"
                            title="Открыть инфу персонажа"><?= $zayavka->username ?></a>
                    </h5>
                    <p class="text-muted zayavka-time pr-1">
                        <?php  echo FAR::icon('clock',['title'=>'Время подачи заявки']); ?>
                        <?= $zayavka->date_added ?></p>

                </div>
            </div>


            <div class="card-body application-body">
                <div class="zlist-sub p-2">
                    <h5 class="card-title zayavka-title"> <?= switchType($professions, $zayavka->type) ?></h5>
                    <div class="card-subtitle zayavka-subtitle  ">
                        <?= switchCity($zayavka->city) ?>

                    </div>
                </div>

                <?php
        //      if (is_array($dragonRights) && sizeof($dragonRights) > 0) {
        if ($dragonRights != null) {
            //DRAGON
            // if (!($zayavka->active == 0 && sizeof($actions) == 0)) {
            if ($zayavka->active == 1) {
                $check_per = false;
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
                        if ($action->action == "recheck_peredachi") {
                            $check_per = true;
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
                //END FOREACH
                if (($boiDone && $perDone) || $otkaz || $dopproverka) {
                    //HERE WE WILL DO CHISTOTA/KATORGA AND SO ONE
                    if ($otkaz) {
                        $model->zzz = 1;
                        ?>
                <div class="card-text otmetka">
                    <?php
                                foreach ($actions as $action) {
                                    if ($action->action == "otkaz") {
                                        echo returnComment($action->notes);
                                    }
                                }
                                ?>
                    Отказано.. причина бла бла бла
                </div>


                <?php
                    }
                    if ($dopproverka) {
                        //------------------------=====================  НЕВИД  =======================-----------------------
                        ?>

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
                <div class="card-text otmetka ">
                    <span style="font-size:13px; color: green"><b><?= $stager_text ?></b><br></span>
                </div>
                <?php
                                    if (strlen($stager_comment) > 1) {
                                        ?>
                <div class="card-text otmetka hide">
                    <span style="font-size:13px; color: red"><b><?php echoComment($stager_comment) ?></b><br></span>
                </div>
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
                                echo "<br><span style=\"font-size:13px; color: black\"><b>Доппроверка</b><br></span>";
                                //END DISPLAYING PROVERKA INFO
                                //CHECK IF DRAGON HAS RIGHTS TO PERFORM NEVID ACITON
                                if ($dragonRights->nevid == 1) {
                                    ?>

                <div class="dropdown align-self-end">
                    <button class="btn btn-outline-info btn-sm btn-finish dropdown-toggle" type="button"
                        id="dropdownNevid" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Закончить доппроверку
                    </button>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownNevid">
                        <?php
                            echo Html::beginForm(['/site/zlist'], 'post',['class' => 'px-4 py-3 d-flex flex-column ']);
                            echo Html::hiddenInput('Zlist[city]', $city);
                            echo Html::hiddenInput('Zlist[type]', $type);
                            echo Html::dropDownList('Zlist[action]', null, [
                                            'nevid_done_chist' => 'Чист',
                                            'nevid_done_katorga' => 'Каторга',
                                            'nevid_done_prokli' => 'Прокли',
                                            'nevid_done_block' => 'Блок',
                                            'nevid_done_otkaz' => 'Отказ',
                                        ],['class' => 'mb-2 ']);
                            echo Html::hiddenInput('Zlist[z_id]', $zayavka->zId);
                            echo Html::hiddenInput('Zlist[boi]', true);
                            echo Html::hiddenInput('Zlist[peredachi]', true);
                            echo Html::hiddenInput('Zlist[active_page]', $active_page);
                            echo Html::textarea('Zlist[comment]', '', ['cols' => '25'],['class'=>'form-control mb-2']);
                            echo Html::submitButton(
                            'Закончить доппроверку', ['class' => 'btn btn-outline-danger btn-sm mt-2', 'onclick' => 'return confirm("Продолжаем?")']
                        );
                        echo Html::endForm();                   
                    ?>

                    </div>
                </div>


                <?php
                                }
                                ?>
                </p>
                <?php
                    }
                    if ($boiDone && $perDone) {
                        //------------------------=====================  Б/П ПРОВЕРЕНО  =======================-----------------------                        
                        ?>
                <div class="card-text otmetka ">
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
                                // УПРАВЛЕНИЕ ДЛЯ ЗАКРЫВАЮЩЕГО ЗАЯВКУ
                                if ($dragonRights->chistota == 1) {
                                    $items = [
                                        'done_chist' => 'Чист',
                                        'done_katorga' => 'Каторга',
                                        'done_prokli' => 'Прокли',
                                        'done_block' => 'Блок',
                                        'done_otkaz' => 'Отказ',
                                    ];
                                }
                                if ($dragonRights->katorga == 1 && $dragonRights->chistota == 0) {
                                    $items = [
                                        'done_katorga' => 'Каторга',
                                        'done_prokli' => 'Прокли',
                                        'done_otkaz' => 'Отказ',
                                    ];
                                }
                                if ($dragonRights->prokli == 1 && $dragonRights->katorga == 0) {
                                    $items = [
                                        'done_prokli' => 'Прокли',
                                        'done_otkaz' => 'Отказ',
                                    ];
                                }
                                if ($dragonRights->fullbp == 1 && $dragonRights->prokli == 0) {
                                    $items = [
                                        'done_otkaz' => 'Отказ',
                                    ];
                                }
                                if (isset($items)) {
                                    ?>
                    <div class="dropdown align-self-end">
                        <a class="btn btn-outline-info btn-sm btn-finish btn-sm dropdown-toggle" type="button"
                            id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Закрыть заявку
                        </a>
                        <div class="dropdown-menu dropdown-menu-right border-action ">

                            <?php
                                        echo Html::beginForm(['/site/zlist'], 'post',['class' => 'px-4 py-3 d-flex flex-column ']);
                                        echo Html::hiddenInput('Zlist[city]', $city);
                                        echo Html::hiddenInput('Zlist[type]', $type);
                                        echo Html::dropDownList('Zlist[action]', null, $items,['class'=>'form-control mb-2']);
                                        echo Html::hiddenInput('Zlist[z_id]', $zayavka->zId,['class'=>'form-control']);
                                        echo Html::hiddenInput('Zlist[boi]', true);
                                        echo Html::hiddenInput('Zlist[peredachi]', true);
                                        echo Html::hiddenInput('Zlist[active_page]', $active_page);
                                        echo Html::textarea('Zlist[comment]', '', ['cols' => '25'],['class'=>'form-control mb-2']);
                                        echo Html::submitButton(
                                            'Закрыть заявку', ['class' => 'btn btn-outline-danger btn-sm mt-2', 'onclick' => 'return confirm("Продолжаем?")']
                                        );
                                        echo Html::endForm();
                                        ?>


                        </div>
                    </div>


                    <?php
                                }
                                ?>
                </div>
                <?php
                    }
                    $allowToTake = false;
                } else {
                    //HERE WE ARE IF ZAYAVKA NOT PROVERENA AND NOT OTKAZANA
                    if ($dragonRights->boi_prov == 1 || $dragonRights->per_prov == 1 || $dragonRights->boi == 1 || $dragonRights->peredachi == 1 || $dragonRights->fullbp == 1) {
                        ?>
                <div class="card-text otmetka ">
                    <!-- <hr style="padding:0; margin-top: 0; margin-bottom: 8px; border-top: 1px solid #00a"> -->
                    <?php
                                foreach ($actions as $action) {
                                    if (strpos($action->action, "sm") !== false && $action->active == 1) {
                                        if ($action->dragon_id == $dragonRights->dragonid) {
                                            $allowToFinish = true;
                                            echo "<span style=\"font-size:14px; color: red\">Заявка рассматривается <b>Вами</b><br></span>";
                                            ?>

                    <div class="dropdown align-self-end">
                        <a class="btn btn-outline-info btn-sm btn-finish btn-sm dropdown-toggle" type="button"
                            id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Закончить проверку
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php
                                                echo Html::beginForm(['/site/zlist'], 'post',['class' => 'px-4 py-3 d-flex flex-column ']);
                                                echo Html::hiddenInput('Zlist[city]', $city);
                                                echo Html::hiddenInput('Zlist[type]', $type);
                                                if ($dragonRights->fullbp == 1) {
                                            ?>
                            <script>
                            updateSpecText("bp", "<?= $zayavka->zId ?>");
                            </script>
                            <?php
                                                $items = ['select_action' => '--==выберите==--', 'bp_done' => 'Б/П проверено', 'dopproverka_bp' => 'Б/П+Доппроверка', 'otkaz' => 'Отказ'];
                                                } else {
                                                if ($dragonRights->boi_prov == 1 && $dragonRights->per_prov == 1 & $dragonRights->boi == 1 & $dragonRights->peredachi == 1) {
                                                ?>
                            <script>
                            updateSpecText("bp", "<?= $zayavka->zId ?>");
                            </script>
                            <?php
                                                    $items = [
                                                        'select_action' => '--==выберите==--',
                                                        'b_recheck' => 'Б на перепроверку',
                                                        'b_done' => 'Б проверено',
                                                        'b_done_p_recheck' => 'Б проверено + П на перепроверку',
                                                        'bp_done' => 'Б/П проверено',
                                                        'dopproverka_bp' => 'Б/П+Доппроверка',
                                                        'otkaz' => 'Отказ'];
                                                }
                                                    if ($dragonRights->boi_prov == 1 && $dragonRights->per_prov == 1 & $dragonRights->boi == 1 & $dragonRights->peredachi == 0) {
                                                        $items = [
                                                            'select_action' => '--==выберите==--',
                                                            'b_recheck' => 'Б на перепроверку',
                                                            'b_done' => 'Б проверено',
                                                            'b_done_p_recheck' => 'Б проверено + П на перепроверку',
                                                            'otkaz' => 'Отказ'];
                                                    }
                                                    if ($dragonRights->boi_prov == 1 && $dragonRights->per_prov == 0 & $dragonRights->boi == 1 & $dragonRights->peredachi == 0) {
                                                        $items = [
                                                            'select_action' => '--==выберите==--',
                                                            'b_recheck' => 'Б на перепроверку',
                                                            'b_done' => 'Б проверено',
                                                            'otkaz' => 'Отказ'];
                                                    }
                                                    if ($dragonRights->boi_prov == 1 && $dragonRights->per_prov == 0 & $dragonRights->boi == 0 & $dragonRights->peredachi == 0) {
                                                        $items = [
                                                            'select_action' => '--==выберите==--',
                                                            'b_recheck' => 'Б на перепроверку',
                                                            'otkaz' => 'Отказ'];
                                                    }
                                                    if ($dragonRights->boi_prov == 0 && $dragonRights->per_prov == 1 & $dragonRights->boi == 1 & $dragonRights->peredachi == 0) {
                                                        $items = [
                                                            'select_action' => '--==выберите==--',
                                                            'b_done' => 'Б проверено',
                                                            'b_done_p_recheck' => 'Б проверено + П на перепроверку',
                                                            'otkaz' => 'Отказ'];
                                                    }
                                                    if ($dragonRights->boi_prov == 0 && $dragonRights->per_prov == 0 & $dragonRights->boi == 1 & $dragonRights->peredachi == 0) {
                                                        $items = [
                                                            'select_action' => '--==выберите==--',
                                                            'b_done' => 'Б проверено',
                                                            'otkaz' => 'Отказ'];
                                                    }
                                                }
                                                echo Html::dropDownList('Zlist[action]', null, $items,['class' => 'mb-2 ']);
                                                echo Html::hiddenInput('Zlist[z_id]', $zayavka->zId);
                                                echo Html::hiddenInput('Zlist[boi]', true);
                                                echo Html::hiddenInput('Zlist[peredachi]', true);
                                                echo Html::hiddenInput('Zlist[active_page]', $active_page);
                                                echo Html::textarea('Zlist[comment]', '', ['cols' => '25'],['class'=>'form-control mb-2']);
                                                echo Html::submitButton(
                                                    'Отметить проверку законченной', ['class' => 'btn btn-outline-danger btn-sm mt-2', 'onclick' => 'return confirm("Помечаем Б/П. Продолжаем?")']
                                                );
                                                echo Html::endForm();
                                                ?>
                        </div>
                        <?php
                                        } else {
                                            echo "<span style=\"font-size:13px; color: green\">Заявка рассматривается драконом <b><span style=\"color:red\">Dr. " . Users::findById($action->dragon_id)->username . "</span></b><br></span>";
                                            $allowToTake = false;
                                            if ($dragonRights->fullbp == 1) {
                                                echo Html::beginForm(['/site/zlist'], 'post',['class' => 'px-4 py-3 d-flex flex-column ']);
                                                echo Html::hiddenInput('Zlist[city]', $city);
                                                echo Html::hiddenInput('Zlist[type]', $type);
                                                echo Html::hiddenInput('Zlist[action]', 'takeItemWithOverride');
                                                echo Html::hiddenInput('Zlist[z_id]', $zayavka->zId,['class'=>'form-control']);
                                                echo Html::hiddenInput('Zlist[boi]', true);
                                                echo Html::hiddenInput('Zlist[peredachi]', true);
                                                echo Html::hiddenInput('Zlist[active_page]', $active_page);
                                                echo Html::submitButton(
                                                    'Забрать на Б/П проверку, отменив предыдущую проверку', ['class' => 'btn btn-outline-danger btn-sm mt-2 logout', 'onclick' => 'return confirm("Забираем заявку себе. Продолжаем?")']
                                                );
                                                echo Html::endForm();
                                            }
                                        }
                                    }
                                    if (strpos($action->action, "recheck_") !== false) {
                                        $allowToTake = false;
                                        ?>

                        <?php
                                                    if (!$boiDone && !$perDone && $boiRecheck && $perRecheck) {
                                                        echo "<span style=\"font-size:12px\">Б/П *" . $stagerName . " - Нужна перепроверка<br></span>";
                                                        $items = ['select_action' => '--==выберите==--', 'bp_done_recheck' => 'Б/П проверено', 'dopproverka_bp' => 'Б/П+Доппроверка', 'otkaz' => 'Отказ'];
                                                    }
                                                    if (!$boiDone && !$perDone && $boiRecheck && !$perRecheck) {
                                                        echo "<span style=\"font-size:12px\">Б *" . $stagerName . " - Нужна перепроверка<br></span>";
                                                        $items = ['select_action' => '--==выберите==--', 'bp_done_recheck' => 'Б/П проверено', 'dopproverka_bp' => 'Б/П+Доппроверка', 'otkaz' => 'Отказ'];
                                                    }
                                                    if (!$boiDone && !$perDone && !$boiRecheck && $perRecheck) {
                                                        echo "<span style=\"font-size:12px\">П *" . $stagerName . " - Нужна перепроверка<br></span>";
                                                        $items = ['select_action' => '--==выберите==--', 'b_done_recheck' => 'Б проверено', 'dopproverka_bp' => 'Б+Доппроверка', 'otkaz' => 'Отказ'];
                                                    }
                                                    if ($boiDone && !$perDone && $perRecheck) {
                                                        echo "<span style=\"font-size:12px\">Б/П *" . $stagerName . " - Нужна перепроверка передач<br></span>";
                                                        $items = ['select_action' => '--==выберите==--', 'p_done_recheck' => 'П проверено', 'dopproverka_p' => 'П+Доппроверка', 'otkaz' => 'Отказ'];
                                                    }
                                                    if ($boiDone && !$perDone && $check_per && !$perRecheck) {
                                                        echo "<span style=\"font-size:12px\">Б *" . $stagerName . " - Нужна проверка передач<br></span>";
                                                        $items = ['select_action' => '--==выберите==--', 'p_done_recheck' => 'П проверено', 'dopproverka_p' => 'П+Доппроверка', 'otkaz' => 'Отказ'];
                                                    }
                                                    if (strlen($st_note) > 1) {
                                                        echo "<span style=\"font-size:13px; color:red\">" . $st_note . "<br></span>";
                                                    }
                                                    if ($action->dragon_id == $dragonRights->dragonid) {
                                                    if ($boiDone) {
                                                        ?>
                        <script>
                        updateSpecText("p", "<?= $zayavka->zId ?>");
                        </script>
                        <?php
                                                    } else {
                                                    ?>
                        <script>
                        updateSpecText("bp", "<?= $zayavka->zId ?>");
                        </script>
                        <?php
                                                    }
                                                    echo "<span style=\"font-size:14px; color: red\">Заявка перепроверяется <b>Вами</b><br></span>";
                                                    ?>
                    </div>
                </div>
                <span style="font-size:13px; text-decoration: underline; cursor: pointer"
                    onclick="toggleView('finish_check_<?= $zayavka->zId ?>')">Закончить проверку</span>
                <br>
                <div style="padding:15px; display:none" id="finish_check_<?= $zayavka->zId ?>">


                    <span style="font-size:13px; text-decoration: underline; cursor: pointer"
                        onclick="toggleView('finish_recheck_<?= $zayavka->zId ?>')">Закончить
                        перепроверку</span>
                    <br>
                    <div style="padding:15px; display:none" id="finish_recheck_<?= $zayavka->zId ?>">

                        <?php
                                                            echo Html::beginForm(['/site/zlist'], 'post',['class' => 'px-4 py-3 d-flex flex-column ']);
                                                            echo Html::hiddenInput('Zlist[city]', $city);
                                                            echo Html::hiddenInput('Zlist[type]', $type);
                                                            echo Html::dropDownList('Zlist[action]', null, $items,['class' => 'mb-2 ']);
                                                            echo "<br><br>";
                                                            echo Html::hiddenInput('Zlist[z_id]', $zayavka->zId);
                                                            echo Html::hiddenInput('Zlist[boi]', true);
                                                            echo Html::hiddenInput('Zlist[peredachi]', true);
                                                            echo Html::hiddenInput('Zlist[active_page]', $active_page);
                                                            echo Html::textarea('Zlist[comment]', '', ['cols' => '25'],['class'=>'form-control mb-2']);
                                                            echo "<br><br>";
                                                            echo Html::submitButton(
                                                                'Отметить перепроверку законченной', ['class' => 'btn btn-outline-danger btn-sm mt-2 ', 'onclick' => 'return confirm("Продолжаем?")']
                                                            );
                                                            echo Html::endForm();
                                                            ?>
                    </div>
                    <?php
                                                    } else {
                                                        echo "<span style=\"font-size:13px; color: green\">Заявка перепроверяется драконом <b><span style=\"color:red\">Dr. " . $action->username . "</span></b><br></span>";
                                                    }
                                                    ?>
                </div>
                <div class="card-text otmetka ">
                    <?php
                                    }
                                }
                                if ($allowToTake && !$allowToFinish) {
                                    //seems that we are allowed to take item. Verify previous checks
                                    //We got information about completed checks. Verify if we allowed to do something
                                    if (!$boiDone && !$perDone && !$boiRecheck && !$perRecheck) {
                                        //CHECK NOT STARTED AT ALL
                                        echo "<span style=\"font-size:11px\">Новая заявка. Вы можете взять её на проверку<br></span>";
                                        echo Html::beginForm(['/site/zlist'], 'post',['class'=>'d-flex justify-content-end']);
                                        echo Html::hiddenInput('Zlist[city]', $city);
                                        echo Html::hiddenInput('Zlist[type]', $type);
                                        echo Html::hiddenInput('Zlist[action]', 'takeItem');
                                        echo Html::hiddenInput('Zlist[z_id]', $zayavka->zId);
                                        echo Html::hiddenInput('Zlist[boi]', true);
                                        echo Html::hiddenInput('Zlist[peredachi]', true);
                                        echo Html::hiddenInput('Zlist[active_page]', $active_page);
                                        echo Html::submitButton(
                                            'Взять на проверку', ['class' => 'btn btn-outline-info btn-start  logout', 'onclick' => 'return confirm("Берём заявку на проверку. Продолжаем?")']
                                        );
                                        echo Html::endForm();
                                    } else {
                                        if (!$boiDone && !$perDone && $boiRecheck && $perRecheck) {
                                            echo "<span style=\"font-size:11px\">Б/П *" . $action->username . " - Нужна перепроверка<br></span>";
                                            if (strlen($st_note) > 1) {
                                                echo "<span style=\"font-size:13px; color:red\">" . $st_note . "<br></span>";
                                            }
                                            if ($dragonRights->fullbp == 1 || ($dragonRights->boi == 1 && $dragonRights->peredachi == 1)) {
                                                echo Html::beginForm(['/site/zlist'], 'post',['class'=>'align-self-end']);
                                                echo Html::hiddenInput('Zlist[city]', $city);
                                                echo Html::hiddenInput('Zlist[type]', $type);
                                                echo Html::hiddenInput('Zlist[action]', 'takeRecheck');
                                                echo Html::hiddenInput('Zlist[z_id]', $zayavka->zId);
                                                echo Html::hiddenInput('Zlist[boi]', true);
                                                echo Html::hiddenInput('Zlist[peredachi]', true);
                                                echo Html::hiddenInput('Zlist[active_page]', $active_page);
                                                echo Html::submitButton(
                                                    'Взять на перепроверку', ['class' => 'btn btn-outline-info logout', 'onclick' => 'return confirm("Берём заявку на перепроверку. Продолжаем?")']
                                                );
                                                echo Html::endForm();
                                            }
                                        }
                                        if (!$boiDone && !$perDone && $boiRecheck && !$perRecheck) {
                                            echo "<span style=\"font-size:11px\">Б *" . $action->username . " - Нужна перепроверка<br></span>";
                                            if (strlen($st_note) > 1) {
                                                echo "<span style=\"font-size:13px; color:red\">" . $st_note . "<br></span>";
                                            }
                                            if ($dragonRights->fullbp == 1 || ($dragonRights->boi == 1 && $dragonRights->peredachi == 1)) {
                                                echo Html::beginForm(['/site/zlist'], 'post',['class'=>'align-self-end']);
                                                echo Html::hiddenInput('Zlist[city]', $city);
                                                echo Html::hiddenInput('Zlist[type]', $type);
                                                echo Html::hiddenInput('Zlist[action]', 'takeRecheck');
                                                echo Html::hiddenInput('Zlist[z_id]', $zayavka->zId);
                                                echo Html::hiddenInput('Zlist[boi]', true);
                                                echo Html::hiddenInput('Zlist[peredachi]', true);
                                                echo Html::hiddenInput('Zlist[active_page]', $active_page);
                                                echo Html::submitButton(
                                                    'Взять на перепроверку', ['class' => 'btn btn-outline-info logout', 'onclick' => 'return confirm("Берём заявку на перепроверку. Продолжаем?")']
                                                );
                                                echo Html::endForm();
                                            }
                                        }
                                        if (!$boiDone && !$perDone && !$boiRecheck && $perRecheck) {
                                            echo "<span style=\"font-size:11px\">П *" . $action->username . " - Нужна перепроверка<br></span>";
                                            if (strlen($st_note) > 1) {
                                                echo "<span style=\"font-size:13px; color:red\">" . returnComment($st_note) . "<br></span>";
                                            }
                                            if ($dragonRights->fullbp == 1 || ($dragonRights->boi == 1 && $dragonRights->peredachi == 1)) {
                                                echo Html::beginForm(['/site/zlist'], 'post',['class'=>'align-self-end']);
                                                echo Html::hiddenInput('Zlist[city]', $city);
                                                echo Html::hiddenInput('Zlist[type]', $type);
                                                echo Html::hiddenInput('Zlist[action]', 'takeRecheck');
                                                echo Html::hiddenInput('Zlist[z_id]', $zayavka->zId);
                                                echo Html::hiddenInput('Zlist[boi]', true);
                                                echo Html::hiddenInput('Zlist[peredachi]', true);
                                                echo Html::hiddenInput('Zlist[active_page]', $active_page);
                                                echo Html::submitButton(
                                                    'Взять на перепроверку', ['class' => 'btn btn-outline-info logout', 'onclick' => 'return confirm("Берём заявку на перепроверку. Продолжаем?")']
                                                );
                                                echo Html::endForm();
                                            }
                                        }
                                        if ($boiDone && !$perDone && $perRecheck) {
                                            echo "<span style=\"font-size:11px\">Б/П *" . $action->username . " - Нужна перепроверка ПЕРЕДАЧ<br></span>";
                                            if (strlen($st_note) > 1) {
                                                echo "<span style=\"font-size:13px; color:red\">" . returnComment($st_note) . "<br></span>";
                                            }
                                            if ($dragonRights->fullbp == 1 || ($dragonRights->boi == 1 && $dragonRights->peredachi == 1)) {
                                                echo Html::beginForm(['/site/zlist'], 'post',['class'=>'align-self-end']);
                                                echo Html::hiddenInput('Zlist[city]', $city);
                                                echo Html::hiddenInput('Zlist[type]', $type);
                                                echo Html::hiddenInput('Zlist[action]', 'takeRecheck');
                                                echo Html::hiddenInput('Zlist[z_id]', $zayavka->zId);
                                                echo Html::hiddenInput('Zlist[boi]', false);
                                                echo Html::hiddenInput('Zlist[peredachi]', true);
                                                echo Html::hiddenInput('Zlist[active_page]', $active_page);
                                                echo Html::submitButton(
                                                    'Взять на перепроверку', ['class' => 'btn btn-outline-info logout', 'onclick' => 'return confirm("Берём заявку на перепроверку. Продолжаем?")']
                                                );
                                                echo Html::endForm();
                                            }
                                        }
                                        if ($boiDone && !$perDone && !$perRecheck) {
                                            echo "<span style=\"font-size:11px\">Б *" . $action->username . " - Нужна проверка ПЕРЕДАЧ<br></span>";
                                            if (strlen($st_note) > 1) {
                                                echo "<span style=\"font-size:13px; color:red\">" . returnComment($st_note) . "<br></span>";
                                            }
                                            if ($dragonRights->fullbp == 1 || ($dragonRights->boi == 1 && $dragonRights->peredachi == 1)) {
                                                echo Html::beginForm(['/site/zlist'], 'post',['class'=>'align-self-end']);
                                                echo Html::hiddenInput('Zlist[city]', $city);
                                                echo Html::hiddenInput('Zlist[type]', $type);
                                                echo Html::hiddenInput('Zlist[action]', 'takeRecheck');
                                                echo Html::hiddenInput('Zlist[z_id]', $zayavka->zId);
                                                echo Html::hiddenInput('Zlist[boi]', false);
                                                echo Html::hiddenInput('Zlist[peredachi]', true);
                                                echo Html::hiddenInput('Zlist[active_page]', $active_page);
                                                echo Html::submitButton(
                                                    'Взять на перепроверку', ['class' => 'btn btn-outline-info logout', 'onclick' => 'return confirm("Продолжаем?")']
                                                );
                                                echo Html::endForm();
                                            }
                                        }
                                    }
                                }
                                ?>
                </div>

                <?php
                    } else {
                        echo getReadOnlyActions($actions, $zayavka);
                    }
                }
            } else {
                //USER IS DRAGON BUT ZAYAVA IS CLOSED;
                ?>
                <div class="card-text otmetka ">
                    <?= getReadOnlyActions($actions, $zayavka); ?>
                    </td>
                </div>

                <?php
            }
        } else {
            //USER NOT DRAGON AT ALL
            ?>
                <div class="card-text otmetka ">
                    <?= getReadOnlyActionsWithAliases($actions, $zayavka); ?>
                </div>

                <?php
        }
        ?>
            </div>
            <div class="card-footer zlist-footer">
                <p class="text-muted text"> Статус:
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
                <?php
             if (!Yii::$app->user->isGuest) {
                     if ($model->user_group > 9) { 
                         ?>
                <?php
                     if ($zayavka->status == "inprogress") {
                                    ?>
                <p class="text-muted zayavka-id">
                    <?php
                                    echo Html::a(
                                        '#' . $zayavka->zId, Url::to([
                                        '/site/sitem', 'id' => $zayavka->zId
                                    ])
                                    );
                                    ?>
                </p>
                <?php }else{
                echo" <p class=\"text-muted zayavka-id\">";
                echo Html::a(
                                        '#' . $zayavka->zId, Url::to([
                                        '/site/sitem', 'id' => $zayavka->zId
                                    ])
                                    );
                echo "</p>";
            }
                      } else {
                        echo "  <p class=\"text-muted zayavka-id\">#" . $zayavka->zId."</p>";
                    }
                } else {
                    echo "  <p class=\"text-muted zayavka-id\">#" . $zayavka->zId."</p>";
                }
                     
            ?>
            </div>
        </div>
</li>
<br />

<?php
}
// echo "</div>";
echo "</ul>";
echo "<div aria-label='navigation' class=\"zlist-pagination mb-3\"> ";
echo ZlistLinkPager::widget([
    'maxButtonCount' => 10,
    'pagination' => $pagination,
    'firstPageLabel' => '<<',
    'lastPageLabel' => '>>',
    'prevPageLabel' => '<',
    'nextPageLabel' => '>',
    'city' => $city,
    'type' => $type,
    
]);
echo "</div>";

function getReadOnlyActions($allActions, $zayava)
{
    $result = "";
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
                    $result .= returnComment($action->notes) . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "bp_done") {
                $result .= "<span class=\"name\">";
                $result .= "Б/П *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= returnComment($action->notes) . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "dopproverka_bp") {
                $result .= "<span class=\"name\">";
                $result .= "Б/П *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= returnComment($action->notes) . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "dopproverka_p") {
                $result .= "<span class=\"name\" >";
                $result .= "П *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<span class=\"text_italic\">";
                    $result .= returnComment($action->notes) . "<br>";
                    $result .= "</span>";
                }
            }
            if ($action->action == "otkaz") {
                $result .= "<span class=\"name\">";
                $result .= "Отказ *" . $action->username . "<br>";
                $result .= "</span>";
                if (strlen($action->notes) > 1) {
                    $result .= "<article  id =\"comment_$action->id\" class=\"readmore-js-section readmore-js-collapsed \">";
                    $result .= "<span class=\"text_otkaz article\">";
                    $result .= returnComment($action->notes) . "<br>";
                    $result .= "</span>";
                    $result .= "</article>";
                    // $result.="<a class=\"text_otkaz-toggle\"  id =\"btn_$action->id\" href=\"javascript:toggleComment('$action->id')\">Подробнее</a>";
                
    }
    }
    if ($action->action == "b_done") {
    $result .= "<span class=\"name\">";
        $result .= "Б *" . $action->username . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "p_done") {
    $result .= "<span class=\"name\">";
        $result .= "П *" . $action->username . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "b_done_p_recheck") {
    $result .= "<span class=\"name\">";
        $result .= "Б/П *" . $action->username . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "bp_done_recheck") {
    $result .= "<span class=\"name\">";
        $result .= "Б/П *" . $action->username . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "p_done_recheck") {
    $result .= "<span class=\"name\">";
        $result .= "П *" . $action->username . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "b_done_recheck") {
    $result .= "<span class=\"name\">";
        $result .= "Б *" . $action->username . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "nevid_done_chist") {
    $result .= "<span class=\"name\">";
        $result .= "Доппроверка/Чист *" . $action->username . ". " . $action->date . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "nevid_done_katorga") {
    $result .= "<span class=\"name\">";
        $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан каторгой *" . $action->username . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
        $result .= "<span class=\"text_otkaz \">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";

    }
    }
    if ($action->action == "nevid_done_prokli") {
    $result .= "<span class=\"name\">";
        $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан комплектом проклятий *" . $action->username . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
        $result .= "<div class=\"text_otkaz article\" id =\"comment_$action->id\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</div>";
    }
    }
    if ($action->action == "nevid_done_block") {
    $result .= "<span class=\"name\">";
        $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан блоком *" . $action->username . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
        $result .= "<div class=\"text_otkaz article\" id =\"comment_$action->id\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</div>";
    }
    }
    if ($action->action == "nevid_done_otkaz") {
    $result .= "<span class=\"name\">";
        $result .= "Доппроверка/Отказ. *" . $action->username . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
        $result .= "<div class=\"text_otkaz article\" id =\"comment_$action->id\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</div>";
    }
    }
    if ($action->action == "done_chist") {
    $result .= "<span class=\"name\">";
        $result .= "Чист *" . $action->username . ". " . $action->date . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "done_katorga") {
    $result .= "<span class=\"name\">";
        $result .= "Отказ. Нарушения. Наказан каторгой *" . $action->username . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
     $result .= "<div class=\"text_otkaz article\" id =\"comment_$action->id\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</div>";
    }
    }
    if ($action->action == "done_prokli") {
    $result .= "<span class=\"name\">";
        $result .= "Отказ. Нарушения. Наказан комплектом проклятий *" . $action->username . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
        $result .= "<div class=\"text_otkaz article\" id =\"comment_$action->id\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</div>";
    }
    }
    if ($action->action == "done_block") {
    $result .= "<span class=\"name\">";
        $result .= "Отказ. Нарушения. Наказан блоком *" . $action->username . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
        $result .= "<div class=\"text_otkaz article\" id =\"comment_$action->id\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</div>";
    }
    }
    if ($action->action == "done_otkaz") {
    $result .= "<span class=\"name\">";
        $result .= "Отказ. *" . $action->username . "<br>";
        $result .= "</span>";
    if (strlen($action->notes) > 1) {
        $result .= "<div class=\"text_otkaz article\" id =\"comment_$action->id\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</div>";
    }
    }
    }
    }
    if ($zayava->status == "cancelled") {
    $result .= "<i>Отменена персонажем " . $zayava->date_last_update . "</i>";
    }
    return $result;
    }

    function getReadOnlyActionsWithAliases($allActions, $zayava)
    {
    $result = "";
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
        $result .= returnComment($action->notes) . "<br>";
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
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "bp_done") {
    $result .= "Б/П *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "dopproverka_bp") {
    $result .= "Б/П *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "dopproverka_p") {
    $result .= "П *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "otkaz") {
    $result .= "Отказ *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
        $result .= "<article id =\"comment_$action->id\" class=\"readmore-js-section readmore-js-collapsed \">";
        $result .= "<span class=\"text_otkaz article\" >";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
        $result .= "</article>";
    }
    }
    if ($action->action == "b_done") {
    $result .= "Б *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "b_done_p_recheck") {
    $result .= "Б/П *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "bp_done_recheck") {
    $result .= "Б/П *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "p_done_recheck") {
    $result .= "П *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "b_done_recheck") {
    $result .= "Б *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "nevid_done_chist") {
    $result .= "Доппроверка/Чист *" . $action->alias . ". " . $action->date . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "nevid_done_katorga") {
    $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан каторгой *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_otkaz \">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "nevid_done_prokli") {
    $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан комплектом проклятий *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_otkaz \">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "nevid_done_block") {
    $result .= "Доппроверка/Отказ. Выявлены нарушения. Наказан блоком *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_otkaz \">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "nevid_done_otkaz") {
    $result .= "Доппроверка/Отказ. *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_otkaz \">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "done_chist") {
    $result .= "Чист *" . $action->alias . ". " . $action->date . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_italic\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "done_katorga") {
    $result .= "Отказ. Нарушения. Наказан каторгой *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_otkaz \">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "done_prokli") {
    $result .= "Отказ. Нарушения. Наказан комплектом проклятий *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_otkaz \">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "done_block") {
    $result .= "Отказ. Нарушения. Наказан блоком *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<span class=\"text_otkaz \">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</span>";
    }
    }
    if ($action->action == "done_otkaz") {
    $result .= "Отказ. *" . $action->alias . "<br>";
    $result .= "</span>";
    if (strlen($action->notes) > 1) {
    $result .= "<div class=\"text_otkaz article\" id =\"comment_$action->id\">";
        $result .= returnComment($action->notes) . "<br>";
        $result .= "</div>";
    }
    }
    if ($action->action == "dopproverka_p" || $action->action == "dopproverka_bp") {
    $result .= "<span style=\"color: black; font-size: 13px\";><b>Доппроверка</b></span>";
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

    function echoComment($comment)
    {
    $split = explode(' ', $comment);
    foreach ($split as $str) {
    if (strpos($str, 'http://dragons.apeha.ru/forum') !== false) {
    echo "<a href=\"" . $str . "\" target=\"_blank\">" . $str . "</a> ";
    } else {
    echo $str . " ";
    }
    }
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
<script>
$('article').readmore({
    speed: 50, //Açılma Hızı
    maxHeight: 50,
    collapsedHeight: 20, // 100px sonra yazının kesileceğini belirtir.
    moreLink: '<a class="link-toggle" href="#">Подробнее</a>', // açma linki yazısı
    lessLink: '<a class="link-toggle" href="#">Скрыть</a>', // kapatma linki yazısı
});
</script>