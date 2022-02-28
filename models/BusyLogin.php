<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class BusyLogin extends ActiveRecord {

    public static function tableName() {
        return 'busylogin';
    }

    public function rules() {
        return [/*
                  'id' => Yii::t('app', 'ID'),
                  'username' => Yii::t('app', 'Username'),
                  'password' => Yii::t('app', 'Password'),
                  'authKey' => Yii::t('app', 'Auth Key'), */
        ];
    }

    public static function getClaimByUserId($userId) {
        return self::findOne(['user_id' => $userId]);
    }
    
    public static function getRequestsCount() {
        return self::find()->count();
    }

}

?>
