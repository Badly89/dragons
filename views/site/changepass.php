<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Params;

$settings = new Params();
$settings->loadSettings();

$this->title = 'Смена пароля';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">

    <?php
    if ($model->activeUser == 0) {
        ?>
        <h1><?= Html::encode($this->title) ?></h1>
        <h2>Смена пароля возможна после активации учётной записи.</h2>
        <?php
    } else {


        if ($model->action == "success") {
            //PASSWORD HAS CHANGED!!! HOORAY
            ?>
            <h1><?= Html::encode($this->title) ?></h1>
            <h3>Смена пароля прошла успешно</h3>
            <?php
        } else {
            if ($model->action == "retry") {
                //SOMETHING WENT WRONG DURING PASSWORD CHANGE. RETRY
                ?>
                <h1><?= Html::encode($this->title) ?></h1>
                <p>На этой странице Вы самостоятельно можете изменить пароль для входа на сайт и форум ОД.</p>
                <p>Для смены пароля необходимо ввести текущий пароль и дважды новый пароль.</p>
                <b>Требования к новому паролю:</b>
                <ul>
                    <li>Длина не менее 8 символов</li>
                    <li>Должен содержать цифры</li>
                    <li>Должен содержать прописные и заглавные буквы латинского алфавита</li>
                    <li style="color:red;"><b>КАТЕГОРИЧЕСКИ НЕ РЕКОМЕНДУЕТСЯ ИСПОЛЬЗОВАТЬ ИГРОВОЙ ПАРОЛЬ ПЕРСОНАЖА</b></li>
                </ul>
                <p style="color: red; font-weight: bold;"><?= $model->error_message ?></p>
                <?php
                $form = ActiveForm::begin([
                            'id' => 'changepass-form',
                            'layout' => 'horizontal',
                            'fieldConfig' => [
                                'template' => "{label}\n<div class=\"col-lg-2\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                'labelOptions' => ['class' => 'col-lg-2 control-label', 'style' => [
                                        'white-space' => 'nowrap',
                                        'width' => '130px'
                                    ]],
                            ],
                ]);
                ?>
                <?php $model->action = "changePassword" ?>
                <?= $form->field($model, 'oldPassword')->passwordInput(['autofocus' => true])->label('Старый пароль') ?>
                <?= $form->field($model, 'newPassword')->passwordInput(['autofocus' => true])->label('Новый пароль') ?>
                <?= $form->field($model, 'newPasswordRepeat')->passwordInput(['autofocus' => true])->label('Ещё раз') ?>
                <?= $form->field($model, 'action')->hiddenInput()->label(false) ?>
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Сменить пароль', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
                <?php
            } else {
                //HERE SHOW INDEX
                ?>
                <h1><?= Html::encode($this->title) ?></h1>
                <p>На этой странице Вы самостоятельно можете изменить пароль для входа на сайт и форум ОД.</p>
                <p>Для смены пароля необходимо ввести текущий пароль и дважды новый пароль.</p>
                <b>Требования к новому паролю:</b>
                <ul>
                    <li>Длина не менее 8 символов</li>
                    <li>Должен содержать цифры</li>
                    <li>Должен содержать прописные и заглавные буквы латинского алфавита</li>
                    <li style="color:red;"><b>КАТЕГОРИЧЕСКИ НЕ РЕКОМЕНДУЕТСЯ ИСПОЛЬЗОВАТЬ ИГРОВОЙ ПАРОЛЬ ПЕРСОНАЖА</b></li>
                </ul>
                <?php
                $form = ActiveForm::begin([
                            'id' => 'changepass-form',
                            'layout' => 'horizontal',
                            'fieldConfig' => [
                                'template' => "{label}\n<div class=\"col-lg-2\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                'labelOptions' => ['class' => 'col-lg-2 control-label', 'style' => [
                                        'white-space' => 'nowrap',
                                        'width' => '130px'
                                    ]],
                            ],
                ]);
                ?>
                <?php $model->action = "changePassword" ?>
                <?= $form->field($model, 'oldPassword')->passwordInput(['autofocus' => true])->label('Старый пароль') ?>
                <?= $form->field($model, 'newPassword')->passwordInput(['autofocus' => true])->label('Новый пароль') ?>
                <?= $form->field($model, 'newPasswordRepeat')->passwordInput(['autofocus' => true])->label('Ещё раз') ?>
                <?= $form->field($model, 'action')->hiddenInput()->label(false) ?>
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Сменить пароль', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
                <?php
            }
        }
    }
    ?>
</div>
