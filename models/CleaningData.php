<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class CleaningData extends ActiveRecord {
    
    public static function tableName() {
        return 'cleaning_data';
    }

    public function rules() {
        return [/*
                  'id' => Yii::t('app', 'ID'),
                  'username' => Yii::t('app', 'Username'),
                  'password' => Yii::t('app', 'Password'),
                  'authKey' => Yii::t('app', 'Auth Key'), */
        ];
    }


}

?>
