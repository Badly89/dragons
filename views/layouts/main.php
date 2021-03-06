<?php
/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Users;
use app\models\Dragonsrights;
use app\models\Zayavka;
use app\models\BusyLogin;
use app\models\Params;
use app\models\LastActiveActions;
use rmrevin\yii\fontawesome\AssetBundle;

// AssetBundle::register($this);
AppAsset::register($this);


$settings = new Params();
$settings->loadSettings();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/b057a53897.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/dfb0d680eb.css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <div class="page-container">
        <header class="header">
            <?php
                NavBar::begin([
                    'brandLabel' => 'Орден Драконов',
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                    'class' => 'navbar-expand-lg  navbar-dark bg-dark  sticky-top ',
                    ],
                ]);
    $menuItems = [];

    if (!Yii::$app->user->isGuest) {
        $user = Users::findById(Yii::$app->user->getId());
        if ($user->groupId > 9 && $user->active == 1) {
            $dragonRights = Dragonsrights::findOneById($user->id);
            //check approver
            if ($user->groupId == 99 || $dragonRights->approver == 1) {
                $approvalCount = Users::getApprovalCount();
                $approvalCount += BusyLogin::getRequestsCount();
                if ($approvalCount > 0) {
                    array_push($menuItems, ['label' => 'Модерация (' . $approvalCount . ')', 'url' => ['/site/approval']]);
                }
             }
            //finish approver
            //  array_push($menuItems, ['label' => 'Админка', 'url' => ['/site/superadmin']]
            //  );
        }
        array_push($menuItems, ['label' => 'Моя чистота', 'items' => [
                ['label' => 'Мои заявки', 'url' => ['/site/index']],
                ['label' => 'Подача заявки на чистоту', 'url' => ['/site/zayavka']],
            ]]
        );
    }
    $items_additional_text = "";
    //check New Items Count
    $newItemsCount = 0;
    $cities=["kovcheg","smorye","utes"];
    if ($settings->show_new_items_count == 1 && isset($dragonRights)) {
        if ($dragonRights->fullbp == 1 || $dragonRights->boi_prov == 1 || $dragonRights->boi == 1) {
            // $cities = [];
            // if ($dragonRights->kovcheg == 1) {
            //     array_push($cities, "kovcheg");
            // }
            // if ($dragonRights->smorye == 1) {
            //     array_push($cities, "smorye");
            // }
            // if ($dragonRights->utes == 1) {
            //     array_push($cities, "utes");
            // }
            // if (sizeof($cities) > 0) {
                $newItemsCount = Zayavka::getNewItemsCount($cities);
//                if ($newItemsCount > 0) {
                    $items_additional_text .= " (Нов: " . $newItemsCount . ")";
//                }
            // }
        }
    }
    $commonCalculation = "";
    $ready_count = 0;
    $nevidCount = 0;

    if (isset($dragonRights)) {
        if ($settings->show_ready_items == 1 || $settings->enable_nevid_count == 1) {
            if ($dragonRights->chistota == 1 || $dragonRights->nevid == 1) {
                // $cities = [];
                // if ($dragonRights->kovcheg == 1) {
                //     array_push($cities, "kovcheg");
                // }
                // if ($dragonRights->smorye == 1) {
                //     array_push($cities, "smorye");
                // }
                // if ($dragonRights->utes == 1) {
                //     array_push($cities, "utes");
                // }
                if (sizeof($cities) > 0) {
                    $commonCalculation = LastActiveActions::getReadyAndNevidReadyItems($cities);
                    $ready_count = explode('|', $commonCalculation)[0];
                    $nevidCount = explode('|', $commonCalculation)[1];
                }
            }
        }

        $zayavki_submenu = [];
        if ($settings->show_ready_items == 1 && isset($dragonRights)) {
            if ($dragonRights->chistota == 1) {
//                if ($ready_count > 0) {
                    $items_additional_text .= " (Б/П: " . $ready_count . ")";
//                }
            }
        }
        //check Nevid

        if ($settings->enable_nevid_count == 1 && isset($dragonRights)) {
            if ($dragonRights->nevid == 1) {
//                if ($nevidCount > 0) {
                    $items_additional_text .= " (Доп: " . $nevidCount . ")";
//                }
            }
        }
        $additionalSeparate = explode('(', $items_additional_text);
        $zayavki_submenu = [];
        // if ($newItemsCount > 0) {
        //     array_push($zayavki_submenu, ['label' => 'Все заявки (' . $newItemsCount . ')', 'url' => ['/site/zlist']]);
        // }
        array_push($zayavki_submenu, ['label' => 'Все заявки ( Нов: ' . $newItemsCount . ')', 'url' => ['/site/zlist']]);

        if ($ready_count > 0) {
            array_push($zayavki_submenu, ['label' => 'Б/П заявки (' . $ready_count . ')', 'url' => ['/site/ready']]);
        }
        if ($nevidCount > 0 && $dragonRights->nevid == 1) {
            array_push($zayavki_submenu, ['label' => 'Доппроверка (' . $nevidCount . ')', 'url' => ['/site/nevid']]);
        }
        if (sizeof($zayavki_submenu) > 0) {
            array_push($menuItems, ['label' => 'Чистота' . $items_additional_text, 'items' => $zayavki_submenu]);
        } else {
            array_push($menuItems, ['label' => 'Чистота' . $items_additional_text . '', 'url' => ['/site/zlist']]);
        }
    } else {
        array_push($menuItems, ['label' => 'Все заявки' . $items_additional_text . '', 'url' => ['/site/zlist']]);
    }

    array_push($menuItems, ['label' => 'Официально', 'url' => ['/site/official']]);
    array_push($menuItems, ['label' => 'Библиотека', 'url' => ['/site/library']]);
    array_push($menuItems, ['label' => 'Суд', 'url' => ['/site/sud']]);
    array_push($menuItems, ['label' => 'Сад', 'url' => ['/site/sad']]);
    array_push($menuItems, [
        'label' => 'Форум',
        'url' => 'https://' . Yii::$app->getRequest()->serverName . '/forum',
        'linkOptions' => array('target' => '_blank'),
    ]);
    if (Yii::$app->user->isGuest) {
        array_push($menuItems, ['label' => 'Войти', 'url' => ['/site/login']]);
    } else {
        if (isset($dragonRights) && ($dragonRights->nevid == 1 || $dragonRights->boss == 1 || $dragonRights->approver == 1 )) {
            array_push($menuItems, ['label' => Yii::$app->user->identity->username, 'items' => [
                    ['label' => 'Блокнот', 'url' => ['/site/notepad']],
                    
                    ['label' => 'Админка', 'url' => ['/site/superadmin']],
                    ['label' => 'Смена пароля', 'url' => ['/site/changepass']],
                    [
                        'label' => 'Выход' ,
                        'url'=> ['/site/logout'],
                        'linkOptions'=>['data-method'=>'post']
                    ]                                      
                    ],

                
            ],
              
            );
        } else {
            array_push($menuItems, ['label' => Yii::$app->user->identity->username, 'items' => [
                    ['label' => 'Смена пароля', 'url' => ['/site/changepass']],
                    [
                        'label' => 'Выход ' ,
                        'url'=> ['/site/logout'],
                        'linkOptions'=>['data-method'=>'post']
                    ]
                ]]
            );
        }
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
        
        
    ]);

    NavBar::end();
    ?>
        </header>
        <main class="main">
            <div class="container">
                <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])
        ?>

                <?= $content ?>
            </div>
        </main>
        <footer id="footer" class="footer">
            <div class="container">
                <div class="footer-content">
                    <p class="" style="margin-top: 20px">&copy; Орден Драконов <?= date('Y') ?>
                    </p>
                    <!-- СЧЁТЧИКИ -->
                    <div style="margin-top:15px">
                        <!--Rating Apeha-->
                        <a href="https://apeha.ru"><img width="88" border="0" height="31"
                                src="https://kovcheg2.apeha.ru/interface/counter.fpl/1"></a>
                        <!--/counter code-->
                        <div style="display:none">
                            <!--Rating@Mail.ru COUNTEr-->
                            <script type="text/javascript" language="JavaScript">
                            d = document;
                            var a = '';
                            a += ';r=' + escape(d.referrer)
                            js = 10
                            </script>
                            <script type="text/javascript" language="JavaScript1.1">
                            a += ';j=' + navigator.javaEnabled()
                            js = 11
                            </script>
                            <script type="text/javascript" language="JavaScript1.2">
                            s = screen;
                            a += ';s=' + s.width + '*' + s.height
                            a += ';d=' + (s.colorDepth ? s.colorDepth : s.pixelDepth)
                            js = 12
                            </script>
                            <script type="text/javascript" language="JavaScript1.3">
                            js = 13
                            </script>
                            <script type="text/javascript" language="JavaScript">
                            d.write('&lt;a href="https://top.mail.ru/jump?from=964238"' +
                                ' target=_top&gt;&lt;img src="http://d6.cb.be.a0.top.list.ru/counter' +
                                '?id=964238;t=134;js=' + js + a + ';rand=' + Math.random() +
                                '" alt="Рейтинг@Mail.ru"' +
                                ' border=0 height=40 width=88/&gt;&lt;\/a&gt;')
                            if (11 < js)
                                d.write('&lt;' + '!-- ')
                            </script>
                            <a target="_top" href="https://top.mail.ru/jump?from=964238"><img width="88/" border="0"
                                    height="40" alt="Рейтинг@Mail.ru"
                                    src="https://d6.cb.be.a0.top.list.ru/counter?id=964238;t=134;js=13;r=;j=false;s=1920*1080;d=24;rand=0.5031445578036511"
                                    class="jmugmrxlsquawcbipikx"></a>
                            <!-- <noscript><a
            target=_top href="https://top.mail.ru/jump?from=964238"><img
            src="https://d6.cb.be.a0.top.list.ru/counter?js=na;id=964238;t=134"
            border=0 height=40 width=88
            alt="Рейтинг@Mail.ru"/></a></noscript><script language="JavaScript" type="text/javascript"><!--
            if(11<js)d.write('--'+'>')//-->
                            <!--/COUNTER-->
                            <br>&nbsp;
                            <!--begin of Top100 logo-->
                            <a href="https://top100.rambler.ru/top100/">
                                <img width="88" border="0" height="31" alt="Rambler's Top100"
                                    src="https://top100-images.rambler.ru/top100/banner-88x31-rambler-gray2.gif"
                                    class="jmugmrxlsquawcbipikx"></a>
                            <!--end of Top100 logo -->
                            <!--begin of Rambler's Top100 code -->
                            <a href="https://top100.rambler.ru/top100/">
                                <img width="1" border="0" height="1" alt=""
                                    src="https://counter.rambler.ru/top100.cnt?782195" class="jmugmrxlsquawcbipikx"></a>
                            <!--end of Top100 code-->
                            <!-- apeha rating-->
                            <a href="https://www.apeha.ru"><img width="88" height="31" border="0"
                                    src="https://kovcheg.apeha.ru/interface/counter.fpl/1"></a>
                            <img src="https://kovcheg.apeha.ru/newrating_actUser-GoToClanSite_1.shtml" alt="" width="1"
                                height="1" border="0" />
                            <!-- end apeha rating-->
                        </div>
                        <!-- END СЧЁТЧИКИ-->
                    </div>

                </div>

            </div>
        </footer>
    </div>
    <?php $this->endBody() ?>

</body>

</html>
<?php $this->endPage() ?>