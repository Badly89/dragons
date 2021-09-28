<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Users;
use yii\helpers\Url;

$tagsAllowed = "<div></div><a><p><span><img><br><tr><table></tr><td></td></table><h1><h2><h3><h4><ul><li><ol><blockquote><span><sup></h1></h2></h3></h4></ul></li></ol></blockquote></span></sup><sub></sub><iframe></iframe>";
?>
    <script>
        function toggleView($id) {
            $el = document.getElementById($id);
            if ($el.style.display === "none") {
                $el.style.display = "block";
            } else {
                $el.style.display = "none";
            }
        }

        function submitNewPost() {
            if (confirm("Продолжаем?")) {
                //textareaEditorShort.restore();
                //textareaEditorFull.restore();
                return true;
            } else {
                return false;
            }
        }
    </script>
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

        table th {
            text-align: center;
            height: 25px;
            font-size: 16px;
            background-color: #515152;
            color: white;
            font-weight: bold
        }

        table.section {
            cursor: pointer;
        }

        table.section:hover {
            box-shadow: 0 0 34px #00FF04;
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
    if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
        $isAdminLogged = true;
    }
}

if ($model->mode == 'show_sections') {
    $this->title = 'Библиотека';
    $this->params['breadcrumbs'][] = $this->title;
    if ($isAdminLogged) {
        // Edit section button
        $form = ActiveForm::begin([
            'id' => 'login-form', 'layout' => 'horizontal', 'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-2 control-label', 'style' => ['white-space' => 'nowrap']],
            ],
        ]);
        ?>
        <?= Html::hiddenInput('LibraryModel[action]', 'edit_sections'); ?>
        <div class="form-group">
            <div class="col-lg-offset-0 col-lg-11">
                <?= Html::submitButton('Управление разделами', ['class' => 'aui-button', 'name' => 'login-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end();
    }
    // Display sections
    iF (sizeof($model->sections) == 0) {
        echo "<hr><p>Ещё нет ни одного раздела.</p>";
    } else {
        echo displaySections($model);
    }
}

function displaySections($model, $editMode = false)
{
    $content = '<div style="padding: 30px"><table><tr>';
    $newLine = true;
    $line_counter = 1;
    foreach ($model->sections as $section) {
        // close line and start new
        if ($line_counter == 4) {
            $content .= '</tr><tr>';
            $line_counter = 1;
        }


        $content .= '<td style="padding: 10px; height: 300px; width: 300px">';
        if ($editMode) {
            $content .= '<table class="section">';
        } else {
            $content .= '<table class="section" onclick="javascript:location.href=\'/library/s/' . $section->id . '/\'">';
        }
        $content .= '<tr>
                                <th>
                                    ' . $section->title . '    
                                </th>
                            </tr>                            
                            <tr>
                                <th>
                                    <img width="340px" height="340px" src="' . $section->img . '">    
                                </th>
                            </tr>                            
                            <tr>
                                <th style="font-size:13px;">
                                    ' . $section->description . ' 
                                </th>
                            </tr>';
        if ($editMode) {
            $content .= '<tr>
                            <th>
                                <table>
                                    <tr>';

            // Show/hide controls
            if ($section->visible == 1) {
                $content .= '<td>';
                $content .= Html::beginForm(['/site/library'], 'post');
                $content .= Html::hiddenInput('LibraryModel[action]', 'hideSection');
                $content .= Html::hiddenInput('LibraryModel[itemId]', $section->id);
                $content .= Html::submitButton('Скрыть', ['class' => 'aui-button']);
                $content .= Html::endForm();
                $content .= '</td>';
            } else {
                $content .= '<td>';
                $content .= Html::beginForm(['/site/library'], 'post');
                $content .= Html::hiddenInput('LibraryModel[action]', 'unHideSection');
                $content .= Html::hiddenInput('LibraryModel[itemId]', $section->id);
                $content .= Html::submitButton('Показать', ['class' => 'aui-button']);
                $content .= Html::endForm();
                $content .= '</td>';
            }

            // Edit controls
            $content .= '<td>';
            $content .= Html::beginForm(['/site/library'], 'post');
            $content .= Html::hiddenInput('LibraryModel[action]', 'editSingleSection');
            $content .= Html::hiddenInput('LibraryModel[itemId]', $section->id);
            $content .= Html::submitButton('Редактировать', ['class' => 'aui-button']);
            $content .= Html::endForm();
            $content .= '</td>';

            // Delete controls
            $content .= '<td>';
            $content .= Html::beginForm(['/site/library'], 'post');
            $content .= Html::hiddenInput('LibraryModel[action]', 'deleteSection');
            $content .= Html::hiddenInput('LibraryModel[itemId]', $section->id);
            $content .= Html::submitButton('Удалить', ['class' => 'aui-button', 'onclick' => 'return confirm("БЕЗВОЗВРАТНО!!! ПРОДОЛЖАЕМ?")']);
            $content .= Html::endForm();
            $content .= '</td>';


            $content .= '    </tr>
                                </table>
                            </th>
                        </tr>';
        }
        $content .= '</table></td>';
        $line_counter++;
    }

    for ($i = $line_counter; $i < 4; $i++) {
        $content .= '<td></td>';
    }

    $content .= '</tr></table></div>';
    return $content;
}

if ($model->mode == 'edit_sections') {
    if ($isAdminLogged) {
        $this->title = 'Управление разделами ';
        $this->params['breadcrumbs'][] = ['label' => 'Библиотека', 'url' => ['library']];
        $this->params['breadcrumbs'][] = $this->title;

        // Add new section controls

        ?>
        <input type="button" value="Новый раздел" class='aui-button' onclick="toggleView('newSection')"/>
        <div style="display: none; padding: 15px; " id="newSection">
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
            <?= Html::hiddenInput('LibraryModel[action]', 'addNewSection'); ?>
            <?= $form->field($model, 'section_title')->textInput(['autofocus' => true, 'style' => 'width:500px'])->label('Заголовок') ?>
            <?= $form->field($model, 'section_description')->textInput(['autofocus' => false, 'style' => 'width:500px'])->label('Краткое описание') ?>
            <?= $form->field($model, 'section_img')->textInput(['autofocus' => false, 'style' => 'width:500px'])->label('Ссылка на изображение') ?>
            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return submitNewPost()']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <?php
        // Display sections
        iF (sizeof($model->sections) == 0) {
            echo "<hr><p>Ещё нет ни одного раздела.</p>";
        } else {
            echo displaySections($model, true);
        }
    } else {
        echo 'Hack attempt?';
    }
}

if ($model->mode == 'viewSectionContent') {
    $this->title = $model->separate_view_section->title;
    $this->params['breadcrumbs'][] = ['label' => 'Библиотека', 'url' => ['library']];
    $this->params['breadcrumbs'][] = $this->title;

    // Control for admin
    if ($isAdminLogged) {
        ?>
        <input type="button" value="Создать новую статью в этом разделе" class='aui-button'
               onclick="toggleView('newItem')"/>
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

        <?= Html::hiddenInput('LibraryModel[action]', 'addNewPost'); ?>
        <?= Html::hiddenInput('LibraryModel[new_item_section_id]', $model->id); ?>
        <?= $form->field($model, 'title')->textInput(['autofocus' => true, 'style' => 'width:900px'])->label('Заголовок') ?>
        <?= $form->field($model, 'short_text')->textarea(['id' => 'short_text', 'style' => 'width:900px; height:250px'])->label('Короткий текст') ?>
        <?php $model->active = 0; ?>
        <?php $model->pinned = 0; ?>
        <?= $form->field($model, 'full_text')->textarea(['id' => 'full_text', 'style' => 'width:900px; height:550px'])->label('Полный текст') ?>
        <?= $form->field($model, 'pinned')->checkbox()->label('Закрепить') ?>
        <?= $form->field($model, 'active')->checkbox()->label('Опубликовать сразу') ?>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return submitNewPost()']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        </div><?php
    }

    if (!is_array($model->section_items) || sizeof($model->section_items) == 0) {
        echo "<p><h2>Тут ещё ничего нет :(</h2></p>";
    } else {
        displayItems($model, $isAdminLogged, $tagsAllowed);
    }
}

function displayItems($model, $isAdminLogged, $tagsAllowed)
{
    foreach ($model->section_items as $item) {
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
                             ">
                                 <?php
                                 if ($item->pinned == 1) {
                                     ?>
                                     <img width="18px" src="<?= Yii::$app->request->baseUrl ?>/img/pinned.png">
                                     <?php
                                 }
                                 ?>
                            <?= $item->date_added ?></div>

                        <?php
                        echo Html::a(
                            strip_tags(stripslashes($item->title), $tagsAllowed), Url::to([
                            '/site/library', 'action' => 'view', 'id' => $item->id
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
                        '/site/library', 'action' => 'view', 'id' => $item->id
                    ]), [
                            'class' => 'aui-button'
                        ]
                    );
                    ?>
                    <?php
                    if ($isAdminLogged) {
                        echo "<table><tr><td>";
                        if ($item->active == 1) {
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'deActivateItem');
                            echo Html::hiddenInput('LibraryModel[itemId]', $item->id);
                            echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->id);
                            echo Html::submitButton(
                                'Убрать с публикации', ['class' => 'aui-button']
                            );
                            echo Html::endForm();
                        } else {
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'activateItem');
                            echo Html::hiddenInput('LibraryModel[itemId]', $item->id);
                            echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->id);
                            echo Html::submitButton(
                                'Опубликовать', ['class' => 'aui-button']
                            );
                            echo Html::endForm();
                        }
                        echo "</td>";

                        echo "<td>";
                        if ($item->pinned == 1) {
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'unpinItem');
                            echo Html::hiddenInput('LibraryModel[itemId]', $item->id);
                            echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->id);
                            echo Html::submitButton(
                                'Открепить', ['class' => 'aui-button']
                            );
                            echo Html::endForm();
                        } else {
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'pinItem');
                            echo Html::hiddenInput('LibraryModel[itemId]', $item->id);
                            echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->id);
                            echo Html::submitButton(
                                'Закрепить', ['class' => 'aui-button']
                            );
                            echo Html::endForm();
                        }
                        echo "</td>";
                        echo "<td>";
                        echo Html::beginForm(['/site/library'], 'post');
                        echo Html::hiddenInput('LibraryModel[action]', 'editItem');
                        echo Html::hiddenInput('LibraryModel[itemId]', $item->id);
                        echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->id);
                        echo Html::submitButton(
                            'Редактировать', ['class' => 'aui-button']
                        );
                        echo Html::endForm();
                        echo "</td>";
                        echo "</tr></table>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
}

if ($isAdminLogged && $model->mode != "editItem" && $model->mode != "viewSeparate" && $model->mode != "edit_sections" && $model->mode != "show_sections" && $model->mode != "viewSectionContent" && $model->mode != "editSingleSection") {
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
                    showButton: true  // Hides the code view button, default is true (shown)
                }
            };
            textareaEditorShort = textboxio.replace('#short_text', config);
            textareaEditorFull = textboxio.replace('#full_text', config);
        });
    </script>
    <br><br>
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


        <?= Html::hiddenInput('LibraryModel[action]', 'addNewPost'); ?>

        <?= $form->field($model, 'title')->textInput(['autofocus' => true, 'style' => 'width:900px'])->label('Заголовок') ?>

        <?= $form->field($model, 'short_text')->textarea(['id' => 'short_text', 'style' => 'width:900px; height:250px'])->label('Короткий текст') ?>

        <?php $model->active = 0; ?>
        <?php $model->pinned = 0; ?>

        <?= $form->field($model, 'full_text')->textarea(['id' => 'full_text', 'style' => 'width:900px; height:550px'])->label('Полный текст') ?>

        <?= $form->field($model, 'pinned')->checkbox()->label('Закрепить') ?>

        <?= $form->field($model, 'active')->checkbox()->label('Опубликовать сразу') ?>


        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return submitNewPost()']) ?>
            </div>

        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <?php
}

if ($model->mode == "viewAll") {
    $this->title = 'Библиотека';
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
                             ">
                                 <?php
                                 if ($item->pinned == 1) {
                                     ?>
                                     <img width="18px" src="<?= Yii::$app->request->baseUrl ?>/img/pinned.png">
                                     <?php
                                 }
                                 ?>
                            <?= $item->date_added ?></div>

                        <?php
                        echo Html::a(
                            strip_tags(stripslashes($item->title), $tagsAllowed), Url::to([
                            '/site/library', 'action' => 'view', 'id' => $item->id
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
                            '/site/library', 'action' => 'view', 'id' => $item->id
                        ]), [
                                'class' => 'aui-button'
                            ]
                        );
                        ?>
                        <?php
                        if ($isAdminLogged) {
                            echo "<table><tr><td>";
                            if ($item->active == 1) {
                                echo Html::beginForm(['/site/library'], 'post');
                                echo Html::hiddenInput('LibraryModel[action]', 'deActivateItem');
                                echo Html::hiddenInput('LibraryModel[itemId]', $item->id);
                                echo Html::submitButton('Убрать с публикации', ['class' => 'aui-button']);
                                echo Html::endForm();
                            } else {
                                echo Html::beginForm(['/site/library'], 'post');
                                echo Html::hiddenInput('LibraryModel[action]', 'activateItem');
                                echo Html::hiddenInput('LibraryModel[itemId]', $item->id);
                                echo Html::submitButton('Опубликовать', ['class' => 'aui-button']);
                                echo Html::endForm();
                            }
                            echo "</td>";

                            echo "<td>";
                            if ($item->pinned == 1) {
                                echo Html::beginForm(['/site/library'], 'post');
                                echo Html::hiddenInput('LibraryModel[action]', 'unpinItem');
                                echo Html::hiddenInput('LibraryModel[itemId]', $item->id);
                                echo Html::submitButton('Открепить', ['class' => 'aui-button']);
                                echo Html::endForm();
                            } else {
                                echo Html::beginForm(['/site/library'], 'post');
                                echo Html::hiddenInput('LibraryModel[action]', 'pinItem');
                                echo Html::hiddenInput('LibraryModel[itemId]', $item->id);
                                echo Html::submitButton('Закрепить', ['class' => 'aui-button']);
                                echo Html::endForm();
                            }
                            echo "</td>";
                            echo "<td>";
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'editItem');
                            echo Html::hiddenInput('LibraryModel[itemId]', $item->id);
                            echo Html::submitButton('Редактировать', ['class' => 'aui-button']);
                            echo Html::endForm();
                            echo "</td>";
                            echo "</tr></table>";
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

if($model->mode == "editSingleSection" && $isAdminLogged){
    $this->title = 'Редактирование раздела "' . strip_tags(stripslashes($model->section_title)) . '"';
    $this->params['breadcrumbs'][] = ['label' => 'Библиотека', 'url' => ['library']];
    $this->params['breadcrumbs'][] = $this->title;
    ?>
    <div style="padding: 15px; " id="editSection">
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
        <?= Html::hiddenInput('LibraryModel[action]', 'finalizeEditSection'); ?>
        <?= Html::hiddenInput('LibraryModel[itemId]', $model->itemId); ?>
        <?= $form->field($model, 'section_title')->textInput(['autofocus' => true, 'style' => 'width:500px'])->label('Заголовок') ?>
        <?= $form->field($model, 'section_description')->textInput(['autofocus' => false, 'style' => 'width:500px'])->label('Краткое описание') ?>
        <?= $form->field($model, 'section_img')->textInput(['autofocus' => false, 'style' => 'width:500px'])->label('Ссылка на изображение') ?>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return submitNewPost()']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <?php
}

if ($model->mode == "editItem" && $isAdminLogged) {
    $this->title = 'Редактирование записи "' . strip_tags(stripslashes($model->title)) . '"';
    $this->params['breadcrumbs'][] = ['label' => 'Библиотека', 'url' => ['library']];
    $this->params['breadcrumbs'][] = ['label' => $model->separate_view_section->title, 'url' => [Yii::$app->request->baseUrl . '/library/s/' . $model->separate_view_section->id . '/'], 'originalLink' => true];
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
                    showButton: true  // Hides the code view button, default is true (shown)
                }
            };
            textareaEditorShort = textboxio.replace('#short_text', config);
            textareaEditorFull = textboxio.replace('#full_text', config);
        });
    </script>
    <br><br>

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
        $model->loadSectionId = $model->separate_view_section->id;
        ?>
        <?= Html::hiddenInput('LibraryModel[action]', 'finalizeEdit'); ?>

        <?= $form->field($model, 'itemId')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'loadSectionId')->hiddenInput()->label(false) ?>
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

    <?php
}
if ($model->mode == "viewSeparate") {
    $this->title = strip_tags(stripslashes($model->aloneItem->title));
    $this->params['breadcrumbs'][] = ['label' => 'Библиотека', 'url' => ['library']];
    $this->params['breadcrumbs'][] = ['label' => $model->separate_view_section->title, 'url' => [Yii::$app->request->baseUrl . '/library/s/' . $model->separate_view_section->id . '/'], 'originalLink' => true];

    ?>
    <br><br>

    <?php
    if ($model->aloneItem->active == 1 || ($model->aloneItem->active == 0 && $isAdminLogged)) {
        $this->params['breadcrumbs'][] = $this->title;
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
                             '/site/library', 'action' => 'view', 'id' => $model->aloneItem->id
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
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'deActivateItem');
                            echo Html::hiddenInput('LibraryModel[itemId]', $model->aloneItem->id);
                            echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->separate_view_section->id);
                            echo Html::submitButton(
                                'Убрать с публикации', ['class' => 'aui-button']
                            );
                            echo Html::endForm();
                        } else {
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'activateItem');
                            echo Html::hiddenInput('LibraryModel[itemId]', $model->aloneItem->id);
                            echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->separate_view_section->id);
                            echo Html::submitButton(
                                'Опубликовать', ['class' => 'aui-button']
                            );
                            echo Html::endForm();
                        }
                        echo "</td><td>";
                        echo Html::beginForm(['/site/library'], 'post');
                        echo Html::hiddenInput('LibraryModel[action]', 'editItem');
                        echo Html::hiddenInput('LibraryModel[itemId]', $model->aloneItem->id);
                        echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->separate_view_section->id);
                        echo Html::submitButton(
                            'Редактировать', ['class' => 'aui-button']
                        );
                        echo Html::endForm();
                        echo "</td><td>";
                        echo Html::beginForm(['/site/library'], 'post');
                        echo Html::hiddenInput('LibraryModel[action]', 'deleteItem');
                        echo Html::hiddenInput('LibraryModel[itemId]', $model->aloneItem->id);
                        echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->separate_view_section->id);
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