<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Users;
use app\models\Forum;
use app\models\PasswordResetAttempts;
use app\models\BusyLogin;

class LoginBusy extends \yii\base\Model {

    public $username;
    public $apeha_id;
    public $secretKey;
    public $passwordreset_tries;
    public $errorMsg;
    public $success;

    public function rules() {
        return [
            // username and password are both required
            [
                ['username'], 'required'],
            [['secretkey', 'passwordreset_tries'], 'emptyValidation'],
        ];
    }

    public function emptyValidation() {
        
    }

    public function attributeLabels() {
        return [
            'username' => 'Ник',
        ];
    }

    public function passwordResetAttempts() {
        $this->passwordreset_tries = PasswordResetAttempts::getAttemptsLastHour(Yii::$app->request->getUserIP());
    }

    public function sayLoginBusy() {
        $this->success = false;
        $proceed = true;
        //check that claim not exists
        if ($proceed) {
            if (!Users::findByUsername(htmlentities($this->username))) {
                $this->errorMsg = "Пользователь с ником <b>".$this->username."</b> не зарегистрирован.<br>Вы можете пройти регистрацию.";
                $proceed = false;
            }
        }
        if ($proceed) {
            if (BusyLogin::getClaimByUserId(Users::findByUsername(htmlentities($this->username)))) {
                $this->errorMsg = "Уже на рассмотрении. Повторная подача не ускорит процесс.";
                $proceed = false;
            }
        }
        if ($proceed) {
            $user = Users::findByUsername(htmlentities($this->username));
            $claim = new BusyLogin();
            $claim->user_id = $user->id;
            $claim->ip = Yii::$app->request->getUserIP();
            $claim->save();
            $this->success = true;
        }
        $this->addRestorePasswordAttempt();
    }

    public function addRestorePasswordAttempt() {
        $attempt = new PasswordResetAttempts();
        $attempt->ip = Yii::$app->request->getUserIP();
        $attempt->date = date('d-m-Y H:i:s');
        $attempt->save();
    }

}
