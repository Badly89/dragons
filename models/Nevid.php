<?php

namespace app\models;

use Yii;
use Text;
use yii\base\Model;
use app\models\Users;
use app\models\Loginip;
use app\models\Zayavka;
use app\models\Dragonsrights;
use app\models\LastActiveActions;
use app\models\ZayavkaUserView;

class Nevid extends \yii\base\Model {

    public $action;
    public $userId;
    public $user;
    public $dragonSettings;
    public $dragonRights;
    public $dragonRight;
    public $zayavkiArray;
    public $z_id;
    public $z_actions;
    public $zayavka;
    public $new_action;
    public $comment;

    public function rules() {
        return [
            [['action'], 'required'],
            [['userName', 'approver', 'dragonName', 'dragonid', 'superadmin',
            'kovcheg', 'smorye', 'utes', 'boss', 'boi_prov', 'per_prov', 'boi',
            'peredachi','comment', 'new_action', 'z_actions', 'zayavka', 'dragonRight', 'fullbp', 'alias', 'prokli', 'katorga', 'z_id', 'ban', 'chistota', 'nevid'], 'emptyValidate']
        ];
    }

    public function processAction() {
        $isDragon = false;
        if (Users::findGroupById(Yii::$app->user->getId()) > 9) {
            $isDragon = true;
        }
        if ($this->action == "nevid_done_chist" && $isDragon) {
            if ($this->dragonRights->nevid == 1) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $proceed = false;
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "dopproverka_bp") !== false || strpos($z_action->action, "dopproverka_p") !== false) {
                        $proceed = true;
                    }
                }
                if ($proceed) {
                    $this->zayavka = Zayavka::findZayavkaById($this->z_id);
                    if ($this->zayavka->active == 1) {
                        $this->new_action = new Actions();
                        $this->new_action->dragon_id = Yii::$app->user->getId();
                        $this->new_action->action = "nevid_done_chist";
                        $this->new_action->active = 1;
                        $this->new_action->zayavka_id = $this->z_id;
                        $this->new_action->notes = nl2br($this->comment);
                        $this->new_action->date = date('d-m-Y H:i:s');
                        $this->new_action->save();

                        $this->zayavka->status = "chist";
                        //$this->zayavka->otkaz_text = nl2br($this->comment);
                        $this->zayavka->active = 0;
                        $this->zayavka->date_last_update = date('d-m-Y H:i:s');
                        $this->zayavka->save();
                    }
                }
            }
        }
        if ($this->action == "nevid_done_katorga" && $isDragon) {
            if ($this->dragonRights->nevid == 1) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $proceed = false;
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "dopproverka_bp") !== false || strpos($z_action->action, "dopproverka_p") !== false) {
                        $proceed = true;
                    }
                }
                if ($proceed) {
                    $this->zayavka = Zayavka::findZayavkaById($this->z_id);
                    if ($this->zayavka->active == 1) {
                        $this->new_action = new Actions();
                        $this->new_action->dragon_id = Yii::$app->user->getId();
                        $this->new_action->action = "nevid_done_katorga";
                        $this->new_action->active = 1;
                        $this->new_action->zayavka_id = $this->z_id;
                        $this->new_action->notes = nl2br($this->comment);
                        $this->new_action->date = date('d-m-Y H:i:s');
                        $this->new_action->save();

                        $this->zayavka->status = "katorga";
                        $this->zayavka->otkaz_text = nl2br($this->comment);
                        $this->zayavka->active = 0;
                        $this->zayavka->date_last_update = date('d-m-Y H:i:s');
                        $this->zayavka->save();
                    }
                }
            }
        }
        if ($this->action == "nevid_done_prokli" && $isDragon) {
            if ($this->dragonRights->nevid == 1) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $proceed = false;
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "dopproverka_bp") !== false || strpos($z_action->action, "dopproverka_p") !== false) {
                        $proceed = true;
                    }
                }
                if ($proceed) {
                    $this->zayavka = Zayavka::findZayavkaById($this->z_id);
                    if ($this->zayavka->active == 1) {
                        $this->new_action = new Actions();
                        $this->new_action->dragon_id = Yii::$app->user->getId();
                        $this->new_action->action = "nevid_done_prokli";
                        $this->new_action->active = 1;
                        $this->new_action->zayavka_id = $this->z_id;
                        $this->new_action->notes = nl2br($this->comment);
                        $this->new_action->date = date('d-m-Y H:i:s');
                        $this->new_action->save();

                        $this->zayavka->status = "prokli";
                        $this->zayavka->otkaz_text = nl2br($this->comment);
                        $this->zayavka->active = 0;
                        $this->zayavka->date_last_update = date('d-m-Y H:i:s');
                        $this->zayavka->save();
                    }
                }
            }
        }
        if ($this->action == "nevid_done_block" && $isDragon) {
            if ($this->dragonRights->nevid == 1) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $proceed = false;
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "dopproverka_bp") !== false || strpos($z_action->action, "dopproverka_p") !== false) {
                        $proceed = true;
                    }
                }
                if ($proceed) {
                    $this->zayavka = Zayavka::findZayavkaById($this->z_id);
                    if ($this->zayavka->active == 1) {
                        $this->new_action = new Actions();
                        $this->new_action->dragon_id = Yii::$app->user->getId();
                        $this->new_action->action = "nevid_done_block";
                        $this->new_action->active = 1;
                        $this->new_action->zayavka_id = $this->z_id;
                        $this->new_action->notes = nl2br($this->comment);
                        $this->new_action->date = date('d-m-Y H:i:s');
                        $this->new_action->save();

                        $this->zayavka->status = "block";
                        $this->zayavka->otkaz_text = nl2br($this->comment);
                        $this->zayavka->active = 0;
                        $this->zayavka->date_last_update = date('d-m-Y H:i:s');
                        $this->zayavka->save();
                    }
                }
            }
        }
        if ($this->action == "nevid_done_otkaz" && $isDragon) {
            if ($this->dragonRights->nevid == 1) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $proceed = false;
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "dopproverka_bp") !== false || strpos($z_action->action, "dopproverka_p") !== false) {
                        $proceed = true;
                    }
                }
                if ($proceed) {
                    $this->zayavka = Zayavka::findZayavkaById($this->z_id);
                    if ($this->zayavka->active == 1) {
                        $this->new_action = new Actions();
                        $this->new_action->dragon_id = Yii::$app->user->getId();
                        $this->new_action->action = "nevid_done_otkaz";
                        $this->new_action->active = 1;
                        $this->new_action->zayavka_id = $this->z_id;
                        $this->new_action->notes = nl2br($this->comment);
                        $this->new_action->date = date('d-m-Y H:i:s');
                        $this->new_action->save();

                        $this->zayavka->status = "otkaz";
                        $this->zayavka->otkaz_text = nl2br($this->comment);
                        $this->zayavka->active = 0;
                        $this->zayavka->date_last_update = date('d-m-Y H:i:s');
                        $this->zayavka->save();
                    }
                }
            }
        }
    }

    public function getNevidZayavki($dragonRights) {
        $cities = [];
        $this->zayavkiArray = [];
        if ($dragonRights->kovcheg == 1) {
            array_push($cities, "kovcheg");
        }
        if ($dragonRights->smorye == 1) {
            array_push($cities, "smorye");
        }
        if ($dragonRights->utes == 1) {
            array_push($cities, "utes");
        }
        if (sizeof($cities) > 0) {
            $commonCalculation = LastActiveActions::getNevidReadyItems($cities);
        }
        if (sizeof($commonCalculation) > 0) {
            foreach ($commonCalculation as $id) {
                array_push($this->zayavkiArray, ZayavkaUserView::getZayavkaUserViewById($id));
            }
        }
    }
    
    public function emptyValidate() {}

}
