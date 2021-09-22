<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class LibrarySectionsModel extends ActiveRecord
{

    public static function tableName()
    {
        return 'library_sections';
    }

    public function rules()
    {
        return [];
    }

    public static function getAll()
    {
        return self::find()->all();
    }

    public static function getAllActive()
    {
        return self::find()
            ->where(['visible' => 1])
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
