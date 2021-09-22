<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use Yii;
use Text;
use app\models\Cleaning;
use app\models\Users;
use app\models\Zayavka;
use app\models\CleaningUserClass;
use app\models\CleaningCityClass;
use app\models\Actions;
use app\models\Dragonsrights;
use app\models\CleaningData;

class CleaningModel extends \yii\base\Model {

    public $action;
    public $allowed_view;
    public $allow_run;
    public $id;
    public $allReports;
    public $report;
    public $k_drag;
    public $s_drag;
    public $u_drag;

    public function rules() {
        return [
                [['action', 'report', 'k_drag', 's_drag', 'u_drag', 'allReports', 'id', 'allow_run', 'allowed_view'], 'emptyValidate']
        ];
    }

    public function emptyValidate() {
        
    }

    public function proccessRequest() {
        $this->allowed_view = false;
        $this->allow_run = false;
        $user_group = Users::findGroupById(Yii::$app->user->getId());
        if ($user_group == 99) {
            $this->allowed_view = true;
            $this->allow_run = true;
        } else {
            $dr_rights = Dragonsrights::findOneById(Yii::$app->user->getId());
            if ($user_group == 10 && $dr_rights->boss == 1) {
                $this->allowed_view = true;
            }
        }
        if ($this->action == "view") {
            if ($this->allowed_view) {
                $this->report = Cleaning::findOne(['id' => $this->id]);
                $this->k_drag = CleaningData::find()
                        ->where(['clean_id' => $this->id])
                        ->andWhere(['city' => 'kovcheg'])
                        ->all();
                $this->s_drag = CleaningData::find()
                        ->where(['clean_id' => $this->id])
                        ->andWhere(['city' => 'smorye'])
                        ->all();
                $this->u_drag = CleaningData::find()
                        ->where(['clean_id' => $this->id])
                        ->andWhere(['city' => 'utes'])
                        ->all();
            }
        }
        if ($this->action == "createReport") {
            if ($this->allow_run) {
                //GENERATING REPORT
                $k_zayavki = Zayavka::find()
                        ->where(['active' => 0])
                        ->andWhere(['calculated' => 0])
                        ->andWhere(['proverka_city' => 'kovcheg'])
                        ->all();
                $s_zayavki = Zayavka::find()
                        ->where(['active' => 0])
                        ->andWhere(['calculated' => 0])
                        ->andWhere(['proverka_city' => 'smorye'])
                        ->all();
                $u_zayavki = Zayavka::find()
                        ->where(['active' => 0])
                        ->andWhere(['calculated' => 0])
                        ->andWhere(['proverka_city' => 'utes'])
                        ->all();

                $kovcheg = new CleaningCityClass();
                $smorye = new CleaningCityClass();
                $utes = new CleaningCityClass();
                $k_dragons = array();
                $s_dragons = array();
                $u_dragons = array();
                foreach ($k_zayavki as $z) {
                    $kovcheg->total ++;
                    switch ($z->status) {
                        case "cancelled":
                            $kovcheg->cancelled ++;
                            break;
                        case "chist":
                            $kovcheg->chist ++;
                            break;
                        case "block":
                            $kovcheg->banned ++;
                            break;
                        case "otkaz":
                            $kovcheg->otkaz ++;
                            break;
                        case "katorga":
                            $kovcheg->katorga ++;
                            break;
                        case "prokli":
                            $kovcheg->prokli ++;
                            break;
                    }
                    //FIND ACTIONS!
                    $z_actions = Actions::findActionsByZid($z->id);
                    foreach ($z_actions as $action) {
                        $dragon_already_in_array = false;
                        foreach ($k_dragons as $dragon) {
                            if ($dragon->id == $action->dragon_id) {
                                $dragon_already_in_array = true;
                                switch ($action->action) {
                                    case "sm_bp":
                                        if ($action->active == 1) {
                                            $rights = Dragonsrights::findOneById($dragon->id);
                                            if ($rights->fullbp == 1) {
                                                $dragon->boi++;
                                                $dragon->peredachi++;
                                            } else {
                                                if ($rights->peredachi == 1 || $rights->per_prov == 1) {
                                                    $dragon->boi++;
                                                    $dragon->peredachi++;
                                                } else {
                                                    $dragon->boi++;
                                                }
                                            }
                                        }
                                        break;
                                    case "recheck_boi":
                                        if ($action->active == 1) {
                                            $dragon->boi++;
                                        }
                                        break;
                                    case "recheck_boi_peredachi":
                                        if ($action->active == 1) {
                                            $dragon->boi++;
                                            $dragon->peredachi++;
                                        }
                                        break;
                                    case "recheck_peredachi":
                                        if ($action->active == 1) {
                                            $dragon->peredachi++;
                                        }
                                        break;
                                    case "b_recheck":
                                        $dragon->boi++;
                                        break;
                                    case "bp_done":
                                        $dragon->boi++;
                                        $dragon->peredachi++;
                                        break;
                                    case "dopproverka_bp":
                                        $dragon->boi++;
                                        $dragon->peredachi++;
                                        break;
                                    case "dopproverka_p":
                                        $dragon->peredachi++;
                                        break;
                                    case "otkaz":
                                        $dragon->otkaz++;
                                        break;
                                    case "b_done":
                                        $dragon->boi++;
                                        break;
                                    case "b_done_p_recheck":
                                        $dragon->boi++;
                                        $dragon->peredachi++;
                                        break;
                                    case "bp_done_recheck":
                                        $dragon->boi++;
                                        $dragon->peredachi++;
                                        break;
                                    case "p_done_recheck":
                                        $dragon->peredachi++;
                                        break;
                                    case "b_done_recheck":
                                        $dragon->boi++;
                                        break;
                                    case "nevid_done_chist":
                                        $dragon->chist++;
                                        $dragon->nevid++;
                                        $kovcheg->nevid++;
                                        break;
                                    case "nevid_done_katorga":
                                        $dragon->katorga++;
                                        $dragon->nevid++;
                                        $kovcheg->nevid++;
                                        break;
                                    case "nevid_done_prokli":
                                        $dragon->prokli++;
                                        $dragon->nevid++;
                                        $kovcheg->nevid++;
                                        break;
                                    case "nevid_done_block":
                                        $dragon->ban++;
                                        $dragon->nevid++;
                                        $kovcheg->nevid++;
                                        break;
                                    case "nevid_done_otkaz":
                                        $dragon->otkaz++;
                                        $dragon->nevid++;
                                        $kovcheg->nevid++;
                                        break;
                                    case "done_chist":
                                        $dragon->chist++;
                                        break;
                                    case "done_katorga":
                                        $dragon->katorga++;
                                        break;
                                    case "done_prokli":
                                        $dragon->prokli++;
                                        break;
                                    case "done_block":
                                        $dragon->ban++;
                                        break;
                                    case "done_otkaz":
                                        $dragon->otkaz++;
                                        break;
                                }
                            }
                        }
                        if (!$dragon_already_in_array) {
                            $dragon = new CleaningUserClass($action->dragon_id);
                            switch ($action->action) {
                                case "sm_bp":
                                    if ($action->active == 1) {
                                        $rights = Dragonsrights::findOneById($dragon->id);
                                        if ($rights->fullbp == 1) {
                                            $dragon->boi++;
                                            $dragon->peredachi++;
                                        } else {
                                            if ($rights->peredachi == 1 || $rights->per_prov == 1) {
                                                $dragon->boi++;
                                                $dragon->peredachi++;
                                            } else {
                                                $dragon->boi++;
                                            }
                                        }
                                    }
                                    break;
                                case "recheck_boi":
                                    if ($action->active == 1) {
                                        $dragon->boi++;
                                    }
                                    break;
                                case "recheck_boi_peredachi":
                                    if ($action->active == 1) {
                                        $dragon->boi++;
                                        $dragon->peredachi++;
                                    }
                                    break;
                                case "recheck_peredachi":
                                    if ($action->active == 1) {
                                        $dragon->peredachi++;
                                    }
                                    break;
                                case "b_recheck":
                                    $dragon->boi++;
                                    break;
                                case "bp_done":
                                    $dragon->boi++;
                                    $dragon->peredachi++;
                                    break;
                                case "dopproverka_bp":
                                    $dragon->boi++;
                                    $dragon->peredachi++;
                                    break;
                                case "dopproverka_p":
                                    $dragon->peredachi++;
                                    break;
                                case "otkaz":
                                    $dragon->otkaz++;
                                    break;
                                case "b_done":
                                    $dragon->boi++;
                                    break;
                                case "b_done_p_recheck":
                                    $dragon->boi++;
                                    $dragon->peredachi++;
                                    break;
                                case "bp_done_recheck":
                                    $dragon->boi++;
                                    $dragon->peredachi++;
                                    break;
                                case "p_done_recheck":
                                    $dragon->peredachi++;
                                    break;
                                case "b_done_recheck":
                                    $dragon->boi++;
                                    break;
                                case "nevid_done_chist":
                                    $dragon->chist++;
                                    $dragon->nevid++;
                                    $kovcheg->nevid++;
                                    break;
                                case "nevid_done_katorga":
                                    $dragon->katorga++;
                                    $dragon->nevid++;
                                    $kovcheg->nevid++;
                                    break;
                                case "nevid_done_prokli":
                                    $dragon->prokli++;
                                    $dragon->nevid++;
                                    $kovcheg->nevid++;
                                    break;
                                case "nevid_done_block":
                                    $dragon->ban++;
                                    $dragon->nevid++;
                                    $kovcheg->nevid++;
                                    break;
                                case "nevid_done_otkaz":
                                    $dragon->otkaz++;
                                    $dragon->nevid++;
                                    $kovcheg->nevid++;
                                    break;
                                case "done_chist":
                                    $dragon->chist++;
                                    break;
                                case "done_katorga":
                                    $dragon->katorga++;
                                    break;
                                case "done_prokli":
                                    $dragon->prokli++;
                                    break;
                                case "done_block":
                                    $dragon->ban++;
                                    break;
                                case "done_otkaz":
                                    $dragon->otkaz++;
                                    break;
                            }

                            array_push($k_dragons, $dragon);
                        }
                    }
                    $z->calculated = 1;
                    $z->save();
                }
                //SMORYE
                foreach ($s_zayavki as $z) {
                    $smorye->total ++;
                    switch ($z->status) {
                        case "cancelled":
                            $smorye->cancelled ++;
                            break;
                        case "chist":
                            $smorye->chist ++;
                            break;
                        case "block":
                            $smorye->banned ++;
                            break;
                        case "otkaz":
                            $smorye->otkaz ++;
                            break;
                        case "katorga":
                            $smorye->katorga ++;
                            break;
                        case "prokli":
                            $smorye->prokli ++;
                            break;
                    }
                    //FIND ACTIONS!
                    $z_actions = Actions::findActionsByZid($z->id);
                    foreach ($z_actions as $action) {
                        $dragon_already_in_array = false;
                        foreach ($s_dragons as $dragon) {
                            if ($dragon->id == $action->dragon_id) {
                                $dragon_already_in_array = true;
                                switch ($action->action) {
                                    case "sm_bp":
                                        if ($action->active == 1) {
                                            $rights = Dragonsrights::findOneById($dragon->id);
                                            if ($rights->fullbp == 1) {
                                                $dragon->boi++;
                                                $dragon->peredachi++;
                                            } else {
                                                if ($rights->peredachi == 1 || $rights->per_prov == 1) {
                                                    $dragon->boi++;
                                                    $dragon->peredachi++;
                                                } else {
                                                    $dragon->boi++;
                                                }
                                            }
                                        }
                                        break;
                                    case "recheck_boi":
                                        if ($action->active == 1) {
                                            $dragon->boi++;
                                        }
                                        break;
                                    case "recheck_boi_peredachi":
                                        if ($action->active == 1) {
                                            $dragon->boi++;
                                            $dragon->peredachi++;
                                        }
                                        break;
                                    case "recheck_peredachi":
                                        if ($action->active == 1) {
                                            $dragon->peredachi++;
                                        }
                                        break;
                                    case "b_recheck":
                                        $dragon->boi++;
                                        break;
                                    case "bp_done":
                                        $dragon->boi++;
                                        $dragon->peredachi++;
                                        break;
                                    case "dopproverka_bp":
                                        $dragon->boi++;
                                        $dragon->peredachi++;
                                        break;
                                    case "dopproverka_p":
                                        $dragon->peredachi++;
                                        break;
                                    case "otkaz":
                                        $dragon->otkaz++;
                                        break;
                                    case "b_done":
                                        $dragon->boi++;
                                        break;
                                    case "b_done_p_recheck":
                                        $dragon->boi++;
                                        $dragon->peredachi++;
                                        break;
                                    case "bp_done_recheck":
                                        $dragon->boi++;
                                        $dragon->peredachi++;
                                        break;
                                    case "p_done_recheck":
                                        $dragon->peredachi++;
                                        break;
                                    case "b_done_recheck":
                                        $dragon->boi++;
                                        break;
                                    case "nevid_done_chist":
                                        $dragon->chist++;
                                        $dragon->nevid++;
                                        $smorye->nevid++;
                                        break;
                                    case "nevid_done_katorga":
                                        $dragon->katorga++;
                                        $dragon->nevid++;
                                        $smorye->nevid++;
                                        break;
                                    case "nevid_done_prokli":
                                        $dragon->prokli++;
                                        $dragon->nevid++;
                                        $smorye->nevid++;
                                        break;
                                    case "nevid_done_block":
                                        $dragon->ban++;
                                        $dragon->nevid++;
                                        $smorye->nevid++;
                                        break;
                                    case "nevid_done_otkaz":
                                        $dragon->otkaz++;
                                        $dragon->nevid++;
                                        $smorye->nevid++;
                                        break;
                                    case "done_chist":
                                        $dragon->chist++;
                                        break;
                                    case "done_katorga":
                                        $dragon->katorga++;
                                        break;
                                    case "done_prokli":
                                        $dragon->prokli++;
                                        break;
                                    case "done_block":
                                        $dragon->ban++;
                                        break;
                                    case "done_otkaz":
                                        $dragon->otkaz++;
                                        break;
                                }
                            }
                        }
                        if (!$dragon_already_in_array) {
                            $dragon = new CleaningUserClass($action->dragon_id);
                            switch ($action->action) {
                                case "sm_bp":
                                    if ($action->active == 1) {
                                        $rights = Dragonsrights::findOneById($dragon->id);
                                        if ($rights->fullbp == 1) {
                                            $dragon->boi++;
                                            $dragon->peredachi++;
                                        } else {
                                            if ($rights->peredachi == 1 || $rights->per_prov == 1) {
                                                $dragon->boi++;
                                                $dragon->peredachi++;
                                            } else {
                                                $dragon->boi++;
                                            }
                                        }
                                    }
                                    break;
                                case "recheck_boi":
                                    if ($action->active == 1) {
                                        $dragon->boi++;
                                    }
                                    break;
                                case "recheck_boi_peredachi":
                                    if ($action->active == 1) {
                                        $dragon->boi++;
                                        $dragon->peredachi++;
                                    }
                                    break;
                                case "recheck_peredachi":
                                    if ($action->active == 1) {
                                        $dragon->peredachi++;
                                    }
                                    break;
                                case "b_recheck":
                                    $dragon->boi++;
                                    break;
                                case "bp_done":
                                    $dragon->boi++;
                                    $dragon->peredachi++;
                                    break;
                                case "dopproverka_bp":
                                    $dragon->boi++;
                                    $dragon->peredachi++;
                                    break;
                                case "dopproverka_p":
                                    $dragon->peredachi++;
                                    break;
                                case "otkaz":
                                    $dragon->otkaz++;
                                    break;
                                case "b_done":
                                    $dragon->boi++;
                                    break;
                                case "b_done_p_recheck":
                                    $dragon->boi++;
                                    $dragon->peredachi++;
                                    break;
                                case "bp_done_recheck":
                                    $dragon->boi++;
                                    $dragon->peredachi++;
                                    break;
                                case "p_done_recheck":
                                    $dragon->peredachi++;
                                    break;
                                case "b_done_recheck":
                                    $dragon->boi++;
                                    break;
                                case "nevid_done_chist":
                                    $dragon->chist++;
                                    $dragon->nevid++;
                                    $smorye->nevid++;
                                    break;
                                case "nevid_done_katorga":
                                    $dragon->katorga++;
                                    $dragon->nevid++;
                                    $smorye->nevid++;
                                    break;
                                case "nevid_done_prokli":
                                    $dragon->prokli++;
                                    $dragon->nevid++;
                                    $smorye->nevid++;
                                    break;
                                case "nevid_done_block":
                                    $dragon->ban++;
                                    $dragon->nevid++;
                                    $smorye->nevid++;
                                    break;
                                case "nevid_done_otkaz":
                                    $dragon->otkaz++;
                                    $dragon->nevid++;
                                    $smorye->nevid++;
                                    break;
                                case "done_chist":
                                    $dragon->chist++;
                                    break;
                                case "done_katorga":
                                    $dragon->katorga++;
                                    break;
                                case "done_prokli":
                                    $dragon->prokli++;
                                    break;
                                case "done_block":
                                    $dragon->ban++;
                                    break;
                                case "done_otkaz":
                                    $dragon->otkaz++;
                                    break;
                            }

                            array_push($s_dragons, $dragon);
                        }
                    }
                    $z->calculated = 1;
                    $z->save();
                }
                //UTES
                foreach ($u_zayavki as $z) {
                    $utes->total ++;
                    switch ($z->status) {
                        case "cancelled":
                            $utes->cancelled ++;
                            break;
                        case "chist":
                            $utes->chist ++;
                            break;
                        case "block":
                            $utes->banned ++;
                            break;
                        case "otkaz":
                            $utes->otkaz ++;
                            break;
                        case "katorga":
                            $utes->katorga ++;
                            break;
                        case "prokli":
                            $utes->prokli ++;
                            break;
                    }
                    //FIND ACTIONS!
                    $z_actions = Actions::findActionsByZid($z->id);
                    foreach ($z_actions as $action) {
                        $dragon_already_in_array = false;
                        foreach ($u_dragons as $dragon) {
                            if ($dragon->id == $action->dragon_id) {
                                $dragon_already_in_array = true;
                                switch ($action->action) {
                                    case "sm_bp":
                                        if ($action->active == 1) {
                                            $rights = Dragonsrights::findOneById($dragon->id);
                                            if ($rights->fullbp == 1) {
                                                $dragon->boi++;
                                                $dragon->peredachi++;
                                            } else {
                                                if ($rights->peredachi == 1 || $rights->per_prov == 1) {
                                                    $dragon->boi++;
                                                    $dragon->peredachi++;
                                                } else {
                                                    $dragon->boi++;
                                                }
                                            }
                                        }
                                        break;
                                    case "recheck_boi":
                                        if ($action->active == 1) {
                                            $dragon->boi++;
                                        }
                                        break;
                                    case "recheck_boi_peredachi":
                                        if ($action->active == 1) {
                                            $dragon->boi++;
                                            $dragon->peredachi++;
                                        }
                                        break;
                                    case "recheck_peredachi":
                                        if ($action->active == 1) {
                                            $dragon->peredachi++;
                                        }
                                        break;
                                    case "b_recheck":
                                        $dragon->boi++;
                                        break;
                                    case "bp_done":
                                        $dragon->boi++;
                                        $dragon->peredachi++;
                                        break;
                                    case "dopproverka_bp":
                                        $dragon->boi++;
                                        $dragon->peredachi++;
                                        break;
                                    case "dopproverka_p":
                                        $dragon->peredachi++;
                                        break;
                                    case "otkaz":
                                        $dragon->otkaz++;
                                        break;
                                    case "b_done":
                                        $dragon->boi++;
                                        break;
                                    case "b_done_p_recheck":
                                        $dragon->boi++;
                                        $dragon->peredachi++;
                                        break;
                                    case "bp_done_recheck":
                                        $dragon->boi++;
                                        $dragon->peredachi++;
                                        break;
                                    case "p_done_recheck":
                                        $dragon->peredachi++;
                                        break;
                                    case "b_done_recheck":
                                        $dragon->boi++;
                                        break;
                                    case "nevid_done_chist":
                                        $dragon->chist++;
                                        $dragon->nevid++;
                                        $utes->nevid++;
                                        break;
                                    case "nevid_done_katorga":
                                        $dragon->katorga++;
                                        $dragon->nevid++;
                                        $utes->nevid++;
                                        break;
                                    case "nevid_done_prokli":
                                        $dragon->prokli++;
                                        $dragon->nevid++;
                                        $utes->nevid++;
                                        break;
                                    case "nevid_done_block":
                                        $dragon->ban++;
                                        $dragon->nevid++;
                                        $utes->nevid++;
                                        break;
                                    case "nevid_done_otkaz":
                                        $dragon->otkaz++;
                                        $dragon->nevid++;
                                        $utes->nevid++;
                                        break;
                                    case "done_chist":
                                        $dragon->chist++;
                                        break;
                                    case "done_katorga":
                                        $dragon->katorga++;
                                        break;
                                    case "done_prokli":
                                        $dragon->prokli++;
                                        break;
                                    case "done_block":
                                        $dragon->ban++;
                                        break;
                                    case "done_otkaz":
                                        $dragon->otkaz++;
                                        break;
                                }
                            }
                        }
                        if (!$dragon_already_in_array) {
                            $dragon = new CleaningUserClass($action->dragon_id);
                            switch ($action->action) {
                                case "sm_bp":
                                    if ($action->active == 1) {
                                        $rights = Dragonsrights::findOneById($dragon->id);
                                        if ($rights->fullbp == 1) {
                                            $dragon->boi++;
                                            $dragon->peredachi++;
                                        } else {
                                            if ($rights->peredachi == 1 || $rights->per_prov == 1) {
                                                $dragon->boi++;
                                                $dragon->peredachi++;
                                            } else {
                                                $dragon->boi++;
                                            }
                                        }
                                    }
                                    break;
                                case "recheck_boi":
                                    if ($action->active == 1) {
                                        $dragon->boi++;
                                    }
                                    break;
                                case "recheck_boi_peredachi":
                                    if ($action->active == 1) {
                                        $dragon->boi++;
                                        $dragon->peredachi++;
                                    }
                                    break;
                                case "recheck_peredachi":
                                    if ($action->active == 1) {
                                        $dragon->peredachi++;
                                    }
                                    break;
                                case "b_recheck":
                                    $dragon->boi++;
                                    break;
                                case "bp_done":
                                    $dragon->boi++;
                                    $dragon->peredachi++;
                                    break;
                                case "dopproverka_bp":
                                    $dragon->boi++;
                                    $dragon->peredachi++;
                                    break;
                                case "dopproverka_p":
                                    $dragon->peredachi++;
                                    break;
                                case "otkaz":
                                    $dragon->otkaz++;
                                    break;
                                case "b_done":
                                    $dragon->boi++;
                                    break;
                                case "b_done_p_recheck":
                                    $dragon->boi++;
                                    $dragon->peredachi++;
                                    break;
                                case "bp_done_recheck":
                                    $dragon->boi++;
                                    $dragon->peredachi++;
                                    break;
                                case "p_done_recheck":
                                    $dragon->peredachi++;
                                    break;
                                case "b_done_recheck":
                                    $dragon->boi++;
                                    break;
                                case "nevid_done_chist":
                                    $dragon->chist++;
                                    $dragon->nevid++;
                                    $utes->nevid++;
                                    break;
                                case "nevid_done_katorga":
                                    $dragon->katorga++;
                                    $dragon->nevid++;
                                    $utes->nevid++;
                                    break;
                                case "nevid_done_prokli":
                                    $dragon->prokli++;
                                    $dragon->nevid++;
                                    $utes->nevid++;
                                    break;
                                case "nevid_done_block":
                                    $dragon->ban++;
                                    $dragon->nevid++;
                                    $utes->nevid++;
                                    break;
                                case "nevid_done_otkaz":
                                    $dragon->otkaz++;
                                    $dragon->nevid++;
                                    $utes->nevid++;
                                    break;
                                case "done_chist":
                                    $dragon->chist++;
                                    break;
                                case "done_katorga":
                                    $dragon->katorga++;
                                    break;
                                case "done_prokli":
                                    $dragon->prokli++;
                                    break;
                                case "done_block":
                                    $dragon->ban++;
                                    break;
                                case "done_otkaz":
                                    $dragon->otkaz++;
                                    break;
                            }

                            array_push($u_dragons, $dragon);
                        }
                    }
                    $z->calculated = 1;
                    $z->save();
                }
                //FINALIZING
                $date = date('d-m-Y H:i:s');
                $cleaning = new Cleaning();
                $cleaning->initiator = Yii::$app->user->getId();
                $cleaning->date = $date;
                $cleaning->k_total = $kovcheg->total;
                $cleaning->k_cancelled = $kovcheg->cancelled;
                $cleaning->k_chist = $kovcheg->chist;
                $cleaning->k_banned = $kovcheg->banned;
                $cleaning->k_prokli = $kovcheg->prokli;
                $cleaning->k_katorga = $kovcheg->katorga;
                $cleaning->k_otkaz = $kovcheg->otkaz;
                $cleaning->k_nevid = $kovcheg->nevid;
                $cleaning->s_total = $smorye->total;
                $cleaning->s_cancelled = $smorye->cancelled;
                $cleaning->s_chist = $smorye->chist;
                $cleaning->s_banned = $smorye->banned;
                $cleaning->s_prokli = $smorye->prokli;
                $cleaning->s_katorga = $smorye->katorga;
                $cleaning->s_otkaz = $smorye->otkaz;
                $cleaning->s_nevid = $smorye->nevid;
                $cleaning->u_total = $utes->total;
                $cleaning->u_cancelled = $utes->cancelled;
                $cleaning->u_chist = $utes->chist;
                $cleaning->u_banned = $utes->banned;
                $cleaning->u_prokli = $utes->prokli;
                $cleaning->u_katorga = $utes->katorga;
                $cleaning->u_otkaz = $utes->otkaz;
                $cleaning->u_nevid = $utes->nevid;
                $cleaning->save();

                foreach ($k_dragons as $dr) {
                    $data = new CleaningData();
                    $data->clean_id = $cleaning->id;
                    $data->dr_id = $dr->id;
                    $data->dr_name = $dr->username;
                    $data->city = "kovcheg";
                    $data->boi = $dr->boi;
                    $data->peredachi = $dr->peredachi;
                    $data->chist = $dr->chist;
                    $data->prokli = $dr->prokli;
                    $data->katorga = $dr->katorga;
                    $data->ban = $dr->ban;
                    $data->otkaz = $dr->otkaz;
                    $data->nevid = $dr->nevid;
                    $data->save();
                }

                foreach ($s_dragons as $dr) {
                    $data = new CleaningData();
                    $data->clean_id = $cleaning->id;
                    $data->dr_id = $dr->id;
                    $data->dr_name = $dr->username;
                    $data->city = "smorye";
                    $data->boi = $dr->boi;
                    $data->peredachi = $dr->peredachi;
                    $data->chist = $dr->chist;
                    $data->prokli = $dr->prokli;
                    $data->katorga = $dr->katorga;
                    $data->ban = $dr->ban;
                    $data->otkaz = $dr->otkaz;
                    $data->nevid = $dr->nevid;
                    $data->save();
                }

                foreach ($u_dragons as $dr) {
                    $data = new CleaningData();
                    $data->clean_id = $cleaning->id;
                    $data->dr_id = $dr->id;
                    $data->dr_name = $dr->username;
                    $data->city = "utes";
                    $data->boi = $dr->boi;
                    $data->peredachi = $dr->peredachi;
                    $data->chist = $dr->chist;
                    $data->prokli = $dr->prokli;
                    $data->katorga = $dr->katorga;
                    $data->ban = $dr->ban;
                    $data->otkaz = $dr->otkaz;
                    $data->nevid = $dr->nevid;
                    $data->save();
                }
            }
            $this->action = "index";
        }
        if ($this->action == "index") {
            if ($this->allowed_view) {
                $this->allReports = Cleaning::find()
                        ->orderBy('id DESC')
                        ->all();
            }
        }
    }

}
