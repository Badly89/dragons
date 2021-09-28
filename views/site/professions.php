<?php

use app\models\Users;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Редактирование профессий';

$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['superadmin']];
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['settings']];
$this->params['breadcrumbs'][] = $this->title;


$commonProfession = $model->commonProfessions;
$kovchegProfessions = $model->kovchegProfessions;
$smoryeProfessions = $model->smoryeProfessions;
$utesProfessions = $model->utesProfessions;


echo "<hr><span style=\"color: #8e000b; font-size:20px\">Единые</span><hr>";
if (is_array($model->commonProfessions) || is_object($model->commonProfessions)) {
    listExistingItems($model->commonProfessions, $model);
}
getNewProfessionForm($model, "common");
echo "<hr><span style=\"color: #8e000b; font-size:20px\">Ковчег</span><hr>";
if (is_array($model->kovchegProfessions) || is_object($model->kovchegProfessions)) {
    listExistingItems($model->kovchegProfessions, $model);
}
getNewProfessionForm($model, "kovcheg");

echo "<hr><span style=\"color: #8e000b; font-size:20px\">Сморье</span><hr>";
if (is_array($model->smoryeProfessions) || is_object($model->smoryeProfessions)) {
    listExistingItems($model->smoryeProfessions, $model);
}
getNewProfessionForm($model, "smorye");

echo "<hr><span style=\"color: #8e000b; font-size:20px\">Утёс</span><hr>";
if (is_array($model->utesProfessions) || is_object($model->utesProfessions)) {
    listExistingItems($model->utesProfessions, $model);
}
getNewProfessionForm($model, "utes");

echo "Number of professions is: " . count($model->allProfessions);
echo "Actions is: " . $model->action;
echo "user group is: " . Users::findGroupById(Yii::$app->user->getId());

function listExistingItems($professions, $model)
{
    foreach ($professions as $pr) {
        $btnText = $pr->active == 1 ? "Скрыть" : "Показать";
        $actionCurr = $pr->active == 1 ? "hide" : "show";
        $color = $pr->active == 1 ? "#00ff00" : "#500000";
        ?>
        <table>
            <tr style="vertical-align: top; height: 2px">
                <td style="padding: 3px">
                    <div class="form-group field-professionsmodel-view_name">
                        <input type="text" class="form-control" value="<?php echo $pr->view_name ?>"
                               disabled="disabled"
                               style="background-color: #f5f5f6; box-shadow: 0 0 20px  <?php echo $color ?>">

                        <p class="help-block help-block-error"></p>
                    </div>
                </td>
                <td style="padding: 3px">
                    <div class="form-group field-professionsmodel-system_name">
                        <input type="text" class="form-control" value="<?php echo $pr->system_name ?>"
                               disabled="disabled"
                               style="background-color: #f5f5f6; box-shadow: 0 0 20px  <?php echo $color ?>">
                        <p class="help-block help-block-error"></p>
                    </div>
                </td>
                <td style="padding: 3px">
                    <div class="form-group field-professionsmodel-category_name">
                        <input type="text" class="form-control"
                               value="<?php echo getBeautyCategoryName($pr->category) ?>"
                               disabled="disabled"
                               style="background-color: #f5f5f6; box-shadow: 0 0 20px  <?php echo $color ?>">
                        <p class="help-block help-block-error"></p>
                    </div>
                </td>
                <?php
                //start delete form
                $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['class' => 'form-vertical'],
                ]);
                echo $form->field($model, 'action')->hiddenInput(['value' => 'delete'])->label(false);
                echo $form->field($model, 'id')->hiddenInput(['value' => $pr->id])->label(false);
                ?>
                <td style="padding: 3px">
                    <button type="submit" class="btn btn-primary" name="login-button" onclick="return confirmDelete()">
                        Удалить
                    </button>
                </td>
                <?php ActiveForm::end();
                // end delete form
                // start show/hide form

                $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['class' => 'form-vertical'],
                ]);
                echo $form->field($model, 'action')->hiddenInput(['value' => $actionCurr])->label(false);
                echo $form->field($model, 'id')->hiddenInput(['value' => $pr->id])->label(false);
                ?>
                <td style="padding: 3px">
                    <button type="submit" class="btn btn-primary" name="login-button"><?php echo $btnText; ?></button>
                </td>
                <?php ActiveForm::end();

                //end show/hide form
                ?>

            </tr>
        </table>
        <?php
    }
}

function getBeautyCategoryName($category)
{
    switch ($category) {
        case 'trav':
            return 'Травники';
        case    'klan':
            return "Клан";
        case    'naim':
            return "Наймы";
        case    'common':
            return "Общие";
        default:
            return $category;
    }
}

function getNewProfessionForm($model, $city)
{
    $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-vertical'],
    ]);
    echo $form->field($model, 'action')->hiddenInput(['value' => 'add'])->label(false);
    echo $form->field($model, 'city')->hiddenInput(['value' => $city])->label(false);
    ?>
    <table>
        <tr>
            <td style="padding: 10px">
                <?php echo $form->field($model, 'view_name')->label('Название'); ?>
            </td>
            <td style="padding: 10px">
                <?php echo $form->field($model, 'system_name')->label('Транскрипция'); ?>
            </td>
            <td style="padding: 10px">
                <?php echo $form->field($model, 'category')->dropDownList([
                    'klan' => 'Клан',
                    'naim' => 'Наймы',
                    'trav' => 'Травники',
                    'common' => 'Общие'
                ])->label('Категория'); ?>
            </td>
            <td style="padding-top: 11px">
                <?php echo Html::submitButton('Добавить профессию', ['class' => 'btn btn-primary', 'name' => 'login-button'], ['id' => 'submit']) ?>
            </td>
        </tr>
    </table>
    <?php
    ActiveForm::end();
}

?>

<script>
    function confirmDelete() {
        return confirm('Удалить? Действие необратимо!');
    }
</script>

