<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class Users extends ActiveRecord implements \yii\web\IdentityInterface {
    /* public $id;
      @property string $username;
      @property string $apeha_id;
      @property string $groupId;
      @property string $date_registered;
      @property string $date_lastseen;
      @property string $ips;
      @property string $password;
      @property string $newpassword;
      @property string $authKey;
      @property string $approveKey;
      @property string $last_session_id;
     */

    public static function tableName() {
        return 'users';
    }

    public function rules() {
        return [/*
                  'id' => Yii::t('app', 'ID'),
                  'username' => Yii::t('app', 'Username'),
                  'password' => Yii::t('app', 'Password'),
                  'authKey' => Yii::t('app', 'Auth Key'), */
        ];
    }

    public function afterFind() {
        
    }

    public static function findByUsername($username) {
        return self::findOne(['username' => $username]);
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getAuthKey() {
        return $this->authKey;
    }

    public function getId() {
        return $this->id;
    }

    public static function findById($id) {
        return self::findOne(['id' => $id]);
    }

    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function findGroupById($id) {
        return self::findOne($id)->groupId;
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new \yii\base\NotSupportedException;
    }

    public function validateNewPassword($password) {
        return $this->newpassword === $password;
    }
    public function validatePassword($password) {
        return $this->password === $password;
    }

    public static function findUserByAlias($alias) {
        return self::findOne(['alias' => $alias]);
    }

    public static function isUserActive($id) {
        if (self::findOne(['id' => $id])->active == 1) {
            return true;
        }
        return false;
    }

    public static function getApprovalCount() {
        $count = self::find()
                ->Where(['<>', 'approveKey', ''])
                ->count();
        return $count;
    }

    public static function getNewUsers() {
        return self::find()
                        ->where(['active' => '0'])
                        ->andWhere(['<>', 'approveKey', ''])
                        ->all();
    }

    public static function getRestoreUsers() {
        return self::find()
                        ->where(['active' => 1])
                        ->andWhere(['<>', 'approveKey', ''])
                        ->all();
    }
    
    public static function getConfirmationCode($id) {
        return self::findOne(['id' => $id])->approvekey;
    }

}

?>