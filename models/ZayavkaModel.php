<?php

namespace app\models;

use app\models\Professions;
use Yii;
use yii\base\Model;
use app\models\Zayavka;
use app\models\Settings;
use app\models\ZayavkiFullActions;

class ZayavkaModel extends Model
{

    public $city;
    public $type;
    public $error;
    public $allowNewZayavka;
    public $activeZayavka;
    public $item;
    public $activeZcity;
    public $activeZtype;
    public $activeZdate;
    public $allZayavki;
    public $category;
    public $action;
    public $z_id;
    public $settings;
    public $userActive;
    public $approveKey;
    public $allProfessions;
    public $kovchegProfessionsOptions;
    public $smoryeProfessionsOptions;
    public $utesProfessionsOptions;
    public $commonProfessionsOptions;

    public function attributeLabels()
    {
        return [
            'city' => 'Город приобретения',
            'type' => 'Для чего заявка',
        ];
    }

    public function rules()
    {
        return [
            [['city', 'type', 'z_id', 'action'], 'required'],
        ];
    }

    public function readCitiesProfessions()
    {
        $this->commonProfessionsOptions = $this->getProfessionsHtmlForLists(Professions::getActiveByCity('common'));
        $this->kovchegProfessionsOptions = $this->getProfessionsHtmlForLists(Professions::getActiveByCity('kovcheg'));
        $this->smoryeProfessionsOptions = $this->getProfessionsHtmlForLists(Professions::getActiveByCity('smorye'));
        $this->utesProfessionsOptions = $this->getProfessionsHtmlForLists(Professions::getActiveByCity('utes'));
    }

    public function getProfessionsHtmlForLists($list)
    {
        $result = '';
        if (is_array($list) || is_object($list)) {
            foreach ($list as $pr) {
                $result .= "<option value='" . $pr->system_name . "'>" . $pr->view_name . "</option>";
            }

        }
        return $result;

    }

    public function verifyIsActiveZayavkaExists()
    {
        $this->activeZayavka = Zayavka::findActiveZayavkaByUserId(Yii::$app->user->getId());
        if ($this->activeZayavka) {
            $this->allowNewZayavka = false;
            $this->activeZayavka->type = $this->switchType($this->activeZayavka->type);
            $this->activeZayavka->city = $this->switchCity($this->activeZayavka->city);
            $this->activeZayavka->proverka_city = $this->switchCity($this->activeZayavka->proverka_city);
        } else {
            $this->allowNewZayavka = true;
        }
    }

    public function saveZayavka()
    {
        if ($this->action == "saveZayavka") {
            $this->verifyIsActiveZayavkaExists();
            if (!$this->activeZayavka) {
                $this->item = new Zayavka();
                // $this->item->proverka_city = $this->filterProverkaCity();
                $this->item->proverka_city = "kovcheg";
                $this->item->user_id = Yii::$app->user->getId();
                $this->item->city = $this->city;
                $this->item->type = $this->type;
                $this->item->active = 1;
                $this->item->date_added = date('d-m-Y H:i:s');
                $this->item->category = $this->getCategory($this->type);
                $this->item->status = 'new';
                $this->item->save();
            }
        }
    }

    public function filterProverkaCity()
    {
      return "kovcheg";
        // $loadKovcheg = 1;
        // $loadSmorye = 1;
        // $loadUtes = 1;
        // $currentKovchegCount = 0;
        // $currentSmoryeCount = 0;
        // $currentUtesCount = 0;
        // $prCity = "";
        // $this->settings = Settings::find()->all();
        // foreach ($this->settings as $setting) {
        //     if ($setting->name == "loadKovcheg") {
        //         $loadKovcheg = $setting->value;
        //     }
        //     if ($setting->name == "loadSmorye") {
        //         $loadSmorye = $setting->value;
        //     }
        //     if ($setting->name == "loadUtes") {
        //         $loadUtes = $setting->value;
        //     }
        // }
        // $currentKovchegCount = sizeof(Zayavka::findActiveZayavkiForCityAndCategory("kovcheg", $this->getCategory($this->type))->all());
        // $currentSmoryeCount = sizeof(Zayavka::findActiveZayavkiForCityAndCategory("smorye", $this->getCategory($this->type))->all());
        // $currentUtesCount = sizeof(Zayavka::findActiveZayavkiForCityAndCategory("utes", $this->getCategory($this->type))->all());
        // if (($currentKovchegCount + $currentSmoryeCount + $currentUtesCount) == 0) {
        //     if ($this->city == "common") {
        //         return "kovcheg";
        //     }
        //     return $this->city;
        // }
        // //Заявка в ковш
        // if ($this->city == "kovcheg") {
        //     if (($currentKovchegCount / ($currentKovchegCount + $currentSmoryeCount + $currentUtesCount) * 100) > $loadKovcheg) {
        //         if ($currentUtesCount / $loadUtes < $currentSmoryeCount / $loadSmorye) {
        //             $prCity = "utes";
        //         } else {
        //             if ($currentUtesCount / $loadUtes > $currentSmoryeCount / $loadSmorye) {
        //                 $prCity = "smorye";
        //             } else {
        //                 $prCity = "utes";
        //             }
        //         }
        //     } else {
        //         $prCity = "kovcheg";
        //     }
        // }
        // //Заявка в сморье        
        // if ($this->city == "smorye") {
        //     if (($currentSmoryeCount / ($currentKovchegCount + $currentSmoryeCount + $currentUtesCount) * 100) > $loadSmorye) {
        //         if ($currentKovchegCount / $loadKovcheg < $currentUtesCount / $loadUtes) {
        //             $prCity = "kovcheg";
        //         } else {
        //             if ($currentKovchegCount / $loadKovcheg > $currentUtesCount / $loadUtes) {
        //                 $prCity = "utes";
        //             } else {
        //                 $prCity = "kovcheg";
        //             }
        //         }
        //     } else {
        //         $prCity = "smorye";
        //     }
        // }
        // //Заявка в утёс        
        // if ($this->city == "utes") {
        //     if (($currentUtesCount / ($currentKovchegCount + $currentSmoryeCount + $currentUtesCount) * 100) > $loadUtes) {
        //         if ($currentKovchegCount / $loadKovcheg < $currentSmoryeCount / $loadSmorye) {
        //             $prCity = "kovcheg";
        //         } else {
        //             if ($currentKovchegCount / $loadKovcheg > $currentSmoryeCount / $loadSmorye) {
        //                 $prCity = "smorye";
        //             } else {
        //                 $prCity = "kovcheg";
        //             }
        //         }
        //     } else {
        //         $prCity = "utes";
        //     }
        // }
        // if ($this->city == "common") {
        //     if ($currentKovchegCount / $loadKovcheg < $currentSmoryeCount / $loadSmorye) {
        //         if ($currentKovchegCount / $loadKovcheg < $currentUtesCount / $loadUtes) {
        //             $prCity = "kovcheg";
        //         } else {
        //             if ($currentKovchegCount / $loadKovcheg > $currentUtesCount / $loadUtes) {
        //                 $prCity = "utes";
        //             } else {
        //                 $prCity = "kovcheg";
        //             }
        //         }
        //     } else {
        //         if ($currentKovchegCount / $loadKovcheg > $currentSmoryeCount / $loadSmorye) {
        //             if ($currentSmoryeCount / $loadSmorye < $currentUtesCount / $loadUtes) {
        //                 $prCity = "smorye";
        //             } else {
        //                 if ($currentSmoryeCount / $loadSmorye > $currentUtesCount / $loadUtes) {
        //                     $prCity = "utes";
        //                 } else {
        //                     $prCity = "utes";
        //                 }
        //             }
        //         } else {
        //             if ($currentKovchegCount / $loadKovcheg < $currentUtesCount / $loadUtes) {
        //                 $prCity = "kovcheg";
        //             } else {
        //                 if ($currentKovchegCount / $loadKovcheg > $currentUtesCount / $loadUtes) {
        //                     $prCity = "utes";
        //                 } else {
        //                     $prCity = "kovcheg";
        //                 }
        //             }
        //         }
        //     }
        // }
        // return $prCity;
    }

    public function isCancel()
    {
        //true if calncel zayavka
        if ($this->city == 0 && $this->type == 0 && $this->z_id > 0 && $this->action == 'cancelZayavka') {
            return true;
        }
        return false;
    }

    public function cancelZayavka()
    {
        $this->item = Zayavka::findOne(['id' => $this->z_id]);
        if (Yii::$app->user->getId() === $this->item->user_id) {
            if ($this->item->active === 1) {
                $this->item->active = 0;
                $this->item->status = 'cancelled';
                $this->item->date_last_update = date('d-m-Y H:i:s');
                $this->item->save();
            }
        }
    }

    public function getCategory($z_type)
    {
        return Professions::getCategoryBySystemName($z_type)->category;
//        $result = "";
//        switch ($z_type) {
//            case 'travnik':
//                $result = "trav";
//                break;
//            case 'ohotnik':
//                $result = "common";
//                break;
//            case 'portnoi':
//                $result = "common";
//                break;
//            case 'charodei':
//                $result = "common";
//                break;
//            case 'razboinik':
//                $result = "common";
//                break;
//            case 'oruzheinik':
//                $result = "common";
//                break;
//            case 'str_bashen':
//                $result = "common";
//                break;
//            case 'kapitan':
//                $result = "common";
//                break;
//            case 'str_domov':
//                $result = "common";
//                break;
//            case 'str_forpostov':
//                $result = "common";
//                break;
//            case 'str_istrochnikov':
//                $result = "common";
//                break;
//            case 'lesorub_les':
//                $result = "common";
//                break;
//            case 'plotnik_les':
//                $result = "common";
//                break;
//            case 'skornyak':
//                $result = "common";
//                break;
//            case 'vstup':
//                $result = "common";
//                break;
//            case 'reg_clan_souz':
//                $result = "klan";
//                break;
//            case 'vstup_souz':
//                $result = "klan";
//                break;
//            case 'lavochnik':
//                $result = "common";
//                break;
//            case 'naim':
//                $result = "naim";
//                break;
//            case 'lekar':
//                $result = "common";
//                break;
//            case 'drovosek':
//                $result = "common";
//                break;
//            case 'org_turnirov':
//                $result = "common";
//                break;
//            case 'ogranshik':
//                $result = "common";
//                break;
//            case 'kuznec':
//                $result = "common";
//                break;
//            case 'hudozhnik':
//                $result = "common";
//                break;
//            case 'mast_prognozov':
//                $result = "common";
//                break;
//            case 'alhimik':
//                $result = "trav";
//                break;
//            case 'torgovec_snad':
//                $result = "trav";
//                break;
//            case 'zaklinatel':
//                $result = "common";
//                break;
//            case 'ribolov':
//                $result = "common";
//                break;
//            case 'korabl_master':
//                $result = "common";
//                break;
//            case 'kamenotes':
//                $result = "common";
//                break;
//        }
//        return $result;
    }

    public function getUserZayavki()
    {
        if (is_null($this->allProfessions)) {
            $this->allProfessions = Professions::getAllProfessions();
        }
        $this->allZayavki = ZayavkiFullActions::find()
            ->where(['user_id' => Yii::$app->user->getId()])
            ->all();
        $this->replaceAllZayavkiText();
    }

    public function replaceAllZayavkiText()
    {
        if ($this->allZayavki) {
            foreach ($this->allZayavki as $zayava) {
                $zayava->city = $this->switchCity($zayava->city);
                $zayava->proverka_city = $this->switchCity($zayava->proverka_city);
                $zayava->type = $this->switchType($zayava->type);
            }
        }
    }

    public function switchCity($city)
    {
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

    public function switchType($type)
    {
        if (is_null($this->allProfessions)) {
            $this->allProfessions = Professions::getAllProfessions();
        }
        foreach ($this->allProfessions as $pr) {
            if ($pr->system_name == $type) {
                return $pr->view_name;
            }
        }
        return $type;
    }

}

?>