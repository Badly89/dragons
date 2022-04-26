<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Users;
use yii\helpers\Url;

$tagsAllowed = "<a><p><span><img><br><tr><table></tr><td></td></table><h1><h2><h3><h4><ul><li><ol><blockquote><span><sup></h1></h2></h3></h4></ul></li></ol></blockquote></span></sup><sub></sub><iframe></iframe>";
?>

<style>
.rw_blog_portal .rw_blogpost_listing {
    border: 1px solid;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    padding: 150px;
    word-wrap: break-word;
}

.rw_margin_bottom {
    margin-bottom: 15px !important;
}

.rw_margin_bottom_5px {
    margin-bottom: 5px;
}

.rw_margin_bottom_10px {
    margin-bottom: 10px;
}

.rw_no_margin {
    margin: 0;
}


.aui-button,
a.aui-button,
.aui-button:visited {
    background: #f5f5f5 none repeat scroll 0 0;
    border: 1px solid #ccc;
    border-radius: 3.01px;
    box-sizing: border-box;
    color: #333;
    cursor: pointer;
    display: inline-block;
    font-family: inherit;
    font-size: 14px;
    font-variant: normal;
    font-weight: normal;
    height: 2.14286em;
    line-height: 1.42857;
    margin: 0;
    padding: 4px 10px;
    text-decoration: none;
    vertical-align: baseline;
    white-space: nowrap;
}

.aui-button.aui-button-light,
a.aui-button.aui-button-light,
.aui-button.aui-button-light:visited {
    background: #fff none repeat scroll 0 0;
}

.aui-button~.aui-button {
    margin-left: 10px;
}
</style>
<?php

$this->title = 'Блокнот';
//$this->params['breadcrumbs'][] = ['label' => 'Блокнот', 'url' => ['notepad']];
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="<?= Yii::$app->request->baseUrl ?>/js/jquery-3.2.0.min.js"></script>
<script src="<?= Yii::$app->request->baseUrl ?>/js/textboxio/textboxio.js"></script>
<script>
var textareaEditorShort;
var textareaEditorFull;
$(document).ready(function() {
    var config = {
        codeview: {
            showButton: true // Hides the code view button, default is true (shown)
        }
    };
    textareaEditorFull = textboxio.replace('#full_text', config);
});
</script>
<br><br>

<div style="padding: 15px; id=" notepad">
    <?php
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
        ?>

    <?php
        $model->full_text = strip_tags(stripslashes($model->full_text), $tagsAllowed);
        ?>
    <?= Html::hiddenInput('Notepad[action]', 'save'); ?>
    <?= Html::hiddenInput('Notepad[user_id]', Yii::$app->user->getId()); ?>

    <?= $form->field($model, 'full_text')->textarea(['id' => 'full_text', 'style' => 'width:1110px; height:600px'])->label(false) ?>

    <div class="form-group">
        <div class="col-lg-offset-0 col-lg-11">
            <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return confirm("Продолжаем?")']) ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php

?>