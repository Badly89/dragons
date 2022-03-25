<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Params;
use yii\helpers\Url;
use app\models\Users;

$this->title = 'Профиль пользователя ' . $model->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['superadmin']];
$this->params['breadcrumbs'][] = $this->title;
$settings = new Params();
$settings->loadSettings();

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ($model->user->groupId > 9) {
    echo "<span style=\"color:red\">Dr </span>";
}
echo "<a target=\"blank\" href=\"http://kovcheg2.apeha.ru/info.html?nick=" . $model->user->username . "\">" . $model->user->username . "</a>";
echo " &nbsp;[Зарегистрирован: " . $model->user->date_registered . " с IP: " . $model->user->ips . "]";
//-----------------------------------------------------DRAGON--------------------------------------------

if ($model->user->groupId > 9) {
    if ($model->user->id == Yii::$app->user->getId()) {
        //allow to change ALIAS
        echo "<hr>";
        $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]);
        $model->action = 'updateAlias';
        $model->alias = $model->user->alias;
        echo $form->field($model, 'action')->hiddenInput()->label(false);
        echo $form->field($model, 'userId')->hiddenInput()->label(false);
        echo $form->field($model, 'alias')->textInput()->label('Подпись');
        ?>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Изменить подпись', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return validateAlias()'], ['id' => 'submit']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
<?php
    }
    if ($model->adminUserRights->superadmin == 1 ||
        ($model->adminUserRights->boss == 1 AND (
                ($model->adminUserRights->kovcheg == 1 AND $model->dragonrights->kovcheg == 1) ||
                ($model->adminUserRights->smorye == 1 AND $model->dragonrights->smorye == 1) ||
                ($model->adminUserRights->utes == 1 AND $model->dragonrights->utes == 1)))) {
        $model->superadmin = $model->dragonrights->superadmin;
        $model->kovcheg = $model->dragonrights->kovcheg;
        $model->smorye = $model->dragonrights->smorye;
        $model->utes = $model->dragonrights->utes;
        $model->boss = $model->dragonrights->boss;
        $model->boi_prov = $model->dragonrights->boi_prov;
        $model->per_prov = $model->dragonrights->per_prov;
        $model->boi = $model->dragonrights->boi;
        $model->peredachi = $model->dragonrights->peredachi;
        $model->fullbp = $model->dragonrights->fullbp;
        $model->prokli = $model->dragonrights->prokli;
        $model->katorga = $model->dragonrights->katorga;
        $model->ban = $model->dragonrights->ban;
        $model->chistota = $model->dragonrights->chistota;
        $model->nevid = $model->dragonrights->nevid;
        $model->approver = $model->dragonrights->approver;

        echo "<hr>Управление правами дракона: <br><br>";
        echo Html::beginForm(['/site/userprofile'], 'post');
        echo Html::hiddenInput('Userprofile[action]', 'updateDragonRights');
        echo Html::hiddenInput('Userprofile[userId]', $model->user->id);
        ?>
<table>
    <?php if ($model->adminUserRights->superadmin == 1) { ?>
    <tr>
        <td>
            Суперадмин:&nbsp;&nbsp;
        </td>
        <td colspan="3">
            <?= Html::activeCheckbox($model, 'superadmin', ['label' => false]) ?>
        </td>
    </tr>
    <tr>
        <td>
            Модератор:&nbsp;&nbsp;
        </td>
        <td colspan="3">
            <?= Html::activeCheckbox($model, 'approver', ['label' => false]) ?>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td>
            Города привязки:&nbsp;&nbsp;
        </td>
        <td>
            <?= Html::activeCheckbox($model, 'kovcheg', ['label' => 'Ковчег']) ?>&nbsp;&nbsp;
        </td>
        <td>
            <?= Html::activeCheckbox($model, 'smorye', ['label' => 'Сморка']) ?>&nbsp;&nbsp;
        </td>
        <td>
            <?= Html::activeCheckbox($model, 'utes', ['label' => 'Утёс']) ?>&nbsp;&nbsp;
        </td>
    </tr>
    <tr>
        <td>
            Начальство города:&nbsp;&nbsp;
        </td>
        <td colspan="3">
            <?= Html::activeCheckbox($model, 'boss', ['label' => false]) ?>
        </td>
    </tr>
    <tr>
        <td>
            Доступ уровней проверки:&nbsp;&nbsp;
        </td>
        <td>
            Стажёр:&nbsp;&nbsp;
        </td>
        <td>
            <?= Html::activeCheckbox($model, 'boi_prov', ['label' => 'Б/перепроверка&nbsp;&nbsp;']) ?>
        </td>
        <td>
            <?= Html::activeCheckbox($model, 'per_prov', ['label' => 'П/перепроверка&nbsp;&nbsp;']) ?>
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;&nbsp;
        </td>
        <td>
            &nbsp;&nbsp;
        </td>
        <td>
            <?= Html::activeCheckbox($model, 'boi', ['label' => 'Бои']) ?>
        </td>
        <td>
            <?= Html::activeCheckbox($model, 'peredachi', ['label' => 'Передачи']) ?>
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;&nbsp;
        </td>
        <td>
            ОП:&nbsp;&nbsp;
        </td>
        <td colspan="2">
            <?= Html::activeCheckbox($model, 'fullbp', ['label' => 'Б/П', 'onclick' => 'validateCheckbox("bp")']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Наказания:&nbsp;&nbsp;
        </td>
        <td>
            <?= Html::activeCheckbox($model, 'prokli', ['label' => 'Прокли', 'onclick' => 'validateCheckbox("prokli")']) ?>
        </td>
        <td>
            <?= Html::activeCheckbox($model, 'katorga', ['label' => 'Каторга', 'onclick' => 'validateCheckbox("katorga")']) ?>
        </td>
        <td>
            <?= Html::activeCheckbox($model, 'ban', ['label' => 'Блок', 'onclick' => 'validateCheckbox("block")']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Чистота:&nbsp;&nbsp;
        </td>
        <td colspan="3">
            <?= Html::activeCheckbox($model, 'chistota', ['label' => false, 'onclick' => 'validateCheckbox("chistota")']) ?>
        </td>
    </tr>
    <tr>
        <td>
            Невид:&nbsp;&nbsp;
        </td>
        <td colspan="3">
            <?= Html::activeCheckbox($model, 'nevid', ['label' => false, 'onclick' => 'validateCheckbox("nevid")']) ?>
        </td>
    </tr>
</table>
<br>
<?php
        echo Html::submitButton(
            'Утвердить права', ['onclick' => 'return confirm("Это серъёзная штука. Уверены?")']
        );
        echo Html::endForm();

        echo "<hr>";
    }
}
//------------------------------------------------END DRAGON---------------------------------------------
//IPS
echo "<br><br>";
echo "<a href=\"javascript:toggleIpView()\">Просмотр информации о входах в систему</a>";
echo "<div id=\"ips\" style=\"display:none\">";
if (sizeof($model->loginips) > 0) {
    echo "<hr><table>";
    foreach ($model->loginips as $ip) {
        echo "<tr>";
        echo "<td>" . $ip->date . "&nbsp;&nbsp;&nbsp;-</td><td>&nbsp;&nbsp;&nbsp;" . $ip->ip . "</td>";
        echo "</tr>";
    }
    echo "</table><hr>";
} else {
    echo "<hr>Пользователь не входил в систему после регистрации<hr>";
}
echo "</div>";
//ZAYAVKI
echo "<br><br>";
echo "<a href=\"javascript:toggleZayavkiView()\">Просмотр информации о заявках на чистоту</a>";
echo "<div id=\"zayavki\" style=\"display:none\"><br>";
if (sizeof($model->userZayavki) > 0) {
    foreach ($model->userZayavki as $zayavka) {
        ?>

<table style="width:800px; border: 0px none; padding: 5px; background-color: <?= $settings->color_background ?>;
        <?php
        if ($zayavka->status == "new") {
            echo "box-shadow: 0 0 15px  grey";
        }
        if ($zayavka->status == "cancelled") {
            echo "box-shadow: 0 0 15px  " . $settings->color_cancelled;
        }
        if ($zayavka->status == "inprogress") {
            echo "box-shadow: 0 0 15px  " . $settings->color_inprogress;
        }
        if ($zayavka->status == "otkaz") {
            echo "box-shadow: 0 0 15px  " . $settings->color_otkaz;
        }
        if ($zayavka->status == "chist") {
            echo "box-shadow: 0 0 15px  " . $settings->color_chist;
        }
        if ($zayavka->status == "katorga") {
            echo "box-shadow: 0 0 15px  " . $settings->color_killed;
        }
        if ($zayavka->status == "prokli") {
            echo "box-shadow: 0 0 15px  " . $settings->color_killed;
        }
        if ($zayavka->status == "block") {
            echo "box-shadow: 0 0 15px  " . $settings->color_killed;
        }
        ?>
                ">
    <tr style="height: 40px">
        <td width="5%" style="padding: 5px;"><?php
                    echo Html::a(
                        '#' . $zayavka->id, Url::to([
                        '/site/sitem', 'id' => $zayavka->id
                    ])
                    );
                    ?>
        </td>
        <td width="25%" style="padding: 5px;"><a href="http://apeha.ru/info.html?user=<?= $model->user->apeha_id ?>"
                target="_blank"><?= $model->user->username ?></a></td>
        <td width="35%" style="padding: 5px;">Статус: <?= getStatus($zayavka->status) ?> </td>
        <td align="right" width="35%" style="padding: 5px;">Подана: <?= $zayavka->date_added ?></td>
    </tr>
    <tr>
        <td colspan="2" style="padding: 5px;">
            Тип:<?= $zayavka->type ?><br>
        </td>
        <td colspan="2" style="padding: 5px;">
            <?php
                    if (strlen($zayavka->city) > 0) {
                        echo "Город: " . $zayavka->city;
                    }
                    ?>
            <span style="font-size: 12px; font-style: italic">(Рассматривается в: <?= $zayavka->proverka_city ?>)</span>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <?php
                    echo Html::a(
                        "Показать в топе проверок", Url::to([
                        '/site/zlist', 'action' => 'show', 'zayavka' => $zayavka->id
                    ]), [
                            'style' => [
                                'color' => '#666',
                                'cursor' => 'pointer',
                                'display' => 'block',
                                'font-size' => '12px',
                                'font-weight' => 'bold',
                                'line-height' => 'normal',
                                'padding' => '10px',
                                'margin-top' => '-10px',
                                'text-decoration' => 'underline',
                                'word-wrap' => 'break-word'
                            ]
                        ]
                    );
                    ?>
        </td>
    </tr>
</table>
<br>
<?php
    }
} else {
    echo "<hr>У пользователя нет ни одной поданной заявки на чистоту<hr>";
}
echo "</div>";

// Delete user link
if ($model->user->groupId <= 9) {
    if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
        echo "<br><hr><br>";
        echo Html::beginForm(['/site/superadmin'], 'post');
        echo Html::hiddenInput('Superadmin[action]', 'deleteUser');
        echo Html::hiddenInput('Superadmin[userId]', $model->user->id);
        echo Html::submitButton(
            'Удалить юзера', ['class' => 'btn btn-primary', 'onclick' => 'return confirm("Удаляем? Точно? ЭТО ОТМЕНИТЬ НЕЛЬЗЯ")']
        );
        echo Html::endForm();
    }
}


//-------------------------------- F U N C T I O N S ----------------------------------
function getStatus($status)
{
    switch ($status) {
        case "cancelled":
            $result = "Отменена";
            break;
        case "inprogress":
            $result = "На проверке";
            break;
        case "closed":
            $result = "Закрыта";
            break;
        case "new":
            $result = "Новая";
            break;
        case "otkaz":
            $result = "Отказано";
            break;
        case "chist":
            $result = "Чистота выдана";
            break;
        case "katorga":
            $result = "Нарушения. Наказан каторгой";
            break;
        case "prokli":
            $result = "Нарушения. Наказан комплектом проклятий";
            break;
        case "block":
            $result = "Нарушения. Наказан блоком";
            break;
    }
    return $result;
}

?>

<script>
function validateAlias() {
    $element = document.getElementById("userprofile-alias");
    if ($element.value.toString().trim().length > 0) {
        return confirm("Изменить подпись на " + $element.value.toString().trim() + "?");
    } else {
        alert("Подпись на форуме не может быть пустой строкой");
        return false;
    }
}

function validateCheckbox($el) {
    $bp = document.getElementById("userprofile-fullbp");
    $b = document.getElementById("userprofile-boi");
    $p = document.getElementById("userprofile-peredachi");
    $b_prov = document.getElementById("userprofile-boi_prov");
    $p_prov = document.getElementById("userprofile-per_prov");
    $prokli = document.getElementById("userprofile-prokli");
    $katorga = document.getElementById("userprofile-katorga");
    $block = document.getElementById("userprofile-ban");
    $chistota = document.getElementById("userprofile-chistota");
    $nevid = document.getElementById("userprofile-nevid");
    if ($el === "bp") {
        if ($bp.checked === true) {
            $b.checked = false;
            $p.checked = false;
            $b_prov.checked = false;
            $p_prov.checked = false;
        } else {
            $prokli.checked = false;
            $katorga.checked = false;
            $block.checked = false;
            $chistota.checked = false;
            $nevid.checked = false;
        }
    }
    if ($el === "nevid") {
        if ($nevid.checked === true) {
            $b.checked = false;
            $p.checked = false;
            $b_prov.checked = false;
            $p_prov.checked = false;
            $chistota.checked = true;
            $block.checked = true;
            $katorga.checked = true;
            $prokli.checked = true;
            $bp.checked = true;
        }
    }
    if ($el === "chistota") {
        if ($chistota.checked === true) {
            $b.checked = false;
            $p.checked = false;
            $b_prov.checked = false;
            $p_prov.checked = false;
            $block.checked = true;
            $katorga.checked = true;
            $prokli.checked = true;
            $bp.checked = true;
        } else {
            $nevid.checked = false;
            $block.checked = false;
        }
    }
    if ($el === "block") {
        if ($block.checked === true) {
            $chistota.checked = true;
            $katorga.checked = true;
            $prokli.checked = true;
            $bp.checked = true;
            $b.checked = false;
            $p.checked = false;
            $b_prov.checked = false;
            $p_prov.checked = false;
        } else {
            $nevid.checked = false;
            $chistota.checked = false;
        }
    }
    if ($el === "katorga") {
        if ($katorga.checked === true) {
            $prokli.checked = true;
            $bp.checked = true;
            $b.checked = false;
            $p.checked = false;
            $b_prov.checked = false;
            $p_prov.checked = false;
        } else {
            $nevid.checked = false;
            $block.checked = false;
            $chistota.checked = false;
        }
    }
    if ($el === "prokli") {
        if ($prokli.checked === true) {
            $bp.checked = true;
            $b.checked = false;
            $p.checked = false;
            $b_prov.checked = false;
            $p_prov.checked = false;
        } else {
            $katorga.checked = false;
            $block.checked = false;
            $chistota.checked = false;
            $nevid.checked = false;
        }
    }

}

function toggleIpView() {
    $div = document.getElementById('ips');
    if ($div.style.display === 'none') {
        $div.style.display = 'block';
    } else {
        $div.style.display = 'none';
    }
}

function toggleZayavkiView() {
    $div = document.getElementById('zayavki');
    if ($div.style.display == 'none') {
        $div.style.display = 'block';
    } else {
        $div.style.display = 'none';
    }
}
</script>