<?php

namespace app\models;

use Yii;
use Text;
use yii\base\Model;
use app\models\Log;

class Logs extends \yii\base\Model
{


    public $user_id;
    public $username;
    public $ip;
    public $action;
    public $date;
    public $result;
    public $logs;

    public function rules()
    {
        return [[['action'], 'emptyValidate']];
    }

    public function proccessActions()
    {
        if ($this->action == "clearLogs") {
            Log::deleteAll();
        }
    }

    public function addRecord($user_id, $username, $ip, $action, $result)
    {
        $record = new Log();
        $record->user_id = $user_id;
        $record->username = $username;
        $record->ip = $ip;
        $record->date = date('d-m-Y H:i:s');
        $record->action = $action;
        $record->result = $result;
        $record->save();
    }

    public function loadLogs()
    {
        $this->logs = Log::find()->orderBy('id DESC')->all();
    }

    public function emptyValidate()
    {

    }
}