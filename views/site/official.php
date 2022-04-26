<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Users;
use yii\helpers\Url;
use rmrevin\yii\fontawesome\FAR;
use rmrevin\yii\fontawesome\FAS;

$tagsAllowed = "<dl></dl><dt></dt><dd></dd><div></div><a><p><span><img><br><tr><table></tr><td></td></table><h1><h2><h3><h4><ul><li><ol><blockquote><span><sup></h1></h2></h3></h4></ul></li></ol></blockquote></span></sup><sub></sub><iframe></iframe>";
?>


<?php
$isAdminLogged = false;
if (!Yii::$app->user->isGuest) {
    if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
        $isAdminLogged = true;
    }
}

if ($isAdminLogged && $model->mode != "editItem" && $model->mode != "viewSeparate") {
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
<button type="button" class="btn btn-light btn-new-post mb-3" data-toggle="modal" data-target="#addNewPost">
    <?php echo FAR::icon('plus-square'); ?> Новая запись

</button>
<div class="modal fade" data-backdrop="static" id="addNewPost" tabindex="-1" aria-labelledby="addNewPostLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl ">
        <div class="modal-content modal-content-newItem">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewPostLabel">Добавить новую запись</h5>
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


                <?= Html::hiddenInput('OfficialModel[action]', 'addNewPost'); ?>

                <?= $form->field($model, 'title')->textInput(['autofocus' => true, 'style' => 'width:900px'])->label('Заголовок') ?>

                <?= $form->field($model, 'short_text')->textarea(['id' => 'short_text', 'style' => 'width:600px; height:250px'])->label('Короткий текст') ?>

                <?php $model->active = 0; ?>
                <?php $model->pinned = 0; ?>

                <?= $form->field($model, 'full_text')->textarea(['id' => 'full_text', 'style' => 'width:900px; height:550px'])->label('Полный текст') ?>

                <?= $form->field($model, 'pinned')->checkbox()->label('Закрепить') ?>

                <?= $form->field($model, 'active')->checkbox()->label('Опубликовать сразу') ?>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return submitNewPost()']) ?>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>


            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
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

// function toggleView($id) {
//     $el = document.getElementById($id);
//     if ($el.style.display === "none") {
//         $el.style.display = "block";
//     } else {
//         $el.style.display = "none";
//     }
// }
</script>
<?php
}


if ($model->mode == "viewAll") {
    $this->title = 'Официально';
    $this->params['breadcrumbs'][] = $this->title;
    if (sizeof($model->items) > 0) {
        echo "<div class=\"row\"> ";
        foreach ($model->items as $item) {
            
            ?>
<div class="col-xl-6 col-sm-12 mb-4 ">
    <div class="card h-100 official-post " style="
                  
            <?php
            if ($item->active == 1) {
                echo "box-shadow: 0 0 15px rgba(0, 0, 0);";
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
                <div class="page-metadata " style="
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
                <div class="system-button ">
                    <?php
                        if ($isAdminLogged) {
                            // echo "<table><tr><td>";
                            if ($item->active == 1) {
                                echo Html::beginForm(['/site/official'], 'post');
                                echo Html::hiddenInput('OfficialModel[action]', 'deActivateItem');
                                echo Html::hiddenInput('OfficialModel[itemId]', $item->id);
                                echo Html::submitButton(
                                    // 'Убрать с публикации', ['class' => 'aui-button']
                                     Yii::t('app', '{icon} ', ['icon' => FAS::icon('eye-slash')]),['class' => 'btn btn-light btn-sm  ', 'title'=>'Убрать с публикации']
                                );
                                echo Html::endForm();
                            } else {
                                echo Html::beginForm(['/site/official'], 'post');
                                echo Html::hiddenInput('OfficialModel[action]', 'activateItem');
                                echo Html::hiddenInput('OfficialModel[itemId]', $item->id);
                                echo Html::submitButton(
                                    // 'Опубликовать', ['class' => 'aui-button']
                                    Yii::t('app', '{icon} ', ['icon' => FAS::icon('eye')]),['class' => 'btn btn-light btn-sm  ', 'title'=>'Опубликовать']
                                );
                                echo Html::endForm();
                            }
                            // echo "</td>";

                            // echo "<td>";
                            if ($item->pinned == 1) {
                                echo Html::beginForm(['/site/official'], 'post');
                                echo Html::hiddenInput('OfficialModel[action]', 'unpinItem');
                                echo Html::hiddenInput('OfficialModel[itemId]', $item->id);
                                echo Html::submitButton(
                                    // 'Открепить', ['class' => 'aui-button']
                                     Yii::t('app', '{icon} ', ['icon' => FAS::icon('unlink')]),['class' => 'btn btn-light btn-sm', 'title'=>'Открепить']
                                );
                                echo Html::endForm();
                            } else {
                                echo Html::beginForm(['/site/official'], 'post');
                                echo Html::hiddenInput('OfficialModel[action]', 'pinItem');
                                echo Html::hiddenInput('OfficialModel[itemId]', $item->id);
                                echo Html::submitButton(
                                    // 'Закрепить', ['class' => 'aui-button']
                                     Yii::t('app', '{icon} ', ['icon' => FAS::icon('link')]),['class' => 'btn btn-light btn-sm', 'title'=>'Закрепить']
                                );
                                echo Html::endForm();
                            }
                            // echo "</td>";
                            // echo "<td>";
                            echo Html::beginForm(['/site/official'], 'post');
                            echo Html::hiddenInput('OfficialModel[action]', 'editItem');
                            echo Html::hiddenInput('OfficialModel[itemId]', $item->id);
                            echo Html::submitButton(
                                // 'Редактировать', ['class' => 'aui-button']
                                 Yii::t('app', '{icon} ', ['icon' => FAS::icon('edit')]),['class' => 'btn btn-light btn-sm', 'title'=>'Редактировать']
                            );
                            echo Html::endForm();
                            // echo "</td>";
                            // echo "</tr></table>";
                        }
                        ?>
                </div>
            </div>

            <h5 class="card-title"><?php
                        echo Html::a(
                            strip_tags(stripslashes($item->title), $tagsAllowed), Url::to([
                            '/site/official', 'action' => 'view', 'id' => $item->id
                        ]), [   
                                 'style' => [
                                     'color' => '#666',
                                     'cursor' => 'pointer',
                                //     'display' => 'block',
                                //     'font-size' => '20pt',
                                //     'font-weight' => 'bold',
                                //     'line-height' => 'normal',
                                    'padding' => '5px 0',
                                    'text-decoration' => 'none',
                                //     'word-wrap' => 'break-word'
                                 ]
                            ]
                        );
                        ?>
            </h5>
        </div>

        <div class="card-body">
            <?= strip_tags(stripslashes($item->short_text), $tagsAllowed) ?>
        </div>
        <div class="card-footer footer-post">
            <div class="rw_buttons_section">
                <?php
                        echo Html::a(
                            '<i class="fab fa-readme"></i> Подробнее', Url::to([
                            '/site/official', 'action' => 'view', 'id' => $item->id
                        ]), [
                              'class'=>'btn btn-light btn-sm aui-button',
                            ]
                        );
                        ?>

            </div>
        </div>

    </div>
</div>
<?php
   
    }
    } else {
        echo "<center><br><br><h2>Ещё ничего нету у нас тут</h2></center>";
    }
     echo "</div>";
}

if ($model->mode == "editItem" && $isAdminLogged) {
    $this->title = 'Редактирование записи "' . strip_tags(stripslashes($model->title)) . '"';
    $this->params['breadcrumbs'][] = ['label' => 'Официально', 'url' => ['official']];
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
            ?>
    <?= Html::hiddenInput('OfficialModel[action]', 'finalizeEdit'); ?>

    <?= $form->field($model, 'itemId')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'title')->textInput(['autofocus' => true, 'style' => 'width:900px'])->label('Заголовок') ?>

    <?= $form->field($model, 'short_text')->textarea(['id' => 'short_text', 'style' => 'width:900px; height:250px'])->label('Короткий текст') ?>

    <?= $form->field($model, 'full_text')->textarea(['id' => 'full_text', 'style' => 'width:900px; height:550px'])->label('Полный текст') ?>

    <div class="form-group post-edit-form">
        <div class="">
            <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-primary btn-save', 'name' => 'login-button', 'onclick' => 'return confirm("Продолжаем?")']) ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php
}
if ($model->mode == "viewSeparate") {
    $this->title = strip_tags(stripslashes($model->aloneItem->title));
    $this->params['breadcrumbs'][] = ['label' => 'Официально', 'url' => ['official']];
    $this->params['breadcrumbs'][] = $this->title;
    ?>
<br><br>

<?php
    if ($model->aloneItem->active == 1 || ($model->aloneItem->active == 0 && $isAdminLogged)) {
        ?>

<div class="card" style="
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
                            echo Html::beginForm(['/site/official'], 'post');
                            echo Html::hiddenInput('OfficialModel[action]', 'deActivateItem');
                            echo Html::hiddenInput('OfficialModel[itemId]', $model->aloneItem->id);
                            echo Html::submitButton(
                                    // 'Убрать с публикации', ['class' => 'aui-button']
                                     Yii::t('app', '{icon} ', ['icon' => FAS::icon('eye-slash')]),['class' => 'btn btn-light btn-sm ', 'title'=>'Убрать с публикации']
                                );
                            echo Html::endForm();
                        } else {
                            echo Html::beginForm(['/site/official'], 'post');
                            echo Html::hiddenInput('OfficialModel[action]', 'activateItem');
                            echo Html::hiddenInput('OfficialModel[itemId]', $model->aloneItem->id);
                            echo Html::submitButton(
                                    // 'Опубликовать', ['class' => 'aui-button']
                                    Yii::t('app', '{icon} ', ['icon' => FAS::icon('eye')]),['class' => 'btn btn-light btn-sm', 'title'=>'Опубликовать']
                                );
                            echo Html::endForm();
                        }
                        echo Html::beginForm(['/site/official'], 'post');
                        echo Html::hiddenInput('OfficialModel[action]', 'editItem');
                        echo Html::hiddenInput('OfficialModel[itemId]', $model->aloneItem->id);
                        echo Html::submitButton(
                                // 'Редактировать', ['class' => 'aui-button']
                                 Yii::t('app', '{icon} ', ['icon' => FAS::icon('edit')]),['class' => 'btn btn-light btn-sm', 'title'=>'Редактировать']
                            );
                        echo Html::endForm();
                        echo Html::beginForm(['/site/official'], 'post');
                        echo Html::hiddenInput('OfficialModel[action]', 'deleteItem');
                        echo Html::hiddenInput('OfficialModel[itemId]', $model->aloneItem->id);
                        echo Html::submitButton(
                            // 'Удалить', ['class' => 'aui-button', 'onclick' => 'return confirm("БЕЗВОЗВРАТНО!!! ПРОДОЛЖАЕМ?")']
                            Yii::t('app', '{icon} ', ['icon' => FAS::icon('trash')]),['class' => 'btn btn-light btn-sm  ', 'title'=>'Редактировать','onclick' => 'return confirm("БЕЗВОЗВРАТНО!!! ПРОДОЛЖАЕМ?")']
                        );
                        echo Html::endForm();
                    }
                    ?>
            </div>
        </div>
        <h5 class="mb-3">
            <?php
                         echo Html::a(
                             strip_tags(stripslashes($model->aloneItem->title), $tagsAllowed), Url::to([
                             '/site/official', 'action' => 'view', 'id' => $model->aloneItem->id
                         ]), [
                                 'class' => 'card-title ',
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
        </h5>
    </div>
    <div class="">
        <div class="card-text">
            <?= strip_tags(stripslashes($model->aloneItem->full_text), $tagsAllowed) ?>
        </div>

    </div>
</div>
<?php
    } else {
        echo "<center><h2>Запрошенный пост не существует :(</h2></center>";
    }
}
?>