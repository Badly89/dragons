<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Users;
use yii\helpers\Url;
use rmrevin\yii\fontawesome\FAS;

$tagsAllowed = "<dl></dl><dt></dt><dd></dd><div></div><a><p><span><img><br><tr><table></tr><td></td></table><h1><h2><h3><h4><ul><li><ol><blockquote><span><sup></h1></h2></h3></h4></ul></li></ol></blockquote></span></sup><sub></sub><iframe></iframe>";
?>
<script>
// function toggleView($id) {
//     $el = document.getElementById($id);
//     if ($el.style.display === "none") {
//         $el.style.display = "block";
//     } else {
//         $el.style.display = "none";
//     }
// }

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
        <?= Html::submitButton('<i class="fas fa-tasks pr-2"></i>Управление разделами', ['class' => 'btn btn-light', 'name' => 'login-button']) ?>
    </div>
</div>
<?php ActiveForm::end();
    }
    // Display sections
    iF (sizeof($model->sections) == 0) {
        echo "<hr><p>Ещё нет ни одного раздела.</p>";
    } else {
        echo displaySectionsNew($model);
    }
}

function displaySectionsNew($model, $editMode=false){
    echo("<div class=\"row\">");
    foreach ($model->sections as $section){
         ?>
<div class="col-xl-4 col-md-6 com-sm-12 mb-4">
    <div class="card border-dark text-white h-100 cursor-section card-lib"
        onclick="javascript:location.href='/library/s/<?= $section->id ?>/'">
        <?php if(!empty($section->img)){
            echo("<img src=\"$section->img\" class=\"card-img img-section\" alt=\"...\">");
            echo("<div class=\"card-img-overlay \">");
        } else{
            echo("<img src=\"/img/default.jpg\" class=\"card-img img-section\" alt=\"...\">"); 
                        echo("<div class=\"card-img-overlay\" >");
        }
        
        ?>
        <div class=" btn-edit-lib mb-2">
            <div class="group-btn">
                <?php 
                if($editMode){
                        if ($section->visible == 1) {
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'hideSection');
                            echo Html::hiddenInput('LibraryModel[itemId]', $section->id);
                            echo Html::submitButton('<i class="fas fa-eye-slash"></i>', ['class' => 'btn btn-outline-light btn-sm btn-no-border ', 'title'=>'Скрыть']);
                            echo Html::endForm();
            } else {
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'unHideSection');
                            echo Html::hiddenInput('LibraryModel[itemId]', $section->id);
                            echo Html::submitButton('<i class="fas fa-eye"></i>', ['class' => 'btn btn-outline-light btn-sm btn-no-border ', 'title'=>'Показать']);
                            echo Html::endForm();
            }

            // Edit controls
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'editSingleSection');
                            echo Html::hiddenInput('LibraryModel[itemId]', $section->id);
                            echo Html::submitButton('<i class="fas fa-edit"></i> ', ['class' => 'btn btn-outline-light btn-sm btn-no-border ', 'title'=>'Редактировать']);
                            echo Html::endForm();

            // Delete controls
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'deleteSection');
                            echo Html::hiddenInput('LibraryModel[itemId]', $section->id);
                            echo Html::submitButton('<i class="fas fa-trash"></i>', ['class' => 'btn btn-outline-light btn-sm btn-no-border ', 'title'=>'Удалить', 'onclick' => 'return confirm("БЕЗВОЗВРАТНО!!! ПРОДОЛЖАЕМ?")']);
                            echo Html::endForm();
            }
           ?>
            </div>
        </div>
        <div class="text-header-section">
            <h5 class="card-title p-2"><?= $section->title ?> </h5>
            <p class="card-text text-section"><?=  $section->description ?> </p>
        </div>
    </div>
    <?php
        ?>
</div>
</div>
<?php
    }
 echo("</div");
}

if ($model->mode == 'edit_sections') {
    if ($isAdminLogged) {
        $this->title = 'Управление разделами ';
        $this->params['breadcrumbs'][] = ['label' => 'Библиотека', 'url' => ['library']];
        $this->params['breadcrumbs'][] = $this->title;

        // Add new section controls

        ?>

<button type="button" class="btn btn-light mb-5" data-toggle="modal" data-target="#newSection"><i
        class="far fa-plus-square pr-2"></i> Новый
    раздел</button>
<!-- Модальное окно -->
<div class="modal fade" id="newSection" tabindex="-1" aria-labelledby="newSectionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSectionLabel"> Новый раздел</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
            $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'form-group'],
                'layout' => 'horizontal',
                'fieldConfig' => [
                   'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                   'horizontalCssClasses' => [
                   'label' => 'col-sm-6',
                   'offset' => 'offset-sm-4',
                   'wrapper' => 'col-sm-12',
                   'error' => '',
                   'hint' => '',
        ],
                ],
            ]);
            ?>
                <?= Html::hiddenInput('LibraryModel[action]', 'addNewSection'); ?>
                <?= $form->field($model, 'section_title')->textInput(['class'=>'col-form-label form-control','autofocus' => true, ])->label('Заголовок') ?>
                <?= $form->field($model, 'section_description')->textInput(['class'=>'col-form-label form-control','autofocus' => false])->label('Краткое описание') ?>
                <?= $form->field($model, 'section_img')->textInput(['class'=>'col-form-label form-control','autofocus' => false])->label('Ссылка на изображение') ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-light', 'name' => 'login-button', 'onclick' => 'return submitNewPost()']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


<?php
        // Display sections
        iF (sizeof($model->sections) == 0) {
            echo "<hr><p>Ещё нет ни одного раздела.</p>";
        } else {
            echo displaySectionsNew($model, true);
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

<!-- Button trigger modal -->
<button type="button" class="btn btn-light mb-3" data-toggle="modal" data-target="#newItem">
    <i class="far fa-newspaper pr-2"></i> Создать новую статью в этом разделе
</button>

<!-- Модальное окно -->
<div class="modal fade" id="newItem" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="newItemLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content modal-content-newItem">
            <div class="modal-header">
                <h5 class="modal-title" id="newItemLabel">Добавление новой статьи</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
        $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"\">{input}</div>\n<div class=\"\">{error}</div>",
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

                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return submitNewPost()']) ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>


<?php
    }

    if (!is_array($model->section_items) || sizeof($model->section_items) == 0) {
        echo "<p><h2>Тут ещё ничего нет :(</h2></p>";
    } else {
        displayItems($model, $isAdminLogged, $tagsAllowed);
    }
}

function displayItems($model, $isAdminLogged, $tagsAllowed)
{
    echo("<div class=\"row \">");
    foreach ($model->section_items as $item) {
        ?>
<div class="col-xl-4 col-md-6 col-sm-12 mb-5 items-lib">
    <div class="card h-100 cursor-section card-lib" title="Нажать для открытия статьи"
        onclick="javascript:location.href='/library/view/<?= $item->id ?>/' " style="
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
        <div class="card-header header-post">
            <div class="not-personal mb-3">
                <div class="page-metadata" style="
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
                    <?= $item->date_added ?>
                </div>
                <div class="system-button">
                    <?php
                    if ($isAdminLogged) {
                        if ($item->active == 1) {
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'deActivateItem');
                            echo Html::hiddenInput('LibraryModel[itemId]', $item->id);
                            echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->id);
                            echo Html::submitButton(
                                 // 'Убрать с публикации', ['class' => 'aui-button']
                                     Yii::t('app', '{icon} ', ['icon' => FAS::icon('eye-slash')]),['class' => 'btn btn-light btn-sm  ', 'title'=>'Убрать с публикации']
                            );
                            echo Html::endForm();
                        } else {
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'activateItem');
                            echo Html::hiddenInput('LibraryModel[itemId]', $item->id);
                            echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->id);
                            echo Html::submitButton(
                                // 'Опубликовать', ['class' => 'aui-button']
                                    Yii::t('app', '{icon} ', ['icon' => FAS::icon('eye')]),['class' => 'btn btn-light btn-sm  ', 'title'=>'Опубликовать']
                            );
                            echo Html::endForm();
                        }
                        if ($item->pinned == 1) {
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'unpinItem');
                            echo Html::hiddenInput('LibraryModel[itemId]', $item->id);
                            echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->id);
                            echo Html::submitButton(
                               // 'Открепить', ['class' => 'aui-button']
                                     Yii::t('app', '{icon} ', ['icon' => FAS::icon('unlink')]),['class' => 'btn btn-light btn-sm', 'title'=>'Открепить']
                            );
                            echo Html::endForm();
                        } else {
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'pinItem');
                            echo Html::hiddenInput('LibraryModel[itemId]', $item->id);
                            echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->id);
                            echo Html::submitButton(
                               // 'Закрепить', ['class' => 'aui-button']
                                     Yii::t('app', '{icon} ', ['icon' => FAS::icon('link')]),['class' => 'btn btn-light btn-sm', 'title'=>'Закрепить']
                            );
                            echo Html::endForm();
                        }
                        echo Html::beginForm(['/site/library'], 'post');
                        echo Html::hiddenInput('LibraryModel[action]', 'editItem');
                        echo Html::hiddenInput('LibraryModel[itemId]', $item->id);
                        echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->id);
                        echo Html::submitButton(
                            // 'Редактировать', ['class' => 'aui-button']
                                 Yii::t('app', '{icon} ', ['icon' => FAS::icon('edit')]),['class' => 'btn btn-light btn-sm', 'title'=>'Редактировать']
                        );
                        echo Html::endForm();
                    }
                    ?>
                </div>
            </div>
            <h5 class="card-title"><?php
                        echo Html::a(
                            strip_tags(stripslashes($item->title), $tagsAllowed), Url::to([
                            '/site/library', 'action' => 'view', 'id' => $item->id
                        ]), [
                                'style' => [
                                    'color' => '#666',
                                    'cursor' => 'pointer',
                                    // 'display' => 'block',
                                    // 'font-size' => '20pt',
                                    // 'font-weight' => 'bold',
                                    // 'line-height' => 'normal',
                                    'padding' => '5px 0',
                                    'text-decoration' => 'none',
                                    // 'word-wrap' => 'break-word'
                                ]
                            ]
                        );
                        ?></h5>

        </div>
        <div class="card-body">
            <p class="align-self-center">
                <?= strip_tags(stripslashes($item->short_text), $tagsAllowed) ?>
            </p>
        </div>

        <div class="card-footer footer-post">
            <!-- <?php
                    echo Html::a(
                        '<i class="fab fa-readme"></i>  Подробнее', Url::to([
                        '/site/library', 'action' => 'view', 'id' => $item->id
                    ]), [
                            'class' => 'btn btn-light btn-sm aui-button'
                        ]
                    );
                    ?> -->

        </div>
    </div>
</div>
<?php
    }
    echo("</div>");
}

if ($isAdminLogged && $model->mode != "editItem" && $model->mode != "viewSeparate" && $model->mode != "edit_sections" && $model->mode != "show_sections" && $model->mode != "viewSectionContent" && $model->mode != "editSingleSection") {
    //Admin controls
    ?>
<script src="<?= Yii::$app->request->baseUrl ?>/js/jquery-3.6.0.min.js"></script>
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
    textareaEditorShort = textboxio.replace('#short_text', config);
    textareaEditorFull = textboxio.replace('#full_text', config);
});
</script>
<br><br>
<input type="button" value="Новая запись" class='aui-button' onclick="toggleView('newItem')" />
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
<div class="rw_blogpost_listing " style="
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
                <?= $item->date_added ?>
            </div>

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
            'options' =>['class'=>'form-group'],
            'layout' => 'horizontal',
            'fieldConfig' => [
             'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'offset' => 'col-sm-offset-4',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
            ],
        ],
        ]);
        ?>
    <?= Html::hiddenInput('LibraryModel[action]', 'finalizeEditSection'); ?>
    <?= Html::hiddenInput('LibraryModel[itemId]', $model->itemId); ?>
    <?= $form->field($model, 'section_title')->textInput(['autofocus' => true, 'style' => 'width:500px'])->label('Заголовок') ?>
    <?= $form->field($model, 'section_description')->textInput(['autofocus' => false, 'style' => 'width:500px'])->label('Краткое описание') ?>
    <?= $form->field($model, 'section_img')->textInput(['autofocus' => false, 'style' => 'width:500px'])->label('Ссылка на изображение') ?>

    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary ', 'name' => 'login-button', 'onclick' => 'return submitNewPost()']) ?>

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
<script src="<?= Yii::$app->request->baseUrl ?>/js/jquery-3.6.0.min.js"></script>
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
        <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return confirm("Продолжаем?")']) ?>

    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php
}
if ($model->mode == "viewSeparate") {
    $this->title = strip_tags(stripslashes($model->aloneItem->title));
    $this->params['breadcrumbs'][] = ['label' => 'Библиотека', 'url' => ['library']];
    $this->params['breadcrumbs'][] = ['label' => $model->separate_view_section->title, 'url' => [Yii::$app->request->baseUrl , 's' , $model->separate_view_section->id], 'originalLink' => true];
    ?>
<br><br>

<?php
    if ($model->aloneItem->active == 1 || ($model->aloneItem->active == 0 && $isAdminLogged)) {
        $this->params['breadcrumbs'][] = $this->title;
        ?>

<div class="card " style="
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
    <div class="card-header header-post">
        <div class="not-personal">
            <div style="
                         color: #707070;
                         font-size: 12px;
                         line-height: 1.5;
                         "><?= $model->aloneItem->date_added ?>
            </div>
            <div class="system-button">
                <?php
                    if ($isAdminLogged) {
                        if ($model->aloneItem->active == 1) {
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'deActivateItem');
                            echo Html::hiddenInput('LibraryModel[itemId]', $model->aloneItem->id);
                            echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->separate_view_section->id);
                            echo Html::submitButton(
                                 // 'Убрать с публикации', ['class' => 'aui-button']
                                     Yii::t('app', '{icon} ', ['icon' => FAS::icon('eye-slash')]),['class' => 'btn btn-light btn-sm ', 'title'=>'Убрать с публикации']
                            );
                            echo Html::endForm();
                        } else {
                            echo Html::beginForm(['/site/library'], 'post');
                            echo Html::hiddenInput('LibraryModel[action]', 'activateItem');
                            echo Html::hiddenInput('LibraryModel[itemId]', $model->aloneItem->id);
                            echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->separate_view_section->id);
                            echo Html::submitButton(
                                 // 'Опубликовать', ['class' => 'aui-button']
                                    Yii::t('app', '{icon} ', ['icon' => FAS::icon('eye')]),['class' => 'btn btn-light btn-sm', 'title'=>'Опубликовать']
                            );
                            echo Html::endForm();
                        }
                        echo Html::beginForm(['/site/library'], 'post');
                        echo Html::hiddenInput('LibraryModel[action]', 'editItem');
                        echo Html::hiddenInput('LibraryModel[itemId]', $model->aloneItem->id);
                        echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->separate_view_section->id);
                        echo Html::submitButton(
                             // 'Редактировать', ['class' => 'aui-button']
                                 Yii::t('app', '{icon} ', ['icon' => FAS::icon('edit')]),['class' => 'btn btn-light btn-sm', 'title'=>'Редактировать статью']
                        );
                        echo Html::endForm();
                        echo Html::beginForm(['/site/library'], 'post');
                        echo Html::hiddenInput('LibraryModel[action]', 'deleteItem');
                        echo Html::hiddenInput('LibraryModel[itemId]', $model->aloneItem->id);
                        echo Html::hiddenInput('LibraryModel[loadSectionId]', $model->separate_view_section->id);
                        echo Html::submitButton(
                            // 'Удалить', ['class' => 'aui-button', 'onclick' => 'return confirm("БЕЗВОЗВРАТНО!!! ПРОДОЛЖАЕМ?")']
                            Yii::t('app', '{icon} ', ['icon' => FAS::icon('trash')]),['class' => 'btn btn-light btn-sm  ', 'title'=>'Редактировать','onclick' => 'return confirm("БЕЗВОЗВРАТНО!!! ПРОДОЛЖАЕМ?")']
                        );
                        echo Html::endForm();
                    }
                    ?>
            </div>
        </div>
        <div class="mb-3">
            <?php
                         echo Html::a(
                             strip_tags(stripslashes($model->aloneItem->title), $tagsAllowed), Url::to([
                             '/site/library', 'action' => 'view', 'id' => $model->aloneItem->id
                         ]), [
                                 'class' => 'rw_blogpost_heading_link',
                                 'style' => [
                                     'color' => '#666',
                                     'cursor' => 'pointer',
                                    //  'display' => 'block',
                                    //  'font-size' => '20pt',
                                    //  'font-weight' => 'bold',
                                    //  'line-height' => 'normal',
                                     'padding' => '5px 0',
                                     'text-decoration' => 'none',
                                     'word-wrap' => 'break-word'
                                 ]
                             ]
                         );
                         ?>
        </div>
    </div>
    <div class="card-body">
        <?= strip_tags(stripslashes($model->aloneItem->full_text), $tagsAllowed) ?>
    </div>
</div>
<?php
    } else {
        echo "<center><h2>Запрошенный пост не существует :(</h2></center>";
    }
}
?>