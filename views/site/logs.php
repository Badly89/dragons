<?php

use app\models\Users;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Логи системы';
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['superadmin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.row {
    border: 1px solid black;
    /* height: 25px; */
}

.bold {
    font-weight: bold;
}

td {
    /*border: 1px solid black;*/
    padding: 2px;
}
</style>


<div class="card">
    <div class="card-header">
        <?php 
    if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
        echo Html::beginForm(['/site/logs'], 'post');
        echo Html::hiddenInput('Logs[action]', 'clearLogs');
        echo Html::submitButton(
            'Удалить логи', ['class' => 'btn btn-primary', 'onclick' => 'return confirm("Удаляем? ЭТО ОТМЕНИТЬ НЕЛЬЗЯ")']
        );
        echo Html::endForm();
        // echo "<br><hr>";
    }?>
    </div>
    <div class="card-body">
        <table class="table table-sm table-logs">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">
                        USER_ID
                    </th>
                    <th scope="col">
                        USERNAME
                    </th>
                    <th scope="col">
                        IP
                    </th>
                    <th scope="col">
                        ACTION
                    </th>
                    <th scope="col">
                        DATE/TIME
                    </th>
                    <th scope="col">
                        RESULT
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php

    // echo"";
    foreach ($model->logs as $log) {
        $backColor = "#FFF";
        $classTr = "table-light";
        if ($log->result == "FAIL" || $log->result == "REJECTED") {
            $backColor = "#ffcac9";
            $classTr = "table-danger";
            
        }
        if ($log->result == "SUCCESS" || $log->result == "APPROVED") {
            $backColor = "#cdffc9";
            $classTr = "table-success";
        }
        ?>


                <tr class="<?= $classTr ?>">

                    <th scope="row">
                        <?= $log->user_id ?>
                    </th>
                    <td>
                        <?= $log->username ?>
                    </td>
                    <td>
                        <?= $log->ip ?>
                    </td>
                    <td>
                        <?= $log->action ?>
                    </td>
                    <td>
                        <?= $log->date ?>
                    </td>
                    <td>
                        <?= $log->result ?>
                    </td>
                </tr>

                <?php
    }
    // echo" </tbody>";
    ?>
            </tbody>
        </table>
    </div>
</div>