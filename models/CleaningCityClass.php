<?php

namespace app\models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CleaningCityClass {

    public $total;
    public $cancelled;
    public $chist;
    public $banned;
    public $prokli;
    public $katorga;
    public $otkaz;
    public $nevid;

    function __construct() {
        $this->total = 0;
        $this->cancelled = 0;
        $this->chist = 0;
        $this->banned = 0;
        $this->prokli = 0;
        $this->katorga = 0;
        $this->otkaz = 0;
        $this->nevid = 0;
    }

}
