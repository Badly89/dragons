<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Users;
use yii\data\Pagination;
use yii\bootstrap4\LinkPager;
use app\models\Dragonsrights;
use app\models\Superadmin;
use yii\helpers\Url;
use rmrevin\yii\fontawesome\FAR;
use rmrevin\yii\fontawesome\FAS; 
use rmrevin\yii\fontawesome\FAl;

//echo "action: " . $model->action . "<br>";
//echo "userName: " . $model->userName . "<br>";

if ($model->action == "index" || $model->action == "deleteUser") {
    $this->title = 'Админка';
    $this->params['breadcrumbs'][] = $this->title;

    // Delete user
    if ($model->action == 'deleteUser') {
        if (Users::findGroupById(Yii::$app->user->getId()) != 99) {
            echo "<script>alert ('Hack attempt? This will be recorded.')</script>>";
        } else {
            $deleteUserId = $model->userId;
            $username = (new app\models\Superadmin)->deleteUser($deleteUserId);
            echo "<p style=\"color:red; padding-left:12px; \">Юзер $username удалён.</p>";
        }
    }

   
    ?>
<div class="main-block">
    <div class="block-menu">
        <ul class="list-group group-btn ">

            <?php 
    if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
        echo "  <li class=\"list-group-item\">";
        echo Html::a('Настройки системы',['/site/settings'],
            [   'class' => 'btn btn-primary',
                'data'=> [
                        'method'=>'post',
                        'params'=>[ 
                                    'Params[action]'=> 'view'    
                                  ]
                ],
                 'title' => 'Настройки системы',
            ]
            );
        echo "</li>";
        echo "  <li class=\"list-group-item\">";
        echo Html::a('Профессии чистоты',['/site/professions'],
            [   'class' => 'btn btn-primary',
                'data'=> [
                        'method'=>'post',
                        'params'=>[ 
                                    'Params[action]'=> 'view'    
                                  ]
                ],
                 'title' => 'Профессии чистоты',
            ]
            );
        echo "</li>";
    

    } 
    if (accessToCleanStat()) {
        //Showing clean button
        ?>
            <li class="list-group-item">
                <a class="btn btn-primary w-100" href="<?= Yii::$app->request->baseUrl ?>/logs/">Логи системы</a>
            </li>
            <li class="list-group-item">
                <a class="btn btn-primary w-100" href="<?= Yii::$app->request->baseUrl ?>/cleaning/">Подсчёт
                    проверок</a>
            </li>
            <?php
    }
?>
        </ul>
    </div>
    <div class="block-right mb-3">
        <?php  $form = ActiveForm::begin([
        'method' => 'get',
        'action' => Url::to(['site/superadmin']),
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"\">{input}</div>\n<div class=\"\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]);
    //$model->action = 'userSearch';
    echo Html::hiddenInput('action', 'userSearch');
    ?>
        <div class="input-group mb-3">
            <?= Html::textInput('username', null, [
                 'class' => 'form-control',
                 'id' => 'searchField',
                 'placeholder'=> 'Введите Ник для поиска',
                 'aria-label'=>'Ник',
                 'aria-describedby'=>'searchField',
                 ]) ?>

            <div class="input-group-append">
                <?= Html::submitButton('<i class="fas fa-search"></i>', [
                     'class' => 'btn btn-primary btn-search',
                     'title'=>'Найти юзера'
                    
                    ], 
                     ['id' => 'submit']) ?>
            </div>
        </div>


        <?php ActiveForm::end(); 
       
   ?>
    </div>
</div>
<?php
}

if ($model->action == 'userSearch') {
    echo "<div class=\"main-block\">";
    if (strlen($model->userName) < 1) {
        $model->userName = "_";
    }
    $this->title = 'Поиск пользователей по: "' . $model->userName . '"';
    $this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['superadmin']];
    $this->params['breadcrumbs'][] = $this->title;
    if ($model->users) {
        
        // echo "<div class=\"block-menu\">Панель меню </div>";
        ?>
<div class="block-menu sticky-block-menu">
    <ul class="list-group">
        <?php 
    if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
        echo "  <li class=\"list-group-item\">";
        echo Html::a('Настройки системы',['/site/settings'],
            [   'class' => 'btn btn-primary',
                'data'=> [
                        'method'=>'post',
                        'params'=>[ 
                                    'Params[action]'=> 'view'    
                                  ]
                ],
                 'title' => 'Настройки системы',
            ]
            );
        echo "</li>";
        echo "  <li class=\"list-group-item\">";
        echo Html::a('Профессии чистоты',['/site/professions'],
            [   'class' => 'btn btn-primary',
                'data'=> [
                        'method'=>'post',
                        'params'=>[ 
                                    'Params[action]'=> 'view'    
                                  ]
                ],
                 'title' => 'Профессии чистоты',
            ]
            );
        echo "</li>";
     

    }  
    if (accessToCleanStat()) {
        //Showing clean button
        ?>
        <li class="list-group-item">
            <a class="btn btn-primary w-100" href="<?= Yii::$app->request->baseUrl ?>/logs/">Логи системы</a>
        </li>
        <li class="list-group-item">
            <a class="btn btn-primary w-100" href="<?= Yii::$app->request->baseUrl ?>/cleaning/">Подсчёт
                проверок</a>
        </li>
        <?php
    }
?>
    </ul>
</div>
<?php
        echo "<div class=\"block-right flex-grow-1\">";
        
        echo "<b>Найдено пользователей: " . $model->searchCount . "</b><br>";

        $form = ActiveForm::begin([
        'method' => 'get',
        'action' => Url::to(['site/superadmin']),
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"\">{input}</div>\n<div class=\"\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]);
    //$model->action = 'userSearch';
    echo Html::hiddenInput('action', 'userSearch');
    ?>
<div class="input-group mb-3">
    <?= Html::textInput('username', null, [
                 'class' => 'form-control',
                 'id' => 'searchField',
                 'placeholder'=> 'Введите Ник для поиска',
                 'aria-label'=>'Ник',
                 'aria-describedby'=>'searchField',
                 ]) ?>

    <div class="input-group-append">
        <?= Html::submitButton('<i class="fas fa-search"></i>', [
                     'class' => 'btn btn-primary btn-search',
                     'title'=>'Найти юзера'
                    
                    ], 
                     ['id' => 'submit']) ?>
    </div>
</div>
<?php
echo LinkPager::widget(['pagination' => $model->pagination,
'firstPageLabel' => '<<', 'lastPageLabel'=> '>>',
    'prevPageLabel' => '<', 'nextPageLabel'=> '>',]);




         ActiveForm::end(); 
       

        echo "<ul class=\"list-group list-group-flush mb-3 flex-grow-1\">";
        foreach ($model->users as $user) {
            
            echo "<li class=\"list-group-item list-user \">";
            echo "<div class=\"card card-user \">";
            echo "<div class=\"card-body  title-card-user p-2\">";
            echo"<h5 class=\"card-title mb-0\">";
            if ($user->groupId > 9) {
                echo "<span class=\" text-danger pr-1\" style=\"font-size:16px;\" >Dr </span>";
            }
          
            echo "<a href=\"http://kovcheg2.apeha.ru/info.html?user=" . $user->apeha_id . "\" target=\"_blank\" class=\"link-user-info text-info  \">" . $user->username . "</a> ";
             
            echo Html::a('<i class="fas fa-info-circle"></i>',['/site/userprofile'],
            [   'class' => ' btn-user-info mb-2',
                'data'=> [
                        'method'=>'post',
                        'params'=>[ 'Userprofile[userId]'=> $user->id,
                                    'Userprofile[action]'=> 'userInfo'    
                                  ]
                ],
                 'title' => 'Открыть инфу пользователя',
            ]
            );
            
             echo "</h5>";
            echo"<div class=\"btn-admin\">";
            
             if ($user->active == 0) {
                echo "<span style=\"color:red;  \">НЕ АКТИВЕН</span>";
            }
            if ($user->groupId == 5) {
                echo "<span style=\"color:green;  \">СУДЬЯ</span>";
            }
           
             if ($user->groupId == 1 && $user->active == 1) {
                if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                    echo Html::a('<i class="fas fa-user-check make-user"></i> <i class="fas fa-arrow-right text-decoration-none"></i>  <i class="fas fa-dragon"></i>',['/site/superadmin'],
                    [  'class' => 'btn-make-dragon',
                        'data'=> [
                        'method'=>'post',
                        'params'=>[ 'Superadmin[userId]'=> $user->id,
                                    'Superadmin[action]'=> 'makeDragon',
                                    'Superadmin[userName]' => $model->userName
                                  ]
                                ],
                        'title' => 'Перевести в драконы',
                        'onclick' => 'return confirm("Юзер станет драконом в системе. Продолжаем?")'
                    ]);

                   
                }
            } else {
                if ($user->groupId > 9) {
                    if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                        echo Html::a('<i class="fas fa-dragon btn-make-dragon"></i> <i class="fas fa-arrow-right text-decoration-none"></i> <i class="fas fa-user-check"></i>',['/site/superadmin'],
                        [  'class' => 'make-user',
                        'data'=> [
                        'method'=>'post',
                        'params'=>[ 'Superadmin[userId]'=> $user->id,
                                    'Superadmin[action]'=> 'fireDragon',
                                    'Superadmin[userName]' => $model->userName
                                  ]
                                ],
                        'title'=>'Первести в юзеры',                                
                        'onclick' => 'return confirm("Обрезаем крылья? Точно?")'
                    ]);
                      
                    }
                }
            }
            echo"</div>";
            echo "</div>";
            echo "</li>";
        }
        echo "</ul>";
      
        echo LinkPager::widget(['pagination' => $model->pagination,
            'firstPageLabel' => '<<',
            'lastPageLabel' => '>>',
            'prevPageLabel' => '<',
            'nextPageLabel' => '>',]);
       
    } else {
        echo "Юзер <b>" . $model->userName . "</b> не найден";
    }
        echo "</div>";
}

//We have an action


function  accessToCleanStat()
{
    $result = false;
    if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
        $result = true;
    }
    if (!$result) {
        $dr_rights = Dragonsrights::findOneById(Yii::$app->user->getId());
        if ($dr_rights->boss == 1) {
            $result = true;
        }
    }
    return $result;
}