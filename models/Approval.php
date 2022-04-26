<?php

namespace app\models;

use app\models\Forum;
use Yii;
use Text;
use yii\base\Model;
use app\models\Settings;
use app\models\Users;
use app\models\ForumGroupModel;
use app\models\BusyLogin;
use app\models\Actions;
use app\models\Zayavka;
use app\models\Dragonsrights;
use app\models\Loginip;
use app\models\Logs;

class Approval extends \yii\base\Model
{

    public $action;
    public $userId;
    public $busyId;
    public $waitCount;
    public $newUsers;
    public $busyLogins;
    public $restoreUsers;

    public function rules()
    {
        return [
            [['action', 'userId', 'busyId'], 'emptyValidate']
        ];
    }

    public function proccessActions()
    {
        $current_user = Users::findById(Yii::$app->user->getId());
        $log = new Logs();
        if ($this->action == "approveNewUser") {
            $user = Users::findById($this->userId);
            if ($user->active == 0) {
                //site activation
                $user->active = 1;
                $user->approvekey = "";
                $user->newpassword = "";
                $user->save();
                //forum activation
                $forumUser = Forum::findOne(['username' => $user->username]);
                $forumUser->user_type = 0;
                $forumUser->save();
                $log->addRecord($current_user->id, $current_user->username, Yii::$app->request->getUserIP(), "[USER_APPROVAL] username: " . $user->username . " | userId: " . $this->userId . " ", "APPROVED");
            }
        }
        if ($this->action == "rejectNewUser") {
            $user = Users::findById($this->userId);
            if ($user->active == 0) {
                $forumUser = Forum::findOne(['username' => $user->username]);
                if (!is_null($forumUser)) {
                    if ($forumUser->user_type == 1) {
                        ForumGroupModel::deleteAll(['user_id' => $forumUser->user_id]);
                        $forumUser->delete();
                    }
                }
                $log->addRecord($current_user->id, $current_user->username, Yii::$app->request->getUserIP(), "[USER_APPROVAL] username: " . $user->username . " | userId: " . $this->userId . " ", "REJECTED");
                $user->delete();
            }
        }
        if ($this->action == "approveRestoreUser") {
            $user = Users::findById($this->userId);
            if (strlen($user->approvekey) > 0 && strlen($user->newpassword) > 0) {
                $forumUser = Forum::findOne(['username' => $user->username]);
                $forumUser->user_password = $user->newpassword;
                $forumUser->user_form_salt = "";
                $forumUser->save();
                $user->password = $user->newpassword;
                $user->newpassword = "";
                $user->approvekey = "";
                $user->authKey = Yii::$app->getSecurity()->generateRandomString(12);
                $user->save();
                $log->addRecord($current_user->id, $current_user->username, Yii::$app->request->getUserIP(), "[PASS_RESET] username: " . $user->username . " | userId: " . $this->userId . " ", "APPROVED");
            }
        }
        if ($this->action == "rejectRestoreUser") {
            $user = Users::findById($this->userId);
            if (strlen($user->approvekey) > 0 && strlen($user->newpassword) > 0) {
                $user->newpassword = "";
                $user->approvekey = "";
                $log->addRecord($current_user->id, $current_user->username, Yii::$app->request->getUserIP(), "[PASS_RESET] username: " . $user->username . " | userId: " . $this->userId . " ", "REJECTED");
                $user->save();
            }
        }
        if ($this->action == "rejectDeleteUser") {
            $busyLogin = BusyLogin::findOne(['id' => $this->busyId]);
            $busyLogin->delete();
        }
        if ($this->action == "deleteUser") {
            $busyLogin = BusyLogin::findOne(['id' => $this->busyId]);
            $user = Users::findById($busyLogin->user_id);
            $forumUser = Forum::findOne(['username' => $user->username]);
            $ips = Loginip::deleteAll(['user_id' => $user->id]);
            $zayavki = Zayavka::find()
                ->where(['user_id' => $user->id])
                ->all();
            foreach ($zayavki as $z) {
                Actions::deleteAll(['zayavka_id' => $z->id]);
                $z->delete();
            }
            if ($forumUser != null) {
                $forumUser->delete();
            }
            if ($user != null) {
                $user->delete();
            }
            if ($busyLogin != null) {
                $busyLogin->delete();
            }
        }
    }

    public function prepareIndex()
    {
        $this->waitCount = Users::getApprovalCount();
        $this->waitCount += BusyLogin::getRequestsCount();
        $this->newUsers = Users::getNewUsers();
        $this->restoreUsers = Users::getRestoreUsers();
        $this->busyLogins = BusyLogin::find()->all();
    }

    public function emptyValidate()
    {

    }

}
