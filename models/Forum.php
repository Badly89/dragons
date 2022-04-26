<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class Forum extends ActiveRecord {
    
    public static function tableName() {
        return 'phpbb_users';
    }

    public function rules() {
        return [/*
                  'id' => Yii::t('app', 'ID'),
                  'username' => Yii::t('app', 'Username'),
                  'password' => Yii::t('app', 'Password'),
                  'authKey' => Yii::t('app', 'Auth Key'), */
        ];
    }

    public static function getAllSettings() {
        return self::find()->all();
    }
    
    public static function getUserByUsername($username) {
        return self::findOne(['username' => $username]);
    }

}

?>
