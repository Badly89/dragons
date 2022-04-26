<?php

namespace app\models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ZayavkaActionsClass {

    public $id;
    public $action;
    public $active;
    public $notes;
    public $date;
    public $username;
    public $alias;

    function __construct() {
        $this->action = null;
        $this->active = null;
        $this->id = null;
        $this->notes = null;
        $this->date = null;
        $this->username = null;
        $this->alias = null;
    }

}
