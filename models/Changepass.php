<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Users;
use app\models\Forum;
use app\models\PasswordResetAttempts;
use app\models\Logs;

class Changepass extends \yii\base\Model {

    public $error_message;
    public $error;
    public $pers_id;
    public $user;
    public $forumuser;
    private $_user = false;
    public $action;
    public $oldPassword;
    public $newPassword;
    public $newPasswordRepeat;
    public $passwordChanged;
    public $activeUser;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            // username and password are both required
            [
                ['oldPassword', 'newPassword', 'newPasswordRepeat', '_afr'], 'required'],
            [
                ['action', 'passwordChanged'], 'emptyValidate'],
            [
                ['newPassword', 'newPasswordRepeat'], 'passwordEquals'],
        ];
    }

    public function attributeLabels() {
        return [
            'oldPassword' => 'Старый пароль',
            'newPassword' => 'Новый пароль',
            'newPasswordRepeat' => 'Новый пароль'
        ];
    }

    public function passwordEquals() {
        if ($this->newPassword == $this->newPasswordRepeat) {
            return true;
        }
        return false;
    }

    public function emptyValidate() {
        
    }

    public function passwordResetAttempts() {
        $this->passwordreset_tries = PasswordResetAttempts::getAttemptsLastHour(Yii::$app->request->getUserIP());
    }

    public function proccessRequest() {
        $current_user = Users::findById(Yii::$app->user->getId());
        if ($current_user->active == 1) {
            $this->activeUser = 1;
        }
        $log = new Logs();
        $this->passwordChanged = false;
        $success = false;
        $this->error_message = "";
        if (!isset($this->action)) {
            $this->action = "index";
        } else {
            if ($this->action == "changePassword") {
                $continue = true;

                //CHANGE PASSWORD HERE:
                if (strlen(trim($this->oldPassword)) < 5) {
                    $continue = false;
                    $this->error_message = "Текущий пароль введён неверно";
                    $log->addRecord($current_user->id, $current_user->username, Yii::$app->request->getUserIP(), "[PASS_CHANGE] Wrong old password", "FAIL");
                }
                if ($continue) {
                    if (!$this->validateOldPassword()) {
                        $continue = false;
                        $this->error_message = "Текущий пароль введён неверно";
                        $log->addRecord($current_user->id, $current_user->username, Yii::$app->request->getUserIP(), "[PASS_CHANGE] Wrong old password", "FAIL");
                    }
                }
                if ($continue) {
                    if (strlen(trim($this->newPassword)) < 8) {
                        $continue = false;
                        $this->error_message = "Новый пароль слишком короткий";
                        $log->addRecord($current_user->id, $current_user->username, Yii::$app->request->getUserIP(), "[PASS_CHANGE] New password too short", "FAIL");
                    }
                }
                if ($continue) {
                    if (trim($this->newPassword) == trim($this->newPasswordRepeat)) {
                        
                    } else {
                        $continue = false;
                        $this->error_message = "Введённые пароли не совпадают";
                        $log->addRecord($current_user->id, $current_user->username, Yii::$app->request->getUserIP(), "[PASS_CHANGE] New password validation error. Passwords mismatch", "FAIL");
                    }
                }
                if ($continue) {
                    if (!$this->validateNewPassword()) {
                        $continue = false;
                        $this->error_message = "Новый пароль не соответствует требованиям безопасности";
                        $log->addRecord($current_user->id, $current_user->username, Yii::$app->request->getUserIP(), "[PASS_CHANGE] New password validation error", "FAIL");
                    }
                }
                if ($continue) {
                    if ($this->changePassword()) {
                        $success = true;
                        $this->passwordChanged = true;
                        $log->addRecord($current_user->id, $current_user->username, Yii::$app->request->getUserIP(), "[PASS_CHANGE] Password has been changed", "SUCCESS");
                    } else {
                        $this->error_message = "Something went wrong at last step :(";
                        $log->addRecord($current_user->id, $current_user->username, Yii::$app->request->getUserIP(), "[PASS_CHANGE] Something went wrong", "FAIL");
                    }
                }
                //END OF PASSWORD CHANGE.
                if (!$success) {
                    $this->oldPassword = "";
                    $this->newPassword = "";
                    $this->newPasswordRepeat = "";
                    $this->action = "retry";
                } else {
                    $this->action = "success";
                }
            } else {
                $this->action = "index";
            }
        }
    }

    public function showInitialPage() {
        $current_user = Users::findById(Yii::$app->user->getId());
        $this->action = "index";
        if ($current_user->active == 1) {
            $this->activeUser = 1;
        } else {
            $this->activeUser = 0;
        }
    }

    public function changePassword() {
        try {
            if (Users::findById(Yii::$app->user->getId())) {
                $this->user = Users::findById(Yii::$app->user->getId());
                if ($this->user->active == 1) {
                    $this->user->password = md5(trim($this->newPassword));
                    $this->user->authKey = Yii::$app->getSecurity()->generateRandomString(12);
                    $this->user->save();
                    $forumUser = Forum::findOne(['username' => $this->user->username]);
                    $forumUser->user_password = md5(trim($this->newPassword));
                    $forumUser->user_form_salt = "";
                    $forumUser->save();
                    return true;
                }
            }
        } catch (Exception $exc) {
            return false;
        }
        return false;
    }

    public function validateNewPassword() {
        $uppercase = preg_match('@[A-Z]@', $this->newPassword);
        $lowercase = preg_match('@[a-z]@', $this->newPassword);
        $number = preg_match('@[0-9]@', $this->newPassword);
        if (!$uppercase || !$lowercase || !$number) {
            return false;
        } else {
            return true;
        }
        return false;
    }

    public function validateOldPassword() {
        $result = false;
        if (Yii::$app->user->isGuest) {
            return false;
        } else {
            if (md5(trim($this->oldPassword)) == Users::findById(Yii::$app->user->getId())->password) {
                $result = true;
            }
        }
        return $result;
    }

}

?>