<?php

namespace app\models;

use app\models\Users;
use Yii;
use Text;
use yii\base\Model;
use app\models\Dragonsrights;
use yii\data\Pagination;

class Superadmin extends \yii\base\Model
{

    public $users;
    public $dragons;
    public $action;
    public $userName;
    public $dragonName;
    public $user;
    public $dragon;
    public $userId;
    public $dragonRights;
    public $pagination;
    public $searchCount;

    public function rules()
    {
        return [
            [['action'], 'required'],
            [['userName', 'dragonName', 'userId'], 'emptyValidate']
        ];
    }

    public function deleteUser($id)
    {
        if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
            $busyLogin = BusyLogin::findOne(['id' => $id]);
            $user = Users::findById($id);
            $username = $user->username;
            $forumUser = Forum::findOne(['username' => $user->username]);
            $ips = Loginip::deleteAll(['user_id' => $id]);
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
            if($user != null){
                $user->delete();
            }
            if ($busyLogin != null) {
                $busyLogin->delete();
            }
            $log = new Logs();
            $log->addRecord(Yii::$app->user->getId(), Users::findById(Yii::$app->user->getId())->username, Yii::$app->request->getUserIP(), "[USER_DELETE] username: " . $username . " | userId: " . $id . " ", "DELETED");
            return $username;
        } else {
            // Non admin user trapped here. Which is weird
        }
    }

    public function makeUserDragon()
    {
        if (Users::findGroupById(Yii::$app->user->getId()) == '99') {
            if (Users::findGroupById($this->userId) === 1) {
                $this->user = Users::findById($this->userId);
                $this->user->groupId = 10;
                $this->user->save();
            }
            //TODO ADD DRAGONSRIGHTS RECORD
            $this->dragonRights = Dragonsrights::findOneById($this->userId);
            if (!$this->dragonRights) {
                $this->dragonRights = new Dragonsrights();
                $this->dragonRights->dragonid = $this->userId;
                $this->dragonRights->superadmin = false;
                $this->dragonRights->kovcheg = false;
                $this->dragonRights->smorye = false;
                $this->dragonRights->utes = false;
                $this->dragonRights->boss = false;
                $this->dragonRights->boi_prov = false;
                $this->dragonRights->per_prov = false;
                $this->dragonRights->boi = false;
                $this->dragonRights->peredachi = false;
                $this->dragonRights->fullbp = false;
                $this->dragonRights->prokli = false;
                $this->dragonRights->katorga = false;
                $this->dragonRights->ban = false;
                $this->dragonRights->chistota = false;
                $this->dragonRights->nevid = false;
                $this->dragonRights->approver = false;
                $this->dragonRights->save();
            }
        }
    }

    public function fireDragon()
    {
        if (Users::findGroupById(Yii::$app->user->getId()) == '99') {
            $this->user = Users::findById($this->userId);
            $this->user->groupId = 1;
            $this->user->save();
            $this->dragonRights = Dragonsrights::findOneById($this->userId);
            if ($this->dragonRights) {
                if ($this->dragonRights->superadmin == 1) {
                    $this->dragonRights->superadmin = false;
                    $this->dragonRights->boss = false;
                    $this->dragonRights->save();
                }
            }
        }
    }

    public function searchUserByName()
    {
        if (strlen($this->userName) != 0) {
            $this->searchCount = sizeof(Users::find()->where(['like', 'username', trim($this->userName)])->all());
            $this->users = Users::find()
                ->where(['like', 'username', trim($this->userName)]);
            //->andWhere(['<>', 'id', Yii::$app->user->getId()])
            //->all();
        } else {
            $this->userName = " ";
            $this->searchCount = sizeof(Users::find()->all());
            $this->users = Users::find();
            //->where(['<>', 'id', Yii::$app->user->getId()])
            //->all();
        }
        $this->pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $this->users->count()
        ]);
        $this->users = $this->users->offset($this->pagination->offset)->limit($this->pagination->limit)->all();
    }

    public function emptyValidate()
    {

    }

    public function getUsers()
    {
        $this->users = Users::findAll(['groupId' => '1']);
    }

    public function getDragons()
    {
        $this->dragons = Users::find()
            ->where(['not', ['groupId' => '1']])
            ->all();
    }

    public function setIndexAction()
    {
        $this->action = "index";
    }

    public function setSearchAction()
    {
        $this->action = "userSearch";
    }

}