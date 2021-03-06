<?php

namespace app\models;

use Yii;
use Text;
use yii\base\Model;
use app\models\Users;
use app\models\Loginip;
use app\models\Zayavka;
use app\models\Dragonsrights;

class Userprofile extends \yii\base\Model {

    public $action;
    public $userId;
    public $user;
    public $dragonSettings;
    public $text;
    public $loginips;
    public $userZayavki;
    public $dragonrights;
    public $dragonid;
    public $superadmin;
    public $kovcheg;
    public $smorye;
    public $utes;
    public $boss;
    public $boi_prov;
    public $per_prov;
    public $boi;
    public $peredachi;
    public $fullbp;
    public $prokli;
    public $katorga;
    public $ban;
    public $chistota;
    public $nevid;
    public $adminUserRights;
    public $alias;
    public $approver;

    public function rules() {
        return [
                [['action', 'userId'], 'required'],
                [['userName', 'approver','dragonName', 'dragonid', 'superadmin',
            'kovcheg', 'smorye', 'utes', 'boss', 'boi_prov', 'per_prov', 'boi',
            'peredachi', 'fullbp', 'alias', 'prokli', 'katorga', 'ban', 'chistota', 'nevid'], 'emptyValidate']
        ];
    }
    
    public function getAdminRights() {
        $this->adminUserRights = Dragonsrights::findOneById(Yii::$app->user->getId());
    }
    
    public function updateAlias() {
        $currentUser = Users::findById(Yii::$app->user->getId());
        if($currentUser->groupId > 1){
            if($currentUser->id == $this->userId){
                if(sizeof(Users::findUserByAlias(strip_tags(trim($this->alias)))) == 0){
                    $currentUser->alias = strip_tags(trim($this->alias));
                    $currentUser->save();
                }
            }
        }
    }

    public function updateDragonRights() {
        $this->dragonrights = Dragonsrights::findOneById($this->userId);
        $this->dragonrights->kovcheg = $this->kovcheg;
        $this->dragonrights->smorye = $this->smorye;
        $this->dragonrights->utes = $this->utes;
        $this->dragonrights->boss = $this->boss;
        $this->dragonrights->boi_prov = $this->boi_prov;
        $this->dragonrights->per_prov = $this->per_prov;
        $this->dragonrights->boi = $this->boi;
        $this->dragonrights->peredachi = $this->peredachi;
        $this->dragonrights->fullbp = $this->fullbp;
        $this->dragonrights->prokli = $this->prokli;
        $this->dragonrights->katorga = $this->katorga;
        $this->dragonrights->ban = $this->ban;
        $this->dragonrights->chistota = $this->chistota;
        $this->dragonrights->nevid = $this->nevid;
        $this->dragonrights->approver = $this->approver;
        if(Users::findGroupById(Yii::$app->user->getId()) == 99){
            $this->dragonrights->superadmin = $this->superadmin;
            $this->user = Users::findById($this->dragonrights->dragonid);
            if($this->superadmin == true){
                $this->user->groupId = 99;
            }else{
                $this->user->groupId = 10;
            }
            $this->user->save();
        }
        $this->dragonrights->save();
        
    }

    public function loadUserDetails() {
        $this->user = Users::findById($this->userId);
        if ($this->user) {
            $this->loginips = Loginip::findIpsByUserId($this->userId);
            $this->userZayavki = Zayavka::find()->where(['user_id' => $this->userId])->orderBy('id DESC')->all();
            if (sizeof($this->userZayavki) > 0) {
                foreach ($this->userZayavki as $zayavka) {
                    $zayavka->type = $this->switchType($zayavka->type);
                    $zayavka->city = $this->switchCity($zayavka->city);
                }
            }
            if ($this->user->groupId > 9) {
                $this->dragonrights = Dragonsrights::findOneById($this->userId);
                if (!$this->dragonrights) {
                    $this->dragonrights = new Dragonsrights();
                    $this->dragonrights->dragonid = $this->userId;
                    if ($this->user->groupId == 99) {
                        $this->dragonrights->superadmin = true;
                    } else {
                        $this->dragonrights->superadmin = false;
                    }
                    $this->dragonrights->kovcheg = false;
                    $this->dragonrights->smorye = false;
                    $this->dragonrights->utes = false;
                    $this->dragonrights->boss = false;
                    $this->dragonrights->boi_prov = false;
                    $this->dragonrights->per_prov = false;
                    $this->dragonrights->boi = false;
                    $this->dragonrights->peredachi = false;
                    $this->dragonrights->fullbp = false;
                    $this->dragonrights->prokli = false;
                    $this->dragonrights->katorga = false;
                    $this->dragonrights->ban = false;
                    $this->dragonrights->chistota = false;
                    $this->dragonrights->nevid = false;
                    $this->dragonrights->approver = false;
                    $this->dragonrights->save();
                    $this->dragonrights = Dragonsrights::findOneById($this->userId);
                }
                $this->text = "It's a dragon";
            } else {
                $this->text = "It's not a dragon";
            }
        }
    }

    public function emptyValidate() {
        
    }

    public function switchCity($city) {
        $result = "";
        switch ($city) {
            case 'kovcheg':
                $result = "????????????";
                break;
            case 'smorye':
                $result = "??????????????????????";
                break;
            case 'utes':
                $result = "???????? ??????????????";
                break;
            case 'common':
                $result = "";
                break;
        }
        return $result;
    }

    public function switchType($type) {
        $result = "";
        switch ($type) {
            case 'travnik':
                $result = "??????????????";
                break;
            case 'ohotnik':
                $result = "??????????????";
                break;
            case 'portnoi':
                $result = "??????????????";
                break;
            case 'charodei':
                $result = "??????????????";
                break;
            case 'razboinik':
                $result = "??????????????????";
                break;
            case 'oruzheinik':
                $result = "??????????????????";
                break;
            case 'str_bashen':
                $result = "?????????????????? ??????????";
                break;
            case 'kapitan':
                $result = "?????????????? ??????????????";
                break;
            case 'str_domov':
                $result = "?????????????????? ??????????";
                break;
            case 'str_forpostov':
                $result = "?????????????????? ??????????????????";
                break;
            case 'str_istrochnikov':
                $result = "?????????????????? ????????????????????";
                break;
            case 'lesorub_les':
                $result = "??????????????/??????????????(??????)";
                break;
            case 'plotnik_les':
                $result = "??????????????/??????????????????(??????)";
                break;
            case 'skornyak':
                $result = "??????????????";
                break;
            case 'vstup':
                $result = "???????????????????? ?? ????????";
                break;
            case 'reg_clan_souz':
                $result = "?????????????????????? ??????????/??????????";
                break;
            case 'vstup_souz':
                $result = "???????????????????? ?? ????????";
                break;            
            case 'lavochnik':
                $result = "????????????????/????????????????";
                break;
            case 'naim':
                $result = "??????????????/????.????????";
                break;
            case 'lekar':
                $result = "????????????";
                break;
            case 'drovosek':
                $result = "????????????????/??????????????";
                break;
            case 'org_turnirov':
                $result = "?????????????????????? ????????????????";
                break;
            case 'ogranshik':
                $result = "????????????????";
                break;
            case 'kuznec':
                $result = "????????????";
                break;
            case 'hudozhnik':
                $result = "????????????????";
                break;
            case 'mast_prognozov':
                $result = "???????????? ??????????????????";
                break;
            case 'alhimik':
                $result = "??????????????";
                break;
            case 'torgovec_snad':
                $result = "???????????????? ????????????????????";
                break;
            case 'zaklinatel':
                $result = "??????????????????????";
                break;
            case 'ribolov':
                $result = "????????????????/??????????????";
                break;
            case 'korabl_master':
                $result = "?????????????????????? ????????????";
                break;
            case 'kamenotes':
                $result = "????????????????/??????????????????";
                break;
        }
        return $result;
    }

}
