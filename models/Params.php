<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use Yii;
use Text;
use yii\base\Model;
use app\models\Settings;
use \DateTime;
use \DateInterval;

class Params extends \yii\base\Model {

    public $action;
    public $loadKovcheg;
    public $loadSmorye;
    public $loadUtes;
    public $color_chist;
    public $color_cancelled;
    public $color_otkaz;
    public $color_otkaz_kosyak;
    public $color_inprogress;
    public $color_killed;
    public $max_z_per_day;
    public $color_background;
    public $login_attempts;
    public $register_attempts;
    public $restore_attempts;
    public $busylogin_enabled;
    public $enable_nevid_count;
    public $show_new_items_count;
    public $show_ready_items;
    public $settings;
    public $sign_color;
    public $comment_color;
    public $otkaz_color;
    public $own_z_color;

    public function rules() {
        return [
            [['action', 'own_z_color', 'show_ready_items', 'login_attempts', 'sign_color', 'comment_color', 'otkaz_color', 'show_new_items_count', 'enable_nevid_count', 'busylogin_enabled', 'register_attempts', 'restore_attempts', 'color_background', 'loadKovcheg', 'max_z_per_day', 'loadSmorye', 'loadUtes', 'color_chist', 'color_cancelled', 'color_otkaz',
            'color_otkaz_kosyak', 'color_inprogress', 'color_killed'
                ], 'emptyValidate']
        ];
    }

    public function checkAction() {
        if ($this->action == "saveSettings") {
            $this->settings = Settings::getAllSettings();
            foreach ($this->settings as $setting) {
                switch ($setting->name) {
                    case "own_z_color":
                        $setting->value = $this->own_z_color;
                        $setting->save();
                        break;                    
                    case "show_ready_items":
                        $setting->value = $this->show_ready_items;
                        $setting->save();
                        break;
                    case "sign_color":
                        $setting->value = $this->sign_color;
                        $setting->save();
                        break;
                    case "comment_color":
                        $setting->value = $this->comment_color;
                        $setting->save();
                        break;
                    case "otkaz_color":
                        $setting->value = $this->otkaz_color;
                        $setting->save();
                        break;
                    case "show_new_items_count":
                        $setting->value = $this->show_new_items_count;
                        $setting->save();
                        break;
                    case "enable_nevid_count":
                        $setting->value = $this->enable_nevid_count;
                        $setting->save();
                        break;
                    case "busylogin_enabled":
                        $setting->value = $this->busylogin_enabled;
                        $setting->save();
                        break;
                    case "login_attempts":
                        $setting->value = $this->login_attempts;
                        $setting->save();
                        break;
                    case "register_attempts":
                        $setting->value = $this->register_attempts;
                        $setting->save();
                        break;
                    case "restore_attempts":
                        $setting->value = $this->restore_attempts;
                        $setting->save();
                        break;
                    case "color_background":
                        $setting->value = $this->color_background;
                        $setting->save();
                        break;
                    case "max_z_per_day":
                        $setting->value = $this->max_z_per_day;
                        $setting->save();
                        break;
                    case "loadKovcheg":
                        $setting->value = $this->loadKovcheg;
                        $setting->save();
                        break;
                    case "loadSmorye":
                        $setting->value = $this->loadSmorye;
                        $setting->save();
                        break;
                    case "loadUtes":
                        $setting->value = $this->loadUtes;
                        $setting->save();
                        break;
                    case "color_chist":
                        $setting->value = $this->color_chist;
                        $setting->save();
                        break;
                    case "color_cancelled":
                        $setting->value = $this->color_cancelled;
                        $setting->save();
                        break;
                    case "color_otkaz":
                        $setting->value = $this->color_otkaz;
                        $setting->save();
                        break;
                    case "color_otkaz_kosyak":
                        $setting->value = $this->color_otkaz_kosyak;
                        $setting->save();
                        break;
                    case "color_inprogress":
                        $setting->value = $this->color_inprogress;
                        $setting->save();
                        break;
                    case "color_killed":
                        $setting->value = $this->color_killed;
                        $setting->save();
                        break;
                }
            }
        }
    }

    public function loadSettings($forceLoadFromDB = false) {
        $session = Yii::$app->session;
        $loadSettingsFromDb = true;
        if ($session->isActive) {
            if ($session->has('settingsLoaded')) {
                $sessionSetAt = DateTime::createFromFormat("d-m-Y H:i:s", $session->get('settingsSetAt'));
                $date_temp = DateTime::createFromFormat("d-m-Y H:i:s", date('d-m-Y H:i:s'));
                $date_temp->sub(new DateInterval('PT1H'));
                $hour_ago = $date_temp->getTimestamp();
                if ($sessionSetAt->getTimestamp() > $hour_ago) {
                    //Session not expired
                    $loadSettingsFromDb = false;
                    $this->sign_color = $session->get('sign_color');
                    $this->own_z_color = $session->get('own_z_color');
                    $this->comment_color = $session->get('comment_color');
                    $this->show_ready_items = $session->get('show_ready_items');
                    $this->otkaz_color = $session->get('otkaz_color');
                    $this->show_new_items_count = $session->get('show_new_items_count');
                    $this->enable_nevid_count = $session->get('enable_nevid_count');
                    $this->busylogin_enabled = $session->get('busylogin_enabled');
                    $this->login_attempts = $session->get('login_attempts');
                    $this->register_attempts = $session->get('register_attempts');
                    $this->restore_attempts = $session->get('restore_attempts');
                    $this->color_background = $session->get('color_background');
                    $this->max_z_per_day = $session->get('max_z_per_day');
                    $this->loadKovcheg = $session->get('loadKovcheg');
                    $this->loadSmorye = $session->get('loadSmorye');
                    $this->loadUtes = $session->get('loadUtes');
                    $this->color_chist = $session->get('color_chist');
                    $this->color_cancelled = $session->get('color_cancelled');
                    $this->color_otkaz = $session->get('color_otkaz');
                    $this->color_otkaz_kosyak = $session->get('color_otkaz_kosyak');
                    $this->color_inprogress = $session->get('color_inprogress');
                    $this->color_killed = $session->get('color_killed');
                } else {
                    //session expired
                    $session->remove('settingsLoaded');
                    $session->remove('settingsSetAt');
                    $session->remove('show_ready_items');
                    $session->remove('own_z_color');
                    $session->remove('sign_color');
                    $session->remove('comment_color');
                    $session->remove('otkaz_color');
                    $session->remove('show_new_items_count');
                    $session->remove('enable_nevid_count');
                    $session->remove('busylogin_enabled');
                    $session->remove('login_attempts');
                    $session->remove('register_attempts');
                    $session->remove('restore_attempts');
                    $session->remove('color_background');
                    $session->remove('max_z_per_day');
                    $session->remove('loadKovcheg');
                    $session->remove('loadSmorye');
                    $session->remove('loadUtes');
                    $session->remove('color_chist');
                    $session->remove('color_cancelled');
                    $session->remove('color_otkaz');
                    $session->remove('color_otkaz_kosyak');
                    $session->remove('color_inprogress');
                    $session->remove('color_killed');
                }
            }
        } else {
            $session->open();
        }
        if ($loadSettingsFromDb || $forceLoadFromDB) {
            $session->set('settingsLoaded', true);
            $session->set('settingsSetAt', date('d-m-Y H:i:s'));
            $this->settings = Settings::getAllSettings();
            foreach ($this->settings as $setting) {
                switch ($setting->name) {
                    case "own_z_color":
                        $this->own_z_color = $setting->value;
                        $session->set('own_z_color', $setting->value);
                        break;                    
                    case "show_ready_items":
                        $this->show_ready_items = $setting->value;
                        $session->set('show_ready_items', $setting->value);
                        break;
                    case "sign_color":
                        $this->sign_color = $setting->value;
                        $session->set('sign_color', $setting->value);
                        break;
                    case "comment_color":
                        $this->comment_color = $setting->value;
                        $session->set('comment_color', $setting->value);
                        break;
                    case "otkaz_color":
                        $this->otkaz_color = $setting->value;
                        $session->set('otkaz_color', $setting->value);
                        break;
                    case "show_new_items_count":
                        $this->show_new_items_count = $setting->value;
                        $session->set('show_new_items_count', $setting->value);
                        break;
                    case "enable_nevid_count":
                        $this->enable_nevid_count = $setting->value;
                        $session->set('enable_nevid_count', $setting->value);
                        break;
                    case "busylogin_enabled":
                        $this->busylogin_enabled = $setting->value;
                        $session->set('busylogin_enabled', $setting->value);
                        break;
                    case "login_attempts":
                        $this->login_attempts = $setting->value;
                        $session->set('login_attempts', $setting->value);
                        break;
                    case "register_attempts":
                        $this->register_attempts = $setting->value;
                        $session->set('register_attempts', $setting->value);
                        break;
                    case "restore_attempts":
                        $this->restore_attempts = $setting->value;
                        $session->set('restore_attempts', $setting->value);
                        break;
                    case "color_background":
                        $this->color_background = $setting->value;
                        $session->set('color_background', $setting->value);
                        break;
                    case "max_z_per_day":
                        $this->max_z_per_day = $setting->value;
                        $session->set('max_z_per_day', $setting->value);
                        break;
                    case "loadKovcheg":
                        $this->loadKovcheg = $setting->value;
                        $session->set('loadKovcheg', $setting->value);
                        break;
                    case "loadSmorye":
                        $this->loadSmorye = $setting->value;
                        $session->set('loadSmorye', $setting->value);
                        break;
                    case "loadUtes":
                        $this->loadUtes = $setting->value;
                        $session->set('loadUtes', $setting->value);
                        break;
                    case "color_chist":
                        $this->color_chist = $setting->value;
                        $session->set('color_chist', $setting->value);
                        break;
                    case "color_cancelled":
                        $this->color_cancelled = $setting->value;
                        $session->set('color_cancelled', $setting->value);
                        break;
                    case "color_otkaz":
                        $this->color_otkaz = $setting->value;
                        $session->set('color_otkaz', $setting->value);
                        break;
                    case "color_otkaz_kosyak":
                        $this->color_otkaz_kosyak = $setting->value;
                        $session->set('color_otkaz_kosyak', $setting->value);
                        break;
                    case "color_inprogress":
                        $this->color_inprogress = $setting->value;
                        $session->set('color_inprogress', $setting->value);
                        break;
                    case "color_killed":
                        $this->color_killed = $setting->value;
                        $session->set('color_killed', $setting->value);
                        break;
                }
            }
        }
    }

    public function emptyValidate() {
        
    }

}

?>