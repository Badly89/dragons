<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class LastActiveActions extends ActiveRecord {

    public static function tableName() {
        return 'lastActiveActions';
    }

    public function rules() {
        return [/*
                  'id' => Yii::t('app', 'ID'),
                  'username' => Yii::t('app', 'Username'),
                  'password' => Yii::t('app', 'Password'),
                  'authKey' => Yii::t('app', 'Auth Key'), */
        ];
    }

    public static function getReadyAndNevidReadyItems($cities) {
        $nevid_count = 0;
        $ready_count = 0;
        $zayavki = self::find()
                ->where(['proverka_city' => $cities])
                ->all();
        foreach ($zayavki as $z) {
            if ($z->action == "dopproverka_bp" || $z->action == "dopproverka_p") {
                $nevid_count++;
            }
            if ($z->action == "bp_done" || $z->action == "bp_done_recheck" || $z->action == "p_done_recheck" || $z->action == "b_done_recheck" || $z->action == "p_done") {
                $ready_count++;
            }
        }
        return $ready_count . "|" . $nevid_count;
    }

    public static function getNevidReadyItems($cities) {
        $nevidZayavkiIds = [];
        $zayavki = self::find()
                ->where(['proverka_city' => $cities])
                ->all();
        foreach ($zayavki as $z) {
            if ($z->action == "dopproverka_bp" || $z->action == "dopproverka_p") {
                array_push($nevidZayavkiIds, $z->zayavka_id);
            }
        }
        return $nevidZayavkiIds;
    }
    
    public static function getReadyItems($cities) {
        $readyZayavkiIds = [];
        $zayavki = self::find()
                ->where(['proverka_city' => $cities])
                ->all();
        foreach ($zayavki as $z) {
            if ($z->action == "bp_done" || $z->action == "bp_done_recheck" || $z->action == "p_done_recheck" || $z->action == "b_done_recheck" || $z->action == "p_done") {
                array_push($readyZayavkiIds, $z->zayavka_id);
            }
        }
        return $readyZayavkiIds;
    }    

}

?>
