<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class NotepadModel extends ActiveRecord
{

    public static function tableName()
    {
        return 'notepad';
    }

    public static function primaryKey()
    {
        return ['user_id'];
    }

    public function rules()
    {
        return [/*
                  'id' => Yii::t('app', 'ID'),
                  'username' => Yii::t('app', 'Username'),
                  'password' => Yii::t('app', 'Password'),
                  'authKey' => Yii::t('app', 'Auth Key'), */
        ];
    }

    public static function findOneByUserId($userId)
    {
        return self::findone(['user_id' => $userId]);
    }

}

?>
