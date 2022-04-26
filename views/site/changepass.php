<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
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
    <h2>Пожалуйста, войдите заново с использованием нового пароля</h2>
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
                                'template' => "{label}\n<div class=\"\">{input}</div>\n<div class=\"\">{error}</div>",
                                'labelOptions' => ['class' => '', 'style' => [
                                        'white-space' => 'nowrap',
                                        'width' => '130px'
                                    ]],
                            ],
                ]);
                ?>
    <?php $model->action = "changePassword" ?>
    <?= $form->field($model, 'oldPassword',['enableLabel' => false])->passwordInput(array('placeholder' => 'Старый пароль', 'class'=>'form-control')) ?>
    <?= $form->field($model, 'newPassword',['enableLabel' => false])->passwordInput(array('placeholder' => 'Новый пароль', 'class'=>'form-control'))?>
    <?= $form->field($model, 'newPasswordRepeat',['enableLabel' => false])->passwordInput(array('placeholder' => 'Ещё раз', 'class'=>'form-control'))?>
    <?= $form->field($model, 'action')->hiddenInput()->label(false) ?>
    <div class="form-group">
        <div class=" ">
            <?= Html::submitButton('Сменить пароль', ['class' => 'btn btn-primary btn-change-pwd', 'name' => 'login-button']) ?>
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
                                'template' => "{label}\n<div class=\"\">{input}</div>\n<div class=\"\">{error}</div>",
                                'labelOptions' => ['class' => 'col-lg-2 control-label', 'style' => [
                                        'white-space' => 'nowrap',
                                        'width' => '130px'
                                    ]],
                            ],
                ]);
                ?>
    <?php $model->action = "changePassword" ?>
    <?= $form->field($model, 'oldPassword',['enableLabel' => false])->passwordInput(array('placeholder' => 'Старый пароль', 'class'=>'form-control')) ?>
    <?= $form->field($model, 'newPassword',['enableLabel' => false])->passwordInput(array('placeholder' => 'Новый пароль', 'class'=>'form-control'))?>
    <?= $form->field($model, 'newPasswordRepeat',['enableLabel' => false])->passwordInput(array('placeholder' => 'Ещё раз', 'class'=>'form-control'))?>
    <?= $form->field($model, 'action')->hiddenInput()->label(false) ?>
    <div class="form-group">
        <div class=" ">
            <?= Html::submitButton('Сменить пароль', ['class' => 'btn btn-primary btn-change-pwd' , 'name' => 'login-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <?php
            }
        }
    }
    ?>
</div>