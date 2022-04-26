<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class ZayavkiFullActions extends ActiveRecord {
    
    public static function tableName() {
        return 'zayavkiFullActions';
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
