<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Users;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use app\models\Dragonsrights;
use app\models\Superadmin;
use yii\helpers\Url;

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

    $form = ActiveForm::begin([
        'method' => 'get',
        'action' => Url::to(['site/superadmin']),
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]);
    //$model->action = 'userSearch';
    echo Html::hiddenInput('action', 'userSearch');
    ?>
<div class="form-group field-superadmin-username">
    <?= Html::label('Ник', 'searchField', ['class' => 'col-lg-1 control-label']) ?>
    <div class="col-lg-3"><?= Html::textInput('username', null, ['class' => 'form-control', 'id' => 'searchField']) ?>
    </div>
    <div class="col-lg-8">
        <div class="help-block help-block-error "></div>
    </div>
</div>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Найти юзера', ['class' => 'btn btn-primary'], ['id' => 'submit']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
<hr>
<?php
    echo "<br><div class=\"col-lg-offset-0 col-lg-11\"  style=\"padding: 0\">";
    if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
        echo Html::beginForm(['/site/settings'], 'post');
        echo Html::hiddenInput('Params[action]', 'view');
        echo Html::submitButton(
            'Настройки сиcтемы', ['class' => 'btn btn-primary']
        );
        echo Html::endForm();
    }
    if (accessToCleanStat()) {
        //Showing clean button
        ?>
<br>
<div class="col-lg-offset-0 col-lg-11" style="padding: 0">
    <a class="btn btn-primary" href="<?= Yii::$app->request->baseUrl ?>/logs/">Логи системы</a>
</div>
<br><br><br><br><br><br>
<div class="col-lg-offset-0 col-lg-11" style="padding: 0">
    <a class="btn btn-primary" href="<?= Yii::$app->request->baseUrl ?>/cleaning/">Подсчёт проверок</a>
</div>
<?php
    }
    echo "<br><br><br>";
    echo "</div><hr>";
}
if ($model->action == 'userSearch') {
    if (strlen($model->userName) < 1) {
        $model->userName = "_";
    }
    $this->title = 'Поиск пользователей по: "' . $model->userName . '"';
    $this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['superadmin']];
    $this->params['breadcrumbs'][] = $this->title;
    if ($model->users) {
        echo "<b>Найдено пользователей: " . $model->searchCount . "</b><br>";
        echo LinkPager::widget(['pagination' => $model->pagination,
            'firstPageLabel' => '<<',
            'lastPageLabel' => '>>',
            'prevPageLabel' => '<',
            'nextPageLabel' => '>',]);
        echo "<table>";
        foreach ($model->users as $user) {
            echo "<tr><td>";
            if ($user->groupId > 9) {
                echo "<span style=\"color:red\">Dr </span>";
            }
            echo "<a href=\"http://newforest.apeha.ru/info.html?user=" . $user->apeha_id . "\" target=\"_blank\">" . $user->username . "</a>";
            echo "<td>";
            echo Html::beginForm(['/site/userprofile'], 'post');
            echo Html::hiddenInput('Userprofile[action]', 'userInfo');
            echo Html::hiddenInput('Userprofile[userId]', $user->id);
            echo Html::submitButton(
                'Просмотр иформации', ['class' => 'btn btn-link logout']
            );
            echo Html::endForm();
            echo "</td><td>";
            if ($user->active == 0) {
                echo "<span style=\"color:red; padding-left:12px; \">НЕ АКТИВЕН</span>";
            }
            if ($user->groupId == 5) {
                echo "<span style=\"color:green; padding-left:12px; \">СУДЬЯ</span>";
            }
            if ($user->groupId == 1 && $user->active == 1) {
                if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                    echo Html::beginForm(['/site/superadmin'], 'post');
                    echo Html::hiddenInput('Superadmin[action]', 'makeDragon');
                    echo Html::hiddenInput('Superadmin[userId]', $user->id);
                    echo Html::hiddenInput('Superadmin[userName]', $model->userName);
                    echo Html::submitButton(
                        'Сделать драконом', ['class' => 'btn btn-link logout', 'onclick' => 'return confirm("Юзер станет драконом в системе. Продолжаем?")']
                    );
                    echo Html::endForm();
                }
            } else {
                if ($user->groupId > 9) {
                    if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                        echo Html::beginForm(['/site/superadmin'], 'post');
                        echo Html::hiddenInput('Superadmin[action]', 'fireDragon');
                        echo Html::hiddenInput('Superadmin[userId]', $user->id);
                        echo Html::hiddenInput('Superadmin[userName]', $model->userName);
                        echo Html::submitButton(
                            'Перевести в юзеры', ['class' => 'btn btn-link logout', 'onclick' => 'return confirm("Обрезаем крылья? Точно?")']
                        );
                        echo Html::endForm();
                    }
                }
            }
            echo "</td></tr>";
        }
        echo "</table>";
        echo LinkPager::widget(['pagination' => $model->pagination,
            'firstPageLabel' => '<<',
            'lastPageLabel' => '>>',
            'prevPageLabel' => '<',
            'nextPageLabel' => '>',]);
    } else {
        echo "Юзер <b>" . $model->userName . "</b> не найден";
    }
    $form = ActiveForm::begin([
        'method' => 'get',
        'action' => Url::to(['site/superadmin']),
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]);
    //$model->action = 'userSearch';
    echo Html::hiddenInput('action', 'userSearch');
    ?>
<div class="form-group field-superadmin-username">
    <?= Html::label('Ник', 'searchField', ['class' => 'col-lg-1 control-label']) ?>
    <div class="col-lg-3"><?= Html::textInput('username', null, ['class' => 'form-control', 'id' => 'searchField']) ?>
    </div>
    <div class="col-lg-8">
        <div class="help-block help-block-error "></div>
    </div>
</div>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Найти юзера', ['class' => 'btn btn-primary'], ['id' => 'submit']) ?>
    </div>
</div>
<?php
    ActiveForm::end();
}

//We have an action


function accessToCleanStat()
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