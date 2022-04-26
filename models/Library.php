<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class Library extends ActiveRecord
{

    public static function tableName()
    {
        return 'library';
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

    public static function getAll()
    {
        return self::find()->all();
    }

    public static function getAllActive()
    {
        return self::find()
            ->where(['active' => 1])
            ->all();
    }

    public static function getAllByLibrarySectionId($id)
    {
        return self::find()
            ->where(['section_id' => $id])
            ->orderBy([
                'pinned' => SORT_DESC,
                'id' => SORT_DESC
            ])
            ->all();
    }

    public static function getAllActiveByLibrarySectionId($id)
    {
        return self::find()
            ->where(['section_id' => $id])
            ->andWhere(['active' => 1])
            ->orderBy([
                'pinned' => SORT_DESC,
                'id' => SORT_DESC
            ])
            ->all();
    }

    public static function getAllActiveOrderByDesc()
    {
        return self::find()
            ->where(['active' => 1])
            ->orderBy([
                'pinned' => SORT_DESC,
                'id' => SORT_DESC
            ])
            ->all();
    }

    public static function getAllOrderByDesc()
    {
        return self::find()
            ->orderBy([
                'pinned' => SORT_DESC,
                'id' => SORT_DESC
            ])
            ->all();
    }

    public static function getOneById($id)
    {
        return self::findOne(['id' => $id]);
    }

}

?>
