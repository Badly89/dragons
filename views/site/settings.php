<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\color\ColorInput;

$this->title = 'Настройки системы';
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['superadmin']];
$this->params['breadcrumbs'][] = $this->title;

echo "<br>";
echo Html::beginForm(['/site/professions'], 'post');
echo Html::hiddenInput('Params[action]', 'view');
echo Html::submitButton(
        'Профессии чистоты', ['class' => 'btn btn-primary']
);
echo Html::endForm();
echo "<br>";

$form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-2 control-label', 'style' => [
                        'white-space' => 'nowrap'
                    ]],
            ],
        ]);
$model->action = 'saveSettings';
echo $form->field($model, 'action')->hiddenInput()->label(false);
echo "<hr><span style=\"color: #8e000b; font-size:20px\">Нагрузка городов в %</span><hr>";
echo $form->field($model, 'loadKovcheg')->textInput(['type' => 'number', 'min' => 1])->label('Ковчег');
echo $form->field($model, 'loadSmorye')->textInput(['type' => 'number', 'min' => 1])->label('Сморье');
echo $form->field($model, 'loadUtes')->textInput(['type' => 'number', 'min' => 1])->label('Утёс');
echo "<hr><span style=\"color: #8e000b; font-size:20px\">Цвета на странице заявок</span><hr>";
echo $form->field($model, 'color_background')->widget(ColorInput::classname(['readonly' => true]), ['options' => ['placeholder' => 'Select Color...'],])->label('Фон заявки');
echo $form->field($model, 'own_z_color')->widget(ColorInput::classname(['readonly' => true]), ['options' => ['placeholder' => 'Select Color...'],])->label('Фон своей заявки');
echo $form->field($model, 'color_chist')->widget(ColorInput::classname(['readonly' => true]), ['options' => ['placeholder' => 'Select Color...'],])->label('Чисто');
echo $form->field($model, 'color_cancelled')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'Select Color...'],])->label('Отменена');
echo $form->field($model, 'color_otkaz')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'Select Color...'],])->label('Отказ');
echo $form->field($model, 'color_inprogress')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'Select Color...'],])->label('Проверяется');
echo $form->field($model, 'color_killed')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'Select Color...'],])->label('Наказан');
echo $form->field($model, 'sign_color')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'Select Color...'],])->label('Цвет подписи');
echo $form->field($model, 'comment_color')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'Select Color...'],])->label('Цвет коммента');
echo $form->field($model, 'otkaz_color')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'Select Color...'],])->label('Коммент отказа/наказания');
echo "<hr><span style=\"color: #8e000b; font-size:20px\">Прочее</span><hr>";
echo $form->field($model, 'max_z_per_day')->textInput(['type' => 'number', 'min' => 1])->label('Заявок в день');
echo "<hr>";
echo $form->field($model, 'login_attempts')->textInput(['type' => 'number', 'min' => 1])->label('Попыток входа в час с IP');
echo $form->field($model, 'register_attempts')->textInput(['type' => 'number', 'min' => 1])->label('Регистраций в час с IP');
echo $form->field($model, 'restore_attempts')->textInput(['type' => 'number', 'min' => 1])->label('Сбросы пароля в час с IP');
echo "<hr>";
echo "<div style=\"margin-left: -400px\">";
echo $form->field($model, 'busylogin_enabled')->checkbox()->label('Включить \'Логин занят\'');
echo $form->field($model, 'show_new_items_count')->checkbox()->label('Отображать количество новых заявок');
echo $form->field($model, 'show_ready_items')->checkbox()->label('Отображать количество проверенных заявок');
echo $form->field($model, 'enable_nevid_count')->checkbox()->label('Отображать количество невидов');
echo "</div>";
?>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Сохранить настройки', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return validateSettings()'], ['id' => 'submit']) ?>
    </div>
</div>
<?php
ActiveForm::end();
?>

<script>
function validateSettings() {
    $k = document.getElementById("params-loadkovcheg");
    $s = document.getElementById("params-loadsmorye");
    $u = document.getElementById("params-loadutes");
    if ((parseInt($k.value) + parseInt($s.value) + parseInt($u.value)) !== 100) {
        alert('Сумма процентов по городам должна равняться 100');
        return false;
    } else {
        return confirm('Сохраняем эти настройки?');
    }
}
</script>