<?php

use app\models\Users;
use yii\helpers\Html;

$this->title = 'Логи системы';
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['superadmin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .row {
        border: 1px solid black;
        height: 25px;
    }
    
    .bold {
        font-weight: bold;
    }
    
    td {
        /*border: 1px solid black;*/
        padding: 2px;
    }


</style>
<table style="width: 100%">
    <tr class="row" style="background-color: #666666; color: white">
        <td class="bold">
            USER_ID
        </td>        
        <td class="bold">
            USERNAME
        </td>                
        <td class="bold">
            IP
        </td>               
        <td class="bold">
            ACTION
        </td>         
        <td class="bold">
            DATE/TIME
        </td>                 
        <td class="bold">
            RESULT
        </td>                
    </tr>
    <?php

    if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
        echo Html::beginForm(['/site/logs'], 'post');
        echo Html::hiddenInput('Logs[action]', 'clearLogs');
        echo Html::submitButton(
            'Удалить логи', ['class' => 'btn btn-primary', 'onclick' => 'return confirm("Удаляем? ЭТО ОТМЕНИТЬ НЕЛЬЗЯ")']
        );
        echo Html::endForm();
        echo "<br><hr>";
    }

    foreach ($model->logs as $log) {
        $backColor = "#FFF";
        if ($log->result == "FAIL" || $log->result == "REJECTED") {
            $backColor = "#ffcac9";
        }
        if ($log->result == "SUCCESS" || $log->result == "APPROVED") {
            $backColor = "#cdffc9";
        }
        ?>
        <tr style="background-color: <?= $backColor ?>" class="row">
            <td>
                <?= $log->user_id ?>
            </td>
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
    ?>
</table>