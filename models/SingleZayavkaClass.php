<?php

namespace app\models;
use app\models\ZayavkaActionsClass;

class SingleZayavkaClass {

    public $id;
    public $user_id;
    public $city;
    public $proverka_city;
    public $type;
    public $date_added;
    public $category;
    public $status;
    public $otkaz_text;
    public $date_last_update;
    public $active;
    public $actions;

    function __construct() {
        $this->id = null;
        $this->user_id = null;
        $this->category = null;
        $this->city = null;
        $this->date_added = null;
        $this->date_last_update = null;
        $this->otkaz_text = null;
        $this->proverka_city = null;
        $this->status = null;
        $this->type = null;
        $this->active = null;
        $this->actions = array();
    }

}
