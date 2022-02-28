<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Params;

$settings = new Params();
$settings->loadSettings();

$this->title = 'Восстановление пароля';
$this->params['breadcrumbs'][] = ['label' => 'Вход', 'url' => ['login']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">

    <?php
    if ($model->passwordreset_tries < $settings->restore_attempts) {
        if (!$model->success) {
            ?>
            <h1><?= Html::encode($this->title) ?></h1>
            <p>Для восстановления пароля, в обязательном порядке поместите строку </br><span style="color:red;"><b>!.<?= $model->secretkey ?>.!</b></span></br>в любое место профиля персонажа, после чего введите свой <b>игровой ник</b> в поле ниже:</p>
            <?php
            $form = ActiveForm::begin([
                        'id' => 'registration-form',
                        'layout' => 'horizontal',
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            'labelOptions' => ['class' => 'col-lg-1 control-label'],
                        ],
            ]);
            ?>

            <?php $model->_afr = base64_encode($model->secretkey) ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Ник') ?>
            <?= $form->field($model, '_afr')->hiddenInput()->label(false) ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Восстановить пароль', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        <?php } else { ?>
            <?php if (strlen($model->error) > 0) { ?> 
                <h4><?= $model->error ?></h4>
            <?php } else { ?>
                Пароль пользователя <b><?= $model->username ?> </b> успешно изменён.<br>
                Ваш новый пароль для входа в систему: <b><?= $model->generatedpassword ?></b><br>
                <b>Вы сможете воспользоваться новым паролем после проверки контрольной строки в профиле персонажа.</b><br>
                <br>
                <span style="color:red;">Запишите пароль и не говорите никому. В противном случае Вы можете быть наказаны за неиспользованную чистоту при подаче ложной заявки от Вашего имени.</span>





                <?php
            }
        }
    } else {
        ?>
        <br><br>
        <center>
            <h3><span style="color:#ac2925">Не стоит так часто запрашивать восстановление пароля. <br><br>Пожалуйста, подождите немного перед новой попыткой</span></h3>
        </center>
        <?php
    }
    ?>

</div>
