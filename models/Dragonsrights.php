<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class Dragonsrights extends ActiveRecord {
    
    public static function tableName() {
        return 'dragonsrights';
    }

    public function rules() {
        return [/*
                  'id' => Yii::t('app', 'ID'),
                  'username' => Yii::t('app', 'Username'),
                  'password' => Yii::t('app', 'Password'),
                  'authKey' => Yii::t('app', 'Auth Key'), */
        ];
    }

    public static function findOneById($userId){
        return self::findone(['dragonid' => $userId]);
    }
    
    public static function isApprover($dragon_id) {
        if(self::findone(['dragonid' => $dragon_id])->approver == 1){
            return true;
        }
        return false;
    }

}

?>
