<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Params;

$settings = new Params();
$settings->loadSettings();

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = ['label' => 'Вход', 'url' => ['login']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">



    <?php
    if ($model->registration_tries < $settings->register_attempts) {
        if (!$model->success) {
            ?>
            <h1><?= Html::encode($this->title) ?></h1>
            <p>Для регистрации в системе, в обязательном порядке поместите строку </br><span style="color:red;"><b>!.<?= $model->secretkey ?>.!</b></span></br>в любое место профиля персонажа, после чего введите свой <b>игровой ник</b> в поле ниже.    </p>
            <p><b>Не удаляйте кодовую строку до подтверждения вашего аккаунта, иначе регистрация будет аннулирована.</b></p>
            <p><a style="color:red; font-weight: bold" href="http://dragons.apeha.ru/forum/-f34/-t60.html" target="_blank">ИНСТРУКЦИЯ ПО РЕГИСТРАЦИИ НА САЙТЕ ОД</a></p>
            <?php
            $form = ActiveForm::begin([
                        'id' => 'registration-form',
                        'layout' => 'horizontal',
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            'labelOptions' => ['class' => 'col-lg-1 control-label', 'style' => [
                                    'white-space' => 'nowrap'
                                ]],
                        ],
            ]);
            ?>

            <?php $model->_afr = base64_encode($model->secretkey) ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Ник') ?>
            <?= $form->field($model, 'apeha_id')->textInput(['type' => 'number', 'min' => 1, 'data-toggle'=>'tooltip', 'data-placement' => 'bottom', 
                'title' => 'Цифры в ссылке на Вашего персонажа info.html?user=#########  либо  info_user_#########.html'
                ])->label('ID персонажа') ?>
            <?= $form->field($model, '_afr')->hiddenInput()->label(false) ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        <?php } else { ?>
            <?php if (strlen($model->error) > 0) { ?> 
                <h4><?= $model->error ?></h4>
            <?php } else { ?>
                Вы успешно зарегистрировались под ником <b><?= $model->username ?></b><br>
                <b>Вы сможете воспользоваться всеми возможностями сайта и форума после активации Вашей учётной записи администрацией.</b><br>
                Ваш пароль для входа в систему: <b><?= $model->generatedpassword ?></b><br><br>
                <span style="color:red;">Запишите пароль и не говорите никому. В противном случае Вы можете быть наказаны за неиспользованную чистоту при подаче ложной заявки от Вашего имени.</span>





                <?php
            }
        }
    } else {
        ?>
        <br><br>
        <center>
            <h3><span style="color:#ac2925">Вы очень часто регистрируетесь. <br><br>Пожалуйста, подождите немного перед новой попыткой</span></h3>
        </center>
    <?php }
    ?>


</div>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<style>
.tooltip-inner {
    white-space:pre-wrap;
}
</style>