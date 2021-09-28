<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class Professions extends ActiveRecord
{

    public static function tableName()
    {
        return 'professions';
    }

    public static function primaryKey()
    {
        return ['id'];
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

    public static function getAllProfessions()
    {
        return self::find()->all();
    }

    public static function getCategoryBySystemName($systemName)
    {
        return self::findOne(['system_name' => $systemName]);
    }


    public static function getAllByCity($city)
    {
        return self::findAll(['city' => $city]);
    }

    public static function getActiveByCity($city)
    {
        return self::findAll(['city' => $city, 'active' => true]);
    }

    public static function getById($id)
    {
        return self::findOne(['id' => $id]);
    }

    public static function getByCityAndSystemName($city, $systemName)
    {
        return self::findOne(['city' => $city, 'system_name' => $systemName]);
    }

}

?>
