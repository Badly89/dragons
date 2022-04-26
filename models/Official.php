<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class Official extends ActiveRecord {

    public static function tableName() {
        return 'official';
    }

    public function rules() {
        return [/*
                  'id' => Yii::t('app', 'ID'),
                  'username' => Yii::t('app', 'Username'),
                  'password' => Yii::t('app', 'Password'),
                  'authKey' => Yii::t('app', 'Auth Key'), */
        ];
    }

    public static function getAll() {
        return self::find()->all();
    }

    public static function getAllActive() {
        return self::find()
                        ->where(['active' => 1])
                        ->all();
    }

    public static function getAllActiveOrderByDesc() {
        return self::find()
                        ->where(['active' => 1])
                        ->orderBy([
                            'pinned' => SORT_DESC,
                            'id' => SORT_DESC
                        ])
                        ->all();
    }

    public static function getAllOrderByDesc() {
        return self::find()
                        ->orderBy([
                            'pinned' => SORT_DESC,
                            'id' => SORT_DESC
                        ])
                        ->all();
    }

    public static function getOneById($id) {
        return self::findOne(['id' => $id]);
    }

}

?>
