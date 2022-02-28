<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;
use app\models\Actions;

class Zayavka extends ActiveRecord {

    public static function tableName() {
        return 'zayavka';
    }

    public function rules() {
        return [/*
                  'id' => Yii::t('app', 'ID'),
                  'username' => Yii::t('app', 'Username'),
                  'password' => Yii::t('app', 'Password'),
                  'authKey' => Yii::t('app', 'Auth Key'), */
        ];
    }

    public static function getUserZayavkaTodayCount($user_id) {
        $startD = date_create_from_format('d-m-Y H:i:s', date('d-m-Y') . ' 00:00:00');
        $endD = date_create_from_format('d-m-Y H:i:s', date('d-m-Y') . ' 00:00:00');
        $endD->modify('+1 day');
        $zayavki = self::find()
                ->where(['user_id' => $user_id])
                ->all();
        $count = 0;
        foreach ($zayavki as $z) {
            $z_date_added = date_create_from_format('d-m-Y H:i:s', $z->date_added);
            if ($z_date_added > $startD && $z_date_added < $endD) {
                $count++;
            }
        }
        return $count++;
    }

    public static function findActiveZayavkaByUserId($userId) {
        return self::findOne(['user_id' => $userId, 'active' => 1]);
    }

    public static function findAllZayavkiForCity($city) {
        return self::findAll(['proverka_city' => $city]);
    }

    public static function findZayavkaById($id) {
        return self::findOne(['id' => $id]);
    }

    public static function findAllZayavkiForCityAndCategory($city, $category) {
        return self::find()
                        ->where(['proverka_city' => $city])
                        ->andWhere(['category' => $category])
                        ->all();
    }

    public static function findAllZayavkiForCityAndCategoryWithoutAll($city, $category) {
        return self::find()
                        ->where(['proverka_city' => $city])
                        ->andWhere(['category' => $category]);
    }

    public static function findActiveZayavkiForCityAndCategory($city, $category) {
        return self::find()
                        ->where(['proverka_city' => $city])
                        ->andWhere(['category' => $category])
                        ->andWhere(['active' => 1]);
    }

    public static function getNewItemsCount($cities) {
        return self::find()
                        ->where(['status' => 'new'])
                        ->andWhere(['proverka_city' => $cities])
                        ->count();
    }

    public static function getReadyItemsCount($cities) {
        $count = 0;
        $zayavki = self::find()
                ->where(['active' => 1])
                ->andWhere(['proverka_city' => $cities])
                ->all();
        foreach ($zayavki as $z) {
            $actions = Actions::findActiveActionsByZid($z->id);
            foreach ($actions as $action) {
                if ($action->action == "bp_done" || $action->action == "bp_done_recheck" || $action->action == "p_done_recheck" || $action->action == "b_done_recheck") {
                    $count++;
                }
            }
        }
        return $count;
    }

    public static function getAwaitingNevid($cities) {
        $count = 0;
        $zayavki = self::find()
                ->where(['active' => 1])
                ->andWhere(['proverka_city' => $cities])
                ->all();
        foreach ($zayavki as $z) {
            // select * from actions where zayavka_id = 9 and active = 1 ORDER by id DESC LIMIT 1
            $actions = Actions::findActiveActionsByZid($z->id);
            foreach ($actions as $action) {
                if ($action->action == "dopproverka_bp" || $action->action == "dopproverka_p") {
                    $count++;
                }
            }
        }
        return $count;
    }

    public static function getReadyAndNevidReadyItems($cities) {
        $nevid_count = 0;
        $ready_count = 0;
        $zayavki = self::find()
                ->where(['active' => 1])
                ->andWhere(['proverka_city' => $cities])
                ->all();
        foreach ($zayavki as $z) {
            $actions = Actions::findActiveActionsByZid($z->id);
            foreach ($actions as $action) {
                if ($action->action == "dopproverka_bp" || $action->action == "dopproverka_p") {
                    $nevid_count++;
                }
                if ($action->action == "bp_done" || $action->action == "bp_done_recheck" || $action->action == "p_done_recheck" || $action->action == "b_done_recheck") {
                    $ready_count++;
                }
            }
        }
        return $ready_count."|".$nevid_count;
    }

}

?>
