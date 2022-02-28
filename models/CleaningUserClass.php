<?php
namespace app\models;

use app\models\Users;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CleaningUserClass {

    public $id;
    public $username;
    public $boi;
    public $peredachi;
    public $chist;
    public $prokli;
    public $katorga;
    public $ban;
    public $otkaz;
    public $nevid;

    function __construct($uId) {
        $this->id = $uId;
        $this->username = $this->setUsername();
        $this->boi = 0;
        $this->peredachi = 0;
        $this->chist = 0;
        $this->prokli = 0;
        $this->katorga = 0;
        $this->nevid = 0;
        $this->otkaz = 0;
        $this->ban = 0;
    }

    public function setUsername() {
        return Users::findById($this->id)->username;
    }

}
