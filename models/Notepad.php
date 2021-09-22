<?php

namespace app\models;

use Yii;
use Text;

class Notepad extends \yii\base\Model
{

    public $action;
    public $full_text;
    public $allow;
    public $user_id;

    public function rules()
    {
        return [
            [['action', 'full_text', 'user_id'], 'emptyValidate']
        ];
    }

    public function processPostAction()
    {
        if ($this->action == "save") {
            $dragon_rights = Dragonsrights::findOneById(Yii::$app->user->getId());
            if (Yii::$app->user->getId() == $this->user_id && ($dragon_rights->boss == 1 || $dragon_rights->nevid == 1)) {
                $notepad = NotepadModel::findOneByUserId($this->user_id);
                $notepad->content = $this->full_text;
                $notepad->save();
                $this->loadIndex();
            }else{
                $this->allow = false;
            }
        }
    }

    public function loadIndex()
    {
        $dragon_rights = Dragonsrights::findOneById(Yii::$app->user->getId());
        if ($dragon_rights->boss == 0 && $dragon_rights->nevid == 0) {
            $this->allow = false;
        } else {
            $this->allow = true;
            // load notepad
            $notepad = NotepadModel::findOneByUserId(Yii::$app->user->getId());
            if ($notepad == null) {
                $post = new NotepadModel();
                $post->user_id = Yii::$app->user->getId();
                $post->content = '';
                $post->save();
            }
            $notepad = NotepadModel::findOneByUserId(Yii::$app->user->getId());
            $this->full_text = $notepad->content;
        }

    }

    public function emptyValidate()
    {

    }

}
