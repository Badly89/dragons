<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
?>
<style>
td {
    padding: 3px;
    font-size: 15px;
}
</style>



<?php
if ($model->action == "index") {
    $this->title = 'Подсчёт чистоты';
    $this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['superadmin']];
    $this->params['breadcrumbs'][] = $this->title;
}
if ($model->allow_run && $model->action != "view") {
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
    ?>


<?= Html::hiddenInput('CleaningModel[action]', 'createReport'); ?>


<div class="form-group">
    <div class="col-lg-offset-0 col-lg-11">
        <?= Html::submitButton('Сгенерировать отчёт', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'return submitNewPost()']) ?>
    </div>

</div>

<?php
    ActiveForm::end();
}
if ($model->action == "index") {
    if ($model->allowed_view) {
        if (sizeof($model->allReports) > 0) {
            echo "<br>";
            foreach ($model->allReports as $report) {
                echo Html::a(
                        'Отчёт от ' . $report->date, Url::to([
                            '/site/cleaning', 'id' => $report->id
                        ])
                );
                ?>

<!--<a href="<?= Yii::$app->request->baseUrl ?>/index.php?r=site/cleaning&CleaningModel[action]=view&CleaningModel[id]=<?= $report->id ?>">Отчёт от <?= $report->date ?></a>-->
<br><br>
<?php
            }
        } else {
            ?>
<center>
    <h1>Ещё не было сгенерировано ни одного отчёта</h1>
</center>
<?php
        }
    }
}
if ($model->action == "view") {
    if ($model->allowed_view) {
//text version
        $textAreaHeight = 30;
        $textVariantKovcheg = "_____________КОВЧЕГ____________\r\n\r\n";
        $textVariantSmorye = "_____________СМОРЬЕ____________\r\n\r\n";
        $textVariantUtes = "_____________УТЁС____________\r\n\r\n";
        //text version headers
        $textVariantKovcheg .= "Проверка по " . substr($model->report->date, 0, -8) . "\r\n\r\n";
        $textVariantSmorye .= "Проверка по " . substr($model->report->date, 0, -8) . "\r\n\r\n";
        $textVariantUtes .= "Проверка по " . substr($model->report->date, 0, -8) . "\r\n\r\n";
        //textversion main info
        //kovcheg
        $textVariantKovcheg .= "Всего заявок: " . $model->report->k_total . "\r\n";
        $textVariantKovcheg .= "Удовлетворено заявок: " . $model->report->k_chist . "\r\n";
        $textVariantKovcheg .= "Нарушения: " . (intval($model->report->k_banned) + intval($model->report->k_prokli) + intval($model->report->k_katorga));
        $textVariantKovcheg .= " (Каторга: " . $model->report->k_katorga;
        $textVariantKovcheg .= ", прокли: " . $model->report->k_prokli;
        $textVariantKovcheg .= ", блок: " . $model->report->k_banned . ")\r\n\r\n";
        $textVariantKovcheg .= "Дракон Бои/Передачи\r\n\r\n";
        foreach ($model->k_drag as $dr) {
            if (intval($dr->boi) > 0 || intval($dr->peredachi) > 0) {
                $textVariantKovcheg .= $dr->dr_name . " " . $dr->boi . "/" . $dr->peredachi . "\r\n";
                $textAreaHeight++;
            }
        }
        //smorye
        $textVariantSmorye .= "Всего заявок: " . $model->report->s_total . "\r\n";
        $textVariantSmorye .= "Удовлетворено заявок: " . $model->report->s_chist . "\r\n";
        $textVariantSmorye .= "Нарушения: " . (intval($model->report->s_banned) + intval($model->report->s_prokli) + intval($model->report->s_katorga));
        $textVariantSmorye .= " (Каторга: " . $model->report->s_katorga;
        $textVariantSmorye .= ", прокли: " . $model->report->s_prokli;
        $textVariantSmorye .= ", блок: " . $model->report->s_banned . ")\r\n\r\n";
        $textVariantSmorye .= "Дракон Бои/Передачи\r\n\r\n";
        foreach ($model->s_drag as $dr) {
            if (intval($dr->boi) > 0 || intval($dr->peredachi) > 0) {
                $textVariantSmorye .= $dr->dr_name . " " . $dr->boi . "/" . $dr->peredachi . "\r\n";
                $textAreaHeight++;
            }
        }
        //utes
        $textVariantUtes .= "Всего заявок: " . $model->report->u_total . "\r\n";
        $textVariantUtes .= "Удовлетворено заявок: " . $model->report->u_chist . "\r\n";
        $textVariantUtes .= "Нарушения: " . (intval($model->report->u_banned) + intval($model->report->u_prokli) + intval($model->report->u_katorga));
        $textVariantUtes .= " (Каторга: " . $model->report->u_katorga;
        $textVariantUtes .= ", прокли: " . $model->report->u_prokli;
        $textVariantUtes .= ", блок: " . $model->report->u_banned . ")\r\n\r\n";
        $textVariantUtes .= "Дракон Бои/Передачи\r\n\r\n";
        foreach ($model->u_drag as $dr) {
            if (intval($dr->boi) > 0 || intval($dr->peredachi) > 0) {
                $textVariantUtes .= $dr->dr_name . " " . $dr->boi . "/" . $dr->peredachi . "\r\n";
                $textAreaHeight++;
            }
        }

        $this->title = 'Отчёт чистоты от ' . $model->report->date;
        $this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['superadmin']];
        $this->params['breadcrumbs'][] = ['label' => 'Подсчёт чистоты', 'url' => ['cleaning']];
        $this->params['breadcrumbs'][] = $this->title;
        if ($model->report) {
            ?>
<center>
    <h3>Отчёт чистоты от <?= $model->report->date ?></h3>
</center>
<hr>
<h3>Ковчег:</h3>
<table>
    <tr>
        <td>
            Всего заявок:
        </td>
        <td>
            <?= $model->report->k_total ?>
        </td>
    </tr>
    <tr>
        <td>
            Отозваны:
        </td>
        <td>
            <?= $model->report->k_cancelled ?>
        </td>

    </tr>
    <tr>
        <td>
            Чисто:
        </td>
        <td>
            <?= $model->report->k_chist ?>
        </td>

    </tr>
    <tr>
        <td>
            Наказаны:
        </td>
        <td>
            <?php echo (intval($model->report->k_banned) + intval($model->report->k_prokli) + intval($model->report->k_katorga)); ?>
            (Прокли: <?= $model->report->k_prokli ?>, Каторга: <?= $model->report->k_katorga ?>, Блок:
            <?= $model->report->k_banned ?>)
        </td>

    </tr>
    <tr>
        <td>
            Отказано:
        </td>
        <td>
            <?= $model->report->k_otkaz ?>
        </td>

    </tr>
    <tr>
        <td>
            Доппроверок:
        </td>
        <td>
            <?= $model->report->k_nevid ?>
        </td>

    </tr>
</table>
<br>
<table style="border: 1px solid">
    <tr style="border: 1px solid">
        <td style="border: 1px solid">
            Дракон
        </td>
        <td style="border: 1px solid">
            Бои
        </td>
        <td style="border: 1px solid">
            Передачи
        </td>
        <td style="border: 1px solid">
            Отказы
        </td>
        <td style="border: 1px solid">
            Прокли
        </td>
        <td style="border: 1px solid">
            Каторги
        </td>
        <td style="border: 1px solid">
            Блоки
        </td>
        <td style="border: 1px solid">
            Чисто
        </td>
        <td style="border: 1px solid">
            Доппроверки
        </td>
    </tr>
    <?php
                foreach ($model->k_drag as $dr) {
                    ?>
    <tr style="border: 1px solid">
        <td style="border: 1px solid" align="center">
            <?= $dr->dr_name ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->boi ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->peredachi ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->otkaz ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->prokli ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->katorga ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->ban ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->chist ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->nevid ?>
        </td>
    </tr>
    <?php
                }
                ?>
</table>
<!--SMORYE -->
<hr>
<h3>Сморье:</h3>
<table>
    <tr>
        <td>
            Всего заявок:
        </td>
        <td>
            <?= $model->report->s_total ?>
        </td>
    </tr>
    <tr>
        <td>
            Отозваны:
        </td>
        <td>
            <?= $model->report->s_cancelled ?>
        </td>

    </tr>
    <tr>
        <td>
            Чисто:
        </td>
        <td>
            <?= $model->report->s_chist ?>
        </td>

    </tr>
    <tr>
        <td>
            Наказаны:
        </td>
        <td>
            <?php echo (intval($model->report->s_banned) + intval($model->report->s_prokli) + intval($model->report->s_katorga)); ?>
            (Прокли: <?= $model->report->s_prokli ?>, Каторга: <?= $model->report->s_katorga ?>, Блок:
            <?= $model->report->s_banned ?>)
        </td>

    </tr>
    <tr>
        <td>
            Отказано:
        </td>
        <td>
            <?= $model->report->s_otkaz ?>
        </td>

    </tr>
    <tr>
        <td>
            Доппроверок:
        </td>
        <td>
            <?= $model->report->s_nevid ?>
        </td>

    </tr>
</table>
<br>
<table style="border: 1px solid">
    <tr style="border: 1px solid">
        <td style="border: 1px solid">
            Дракон
        </td>
        <td style="border: 1px solid">
            Бои
        </td>
        <td style="border: 1px solid">
            Передачи
        </td>
        <td style="border: 1px solid">
            Отказы
        </td>
        <td style="border: 1px solid">
            Прокли
        </td>
        <td style="border: 1px solid">
            Каторги
        </td>
        <td style="border: 1px solid">
            Блоки
        </td>
        <td style="border: 1px solid">
            Чисто
        </td>
        <td style="border: 1px solid">
            Доппроверки
        </td>
    </tr>
    <?php
                foreach ($model->s_drag as $dr) {
                    ?>
    <tr style="border: 1px solid">
        <td style="border: 1px solid" align="center">
            <?= $dr->dr_name ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->boi ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->peredachi ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->otkaz ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->prokli ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->katorga ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->ban ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->chist ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->nevid ?>
        </td>
    </tr>
    <?php
                }
                ?>
</table>
<!--UTES -->
<hr>
<h3>Утёс:</h3>
<table>
    <tr>
        <td>
            Всего заявок:
        </td>
        <td>
            <?= $model->report->u_total ?>
        </td>
    </tr>
    <tr>
        <td>
            Отозваны:
        </td>
        <td>
            <?= $model->report->u_cancelled ?>
        </td>

    </tr>
    <tr>
        <td>
            Чисто:
        </td>
        <td>
            <?= $model->report->u_chist ?>
        </td>

    </tr>
    <tr>
        <td>
            Наказаны:
        </td>
        <td>
            <?php echo (intval($model->report->u_banned) + intval($model->report->u_prokli) + intval($model->report->u_katorga)); ?>
            (Прокли: <?= $model->report->u_prokli ?>, Каторга: <?= $model->report->u_katorga ?>, Блок:
            <?= $model->report->u_banned ?>)
        </td>

    </tr>
    <tr>
        <td>
            Отказано:
        </td>
        <td>
            <?= $model->report->u_otkaz ?>
        </td>

    </tr>
    <tr>
        <td>
            Доппроверок:
        </td>
        <td>
            <?= $model->report->u_nevid ?>
        </td>

    </tr>
</table>
<br>
<table style="border: 1px solid">
    <tr style="border: 1px solid">
        <td style="border: 1px solid">
            Дракон
        </td>
        <td style="border: 1px solid">
            Бои
        </td>
        <td style="border: 1px solid">
            Передачи
        </td>
        <td style="border: 1px solid">
            Отказы
        </td>
        <td style="border: 1px solid">
            Прокли
        </td>
        <td style="border: 1px solid">
            Каторги
        </td>
        <td style="border: 1px solid">
            Блоки
        </td>
        <td style="border: 1px solid">
            Чисто
        </td>
        <td style="border: 1px solid">
            Доппроверки
        </td>
    </tr>
    <?php
                foreach ($model->u_drag as $dr) {
                    ?>
    <tr style="border: 1px solid">
        <td style="border: 1px solid" align="center">
            <?= $dr->dr_name ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->boi ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->peredachi ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->otkaz ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->prokli ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->katorga ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->ban ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->chist ?>
        </td>
        <td style="border: 1px solid" align="center">
            <?= $dr->nevid ?>
        </td>
    </tr>
    <?php
                }
                ?>
</table>
<br>
<fieldset>
    <legend>Текстовая версия для форума</legend>
    <textarea cols="80" rows="<?= $textAreaHeight+1 ?>" style="resize: none">
                    <?= $textVariantKovcheg ?>
                    <?= $textVariantSmorye ?>
                    <?= $textVariantUtes ?>
                </textarea>
</fieldset>
<?php
        } else {
            ?>
<center>
    <h1>Нет такого отчёта</h1>
</center>
<?php
        }
    }
}