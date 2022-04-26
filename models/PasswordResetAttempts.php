<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;
use \DateTime;
use \DateInterval;

class PasswordResetAttempts extends ActiveRecord {

    public static function tableName() {
        return 'passwordreset_attempts';
    }

    public function rules() {
        return [/*
                  'id' => Yii::t('app', 'ID'),
                  'username' => Yii::t('app', 'Username'),
                  'password' => Yii::t('app', 'Password'),
                  'authKey' => Yii::t('app', 'Auth Key'), */
        ];
    }

    public static function getAttemptsLastHour($ip) {
        $count = 0;
        $allFailsFromIp = self::find()
                ->where(['ip' => $ip])
                ->all();
        $date_temp = DateTime::createFromFormat("d-m-Y H:i:s", date('d-m-Y H:i:s'));
        $date_temp->sub(new DateInterval('PT1H'));
        $hour_ago = $date_temp->getTimestamp();
        foreach ($allFailsFromIp as $fail) {
            $dtime = DateTime::createFromFormat("d-m-Y H:i:s", $fail->date);
            $timestamp = $dtime->getTimestamp();
            if ($timestamp > $hour_ago) {
                $count++;
            } else {
                $fail->delete();
            }
        }
        return $count;
    }

}

?>
