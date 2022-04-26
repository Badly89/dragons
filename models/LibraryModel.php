<?php

namespace app\models;

use app\models\Library;
use app\models\Users;
use Yii;
use Text;
use yii\base\Model;

class LibraryModel extends \yii\base\Model
{
    public $action;
    public $id;
    public $itemId;
    public $new_item_section_id;
    public $items;
    public $aloneItem;
    public $title;
    public $short_text;
    public $full_text;
    public $active;
    public $pinned;
    public $mode;
    public $sections;
    public $section_title;
    public $section_description;
    public $section_img;
    public $section_items;
    public $separate_view_section;
    public $loadSectionId;

    public function rules()
    {
        return [
            [['action', 'loadSectionId', 'new_item_section_id', 'section_img', 'section_description', 'section_title', 'pinned', 'sections', 'id', 'aloneItem', 'active', 'itemId', 'items', 'title', 'short_text', 'full_text'], 'emptyValidate']
        ];
    }

    public function loadAllItems()
    {
        if (!$this->mode) {
            if (!Yii::$app->user->isGuest) {
                if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                    $this->items = Library::getAllOrderByDesc();
                } else {
                    $this->items = Library::getAllActiveOrderByDesc();
                }
            } else {
                $this->items = Library::getAllActiveOrderByDesc();
            }
            $this->mode = "viewAll";
        }
    }

    public function loadSections()
    {
        if (!Yii::$app->user->isGuest && Users::findGroupById(Yii::$app->user->getId()) == 99) {
            $this->sections = LibrarySectionsModel::getAll();
        } else {
            $this->sections = LibrarySectionsModel::getAllActive();
        }
        $this->mode = 'show_sections';
    }

    public function processPostAction()
    {
        // Posts
        if ($this->action == "addNewPost") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                if (strlen($this->title) > 0 && strlen($this->short_text) > 20) {
                    if (strlen($this->full_text) < 30) {
                        $this->full_text = $this->short_text;
                    }
                    $check_post = Library::find()
                        ->where(['title' => $this->title])
                        ->andWhere(['author_id' => Yii::$app->user->getId()])
                        ->andWhere(['date_added' => date('d-m-Y')])
                        ->all();
                    if (sizeof($check_post) == 0) {
                        $post = new Library();
                        $post->title = addslashes($this->title);
                        $post->author_id = Yii::$app->user->getId();
                        $post->author_name = Users::findById($post->author_id)->username;
                        $post->short_text = addslashes($this->short_text);
                        $post->full_text = addslashes($this->full_text);
                        $post->date_added = date('d-m-Y');
                        $post->pinned = $this->pinned;
                        $post->active = $this->active;
                        $post->section_id = $this->new_item_section_id;
                        $post->save();
                    }
                    $this->title = "";
                    $this->short_text = "";
                    $this->full_text = "";
                    $this->active = 0;
                    $this->action = "";
                }
            }
            $this->loadSingleSection();
        }
        if ($this->action == "pinItem") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $post = Library::findOne(['id' => $this->itemId]);
                if ($post) {
                    $post->pinned = 1;
                    $post->save();
                }
            }
            $this->loadSingleSection();
        }
        if ($this->action == "unpinItem") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $post = Library::findOne(['id' => $this->itemId]);
                if ($post) {
                    $post->pinned = 0;
                    $post->save();
                }
            }
            $this->loadSingleSection();
        }
        if ($this->action == "activateItem") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $post = Library::findOne(['id' => $this->itemId]);
                if ($post) {
                    $post->active = 1;
                    $post->save();
                }
            }
            $this->loadSingleSection();
        }
        if ($this->action == "deActivateItem") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $post = Library::findOne(['id' => $this->itemId]);
                if ($post) {
                    $post->active = 0;
                    $post->save();
                }
            }
            $this->loadSingleSection();
        }
        if ($this->action == "editItem") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $post = Library::findOne(['id' => $this->itemId]);
                if ($post) {
                    $this->separate_view_section = LibrarySectionsModel::getOneById($this->loadSectionId);
                    $this->loadItemToModel($post);
                    $this->mode = "editItem";
                }
            }
        }
        if ($this->action == "deleteItem") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $post = Library::findOne(['id' => $this->itemId]);
                if ($post) {
                    $post->delete();
                }
            }
            $this->loadSingleSection();
        }
        if ($this->action == "finalizeEdit") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $post = Library::findOne(['id' => $this->itemId]);
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
            $this->loadSingleSection();
        }

        // Sections
        if ($this->action == "addNewSection") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                if (strlen(trim($this->section_title)) > 3) {
                    $section = new LibrarySectionsModel();
                    $section->title = trim($this->section_title);
                    $section->description = trim($this->section_description);
                    $section->img = trim($this->section_img);
                    $section->visible = 0;
                    $section->save();
                }
                $this->mode = "edit_sections";
                $this->sections = LibrarySectionsModel::getAll();
            }
        }
        if ($this->action == "edit_sections") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $this->mode = "edit_sections";
                $this->sections = LibrarySectionsModel::getAll();
            }
        }
        if ($this->action == "hideSection") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $section = LibrarySectionsModel::getOneById($this->itemId);
                if ($section != null) {
                    $section->visible = 0;
                    $section->save();
                }
                $this->mode = "edit_sections";
                $this->sections = LibrarySectionsModel::getAll();
            }
        }
        if ($this->action == "unHideSection") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $section = LibrarySectionsModel::getOneById($this->itemId);
                if ($section != null) {
                    $section->visible = 1;
                    $section->save();
                }
                $this->mode = "edit_sections";
                $this->sections = LibrarySectionsModel::getAll();
            }
        }
        if ($this->action == "deleteSection") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $section = LibrarySectionsModel::getOneById($this->itemId);
                if ($section != null) {
                    $items = Library::getAllByLibrarySectionId($this->itemId);
                    if (sizeof($items) == 0) {
                        $section->delete();
                    }
                }
                $this->mode = "edit_sections";
                $this->sections = LibrarySectionsModel::getAll();
            }
        }
        if ($this->action == "editSingleSection") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $section = LibrarySectionsModel::getOneById($this->itemId);
                if ($section != null) {
                    $this->loadSectionToModel($section);
                    $this->mode = "editSingleSection";
                } else {
                    $this->mode = "edit_sections";
                    $this->sections = LibrarySectionsModel::getAll();
                }
            }
        }
        if ($this->action == "finalizeEditSection") {
            if (Users::findGroupById(Yii::$app->user->getId()) == 99) {
                $section = LibrarySectionsModel::getOneById($this->itemId);
                if ($section) {
                    $section->title = addslashes($this->section_title);
                    $section->description = addslashes($this->section_description);
                    $section->img = $this->section_img;
                    $section->save();
                }
            }
            $this->mode = "edit_sections";
            $this->sections = LibrarySectionsModel::getAll();
        }
    }

    public function loadSingleSection()
    {
        if ($this->loadSectionId != null) {
            $this->id = $this->loadSectionId;
        }
        $section = LibrarySectionsModel::getOneById($this->id);
        // Check if section exist and redirect to library index if not exist
        if ($section == null) {
            $this->loadSections();
            return false;
        }
        $this->separate_view_section = $section;
        // Check user rights and decide - show not visible items or not
        if (!Yii::$app->user->isGuest && Users::findGroupById(Yii::$app->user->getId()) == 99) {
            $this->section_items = Library::getAllByLibrarySectionId($this->id);
        } else {
            if ($section->visible == 1) {
                $this->section_items = Library::getAllActiveByLibrarySectionId($this->id);
                $this->mode = 'viewSectionContent';
            } else {
                // Do not show invisible item to NOT admin
                $this->loadSections();
                return false;
            }
        }
        $this->mode = 'viewSectionContent';
        return true;
    }

    public function loadAloneItem()
    {
        if ($this->action == 'view') {
            $this->aloneItem = Library::getOneById($this->id);
            $this->separate_view_section = LibrarySectionsModel::getOneById($this->aloneItem->section_id);
            if ($this->aloneItem) {
                if (Yii::$app->user->isGuest || Users::findGroupById(Yii::$app->user->getId()) != 99) {
                    if ($this->separate_view_section->visible == 0) {
                        return false;
                    }
                }
                $this->mode = "viewSeparate";
                return true;
            } else {
//            $this->mode = "viewAll";
                return false;
            }
        }
        if ($this->action == 's') {
            return $this->loadSingleSection();
        }
    }

    public function loadSectionToModel($item)
    {
        $this->itemId = $item->id;
        $this->section_title = $item->title;
        $this->section_description = $item->description;
        $this->section_img = $item->img;
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
