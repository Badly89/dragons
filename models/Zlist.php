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
use app\models\Actions;
use app\models\ZayavkaUserView;

class Zlist extends \yii\base\Model {

    public $city;
    public $type;
    public $action;
    public $z_id;
    public $boi;
    public $peredachi;
    public $dragonsRight;
    public $z_actions;
    public $new_action;
    public $active_page;
    public $zayavka;
    public $comment;
    public $currentStatus;
    public $user_group;

    public function rules() {
        return [
            [['city', 'user_group', 'comment', 'type', 'action', 'z_id',
            'boi', 'active_page', 'peredachi', 'dragonsRight'], 'emptyValidate']
        ];
    }

    public function getCurrentStatus() {
        $result = "";
        $zayavka = Zayavka::findZayavkaById($this->z_id);
        if ($zayavka->status == "new") {
            $result = "new";
            return $result;
        }
        if ($zayavka->active == 0) {
            $result = "finished";
            return $result;
        }
        $actions = Actions::findActiveActionsByZid($this->z_id);
        foreach ($actions as $action) {
            if (strpos($action->action, "sm") !== false) {
                $result = "sm_inprogress";
            }
            if (strpos($action->action, "recheck_") !== false) {
                $result = "recheck_inprogress";
            }
            if ($action->action == "b_recheck") {
                $result = "ready_for_recheck";
            }
            if ($action->action == "bp_done") {
                $result = "ready_to_finish";
            }
            if ($action->action == "dopproverka_bp") {
                $result = "ready_to_finish_with_nevid";
            }
            if ($action->action == "dopproverka_p") {
                $result = "ready_to_finish_with_nevid";
            }
            if ($action->action == "otkaz") {
                $result = "finished";
            }
            if ($action->action == "b_done") {
                $result = "ready_for_recheck";
            }
            if ($action->action == "b_done_p_recheck") {
                $result = "ready_for_recheck";
            }
            if ($action->action == "bp_done_recheck") {
                $result = "ready_to_finish";
            }
            if ($action->action == "p_done_recheck") {
                $result = "ready_to_finish";
            }
            if ($action->action == "b_done_recheck") {
                $result = "ready_to_finish";
            }
            if ($action->action == "nevid_done_chist") {
                $result = "finished";
            }
            if ($action->action == "nevid_done_katorga") {
                $result = "finished";
            }
            if ($action->action == "nevid_done_prokli") {
                $result = "finished";
            }
            if ($action->action == "nevid_done_block") {
                $result = "finished";
            }
            if ($action->action == "nevid_done_otkaz") {
                $result = "finished";
            }
            if ($action->action == "done_chist") {
                $result = "finished";
            }
            if ($action->action == "done_katorga") {
                $result = "finished";
            }
            if ($action->action == "done_prokli") {
                $result = "finished";
            }
            if ($action->action == "done_block") {
                $result = "finished";
            }
            if ($action->action == "done_otkaz") {
                $result = "finished";
            }
        }
        return $result;
    }

    public function verifyAndSaveAction() {
        $isDragon = false;
        if ($this->user_group > 9) {
            $isDragon = true;
        }
        if ($this->action == "takeItem" && $isDragon) {
            $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
            $proceed = true;
            foreach ($this->z_actions as $z_action) {
                if (strpos($z_action->action, "sm") !== false) {
                    $proceed = false;
                }
            }
            if ($proceed) {
                $this->currentStatus = $this->getCurrentStatus();
                if ($this->currentStatus != "new") {
                    $proceed = false;
                }
            }
            if ($proceed) {
                $str = "sm_";
                $this->new_action = new Actions();
                if ($this->boi == true && $this->peredachi == true) {
                    $str .= "bp";
                } else {
                    if ($this->boi == true) {
                        $str .= "boi";
                    }
                    if ($this->peredachi == true) {
                        $str .= "peredachi";
                    }
                }
                $this->new_action->dragon_id = Yii::$app->user->getId();
                $this->new_action->action = $str;
                $this->new_action->active = 1;
                $this->new_action->zayavka_id = $this->z_id;
                $this->new_action->notes = "";
                $this->new_action->date = date('d-m-Y H:i:s');
                $this->new_action->save();
                //make zayavka in progress
                $this->zayavka = Zayavka::findZayavkaById($this->z_id);
                $this->zayavka->status = "inprogress";
                $this->zayavka->date_last_update = date('d-m-Y H:i:s');
                $this->zayavka->save();
            }
        }
        if ($this->action == "takeItemWithOverride" && $isDragon) {
            $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
            $proceed = true;
            $this->currentStatus = $this->getCurrentStatus();
            if ($this->currentStatus != "sm_inprogress") {
                $proceed = false;
            }
            if ($proceed) {
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "sm") !== false) {
                        $z_action->active = 0;
                        $z_action->save();
                    }
                }
                $str = "sm_";
                $this->new_action = new Actions();
                if ($this->boi == true && $this->peredachi == true) {
                    $str .= "bp";
                } else {
                    if ($this->boi == true) {
                        $str .= "boi";
                    }
                    if ($this->peredachi == true) {
                        $str .= "peredachi";
                    }
                }
                $this->new_action->dragon_id = Yii::$app->user->getId();
                $this->new_action->action = $str;
                $this->new_action->active = 1;
                $this->new_action->zayavka_id = $this->z_id;
                $this->new_action->notes = "";
                $this->new_action->date = date('d-m-Y H:i:s');
                $this->new_action->save();
            }
        }
        if ($this->action == "bp_done" && $isDragon) {
            if ($this->dragonsRight->fullbp == 1 || ($this->dragonsRight->boi == 1 && $this->dragonsRight->peredachi == 1)) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $proceed = false;
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "sm") !== false && $z_action->dragon_id == $this->dragonsRight->dragonid) {
                        $z_action->active = 0;
                        $z_action->save();
                        $proceed = true;
                    }
                }
                if ($proceed) {
                    $this->new_action = new Actions();
                    $this->new_action->dragon_id = Yii::$app->user->getId();
                    $this->new_action->action = "bp_done";
                    $this->new_action->active = 1;
                    $this->new_action->zayavka_id = $this->z_id;
                    $this->new_action->notes = nl2br($this->comment);
                    $this->new_action->date = date('d-m-Y H:i:s');
                    $this->new_action->save();
                }
            }
        }
        if ($this->action == "dopproverka_bp" && $isDragon) {
            if ($this->dragonsRight->fullbp == 1 || ($this->dragonsRight->boi == 1 && $this->dragonsRight->peredachi == 1)) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $proceed = false;
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "sm") !== false && $z_action->dragon_id == $this->dragonsRight->dragonid) {
                        $z_action->active = 0;
                        $z_action->save();
                        $proceed = true;
                    }
                }
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "recheck_") !== false && $z_action->dragon_id == $this->dragonsRight->dragonid) {
                        $z_action->active = 0;
                        $z_action->save();
                        $proceed = true;
                    }
                }
                if ($proceed) {
                    $this->new_action = new Actions();
                    $this->new_action->dragon_id = Yii::$app->user->getId();
                    $this->new_action->action = "dopproverka_bp";
                    $this->new_action->active = 1;
                    $this->new_action->zayavka_id = $this->z_id;
                    $this->new_action->notes = nl2br($this->comment);
                    $this->new_action->date = date('d-m-Y H:i:s');
                    $this->new_action->save();
                }
            }
        }
        if ($this->action == "dopproverka_p" && $isDragon) {
            if ($this->dragonsRight->fullbp == 1 || ($this->dragonsRight->boi == 1 && $this->dragonsRight->peredachi == 1)) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $proceed = false;
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "sm") !== false && $z_action->dragon_id == $this->dragonsRight->dragonid) {
                        $z_action->active = 0;
                        $z_action->save();
                        $proceed = true;
                    }
                }
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "recheck_") !== false && $z_action->dragon_id == $this->dragonsRight->dragonid) {
                        $z_action->active = 0;
                        $z_action->save();
                        $proceed = true;
                    }
                }
                if ($proceed) {
                    $this->new_action = new Actions();
                    $this->new_action->dragon_id = Yii::$app->user->getId();
                    $this->new_action->action = "dopproverka_p";
                    $this->new_action->active = 1;
                    $this->new_action->zayavka_id = $this->z_id;
                    $this->new_action->notes = nl2br($this->comment);
                    $this->new_action->date = date('d-m-Y H:i:s');
                    $this->new_action->save();
                }
            }
        }
        if ($this->action == "otkaz" && $isDragon) {
            $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
            $proceed = false;
            foreach ($this->z_actions as $z_action) {
                if (strpos($z_action->action, "sm") !== false && $z_action->dragon_id == $this->dragonsRight->dragonid) {
                    $z_action->active = 0;
                    $z_action->save();
                    $proceed = true;
                }
                if (strpos($z_action->action, "recheck_") !== false && $z_action->dragon_id == $this->dragonsRight->dragonid) {
                    $z_action->active = 0;
                    $z_action->save();
                    $proceed = true;
                }
            }
            if ($proceed) {
                $this->new_action = new Actions();
                $this->new_action->dragon_id = Yii::$app->user->getId();
                $this->new_action->action = "otkaz";
                $this->new_action->active = 1;
                $this->new_action->zayavka_id = $this->z_id;
                $this->new_action->notes = nl2br($this->comment);
                $this->new_action->date = date('d-m-Y H:i:s');
                $this->new_action->save();
                $this->zayavka = Zayavka::findZayavkaById($this->z_id);
                $this->zayavka->status = "otkaz";
                $this->zayavka->otkaz_text = nl2br($this->comment);
                $this->zayavka->active = 0;
                $this->zayavka->date_last_update = date('d-m-Y H:i:s');
                $this->zayavka->save();
            }
        }
        if ($this->action == "b_recheck" && $isDragon) {
            $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
            $proceed = false;
            foreach ($this->z_actions as $z_action) {
                if (strpos($z_action->action, "sm") !== false && $z_action->dragon_id == $this->dragonsRight->dragonid) {
                    $z_action->active = 0;
                    $z_action->save();
                    $proceed = true;
                }
            }
            if ($proceed) {
                $this->new_action = new Actions();
                $this->new_action->dragon_id = Yii::$app->user->getId();
                $this->new_action->action = "b_recheck";
                $this->new_action->active = 1;
                $this->new_action->zayavka_id = $this->z_id;
                $this->new_action->notes = nl2br($this->comment);
                $this->new_action->date = date('d-m-Y H:i:s');
                $this->new_action->save();
            }
        }
        if ($this->action == "b_done" && $isDragon) {
            if ($this->dragonsRight->fullbp == 1 || $this->dragonsRight->boi == 1) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $proceed = false;
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "sm") !== false && $z_action->dragon_id == $this->dragonsRight->dragonid) {
                        $z_action->active = 0;
                        $z_action->save();
                        $proceed = true;
                    }
                }
                if ($proceed) {
                    $this->new_action = new Actions();
                    $this->new_action->dragon_id = Yii::$app->user->getId();
                    $this->new_action->action = "b_done";
                    $this->new_action->active = 1;
                    $this->new_action->zayavka_id = $this->z_id;
                    $this->new_action->notes = nl2br($this->comment);
                    $this->new_action->date = date('d-m-Y H:i:s');
                    $this->new_action->save();
                }
            }
        }
        if ($this->action == "b_done_p_recheck" && $isDragon) {
            if ($this->dragonsRight->fullbp == 1 || ($this->dragonsRight->boi == 1 && $this->dragonsRight->per_prov == 1)) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $proceed = false;
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "sm") !== false && $z_action->dragon_id == $this->dragonsRight->dragonid) {
                        $z_action->active = 0;
                        $z_action->save();
                        $proceed = true;
                    }
                }
                if ($proceed) {
                    $this->new_action = new Actions();
                    $this->new_action->dragon_id = Yii::$app->user->getId();
                    $this->new_action->action = "b_done_p_recheck";
                    $this->new_action->active = 1;
                    $this->new_action->zayavka_id = $this->z_id;
                    $this->new_action->notes = nl2br($this->comment);
                    $this->new_action->date = date('d-m-Y H:i:s');
                    $this->new_action->save();
                }
            }
        }
        if ($this->action == "bp_done_recheck" && $isDragon) {
            if ($this->dragonsRight->fullbp == 1 || ($this->dragonsRight->boi == 1 && $this->dragonsRight->peredachi == 1)) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $proceed = false;
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "recheck_") !== false && $z_action->dragon_id == $this->dragonsRight->dragonid) {
                        $z_action->active = 0;
                        $z_action->save();
                        $proceed = true;
                    }
                }
                if ($proceed) {
                    $this->new_action = new Actions();
                    $this->new_action->dragon_id = Yii::$app->user->getId();
                    $this->new_action->action = "bp_done";
                    $this->new_action->active = 1;
                    $this->new_action->zayavka_id = $this->z_id;
                    $this->new_action->notes = nl2br($this->comment);
                    $this->new_action->date = date('d-m-Y H:i:s');
                    $this->new_action->save();
                }
            }
        }
        if ($this->action == "p_done_recheck" && $isDragon) {
            if ($this->dragonsRight->fullbp == 1 || ($this->dragonsRight->boi == 1 && $this->dragonsRight->peredachi == 1)) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $proceed = false;
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "recheck_") !== false && $z_action->dragon_id == $this->dragonsRight->dragonid) {
                        $z_action->active = 0;
                        $z_action->save();
                        $proceed = true;
                    }
                }
                if ($proceed) {
                    $this->new_action = new Actions();
                    $this->new_action->dragon_id = Yii::$app->user->getId();
                    $this->new_action->action = "p_done";
                    $this->new_action->active = 1;
                    $this->new_action->zayavka_id = $this->z_id;
                    $this->new_action->notes = nl2br($this->comment);
                    $this->new_action->date = date('d-m-Y H:i:s');
                    $this->new_action->save();
                }
            }
        }
        if ($this->action == "b_done_recheck" && $isDragon) {
            if ($this->dragonsRight->fullbp == 1 || ($this->dragonsRight->boi == 1 && $this->dragonsRight->peredachi == 1)) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $proceed = false;
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "recheck_") !== false && $z_action->dragon_id == $this->dragonsRight->dragonid) {
                        $z_action->active = 0;
                        $z_action->save();
                        $proceed = true;
                    }
                }
                if ($proceed) {
                    $this->new_action = new Actions();
                    $this->new_action->dragon_id = Yii::$app->user->getId();
                    $this->new_action->action = "bp_done";
                    $this->new_action->active = 1;
                    $this->new_action->zayavka_id = $this->z_id;
                    $this->new_action->notes = nl2br($this->comment);
                    $this->new_action->date = date('d-m-Y H:i:s');
                    $this->new_action->save();
                }
            }
        }
        if ($this->action == "nevid_done_chist" && $isDragon) {
            if ($this->dragonsRight->nevid == 1) {
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
            if ($this->dragonsRight->nevid == 1) {
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
            if ($this->dragonsRight->nevid == 1) {
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
            if ($this->dragonsRight->nevid == 1) {
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
            if ($this->dragonsRight->nevid == 1) {
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
        if ($this->action == "done_chist" && $isDragon) {
            if ($this->dragonsRight->chistota == 1) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $this->zayavka = Zayavka::findZayavkaById($this->z_id);
                if ($this->zayavka->active == 1) {
                    $this->new_action = new Actions();
                    $this->new_action->dragon_id = Yii::$app->user->getId();
                    $this->new_action->action = "done_chist";
                    $this->new_action->active = 1;
                    $this->new_action->zayavka_id = $this->z_id;
                    $this->new_action->notes = nl2br($this->comment);
                    $this->new_action->date = date('d-m-Y H:i:s');
                    $this->new_action->save();

                    $this->zayavka->status = "chist";
                    $this->zayavka->otkaz_text = nl2br($this->comment);
                    $this->zayavka->active = 0;
                    $this->zayavka->date_last_update = date('d-m-Y H:i:s');
                    $this->zayavka->save();
                }
            }
        }
        if ($this->action == "done_katorga" && $isDragon) {
            if ($this->dragonsRight->katorga == 1) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $this->zayavka = Zayavka::findZayavkaById($this->z_id);
                if ($this->zayavka->active == 1) {
                    $this->new_action = new Actions();
                    $this->new_action->dragon_id = Yii::$app->user->getId();
                    $this->new_action->action = "done_katorga";
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
        if ($this->action == "done_prokli" && $isDragon) {
            if ($this->dragonsRight->prokli == 1) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $this->zayavka = Zayavka::findZayavkaById($this->z_id);
                if ($this->zayavka->active == 1) {
                    $this->new_action = new Actions();
                    $this->new_action->dragon_id = Yii::$app->user->getId();
                    $this->new_action->action = "done_prokli";
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
        if ($this->action == "done_block" && $isDragon) {
            if ($this->dragonsRight->chistota == 1) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $this->zayavka = Zayavka::findZayavkaById($this->z_id);
                if ($this->zayavka->active == 1) {
                    $this->new_action = new Actions();
                    $this->new_action->dragon_id = Yii::$app->user->getId();
                    $this->new_action->action = "done_block";
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
        if ($this->action == "done_otkaz" && $isDragon) {
            if ($this->dragonsRight->fullbp == 1) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $this->zayavka = Zayavka::findZayavkaById($this->z_id);
                if ($this->zayavka->active == 1) {
                    $this->new_action = new Actions();
                    $this->new_action->dragon_id = Yii::$app->user->getId();
                    $this->new_action->action = "done_otkaz";
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
        if ($this->action == "takeRecheck" && $isDragon) {
            $str = "recheck";
            if ($this->boi == true) {
                $str .= "_boi";
            }
            if ($this->peredachi == true) {
                $str .= "_peredachi";
            }
            if ($this->dragonsRight->fullbp == 1 || ($this->dragonsRight->boi == 1 && $this->dragonsRight->peredachi == 1)) {
                $this->z_actions = Actions::findActiveActionsByZid($this->z_id);
                $proceed = true;
                foreach ($this->z_actions as $z_action) {
                    if (strpos($z_action->action, "recheck_") !== false) {
                        $proceed = false;
                    }
                }
                if ($this->getCurrentStatus() != "ready_for_recheck") {
                    $proceed = false;
                }
                if ($proceed) {
                    foreach ($this->z_actions as $z_action) {
                        if ($z_action->active == 1) {
                            $z_action->active = 0;
                            $z_action->save();
                        }
                    }
                }
                if ($proceed) {
                    $this->new_action = new Actions();
                    $this->new_action->dragon_id = Yii::$app->user->getId();
                    $this->new_action->action = $str;
                    $this->new_action->active = 1;
                    $this->new_action->zayavka_id = $this->z_id;
                    $this->new_action->notes = "";
                    $this->new_action->date = date('d-m-Y H:i:s');
                    $this->new_action->save();
                }
            }
        }
    }

    public function emptyValidate() {
        
    }

}
