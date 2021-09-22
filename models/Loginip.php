<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class Loginip extends ActiveRecord {
    
    public static function tableName() {
        return 'loginip';
    }

    public function rules() {
        return [/*
                  'id' => Yii::t('app', 'ID'),
                  'username' => Yii::t('app', 'Username'),
                  'password' => Yii::t('app', 'Password'),
                  'authKey' => Yii::t('app', 'Auth Key'), */
        ];
    }

    public static function findActiveZayavkaByUserId($userId) {
        return self::findOne(['user_id' => $userId, 'active' => 1]);
    }
    
    public static function findIpsByUserId($userId){
        return self::findAll(['user_id' => $userId]);
    }

}

?>
