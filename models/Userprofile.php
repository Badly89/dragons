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
                $result = "Ковчег";
                break;
            case 'smorye':
                $result = "Среднеморье";
                break;
            case 'utes':
                $result = "Утёс дракона";
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
                $result = "Травник";
                break;
            case 'ohotnik':
                $result = "Охотник";
                break;
            case 'portnoi':
                $result = "Портной";
                break;
            case 'charodei':
                $result = "Чародей";
                break;
            case 'razboinik':
                $result = "Разбойник";
                break;
            case 'oruzheinik':
                $result = "Оружейник";
                break;
            case 'str_bashen':
                $result = "Строитель башен";
                break;
            case 'kapitan':
                $result = "Капитан корабля";
                break;
            case 'str_domov':
                $result = "Строитель домов";
                break;
            case 'str_forpostov':
                $result = "Строитель форпостов";
                break;
            case 'str_istrochnikov':
                $result = "Строитель источников";
                break;
            case 'lesorub_les':
                $result = "Лесоруб/Рудокоп(лес)";
                break;
            case 'plotnik_les':
                $result = "Плотник/метталург(лес)";
                break;
            case 'skornyak':
                $result = "Скорняк";
                break;
            case 'vstup':
                $result = "Вступление в клан";
                break;
            case 'reg_clan_souz':
                $result = "Регистрация клана/союза";
                break;
            case 'vstup_souz':
                $result = "Вступление в союз";
                break;            
            case 'lavochnik':
                $result = "Лавочник/торговец";
                break;
            case 'naim':
                $result = "Наёмник/Оф.найм";
                break;
            case 'lekar':
                $result = "Лекарь";
                break;
            case 'drovosek':
                $result = "Дровосек/рудокоп";
                break;
            case 'org_turnirov':
                $result = "Организатор турниров";
                break;
            case 'ogranshik':
                $result = "Огранщик";
                break;
            case 'kuznec':
                $result = "Кузнец";
                break;
            case 'hudozhnik':
                $result = "Художник";
                break;
            case 'mast_prognozov':
                $result = "Мастер прогнозов";
                break;
            case 'alhimik':
                $result = "Алхимик";
                break;
            case 'torgovec_snad':
                $result = "Торговец снадобьями";
                break;
            case 'zaklinatel':
                $result = "Заклинатель";
                break;
            case 'ribolov':
                $result = "Дровосек/рыболов";
                break;
            case 'korabl_master':
                $result = "Корабельный мастер";
                break;
            case 'kamenotes':
                $result = "Дровосек/каменотес";
                break;
        }
        return $result;
    }

}
