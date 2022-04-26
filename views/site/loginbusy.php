<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Params;

$settings = new Params();
$settings->loadSettings();

$this->title = 'Логин кем-то занят';
$this->params['breadcrumbs'][] = ['label' => 'Вход', 'url' => ['login']];
$this->params['breadcrumbs'][] = $this->title;

if ($model->success) {
    ?>
<center>
    <h3>
        <span style="color: saddlebrown">
            Ваша заявка принята к рассмотрению. Попробуйте повторить регистрацию немного позже.
        </span>
    </h3>
    <hr>
</center>
<?php
} else {
    if (strlen($model->errorMsg) > 0) {
        ?>
<center>
    <h3>
        <span style="color: red">
            <?= $model->errorMsg ?>
        </span>
    </h3>
    <hr>
</center>
<?php
    }
    if ($model->passwordreset_tries < $settings->restore_attempts) {
        //Display form
        ?>
<br>
<b>
    <p>Воспользуйтесь формой ниже для того, чтобы дать нам знать, что Вы не можете зарегистрироваться из-за
        того, что Ваш игровой ник уже зарегистрирован на сайте</p>
    <p>Это может случиться по причине удаления старых персонажей из базы игры и регистрации Вами персонажа с
        таким же ником</p>
    <p><span style="color:red">После обращения - не надо повторно это делать. Новое обращение попадёт в конец
            очереди.</span>
    </p>
</b>
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

<?= $form->field($model, 'username')->textInput()->label('Ник') ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Это мой ник, но он занят', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
</div>

<?php
        ActiveForm::end();
    } else {
        ?>
<br><br>
<center>
    <h3><span style="color:#ac2925">Не стоит так часто это делать. <br><br>Пожалуйста, подождите немного перед новой
            попыткой</span>
    </h3>
</center>
<?php
    }
}
?>