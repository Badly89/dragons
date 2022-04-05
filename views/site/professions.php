<?php

use app\models\Users;
use yii\bootstrap4\Accordion;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Dragonsrights;
$this->title = 'Редактирование профессий';

$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['superadmin']];
// $this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['settings']];
$this->params['breadcrumbs'][] = $this->title;


$commonProfession = $model->commonProfessions;
$kovchegProfessions = $model->kovchegProfessions;
$smoryeProfessions = $model->smoryeProfessions;
$utesProfessions = $model->utesProfessions;
?>
<div class="main-block">

    <div class="block-right mb-3 flex-grow-1">
        <div class="accordion" id="accordionProfs">
            <div class="card card-profs">
                <div class="card-header  card-header-profs" id="headingUnited">
                    <h5 class="mb-0 card-title card-title-profs">
                        <button class="btn btn-link btn-block text-left text-decoration-none btn-category collapsed"
                            type="button" data-toggle="collapse" data-target="#united" aria-expanded="false"
                            aria-controls="united">
                            <span style="color: #8e000b; " class="title-category">Единые</span>
                        </button>

                    </h5>
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#addUnited"
                        title="Добавить профессию">
                        <i class="far fa-plus-square"> Добавить профессию</i>
                    </button>
                </div>

                <div id="united" class="collapse " aria-labelledby="headingUnited" data-parent="#accordionProfs">
                    <div class="card-body">
                        <?php
                  if (is_array($model->commonProfessions) || is_object($model->commonProfessions)) {
                    listExistingItems($model->commonProfessions, $model);
                    }
              ?>
                    </div>
                </div>
                <!-- Модальное окно -->
                <div class="modal fade" id="addUnited" tabindex="-1" aria-labelledby="exampleUnitedLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <?php getNewProfessionForm($model, "common");?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-profs">
                <div class="card-header card-header-profs" id="headingKovheg">
                    <h5 class="mb-0 card-title card-title-profs">
                        <button class="btn btn-link btn-block text-left collapsed text-decoration-none btn-category"
                            type="button" data-toggle="collapse" data-target="#collapseKovcheg" aria-expanded="false"
                            aria-controls="collapseKovcheg">
                            <span style="color: #8e000b; " class="title-category">Ковчег</span>
                        </button>
                    </h5>
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal"
                        data-target="#addKovcheg" title="Добавить профессию">
                        <i class="far fa-plus-square"> Добавить профессию</i>
                    </button>
                </div>
                <div id="collapseKovcheg" class="collapse" aria-labelledby="headingKovheg"
                    data-parent="#accordionProfs">
                    <div class="card-body">
                        <?php 
                    if (is_array($model->kovchegProfessions) || is_object($model->kovchegProfessions)) {
                                listExistingItems($model->kovchegProfessions, $model);
                            }   
              
              ?>
                    </div>
                </div>
                <!-- Модальное окно -->
                <div class="modal fade" id="addKovcheg" tabindex="-1" aria-labelledby="exampleaddKovchegLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <?php getNewProfessionForm($model, "kovcheg");?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-profs">
                <div class="card-header card-header-profs" id="headingSmorye">
                    <h5 class="mb-0 card-title card-title-profs">
                        <button class="btn btn-link btn-block text-left collapsed text-decoration-none btn-category"
                            type="button" data-toggle="collapse" data-target="#collapseSmorye" aria-expanded="false"
                            aria-controls="collapseSmorye">
                            <span style="color: #8e000b;" class="title-category">Сморье</span>
                        </button>
                    </h5>
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#addSmorye"
                        title="Добавить профессию">
                        <i class="far fa-plus-square"> Добавить профессию</i>
                    </button>
                </div>
                <div id="collapseSmorye" class="collapse" aria-labelledby="headingSmorye" data-parent="#accordionProfs">
                    <div class="card-body">
                        <?php 
                       if (is_array($model->smoryeProfessions) || is_object($model->smoryeProfessions)) {
                            listExistingItems($model->smoryeProfessions, $model);
                        }
                        //  getNewProfessionForm($model, "smorye");
                   ?>
                    </div>
                </div>
                <!-- Модальное окно -->
                <div class="modal fade" id="addSmorye" tabindex="-1" aria-labelledby="exampleaddSmoryeLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <?php getNewProfessionForm($model, "smorye");?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-profs">
                <div class="card-header card-header-profs" id="headingUtes">
                    <h5 class="mb-0 card-title card-title-profs">
                        <button class="btn btn-link btn-block text-left collapsed text-decoration-none btn-category"
                            type="button" data-toggle="collapse" data-target="#collapseUtes" aria-expanded="false"
                            aria-controls="collapseUtes">
                            <span style="color: #8e000b;" class="title-category">Утёс</span>
                        </button>
                    </h5>

                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#addUtes"
                        title="Добавить профессию">
                        <i class="far fa-plus-square"> Добавить профессию</i>
                    </button>
                </div>
                <div id="collapseUtes" class="collapse" aria-labelledby="headingUtes" data-parent="#accordionProfs">
                    <div class="card-body">
                        <?php 
                    if (is_array($model->utesProfessions) || is_object($model->utesProfessions)) {
                        listExistingItems($model->utesProfessions, $model);
                    }
                    // getNewProfessionForm($model, "utes");
               
                ?>
                    </div>
                </div>
                <!-- Модальное окно -->
                <div class="modal fade" id="addUtes" tabindex="-1" aria-labelledby="exampleaddUtesLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <?php getNewProfessionForm($model, "utes");?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
function listExistingItems($professions, $model)
{
 

    foreach ($professions as $pr) {
        $btnText = $pr->active == 1 ? "<i class=\"fas fa-eye-slash\"></i>" : "<i class=\"fas fa-eye\"></i>";
        $btnTitle = $pr->active == 1 ? "Скрыть " : "Показать";
        $actionCurr = $pr->active == 1 ? "hide" : "show";
        $color = $pr->active == 1 ? "#00ff00" : "#500000";
        ?>
<table>
    <tr style="vertical-align: top; height: 2px">
        <td style="padding: 3px">
            <div class="form-group field-professionsmodel-view_name">
                <input type="text" class="form-control" value="<?php echo $pr->view_name ?>" disabled="disabled"
                    style="background-color: #f5f5f6; box-shadow: 0 0 20px  <?php echo $color ?>">

                <p class="help-block help-block-error"></p>
            </div>
        </td>
        <td style="padding: 3px">
            <div class="form-group field-professionsmodel-system_name">
                <input type="text" class="form-control" value="<?php echo $pr->system_name ?>" disabled="disabled"
                    style="background-color: #f5f5f6; box-shadow: 0 0 20px  <?php echo $color ?>">
                <p class="help-block help-block-error"></p>
            </div>
        </td>
        <td style="padding: 3px">
            <div class="form-group field-professionsmodel-category_name">
                <input type="text" class="form-control" value="<?php echo getBeautyCategoryName($pr->category) ?>"
                    disabled="disabled" style="background-color: #f5f5f6; box-shadow: 0 0 20px  <?php echo $color ?>">
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
            <button type="submit" class="btn btn-outline-info btn-sm" name="login-button"
                title=<?php echo $btnTitle; ?>><?php echo $btnText; ?></button>
        </td>
        <td style="padding: 3px">
            <button type="submit" class="btn btn-outline-danger btn-sm" name="login-button"
                onclick="return confirmDelete()" title="Удалить">
                <i class="fas fa-trash"></i>
            </button>
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
    echo $form->field($model, 'action')->hiddenInput(['value' => 'add','class'=>'m-0 form-control'])->label(false);
    echo $form->field($model, 'city')->hiddenInput(['class'=>'m-0 form-control','value' => $city ])->label(false);
    ?>

<div class="d-flex justify-content-between align-items-center ">
    <?php echo $form->field($model, 'view_name',['enableLabel' => false])->textInput(array('placeholder' => 'Название', 'class'=>'form-control ')); ?>
    <?php echo $form->field($model, 'system_name',['enableLabel' => false])->textInput(array('placeholder' => 'Транскрипция', 'class'=>'form-control ')); ?>

    <?php 
            $items =['klan' => 'Клан',
                    'naim' => 'Наймы',
                    'trav' => 'Травники',
                    'common' => 'Общие'];
            $params =['class'=>'form-control ', 'options' => ['klan' => ['Selected' => true]]];
    echo $form->field($model, 'category',['enableLabel' => false])->dropDownList($items,$params); 
    echo Html::submitButton('<i class="far fa-plus-square btn-sm"></i> Добавить ', ['class' => 'btn btn-outline-success mb-3', 'name' => 'login-button'], ['id' => 'submit']) ?>
</div>

<!-- </tr> -->
<?php
    ActiveForm::end();
}

function accessToCleanStat()
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

<script>
function confirmDelete() {
    return confirm('Удалить? Действие необратимо!');
}
</script>