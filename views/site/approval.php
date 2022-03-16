<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use app\models\Users;
use rmrevin\yii\fontawesome\FAS;

$this->title = 'Пользователи, ожидающие подтверждения (' . $model->waitCount . ')';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
td {
    padding: 10px;
    font-size: 15px;
    border: 1px solid #a3a3a3;
}
</style>
<?php
if (sizeof($model->newUsers) > 0) {
    echo "<br><h4>Новые пользователи, ожидающие активации:</h4>";
?>
<div class="row">
    <?php
    foreach ($model->newUsers as $user) 
    {
?>
    <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
        <div class="card border-dark">
            <div class="card-body ">
                <div class="approval-body-card mb-4">
                    <p class="card-text">Пользователь: <a class="text-decoration-none" target="_blank"
                            href="http://newforest.apeha.ru/info.html?nick=<?= urlencode(iconv("UTF-8", "CP1251", $user->username)) ?>"><?= $user->username ?></a>
                    </p>
                    <p class="card-text">Ссылка по ID: <a target="_blank"
                            href="http://newforest.apeha.ru/info.html?user=<?= $user->apeha_id ?>"><?= $user->username ?></a>
                    </p>
                </div>
                <div class="approval-bottom-card">
                    <div class="approvekey mb-3">
                        <p class="card-text">Контрольная фраза: </p>
                        <h5 class="card-title text-danger"><?= $user->approvekey ?></h5>
                    </div>
                    <p class="card-text approval-bottom-ip text-muted">IP: <?= $user->ips ?></p>
                </div>

            </div>
            <div class="card-footer approval-footer">
                <?php
                         echo Html::beginForm(['/site/approval'],   'post');
                         echo Html::hiddenInput('Approval[action]', 'approveNewUser');
                         echo Html::hiddenInput('Approval[userId]', $user->id);
                         echo Html::submitButton(
                            //  'Одобрить', ['class' => 'button', 'onclick' => 'return confirm("Одобряем?")'] 
                             Yii::t('app', '{icon} Одобрить', ['icon' => FAS::icon('check-double')]),['class' => 'btn btn-success btn-sm  ', 'title'=>'Одобрить','onclick' => 'return confirm("Одобряем?")']
                        );
                           
                         echo Html::endForm();
        
                         echo Html::beginForm(['/site/approval'], 'post');
                         echo Html::hiddenInput('Approval[action]', 'rejectNewUser');
                         echo Html::hiddenInput('Approval[userId]', $user->id);
                         echo Html::submitButton(
                            //  'Отклонить', ['class' => 'button', 'onclick' => 'return confirm("Отклоняем?")'] 
                             Yii::t('app', '{icon} Отклонить', ['icon' => FAS::icon('ban')]),['class' => 'btn btn-light btn-sm  ', 'title'=>'Отклонить', 'onclick' => 'return confirm("Отклоняем?")']
                            );
                          echo Html::endForm();
                    ?>
            </div>
        </div>
    </div>

    <?php
    }
?>
</div>
<?php
}

if (sizeof($model->restoreUsers) > 0) {
    echo "<hr><h4>Подтверждение смены пароля:</h4>";
?>

<div class="row">
    <?php
    foreach ($model->restoreUsers as $user) 
    {
?>
    <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
        <div class="card border-dark">
            <div class="card-body ">
                <div class="approval-body-card mb-4">
                    <p class="card-text">Пользователь: <a class="text-decoration-none" target="_blank"
                            href="http://newforest.apeha.ru/info.html?nick=<?= urlencode(iconv("UTF-8", "CP1251", $user->username)) ?>"><?= $user->username ?></a>
                    </p>

                </div>
                <div class="approval-bottom-card">
                    <div class="approvekey mb-3">
                        <p class="card-text">Контрольная фраза: </p>
                        <h5 class="card-title text-danger"><?= $user->approvekey ?></h5>
                    </div>
                    <p class="card-text approval-bottom-ip text-muted">IP: <?= $user->ips ?></p>
                </div>

            </div>
            <div class="card-footer approval-footer">
                <?php
                         echo Html::beginForm(['/site/approval'],   'post');
                         echo Html::hiddenInput('Approval[action]', 'approveRestoreUser');
                         echo Html::hiddenInput('Approval[userId]', $user->id);
                         echo Html::submitButton(
                            //  'Одобрить', ['class' => 'button', 'onclick' => 'return confirm("Одобряем?")'] 
                             Yii::t('app', '{icon} Одобрить', ['icon' => FAS::icon('check-double')]),['class' => 'btn btn-success btn-sm  ', 'title'=>'Одобрить','onclick' => 'return confirm("Одобряем?")']
                        );
                           
                         echo Html::endForm();
        
                         echo Html::beginForm(['/site/approval'], 'post');
                         echo Html::hiddenInput('Approval[action]', 'rejectRestoreUser');
                         echo Html::hiddenInput('Approval[userId]', $user->id);
                         echo Html::submitButton(
                            //  'Отклонить', ['class' => 'button', 'onclick' => 'return confirm("Отклоняем?")'] 
                             Yii::t('app', '{icon} Отклонить', ['icon' => FAS::icon('ban')]),['class' => 'btn btn-light btn-sm  ', 'title'=>'Отклонить', 'onclick' => 'return confirm("Отклоняем?")']
                            );
                          echo Html::endForm();
                    ?>
            </div>
        </div>
    </div>

    <?php
    }
?>
</div>
<?php
}

if (sizeof($model->busyLogins) > 0) {
    echo "<hr><h4>Заявки на проверку логинов:</h4>";
?>
<table>
    <tr>
        <td align="center">Ссылка по нику</td>
        <td align="center">Ссылка по ID</td>
        <td align="center">Подано с IP</td>
        <td align="center">Действие</td>
    </tr>
    <?php
    foreach ($model->busyLogins as $busyLogin) 
    {
	    $user = Users::findById($busyLogin->user_id);
	    if (!$user) {
?>
    <tr>
        <td colspan=4>Пользователь не найден: <?= $busyLogin->user_id ?></td>
    </tr>
    <?php
            } else { ?>
    <tr>
        <td align="center">
            <a target="_blank"
                href="http://newforest.apeha.ru/info.html?nick=<?= urlencode(iconv("UTF-8", "CP1251", $user->username)) ?>"><?= $user->username ?></a>
        </td>
        <td align="center">
            <a target="_blank"
                href="http://newforest.apeha.ru/info.html?user=<?= $user->apeha_id ?>"><?= $user->username ?></a>
        </td>
        <td align="center">
            <?= $busyLogin->ip ?>
        </td>
        <td align="center">
            <table>
                <tr>
                    <td style="padding: 3px; border: 0 none">
                        <?php
        echo Html::beginForm(['/site/approval'], 'post');
        echo Html::hiddenInput('Approval[action]', 'deleteUser');
        echo Html::hiddenInput('Approval[busyId]', $busyLogin->id);
        echo Html::submitButton('Удалить юзера', ['class' => 'button', 'onclick' => 'return confirm("БЕЗВОЗВРАТНО!!! ПРОДОЛЖАЕМ?")'] );
        echo "</td><td  style=\"padding: 3px; border: 0 none\">";
        echo Html::endForm();
            
        echo Html::beginForm(['/site/approval'], 'post');
        echo Html::hiddenInput('Approval[action]', 'rejectDeleteUser');
        echo Html::hiddenInput('Approval[busyId]', $busyLogin->id);
        echo Html::submitButton('Отклонить', ['class' => 'button', 'onclick' => 'return confirm("Отклоняем?")'] );
        echo Html::endForm();
?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <?php
	}
    }
    
    echo "</table>";
}
?>