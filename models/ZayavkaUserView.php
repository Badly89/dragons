<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class ZayavkaUserView extends ActiveRecord {

    public static function tableName() {
        return 'zayavka_user_view';
    }

    public function rules() {
        return [/*
                  'id' => Yii::t('app', 'ID'),
                  'username' => Yii::t('app', 'Username'),
                  'password' => Yii::t('app', 'Password'),
                  'authKey' => Yii::t('app', 'Auth Key'), */
        ];
    }

    public static function findAllZayavkiForCityAndCategory($city, $category) {
        return self::find()
                        ->where(['proverka_city' => $city])
                        ->andWhere(['category' => $category])
                        ->all();
    }

    public static function findAllZayavkiForCityAndCategoryWithoutAll($city, $category) {
        return self::find()
                        ->where(['proverka_city' => $city])
                        ->andWhere(['category' => $category]);
    }
    
    public static function getZayavkaUserViewById($id){
        return self::findOne(['zId' => $id]);
    }

}

?>
