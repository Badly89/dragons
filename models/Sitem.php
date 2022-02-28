<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use Yii;
use Text;
use yii\base\Model;
use app\models\Users;
use app\models\Loginip;
use app\models\Zayavka;

class Sitem extends \yii\base\Model {

    public $id;
    public $action;

    public function rules() {
        return [
            [['id', 'action'], 'emptyValidate']
        ];
    }

    public function performActions() {
        if (strlen($this->action) > 0) {
            if ($this->action == "cleanZayavka") {
                if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                    $zayavka = Zayavka::findZayavkaById($this->id);
                    $zayavka->status = "new";
                    $zayavka->otkaz_text = "";
                    $zayavka->active = 1;
                    $zayavka->date_last_update = "";
                    $zayavka->save();

                    $actions = Actions::findActionsByZid($this->id);
                    foreach ($actions as $action) {
                        if ($action->action != "flashStatus") {
                            $action->delete();
                        }
                    }
                    $action = new Actions();
                    $action->zayavka_id = $this->id;
                    $action->active = 0;
                    $action->action = "flashStatus";
                    $action->dragon_id = Yii::$app->user->getId();
                    $action->date = date('d-m-Y H:i:s');
                    $action->save();
                }
            }
        }
    }

    public function emptyValidate() {
        
    }

}
