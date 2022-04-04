<?php

use app\models\Dragonsrights;
use app\models\Users;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use kartik\color\ColorInput;

$this->title = 'Настройки системы';
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['superadmin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-block">

    <div class="block-right">
        <?php

echo "<div class=\"form-conrtol d-flex flex-column flex-wrap\">";
echo "<div class=\"main-block-setting  mb-3\">";
echo "<div class=\"left-block\">";
$form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            // 'options' => ['class'=>'form-control '], 
             'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                'label' => 'col-sm-6',
                'input' => 'col-sm-4',
                'offset' => 'col-sm-8',
                'wrapper' => 'col-sm-5',
                'error' => '',
                'hint' => '',
            ],
        ],
        ]);
$model->action = 'saveSettings';
echo $form->field($model, 'action')->hiddenInput()->label(false);
echo "<span style=\"color: #8e000b; font-size:20px\">Нагрузка городов в %</span>";
echo $form->field($model, 'loadKovcheg')->textInput(['type' => 'number', 'min' => 1])->label('Ковчег');
echo $form->field($model, 'loadSmorye')->textInput(['type' => 'number', 'min' => 1])->label('Сморье');
echo $form->field($model, 'loadUtes')->textInput(['type' => 'number', 'min' => 1])->label('Утёс');
echo "<span style=\"color: #8e000b; font-size:20px\">Прочее</span>";
echo $form->field($model, 'max_z_per_day')->textInput(['type' => 'number', 'min' => 1])->label('Заявок в день');
echo "";
echo $form->field($model, 'login_attempts')->textInput(['type' => 'number', 'min' => 1])->label('Попыток входа в час с IP');
echo $form->field($model, 'register_attempts')->textInput(['type' => 'number', 'min' => 1])->label('Регистраций в час с IP');
echo $form->field($model, 'restore_attempts')->textInput(['type' => 'number', 'min' => 1])->label('Сбросы пароля в час с IP');

echo "</div>";
echo "<div class=\"right-block\">";
echo "<span style=\"color: #8e000b; font-size:20px\">Цвета на странице заявок</span>";
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
echo "</div>";

echo "</div>";
echo "<div class=\" m-5 d-flex\">";
echo "<div class=\" \">";
echo $form->field($model, 'busylogin_enabled')->checkbox()->label('Включить \'Логин занят\'',);
echo $form->field($model, 'show_new_items_count')->checkbox()->label('Отображать количество новых заявок');
echo $form->field($model, 'show_ready_items')->checkbox()->label('Отображать количество проверенных заявок');
echo $form->field($model, 'enable_nevid_count')->checkbox()->label('Отображать количество невидов')
;
echo "  </div>";
echo "<div class=\"align-self-end mb-4\">";
echo Html::submitButton('Сохранить настройки', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return validateSettings()'], ['id' => 'submit']);
echo "  </div>";
echo "</div>";



echo "  </div>";
ActiveForm::end();

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

?>
    </div>
</div>
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