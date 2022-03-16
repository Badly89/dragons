<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Params;

$settings = new Params();
$settings->loadSettings();

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <?php
    if ($model->failedTries < $settings->login_attempts) {
        ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Пожалуйста, заполните все поля для входа:</p>

    <?php
        $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                   
                    'fieldConfig' => [
                        'template' => "{label}\n
                        <div class=\"\">{input}</div>\n
                        <div class=\">{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-1 control-label'],
                    ],
        ]);
        ?>

    <?= $form->field($model, 'username',['enableLabel' => false])->textInput(array('placeholder' => 'Ник', 'class'=>'form-control'))?>

    <?= $form->field($model, 'password',['enableLabel' => false])->passwordInput(array('placeholder' => 'Пароль', 'class'=>'form-control'))?>

    <!--<?//=
        //$form->field($model, 'rememberMe')->checkbox([
         //   'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        //])->label('Запомнить меня')
        ?>-->
    <?= $form->field($model, 'rememberMe',['inputOptions' => ['value' => '1']])->hiddenInput()->label(false) ?>

    <div class="form-group">
        <div class="">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-login', 'name' => 'login-button']) ?>
            <br /><br />
            <?= Html::a('Регистрация', Yii::$app->request->baseUrl . '/registration/'/* , ['class' => 'btn btn-primary'] */) ?>
            <br />
            <?= Html::a('Восстановление пароля', Yii::$app->request->baseUrl . '/lostpassword/'/* , ['class' => 'btn btn-primary'] */) ?>
            <?php
                if ($settings->busylogin_enabled == 1) {
                    ?>
            <br />
            <?= Html::a('Я не регистрировался, но мой логин занят', Yii::$app->request->baseUrl . '/loginbusy/'/* , ['class' => 'btn btn-primary'] */) ?>
            <?php
                }
                ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

    <?php
    } else {
        ?>
    <br><br>
    <center>
        <h3><span style="color:#ac2925">Мы заметили, что Вы очень часто ошибаетесь при вводе имени/пароля.
                <br><br>Пожалуйста, подождите немного перед новой попыткой</span></h3>
    </center>
    <?php
    }
    ?>

</div>