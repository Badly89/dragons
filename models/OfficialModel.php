<?php

namespace app\models;

use app\models\Users;
use Yii;
use Text;
use yii\base\Model;
use app\models\Official;

class OfficialModel extends \yii\base\Model
{

    public $action;
    public $id;
    public $itemId;
    public $items;
    public $aloneItem;
    public $title;
    public $short_text;
    public $full_text;
    public $active;
    public $pinned;
    public $mode;

    public function rules()
    {
        return [
            [['action', 'pinned', 'id', 'aloneItem', 'active', 'itemId', 'items', 'title', 'short_text', 'full_text'], 'emptyValidate']
        ];
    }

    public function loadAllItems()
    {
        if (!$this->mode) {
            if (!Yii::$app->user->isGuest) {
                if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                    $this->items = Official::getAllOrderByDesc();
                } else {
                    $this->items = Official::getAllActiveOrderByDesc();
                }
            } else {
                $this->items = Official::getAllActiveOrderByDesc();
            }
            $this->mode = "viewAll";
        }
    }

    public function processPostAction()
    {
        if ($this->action == "addNewPost") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                if (strlen($this->title) > 0 && strlen($this->short_text) > 20) {
                    if (strlen($this->full_text) < 30) {
                        $this->full_text = $this->short_text;
                    }
                    $check_post = Official::find()
                        ->where(['title' => $this->title])
                        ->andWhere(['author_id' => Yii::$app->user->getId()])
                        ->andWhere(['date_added' => date('d-m-Y')])
                        ->all();
                    if (sizeof($check_post) == 0) {
                        $post = new Official();
                        $post->title = addslashes($this->title);
                        $post->author_id = Yii::$app->user->getId();
                        $post->author_name = Users::findById($post->author_id)->username;
                        $post->short_text = addslashes($this->short_text);
                        $post->full_text = addslashes($this->full_text);
                        $post->date_added = date('d-m-Y');
                        $post->pinned = $this->pinned;
                        $post->active = $this->active;
                        $post->save();
                    }
                    $this->title = "";
                    $this->short_text = "";
                    $this->full_text = "";
                    $this->active = 0;
                    $this->action = "";
                }
            }
        }
        if ($this->action == "pinItem") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $post = Official::findOne(['id' => $this->itemId]);
                if ($post) {
                    $post->pinned = 1;
                    $post->save();
                }
            }
        }
        if ($this->action == "unpinItem") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $post = Official::findOne(['id' => $this->itemId]);
                if ($post) {
                    $post->pinned = 0;
                    $post->save();
                }
            }
        }
        if ($this->action == "activateItem") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $post = Official::findOne(['id' => $this->itemId]);
                if ($post) {
                    $post->active = 1;
                    $post->save();
                }
            }
        }
        if ($this->action == "deActivateItem") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $post = Official::findOne(['id' => $this->itemId]);
                if ($post) {
                    $post->active = 0;
                    $post->save();
                }
            }
        }
        if ($this->action == "editItem") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $post = Official::findOne(['id' => $this->itemId]);
                if ($post) {
                    $this->loadItemToModel($post);
                    $this->mode = "editItem";
                }
            }
        }
        if ($this->action == "deleteItem") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $post = Official::findOne(['id' => $this->itemId]);
                if ($post) {
                    $post->delete();
                }
            }
        }
        if ($this->action == "finalizeEdit") {

            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $post = Official::findOne(['id' => $this->itemId]);
                if ($post) {
                    $post->title = addslashes($this->title);
                    $post->short_text = addslashes($this->short_text);
                    $post->full_text = addslashes($this->full_text);
                    $post->last_edited_id = Yii::$app->user->getId();
                    $post->date_modified = date('d-m-Y');
                    $post->last_edited_name = Users::findById($post->author_id)->username;
                    $post->save();
                }
            }
        }
    }

    public function loadAloneItem()
    {
        $this->aloneItem = Official::getOneById($this->id);
        if ($this->aloneItem) {
            $this->mode = "viewSeparate";
            return true;
        } else {
//            $this->mode = "viewAll";
            return false;
        }
    }

    public function loadItemToModel($item)
    {
        $this->itemId = $item->id;
        $this->title = $item->title;
        $this->short_text = $item->short_text;
        $this->full_text = $item->full_text;
    }

    public function emptyValidate()
    {

    }

}
