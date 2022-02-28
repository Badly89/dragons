<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Users;
use yii\helpers\Url;

$tagsAllowed = "<p><span><img><br><b><i>";
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


    .aui-button, a.aui-button, .aui-button:visited {
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
    .aui-button.aui-button-light, a.aui-button.aui-button-light, .aui-button.aui-button-light:visited {
        background: #fff none repeat scroll 0 0;
    }
    .aui-button ~ .aui-button {
        margin-left: 10px;
    }


</style>
<?php
$isAdminLogged = false;
if (!Yii::$app->user->isGuest) {
    if (Users::findGroupById(Yii::$app->user->getId()) == 5) {
        $isAdminLogged = true;
    }
}

if ($isAdminLogged && $model->mode != "editItem" && $model->mode != "viewSeparate") {
    //Admin controls
    ?>
    <script src="<?= Yii::$app->request->baseUrl ?>/js/jquery-3.2.0.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/js/textboxio/textboxio.js"></script>
    <script>
        var textareaEditorShort;
        var textareaEditorFull;
        $(document).ready(function () {
            var config = {
                codeview: {
                    showButton: false  // Hides the code view button, default is true (shown)
                }
            };
            textareaEditorShort = textboxio.replace('#short_text', config);
            textareaEditorFull = textboxio.replace('#full_text', config);
        });
    </script>
    <br><br>
    <center>
        <input type="button" value="Новая запись" class='aui-button' onclick="toggleView('newItem')"/>
        <br><br>
        <div style="display: none; padding: 15px; border: 1px solid" id="newItem">
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


            <?= Html::hiddenInput('SudModel[action]', 'addNewPost'); ?>

            <?= $form->field($model, 'title')->textInput(['autofocus' => true, 'style' => 'width:900px'])->label('Заголовок') ?>

            <?= $form->field($model, 'short_text')->textarea(['id' => 'short_text', 'style' => 'width:900px; height:250px'])->label('Короткий текст') ?>

            <?php $model->active = 0; ?>

            <?= $form->field($model, 'full_text')->textarea(['id' => 'full_text', 'style' => 'width:900px; height:550px'])->label('Полный текст') ?>

            <?= $form->field($model, 'active')->checkbox()->label('Опубликовать сразу') ?>


            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return submitNewPost()']) ?>
                </div>

            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </center>
    <script>
        function submitNewPost() {
            if (confirm("Продолжаем?")) {
                //textareaEditorShort.restore();
                //textareaEditorFull.restore();
                return true;
            } else {
                return false;
            }
        }

        function toggleView($id) {
            $el = document.getElementById($id);
            if ($el.style.display === "none") {
                $el.style.display = "block";
            } else {
                $el.style.display = "none";
            }
        }
    </script>
    <?php
}



if ($model->mode == "viewAll") {
    $this->title = 'Суд Арены';
    $this->params['breadcrumbs'][] = $this->title;
    if (sizeof($model->items) > 0) {
        foreach ($model->items as $item) {
            ?>
            <div class="rw_blogpost_listing" style="
                 border: 0px none;
                 <?php
                 if ($item->active == 1) {
                     echo "box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);";
                 } else {
                     echo "box-shadow: 0 0 15px red;";
                 }
                 ?>

                 margin-bottom: 20px;
                 padding: 15px;
                 word-wrap: break-word;
                 ">
                <div class="rw_margin_bottom rw_block">
                    <span class="rw_has_logo_block rw_block">
                        <div class="page-metadata not-personal" style="
                             color: #707070;
                             font-size: 12px;
                             line-height: 1.5;
                             "><?= $item->date_added ?></div>
                             <?php
                             echo Html::a(
                                     strip_tags(stripslashes($item->title), $tagsAllowed), Url::to([
                                         '/site/sud', 'action' => 'view', 'id' => $item->id
                                     ]), [
                                 'style' => [
                                     'color' => '#666',
                                     'cursor' => 'pointer',
                                     'display' => 'block',
                                     'font-size' => '20pt',
                                     'font-weight' => 'bold',
                                     'line-height' => 'normal',
                                     'padding' => '5px 0',
                                     'text-decoration' => 'none',
                                     'word-wrap' => 'break-word'
                                 ]
                                     ]
                             );
                             ?>
                    </span>
                </div>
                <hr style="padding: 0; margin-top: -15px">
                <div class="rw_item_content">
                    <?= strip_tags(stripslashes($item->short_text), $tagsAllowed) ?>
                    <div class="rw_buttons_section">
                        <?php
                        echo Html::a(
                                'Подробнее', Url::to([
                                    '/site/sud', 'action' => 'view', 'id' => $item->id
                                ]), [
                            'class' => 'aui-button'
                                ]
                        );
                        ?>                        
                        <?php
                        if ($isAdminLogged) {
                            echo "<table><tr><td>";
                            if ($item->active == 1) {
                                echo Html::beginForm(['/site/sud'], 'post');
                                echo Html::hiddenInput('SudModel[action]', 'deActivateItem');
                                echo Html::hiddenInput('SudModel[itemId]', $item->id);
                                echo Html::submitButton(
                                        'Убрать с публикации', ['class' => 'aui-button']
                                );
                                echo Html::endForm();
                            } else {
                                echo Html::beginForm(['/site/sud'], 'post');
                                echo Html::hiddenInput('SudModel[action]', 'activateItem');
                                echo Html::hiddenInput('SudModel[itemId]', $item->id);
                                echo Html::submitButton(
                                        'Опубликовать', ['class' => 'aui-button']
                                );
                                echo Html::endForm();
                            }
                            echo "</td><td>";
                            echo Html::beginForm(['/site/sud'], 'post');
                            echo Html::hiddenInput('SudModel[action]', 'editItem');
                            echo Html::hiddenInput('SudModel[itemId]', $item->id);
                            echo Html::submitButton(
                                    'Редактировать', ['class' => 'aui-button']
                            );
                            echo Html::endForm();
                            echo "</td></tr></table>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<center><br><br><h2>Ещё ничего нету у нас тут</h2></center>";
    }
}

if ($model->mode == "editItem" && $isAdminLogged) {
    $this->title = 'Редактирование записи "' . strip_tags(stripslashes($model->title)) . '"';
    $this->params['breadcrumbs'][] = ['label' => 'Суд Арены', 'url' => ['sud']];
    $this->params['breadcrumbs'][] = $this->title;
    ?>
    <script src="<?= Yii::$app->request->baseUrl ?>/js/jquery-3.2.0.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/js/textboxio/textboxio.js"></script>
    <script>
        var textareaEditorShort;
        var textareaEditorFull;
        $(document).ready(function () {
            var config = {
                codeview: {
                    showButton: false  // Hides the code view button, default is true (shown)
                }
            };
            textareaEditorShort = textboxio.replace('#short_text', config);
            textareaEditorFull = textboxio.replace('#full_text', config);
        });
    </script>
    <br><br>
    <center>

        <div style="padding: 15px; border: 1px solid" id="newItem">
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
            $model->title = strip_tags(stripslashes($model->title), $tagsAllowed);
            $model->short_text = strip_tags(stripslashes($model->short_text), $tagsAllowed);
            $model->full_text = strip_tags(stripslashes($model->full_text), $tagsAllowed);
            ?>
            <?= Html::hiddenInput('SudModel[action]', 'finalizeEdit'); ?>

            <?= $form->field($model, 'itemId')->hiddenInput()->label(false) ?>

            <?= $form->field($model, 'title')->textInput(['autofocus' => true, 'style' => 'width:900px'])->label('Заголовок') ?>

            <?= $form->field($model, 'short_text')->textarea(['id' => 'short_text', 'style' => 'width:900px; height:250px'])->label('Короткий текст') ?>

            <?= $form->field($model, 'full_text')->textarea(['id' => 'full_text', 'style' => 'width:900px; height:550px'])->label('Полный текст') ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return confirm("Продолжаем?")']) ?>
                </div>

            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </center>
    <?php
}
if ($model->mode == "viewSeparate") {
    $this->title = strip_tags(stripslashes($model->aloneItem->title));
    $this->params['breadcrumbs'][] = ['label' => 'Суд Арены', 'url' => ['sud']];
    $this->params['breadcrumbs'][] = $this->title;
    ?>

    <?php
    if ($model->aloneItem->active == 1 || ($model->aloneItem->active == 0 && $isAdminLogged)) {
        ?>

        <div class="rw_blogpost_listing" style="
             border: 0px none;
             <?php
             if ($model->aloneItem->active == 1) {
                 echo "box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);";
             } else {
                 echo "box-shadow: 0 0 15px red;";
             }
             ?>

             margin-bottom: 20px;
             padding: 15px;
             word-wrap: break-word;
             ">
            <div class="rw_margin_bottom rw_block">
                <span class="rw_has_logo_block rw_block">
                    <div class="page-metadata not-personal" style="
                         color: #707070;
                         font-size: 12px;
                         line-height: 1.5;
                         "><?= $model->aloneItem->date_added ?></div>
                         <?php
                         echo Html::a(
                                 strip_tags(stripslashes($model->aloneItem->title), $tagsAllowed), Url::to([
                                     '/site/sud', 'action' => 'view', 'id' => $model->aloneItem->id
                                 ]), [
                             'class' => 'rw_blogpost_heading_link',
                             'style' => [
                                 'color' => '#666',
                                 'cursor' => 'pointer',
                                 'display' => 'block',
                                 'font-size' => '20pt',
                                 'font-weight' => 'bold',
                                 'line-height' => 'normal',
                                 'padding' => '5px 0',
                                 'text-decoration' => 'none',
                                 'word-wrap' => 'break-word'
                             ]
                                 ]
                         );
                         ?>
                </span>
            </div>
            <hr style="padding: 0; margin-top: -15px">
            <div class="rw_item_content">
                <?= strip_tags(stripslashes($model->aloneItem->full_text), $tagsAllowed) ?>
                <div class="rw_buttons_section">
                    <?php
                    if ($isAdminLogged) {
                        echo "<table><tr><td>";
                        if ($model->aloneItem->active == 1) {
                            echo Html::beginForm(['/site/sud'], 'post');
                            echo Html::hiddenInput('SudModel[action]', 'deActivateItem');
                            echo Html::hiddenInput('SudModel[itemId]', $model->aloneItem->id);
                            echo Html::submitButton(
                                    'Убрать с публикации', ['class' => 'aui-button']
                            );
                            echo Html::endForm();
                        } else {
                            echo Html::beginForm(['/site/sud'], 'post');
                            echo Html::hiddenInput('SudModel[action]', 'activateItem');
                            echo Html::hiddenInput('SudModel[itemId]', $model->aloneItem->id);
                            echo Html::submitButton(
                                    'Опубликовать', ['class' => 'aui-button']
                            );
                            echo Html::endForm();
                        }
                        echo "</td><td>";
                        echo Html::beginForm(['/site/sud'], 'post');
                        echo Html::hiddenInput('SudModel[action]', 'editItem');
                        echo Html::hiddenInput('SudModel[itemId]', $model->aloneItem->id);
                        echo Html::submitButton(
                                'Редактировать', ['class' => 'aui-button']
                        );
                        echo Html::endForm();
                        echo "</td><td>";
                        echo Html::beginForm(['/site/sud'], 'post');
                        echo Html::hiddenInput('SudModel[action]', 'deleteItem');
                        echo Html::hiddenInput('SudModel[itemId]', $model->aloneItem->id);
                        echo Html::submitButton(
                            'Удалить', ['class' => 'aui-button', 'onclick' => 'return confirm("БЕЗВОЗВРАТНО!!! ПРОДОЛЖАЕМ?")']
                        );
                        echo Html::endForm();
                        echo "</td></tr></table>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<center><h2>Запрошенный пост не существует :(</h2></center>";
    }
}
?>