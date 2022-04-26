<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class Actions extends ActiveRecord {
    
    public static function tableName() {
        return 'actions';
    }

    public function rules() {
        return [/*
                  'id' => Yii::t('app', 'ID'),
                  'username' => Yii::t('app', 'Username'),
                  'password' => Yii::t('app', 'Password'),
                  'authKey' => Yii::t('app', 'Auth Key'), */
        ];
    }

    public static function findActionsByZid($zid){
        return self::findAll(['zayavka_id' => $zid]);
    }
    
        public static function findActiveActionsByZid($zid){
        return self::findAll(['zayavka_id' => $zid, 'active'=> 1]);
    }
}

?>
