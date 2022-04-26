<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class Log extends ActiveRecord {
    
    public static function tableName() {
        return 'log';
    }
   
    
}

?>
