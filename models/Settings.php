<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class Settings extends ActiveRecord {
    
    public static function tableName() {
        return 'settings';
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

}

?>
