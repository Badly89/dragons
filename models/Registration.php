<?php

namespace app\models;

use Yii;
use Text;
use yii\base\Model;
use app\models\Users;
use app\models\Forum;
use app\models\ForumGroupModel;
use app\models\RegistrationAttempts;
use app\models\Logs;

class Registration extends \yii\base\Model {

    public $username;
    public $secretkey;
    public $success;
    public $generatedpassword;
    public $pers_info;
    public $pers_link;
    public $pers_info_content;
    public $temp_link;
    public $error_message;
    public $url;
    public $_afr;
    public $error;
    public $apeha_id;
    public $user;
    public $forumuser;
    public $forumgroup;
    public $failed_connection;
    public $registration_tries;
    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
// username and password are both required
            [
                ['username', '_afr', 'apeha_id'], 'required'],
            ['secretkey', 'validateSecretKey'],
        ];
    }

    public function registrationAttempts() {
        $this->registration_tries = RegistrationAttempts::getAttemptsLastHour(Yii::$app->request->getUserIP());
    }

    public function attributeLabels() {
        return [
            'username' => 'Ник',
            'apeha_id' => 'ID персонажа'
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateSecretKey() {
        $log = new Logs();
        $this->failed_connection = false;
        $this->username = htmlentities($this->username);
        $this->error = "";
        if (Users::findByUsername($this->username)) {
            $this->error = "Пользователь с ником <b>$this->username</b> уже зарегистрирован.";
        } else {
            //continue registration
            //site registration
            $regex = '#[^a-zA-Z0-9]#i';
            $this->generatedpassword = substr(preg_replace($regex, '', Yii::$app->getSecurity()->generateRandomString(40)), 0, 8);
            $this->user = new Users();
            $this->user->username = $this->username;
            $this->user->alias = $this->username;
            $this->user->apeha_id = $this->apeha_id;
            $this->user->groupId = 1;
            $this->user->active = 0;
            $this->user->date_registered = date('d-m-Y H:i:s');
            $this->user->authKey = Yii::$app->getSecurity()->generateRandomString(20);
            $this->user->ips = Yii::$app->request->getUserIP();
            $this->user->password = md5($this->generatedpassword);
            $this->user->approvekey = "!." . $this->secretkey . ".!";
            $this->user->save();
            $log->addRecord($this->user->id, $this->user->username, Yii::$app->request->getUserIP(), "[REGISTRATION] username: " . $this->user->username . " | userId: " . $this->user->id . " | apehaId: ".$this->user->apeha_id." ", "SUBMITTED");
            //forum registration
            $this->forumuser = new Forum();
            //$this->forumuser->user_type = 1; - INACTIVE USER. $this->forumuser->user_type = 0; - ACTIVE
            $this->forumuser->user_type = 1;
            $this->forumuser->group_id = 2;
            $this->forumuser->user_permissions = "00000000000v667wt0
i1cjyo000000
qlaq53000000";
            $this->forumuser->user_perm_from = 0;
            $this->forumuser->user_ip = Yii::$app->request->getUserIP();
            $this->forumuser->user_regdate = time();
            $this->forumuser->username = $this->username;
            $this->forumuser->username_clean = $this->utf8_clean_string($this->username);
            $this->forumuser->user_password = md5($this->generatedpassword);
            $this->forumuser->user_passchg = time();
            $this->forumuser->user_lastvisit = 0;
            $this->forumuser->user_lastmark = time();
            $this->forumuser->user_last_search = 0;
            $this->forumuser->user_warnings = 0;
            $this->forumuser->user_last_warning = 0;
            $this->forumuser->user_login_attempts = 0;
            $this->forumuser->user_inactive_reason = 0;
            $this->forumuser->user_inactive_time = 0;
            $this->forumuser->user_posts = 0;
            $this->forumuser->user_lang = "ru";
            $this->forumuser->user_timezone = "Africa/Addis_Ababa";
            $this->forumuser->user_dateformat = "|d M Y|, H:i";
            $this->forumuser->user_style = 1;
            $this->forumuser->user_rank = 0;
            $this->forumuser->user_new_privmsg = 0;
            $this->forumuser->user_unread_privmsg = 0;
            $this->forumuser->user_last_privmsg = 0;
            $this->forumuser->user_message_rules = 0;
            $this->forumuser->user_full_folder = -3;
            $this->forumuser->user_emailtime = 0;
            $this->forumuser->user_topic_show_days = 0;
            $this->forumuser->user_topic_sortby_type = "t";
            $this->forumuser->user_topic_sortby_dir = "d";
            $this->forumuser->user_post_show_days = 0;
            $this->forumuser->user_post_sortby_type = "t";
            $this->forumuser->user_post_sortby_dir = "d";
            $this->forumuser->user_notify = 0;
            $this->forumuser->user_notify_pm = 1;
            $this->forumuser->user_allow_pm = 1;
            $this->forumuser->user_allow_viewonline = 1;
            $this->forumuser->user_allow_viewemail = 1;
            $this->forumuser->user_allow_massemail = 1;
            $this->forumuser->user_options = 230271;
            $this->forumuser->user_avatar_width = 0;
            $this->forumuser->user_avatar_height = 0;
            $this->forumuser->user_new = 1;
            $this->forumuser->user_reminded = 0;
            $this->forumuser->user_reminded_time = 0;
            $this->forumuser->save();

            $this->forumuser = Forum::getUserByUsername($this->username);
            $this->forumgroup = new ForumGroupModel();
            $this->forumgroup->group_id = 2;
            $this->forumgroup->user_id = $this->forumuser->user_id;
            $this->forumgroup->group_leader = 0;
            $this->forumgroup->user_pending = 0;
            $this->forumgroup->save();

            $this->forumgroup = new ForumGroupModel();
            $this->forumgroup->group_id = 7;
            $this->forumgroup->user_id = $this->forumuser->user_id;
            $this->forumgroup->group_leader = 0;
            $this->forumgroup->user_pending = 0;
            $this->forumgroup->save();
        }



//OLD REGISTRATION :( CRY :(
        /*
          $this->url = "http://newforest.apeha.ru/info.html?nick=" . urlencode(iconv("UTF-8", "CP1251", $this->username));
          $this->pers_info = $this->get_web_page($this->url);

          if ($this->pers_info['content'] === "connection_failed") {
          $this->failed_connection = true;
          }

          if (!$this->failed_connection) {
          if (strpos($this->pers_info['content'], 'location.href="http://') !== false) {
          $first_parse_for_new_url = explode('location.href="http://', $this->pers_info['content']);
          $this->temp_link = explode('";', $first_parse_for_new_url[1]);
          $this->pers_link = $this->temp_link[0];
          $this->pers_info_content = iconv("CP1251", "UTF-8", $this->get_web_page($this->pers_link)['content']);
          } else {
          $this->url = "http://ostrov.apeha.ru/info.html?nick=" . urlencode(iconv("UTF-8", "CP1251", $this->username));
          $this->pers_info = $this->get_web_page($this->url);
          if (strpos($this->pers_info['content'], 'location.href="http://') !== false) {
          $first_parse_for_new_url = explode('location.href="http://', $this->pers_info['content']);
          $this->temp_link = explode('";', $first_parse_for_new_url[1]);
          $this->pers_link = $this->temp_link[0];
          $this->pers_info_content = iconv("CP1251", "UTF-8", $this->get_web_page($this->pers_link)['content']);
          }
          }
          if (strlen($this->pers_link) < 3) {
          $this->error = "Персонаж с ником <b>" . $this->username . "</b> не найден";
          }
          if (strpos($this->pers_info_content, "Данные не найдены") === true) {
          $this->error = "Персонаж с ником <b>" . $this->username . "</b> не найден";
          }
          if (strlen($this->error) < 1) {
          if (strpos($this->pers_info_content, "!." . $this->secretkey . ".!") !== false) {
          //ALL FINE. CREATING ACCOUNT HERE
          $this->pers_id = explode('.', (explode('_', $this->pers_link)[2]))[0];
          if (Users::find()->where(['apeha_id' => $this->pers_id])->count() > 0) {
          $this->error = "Пользователь с ником <b>" . $this->username . "</b> уже зарегистрирован. Вернитесь для входа на сайт";
          } else {
          $this->generatedpassword = Yii::$app->getSecurity()->generateRandomString(8);
          $this->user = new Users();
          $this->user->username = $this->username;
          $this->user->alias = $this->username;
          $this->user->groupId = 1;
          $this->user->apeha_id = $this->pers_id;
          $this->user->date_registered = date('d-m-Y h:i:s');
          $this->user->authKey = Yii::$app->getSecurity()->generateRandomString(12);
          $this->user->ips = Yii::$app->request->getUserIP();
          $this->user->password = md5($this->generatedpassword);
          $this->user->save();
          //forum

          $this->forumuser = new Forum();
          $this->forumuser->user_type = 0;
          $this->forumuser->group_id = 2;
          $this->forumuser->user_permissions = "00000000000v667wt0
          i1cjyo000000
          qlaq53000000";
          $this->forumuser->user_perm_from = 0;
          $this->forumuser->user_ip = Yii::$app->request->getUserIP();
          $this->forumuser->user_regdate = time();
          $this->forumuser->username = $this->username;
          $this->forumuser->username_clean = $this->utf8_clean_string($this->username);
          $this->forumuser->user_password = md5($this->generatedpassword);
          $this->forumuser->user_passchg = time();
          $this->forumuser->user_lastvisit = 0;
          $this->forumuser->user_lastmark = time();
          $this->forumuser->user_last_search = 0;
          $this->forumuser->user_warnings = 0;
          $this->forumuser->user_last_warning = 0;
          $this->forumuser->user_login_attempts = 0;
          $this->forumuser->user_inactive_reason = 0;
          $this->forumuser->user_inactive_time = 0;
          $this->forumuser->user_posts = 0;
          $this->forumuser->user_lang = "ru";
          $this->forumuser->user_timezone = "Africa/Addis_Ababa";
          $this->forumuser->user_dateformat = "|d M Y|, H:i";
          $this->forumuser->user_style = 1;
          $this->forumuser->user_rank = 0;
          $this->forumuser->user_new_privmsg = 0;
          $this->forumuser->user_unread_privmsg = 0;
          $this->forumuser->user_last_privmsg = 0;
          $this->forumuser->user_message_rules = 0;
          $this->forumuser->user_full_folder = -3;
          $this->forumuser->user_emailtime = 0;
          $this->forumuser->user_topic_show_days = 0;
          $this->forumuser->user_topic_sortby_type = "t";
          $this->forumuser->user_topic_sortby_dir = "d";
          $this->forumuser->user_post_show_days = 0;
          $this->forumuser->user_post_sortby_type = "t";
          $this->forumuser->user_post_sortby_dir = "d";
          $this->forumuser->user_notify = 0;
          $this->forumuser->user_notify_pm = 1;
          $this->forumuser->user_allow_pm = 1;
          $this->forumuser->user_allow_viewonline = 1;
          $this->forumuser->user_allow_viewemail = 1;
          $this->forumuser->user_allow_massemail = 1;
          $this->forumuser->user_options = 230271;
          $this->forumuser->user_avatar_width = 0;
          $this->forumuser->user_avatar_height = 0;
          $this->forumuser->user_new = 1;
          $this->forumuser->user_reminded = 0;
          $this->forumuser->user_reminded_time = 0;
          $this->forumuser->save();

          $this->forumuser = Forum::getUserByUsername($this->username);
          $this->forumgroup = new ForumGroupModel();
          $this->forumgroup->group_id = 2;
          $this->forumgroup->user_id = $this->forumuser->user_id;
          $this->forumgroup->group_leader = 0;
          $this->forumgroup->user_pending = 0;
          $this->forumgroup->save();

          $this->forumgroup = new ForumGroupModel();
          $this->forumgroup->group_id = 7;
          $this->forumgroup->user_id = $this->forumuser->user_id;
          $this->forumgroup->group_leader = 0;
          $this->forumgroup->user_pending = 0;
          $this->forumgroup->save();
          }
          } else {
          $this->error = "Кодовая строка <span style=\"color:red;\">!." . $this->secretkey . ".!</span> не найдена в профиле персонажа.";
          }
          }
          } else {
          $this->error = "Невозможно получить инфу персонажа. Повторите попытку позже.";
          }

         */
        return true;
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function utf8_clean_string($text) {

        static $homographs = array();
        if (empty($homographs)) {
            $homographs = include('../web/forum/includes/utf/data/confusables.php');
        }

        $text = $this->utf8_case_fold_nfkc($text);
        $text = strtr($text, $homographs);
        // Other control characters
        $text = preg_replace('#(?:[\x00-\x1F\x7F]+|(?:\xC2[\x80-\x9F])+)#', '', $text);

        // we need to reduce multiple spaces to a single one
        $text = preg_replace('# {2,}#', ' ', $text);

        // we can use trim here as all the other space characters should have been turned
        // into normal ASCII spaces by now
        return trim($text);
    }

    public function utf8_case_fold_nfkc($text, $option = 'full') {
        static $fc_nfkc_closure = array(
            "\xCD\xBA" => "\x20\xCE\xB9",
            "\xCF\x92" => "\xCF\x85",
            "\xCF\x93" => "\xCF\x8D",
            "\xCF\x94" => "\xCF\x8B",
            "\xCF\xB2" => "\xCF\x83",
            "\xCF\xB9" => "\xCF\x83",
            "\xE1\xB4\xAC" => "\x61",
            "\xE1\xB4\xAD" => "\xC3\xA6",
            "\xE1\xB4\xAE" => "\x62",
            "\xE1\xB4\xB0" => "\x64",
            "\xE1\xB4\xB1" => "\x65",
            "\xE1\xB4\xB2" => "\xC7\x9D",
            "\xE1\xB4\xB3" => "\x67",
            "\xE1\xB4\xB4" => "\x68",
            "\xE1\xB4\xB5" => "\x69",
            "\xE1\xB4\xB6" => "\x6A",
            "\xE1\xB4\xB7" => "\x6B",
            "\xE1\xB4\xB8" => "\x6C",
            "\xE1\xB4\xB9" => "\x6D",
            "\xE1\xB4\xBA" => "\x6E",
            "\xE1\xB4\xBC" => "\x6F",
            "\xE1\xB4\xBD" => "\xC8\xA3",
            "\xE1\xB4\xBE" => "\x70",
            "\xE1\xB4\xBF" => "\x72",
            "\xE1\xB5\x80" => "\x74",
            "\xE1\xB5\x81" => "\x75",
            "\xE1\xB5\x82" => "\x77",
            "\xE2\x82\xA8" => "\x72\x73",
            "\xE2\x84\x82" => "\x63",
            "\xE2\x84\x83" => "\xC2\xB0\x63",
            "\xE2\x84\x87" => "\xC9\x9B",
            "\xE2\x84\x89" => "\xC2\xB0\x66",
            "\xE2\x84\x8B" => "\x68",
            "\xE2\x84\x8C" => "\x68",
            "\xE2\x84\x8D" => "\x68",
            "\xE2\x84\x90" => "\x69",
            "\xE2\x84\x91" => "\x69",
            "\xE2\x84\x92" => "\x6C",
            "\xE2\x84\x95" => "\x6E",
            "\xE2\x84\x96" => "\x6E\x6F",
            "\xE2\x84\x99" => "\x70",
            "\xE2\x84\x9A" => "\x71",
            "\xE2\x84\x9B" => "\x72",
            "\xE2\x84\x9C" => "\x72",
            "\xE2\x84\x9D" => "\x72",
            "\xE2\x84\xA0" => "\x73\x6D",
            "\xE2\x84\xA1" => "\x74\x65\x6C",
            "\xE2\x84\xA2" => "\x74\x6D",
            "\xE2\x84\xA4" => "\x7A",
            "\xE2\x84\xA8" => "\x7A",
            "\xE2\x84\xAC" => "\x62",
            "\xE2\x84\xAD" => "\x63",
            "\xE2\x84\xB0" => "\x65",
            "\xE2\x84\xB1" => "\x66",
            "\xE2\x84\xB3" => "\x6D",
            "\xE2\x84\xBB" => "\x66\x61\x78",
            "\xE2\x84\xBE" => "\xCE\xB3",
            "\xE2\x84\xBF" => "\xCF\x80",
            "\xE2\x85\x85" => "\x64",
            "\xE3\x89\x90" => "\x70\x74\x65",
            "\xE3\x8B\x8C" => "\x68\x67",
            "\xE3\x8B\x8E" => "\x65\x76",
            "\xE3\x8B\x8F" => "\x6C\x74\x64",
            "\xE3\x8D\xB1" => "\x68\x70\x61",
            "\xE3\x8D\xB3" => "\x61\x75",
            "\xE3\x8D\xB5" => "\x6F\x76",
            "\xE3\x8D\xBA" => "\x69\x75",
            "\xE3\x8E\x80" => "\x70\x61",
            "\xE3\x8E\x81" => "\x6E\x61",
            "\xE3\x8E\x82" => "\xCE\xBC\x61",
            "\xE3\x8E\x83" => "\x6D\x61",
            "\xE3\x8E\x84" => "\x6B\x61",
            "\xE3\x8E\x85" => "\x6B\x62",
            "\xE3\x8E\x86" => "\x6D\x62",
            "\xE3\x8E\x87" => "\x67\x62",
            "\xE3\x8E\x8A" => "\x70\x66",
            "\xE3\x8E\x8B" => "\x6E\x66",
            "\xE3\x8E\x8C" => "\xCE\xBC\x66",
            "\xE3\x8E\x90" => "\x68\x7A",
            "\xE3\x8E\x91" => "\x6B\x68\x7A",
            "\xE3\x8E\x92" => "\x6D\x68\x7A",
            "\xE3\x8E\x93" => "\x67\x68\x7A",
            "\xE3\x8E\x94" => "\x74\x68\x7A",
            "\xE3\x8E\xA9" => "\x70\x61",
            "\xE3\x8E\xAA" => "\x6B\x70\x61",
            "\xE3\x8E\xAB" => "\x6D\x70\x61",
            "\xE3\x8E\xAC" => "\x67\x70\x61",
            "\xE3\x8E\xB4" => "\x70\x76",
            "\xE3\x8E\xB5" => "\x6E\x76",
            "\xE3\x8E\xB6" => "\xCE\xBC\x76",
            "\xE3\x8E\xB7" => "\x6D\x76",
            "\xE3\x8E\xB8" => "\x6B\x76",
            "\xE3\x8E\xB9" => "\x6D\x76",
            "\xE3\x8E\xBA" => "\x70\x77",
            "\xE3\x8E\xBB" => "\x6E\x77",
            "\xE3\x8E\xBC" => "\xCE\xBC\x77",
            "\xE3\x8E\xBD" => "\x6D\x77",
            "\xE3\x8E\xBE" => "\x6B\x77",
            "\xE3\x8E\xBF" => "\x6D\x77",
            "\xE3\x8F\x80" => "\x6B\xCF\x89",
            "\xE3\x8F\x81" => "\x6D\xCF\x89",
            "\xE3\x8F\x83" => "\x62\x71",
            "\xE3\x8F\x86" => "\x63\xE2\x88\x95\x6B\x67",
            "\xE3\x8F\x87" => "\x63\x6F\x2E",
            "\xE3\x8F\x88" => "\x64\x62",
            "\xE3\x8F\x89" => "\x67\x79",
            "\xE3\x8F\x8B" => "\x68\x70",
            "\xE3\x8F\x8D" => "\x6B\x6B",
            "\xE3\x8F\x8E" => "\x6B\x6D",
            "\xE3\x8F\x97" => "\x70\x68",
            "\xE3\x8F\x99" => "\x70\x70\x6D",
            "\xE3\x8F\x9A" => "\x70\x72",
            "\xE3\x8F\x9C" => "\x73\x76",
            "\xE3\x8F\x9D" => "\x77\x62",
            "\xE3\x8F\x9E" => "\x76\xE2\x88\x95\x6D",
            "\xE3\x8F\x9F" => "\x61\xE2\x88\x95\x6D",
            "\xF0\x9D\x90\x80" => "\x61",
            "\xF0\x9D\x90\x81" => "\x62",
            "\xF0\x9D\x90\x82" => "\x63",
            "\xF0\x9D\x90\x83" => "\x64",
            "\xF0\x9D\x90\x84" => "\x65",
            "\xF0\x9D\x90\x85" => "\x66",
            "\xF0\x9D\x90\x86" => "\x67",
            "\xF0\x9D\x90\x87" => "\x68",
            "\xF0\x9D\x90\x88" => "\x69",
            "\xF0\x9D\x90\x89" => "\x6A",
            "\xF0\x9D\x90\x8A" => "\x6B",
            "\xF0\x9D\x90\x8B" => "\x6C",
            "\xF0\x9D\x90\x8C" => "\x6D",
            "\xF0\x9D\x90\x8D" => "\x6E",
            "\xF0\x9D\x90\x8E" => "\x6F",
            "\xF0\x9D\x90\x8F" => "\x70",
            "\xF0\x9D\x90\x90" => "\x71",
            "\xF0\x9D\x90\x91" => "\x72",
            "\xF0\x9D\x90\x92" => "\x73",
            "\xF0\x9D\x90\x93" => "\x74",
            "\xF0\x9D\x90\x94" => "\x75",
            "\xF0\x9D\x90\x95" => "\x76",
            "\xF0\x9D\x90\x96" => "\x77",
            "\xF0\x9D\x90\x97" => "\x78",
            "\xF0\x9D\x90\x98" => "\x79",
            "\xF0\x9D\x90\x99" => "\x7A",
            "\xF0\x9D\x90\xB4" => "\x61",
            "\xF0\x9D\x90\xB5" => "\x62",
            "\xF0\x9D\x90\xB6" => "\x63",
            "\xF0\x9D\x90\xB7" => "\x64",
            "\xF0\x9D\x90\xB8" => "\x65",
            "\xF0\x9D\x90\xB9" => "\x66",
            "\xF0\x9D\x90\xBA" => "\x67",
            "\xF0\x9D\x90\xBB" => "\x68",
            "\xF0\x9D\x90\xBC" => "\x69",
            "\xF0\x9D\x90\xBD" => "\x6A",
            "\xF0\x9D\x90\xBE" => "\x6B",
            "\xF0\x9D\x90\xBF" => "\x6C",
            "\xF0\x9D\x91\x80" => "\x6D",
            "\xF0\x9D\x91\x81" => "\x6E",
            "\xF0\x9D\x91\x82" => "\x6F",
            "\xF0\x9D\x91\x83" => "\x70",
            "\xF0\x9D\x91\x84" => "\x71",
            "\xF0\x9D\x91\x85" => "\x72",
            "\xF0\x9D\x91\x86" => "\x73",
            "\xF0\x9D\x91\x87" => "\x74",
            "\xF0\x9D\x91\x88" => "\x75",
            "\xF0\x9D\x91\x89" => "\x76",
            "\xF0\x9D\x91\x8A" => "\x77",
            "\xF0\x9D\x91\x8B" => "\x78",
            "\xF0\x9D\x91\x8C" => "\x79",
            "\xF0\x9D\x91\x8D" => "\x7A",
            "\xF0\x9D\x91\xA8" => "\x61",
            "\xF0\x9D\x91\xA9" => "\x62",
            "\xF0\x9D\x91\xAA" => "\x63",
            "\xF0\x9D\x91\xAB" => "\x64",
            "\xF0\x9D\x91\xAC" => "\x65",
            "\xF0\x9D\x91\xAD" => "\x66",
            "\xF0\x9D\x91\xAE" => "\x67",
            "\xF0\x9D\x91\xAF" => "\x68",
            "\xF0\x9D\x91\xB0" => "\x69",
            "\xF0\x9D\x91\xB1" => "\x6A",
            "\xF0\x9D\x91\xB2" => "\x6B",
            "\xF0\x9D\x91\xB3" => "\x6C",
            "\xF0\x9D\x91\xB4" => "\x6D",
            "\xF0\x9D\x91\xB5" => "\x6E",
            "\xF0\x9D\x91\xB6" => "\x6F",
            "\xF0\x9D\x91\xB7" => "\x70",
            "\xF0\x9D\x91\xB8" => "\x71",
            "\xF0\x9D\x91\xB9" => "\x72",
            "\xF0\x9D\x91\xBA" => "\x73",
            "\xF0\x9D\x91\xBB" => "\x74",
            "\xF0\x9D\x91\xBC" => "\x75",
            "\xF0\x9D\x91\xBD" => "\x76",
            "\xF0\x9D\x91\xBE" => "\x77",
            "\xF0\x9D\x91\xBF" => "\x78",
            "\xF0\x9D\x92\x80" => "\x79",
            "\xF0\x9D\x92\x81" => "\x7A",
            "\xF0\x9D\x92\x9C" => "\x61",
            "\xF0\x9D\x92\x9E" => "\x63",
            "\xF0\x9D\x92\x9F" => "\x64",
            "\xF0\x9D\x92\xA2" => "\x67",
            "\xF0\x9D\x92\xA5" => "\x6A",
            "\xF0\x9D\x92\xA6" => "\x6B",
            "\xF0\x9D\x92\xA9" => "\x6E",
            "\xF0\x9D\x92\xAA" => "\x6F",
            "\xF0\x9D\x92\xAB" => "\x70",
            "\xF0\x9D\x92\xAC" => "\x71",
            "\xF0\x9D\x92\xAE" => "\x73",
            "\xF0\x9D\x92\xAF" => "\x74",
            "\xF0\x9D\x92\xB0" => "\x75",
            "\xF0\x9D\x92\xB1" => "\x76",
            "\xF0\x9D\x92\xB2" => "\x77",
            "\xF0\x9D\x92\xB3" => "\x78",
            "\xF0\x9D\x92\xB4" => "\x79",
            "\xF0\x9D\x92\xB5" => "\x7A",
            "\xF0\x9D\x93\x90" => "\x61",
            "\xF0\x9D\x93\x91" => "\x62",
            "\xF0\x9D\x93\x92" => "\x63",
            "\xF0\x9D\x93\x93" => "\x64",
            "\xF0\x9D\x93\x94" => "\x65",
            "\xF0\x9D\x93\x95" => "\x66",
            "\xF0\x9D\x93\x96" => "\x67",
            "\xF0\x9D\x93\x97" => "\x68",
            "\xF0\x9D\x93\x98" => "\x69",
            "\xF0\x9D\x93\x99" => "\x6A",
            "\xF0\x9D\x93\x9A" => "\x6B",
            "\xF0\x9D\x93\x9B" => "\x6C",
            "\xF0\x9D\x93\x9C" => "\x6D",
            "\xF0\x9D\x93\x9D" => "\x6E",
            "\xF0\x9D\x93\x9E" => "\x6F",
            "\xF0\x9D\x93\x9F" => "\x70",
            "\xF0\x9D\x93\xA0" => "\x71",
            "\xF0\x9D\x93\xA1" => "\x72",
            "\xF0\x9D\x93\xA2" => "\x73",
            "\xF0\x9D\x93\xA3" => "\x74",
            "\xF0\x9D\x93\xA4" => "\x75",
            "\xF0\x9D\x93\xA5" => "\x76",
            "\xF0\x9D\x93\xA6" => "\x77",
            "\xF0\x9D\x93\xA7" => "\x78",
            "\xF0\x9D\x93\xA8" => "\x79",
            "\xF0\x9D\x93\xA9" => "\x7A",
            "\xF0\x9D\x94\x84" => "\x61",
            "\xF0\x9D\x94\x85" => "\x62",
            "\xF0\x9D\x94\x87" => "\x64",
            "\xF0\x9D\x94\x88" => "\x65",
            "\xF0\x9D\x94\x89" => "\x66",
            "\xF0\x9D\x94\x8A" => "\x67",
            "\xF0\x9D\x94\x8D" => "\x6A",
            "\xF0\x9D\x94\x8E" => "\x6B",
            "\xF0\x9D\x94\x8F" => "\x6C",
            "\xF0\x9D\x94\x90" => "\x6D",
            "\xF0\x9D\x94\x91" => "\x6E",
            "\xF0\x9D\x94\x92" => "\x6F",
            "\xF0\x9D\x94\x93" => "\x70",
            "\xF0\x9D\x94\x94" => "\x71",
            "\xF0\x9D\x94\x96" => "\x73",
            "\xF0\x9D\x94\x97" => "\x74",
            "\xF0\x9D\x94\x98" => "\x75",
            "\xF0\x9D\x94\x99" => "\x76",
            "\xF0\x9D\x94\x9A" => "\x77",
            "\xF0\x9D\x94\x9B" => "\x78",
            "\xF0\x9D\x94\x9C" => "\x79",
            "\xF0\x9D\x94\xB8" => "\x61",
            "\xF0\x9D\x94\xB9" => "\x62",
            "\xF0\x9D\x94\xBB" => "\x64",
            "\xF0\x9D\x94\xBC" => "\x65",
            "\xF0\x9D\x94\xBD" => "\x66",
            "\xF0\x9D\x94\xBE" => "\x67",
            "\xF0\x9D\x95\x80" => "\x69",
            "\xF0\x9D\x95\x81" => "\x6A",
            "\xF0\x9D\x95\x82" => "\x6B",
            "\xF0\x9D\x95\x83" => "\x6C",
            "\xF0\x9D\x95\x84" => "\x6D",
            "\xF0\x9D\x95\x86" => "\x6F",
            "\xF0\x9D\x95\x8A" => "\x73",
            "\xF0\x9D\x95\x8B" => "\x74",
            "\xF0\x9D\x95\x8C" => "\x75",
            "\xF0\x9D\x95\x8D" => "\x76",
            "\xF0\x9D\x95\x8E" => "\x77",
            "\xF0\x9D\x95\x8F" => "\x78",
            "\xF0\x9D\x95\x90" => "\x79",
            "\xF0\x9D\x95\xAC" => "\x61",
            "\xF0\x9D\x95\xAD" => "\x62",
            "\xF0\x9D\x95\xAE" => "\x63",
            "\xF0\x9D\x95\xAF" => "\x64",
            "\xF0\x9D\x95\xB0" => "\x65",
            "\xF0\x9D\x95\xB1" => "\x66",
            "\xF0\x9D\x95\xB2" => "\x67",
            "\xF0\x9D\x95\xB3" => "\x68",
            "\xF0\x9D\x95\xB4" => "\x69",
            "\xF0\x9D\x95\xB5" => "\x6A",
            "\xF0\x9D\x95\xB6" => "\x6B",
            "\xF0\x9D\x95\xB7" => "\x6C",
            "\xF0\x9D\x95\xB8" => "\x6D",
            "\xF0\x9D\x95\xB9" => "\x6E",
            "\xF0\x9D\x95\xBA" => "\x6F",
            "\xF0\x9D\x95\xBB" => "\x70",
            "\xF0\x9D\x95\xBC" => "\x71",
            "\xF0\x9D\x95\xBD" => "\x72",
            "\xF0\x9D\x95\xBE" => "\x73",
            "\xF0\x9D\x95\xBF" => "\x74",
            "\xF0\x9D\x96\x80" => "\x75",
            "\xF0\x9D\x96\x81" => "\x76",
            "\xF0\x9D\x96\x82" => "\x77",
            "\xF0\x9D\x96\x83" => "\x78",
            "\xF0\x9D\x96\x84" => "\x79",
            "\xF0\x9D\x96\x85" => "\x7A",
            "\xF0\x9D\x96\xA0" => "\x61",
            "\xF0\x9D\x96\xA1" => "\x62",
            "\xF0\x9D\x96\xA2" => "\x63",
            "\xF0\x9D\x96\xA3" => "\x64",
            "\xF0\x9D\x96\xA4" => "\x65",
            "\xF0\x9D\x96\xA5" => "\x66",
            "\xF0\x9D\x96\xA6" => "\x67",
            "\xF0\x9D\x96\xA7" => "\x68",
            "\xF0\x9D\x96\xA8" => "\x69",
            "\xF0\x9D\x96\xA9" => "\x6A",
            "\xF0\x9D\x96\xAA" => "\x6B",
            "\xF0\x9D\x96\xAB" => "\x6C",
            "\xF0\x9D\x96\xAC" => "\x6D",
            "\xF0\x9D\x96\xAD" => "\x6E",
            "\xF0\x9D\x96\xAE" => "\x6F",
            "\xF0\x9D\x96\xAF" => "\x70",
            "\xF0\x9D\x96\xB0" => "\x71",
            "\xF0\x9D\x96\xB1" => "\x72",
            "\xF0\x9D\x96\xB2" => "\x73",
            "\xF0\x9D\x96\xB3" => "\x74",
            "\xF0\x9D\x96\xB4" => "\x75",
            "\xF0\x9D\x96\xB5" => "\x76",
            "\xF0\x9D\x96\xB6" => "\x77",
            "\xF0\x9D\x96\xB7" => "\x78",
            "\xF0\x9D\x96\xB8" => "\x79",
            "\xF0\x9D\x96\xB9" => "\x7A",
            "\xF0\x9D\x97\x94" => "\x61",
            "\xF0\x9D\x97\x95" => "\x62",
            "\xF0\x9D\x97\x96" => "\x63",
            "\xF0\x9D\x97\x97" => "\x64",
            "\xF0\x9D\x97\x98" => "\x65",
            "\xF0\x9D\x97\x99" => "\x66",
            "\xF0\x9D\x97\x9A" => "\x67",
            "\xF0\x9D\x97\x9B" => "\x68",
            "\xF0\x9D\x97\x9C" => "\x69",
            "\xF0\x9D\x97\x9D" => "\x6A",
            "\xF0\x9D\x97\x9E" => "\x6B",
            "\xF0\x9D\x97\x9F" => "\x6C",
            "\xF0\x9D\x97\xA0" => "\x6D",
            "\xF0\x9D\x97\xA1" => "\x6E",
            "\xF0\x9D\x97\xA2" => "\x6F",
            "\xF0\x9D\x97\xA3" => "\x70",
            "\xF0\x9D\x97\xA4" => "\x71",
            "\xF0\x9D\x97\xA5" => "\x72",
            "\xF0\x9D\x97\xA6" => "\x73",
            "\xF0\x9D\x97\xA7" => "\x74",
            "\xF0\x9D\x97\xA8" => "\x75",
            "\xF0\x9D\x97\xA9" => "\x76",
            "\xF0\x9D\x97\xAA" => "\x77",
            "\xF0\x9D\x97\xAB" => "\x78",
            "\xF0\x9D\x97\xAC" => "\x79",
            "\xF0\x9D\x97\xAD" => "\x7A",
            "\xF0\x9D\x98\x88" => "\x61",
            "\xF0\x9D\x98\x89" => "\x62",
            "\xF0\x9D\x98\x8A" => "\x63",
            "\xF0\x9D\x98\x8B" => "\x64",
            "\xF0\x9D\x98\x8C" => "\x65",
            "\xF0\x9D\x98\x8D" => "\x66",
            "\xF0\x9D\x98\x8E" => "\x67",
            "\xF0\x9D\x98\x8F" => "\x68",
            "\xF0\x9D\x98\x90" => "\x69",
            "\xF0\x9D\x98\x91" => "\x6A",
            "\xF0\x9D\x98\x92" => "\x6B",
            "\xF0\x9D\x98\x93" => "\x6C",
            "\xF0\x9D\x98\x94" => "\x6D",
            "\xF0\x9D\x98\x95" => "\x6E",
            "\xF0\x9D\x98\x96" => "\x6F",
            "\xF0\x9D\x98\x97" => "\x70",
            "\xF0\x9D\x98\x98" => "\x71",
            "\xF0\x9D\x98\x99" => "\x72",
            "\xF0\x9D\x98\x9A" => "\x73",
            "\xF0\x9D\x98\x9B" => "\x74",
            "\xF0\x9D\x98\x9C" => "\x75",
            "\xF0\x9D\x98\x9D" => "\x76",
            "\xF0\x9D\x98\x9E" => "\x77",
            "\xF0\x9D\x98\x9F" => "\x78",
            "\xF0\x9D\x98\xA0" => "\x79",
            "\xF0\x9D\x98\xA1" => "\x7A",
            "\xF0\x9D\x98\xBC" => "\x61",
            "\xF0\x9D\x98\xBD" => "\x62",
            "\xF0\x9D\x98\xBE" => "\x63",
            "\xF0\x9D\x98\xBF" => "\x64",
            "\xF0\x9D\x99\x80" => "\x65",
            "\xF0\x9D\x99\x81" => "\x66",
            "\xF0\x9D\x99\x82" => "\x67",
            "\xF0\x9D\x99\x83" => "\x68",
            "\xF0\x9D\x99\x84" => "\x69",
            "\xF0\x9D\x99\x85" => "\x6A",
            "\xF0\x9D\x99\x86" => "\x6B",
            "\xF0\x9D\x99\x87" => "\x6C",
            "\xF0\x9D\x99\x88" => "\x6D",
            "\xF0\x9D\x99\x89" => "\x6E",
            "\xF0\x9D\x99\x8A" => "\x6F",
            "\xF0\x9D\x99\x8B" => "\x70",
            "\xF0\x9D\x99\x8C" => "\x71",
            "\xF0\x9D\x99\x8D" => "\x72",
            "\xF0\x9D\x99\x8E" => "\x73",
            "\xF0\x9D\x99\x8F" => "\x74",
            "\xF0\x9D\x99\x90" => "\x75",
            "\xF0\x9D\x99\x91" => "\x76",
            "\xF0\x9D\x99\x92" => "\x77",
            "\xF0\x9D\x99\x93" => "\x78",
            "\xF0\x9D\x99\x94" => "\x79",
            "\xF0\x9D\x99\x95" => "\x7A",
            "\xF0\x9D\x99\xB0" => "\x61",
            "\xF0\x9D\x99\xB1" => "\x62",
            "\xF0\x9D\x99\xB2" => "\x63",
            "\xF0\x9D\x99\xB3" => "\x64",
            "\xF0\x9D\x99\xB4" => "\x65",
            "\xF0\x9D\x99\xB5" => "\x66",
            "\xF0\x9D\x99\xB6" => "\x67",
            "\xF0\x9D\x99\xB7" => "\x68",
            "\xF0\x9D\x99\xB8" => "\x69",
            "\xF0\x9D\x99\xB9" => "\x6A",
            "\xF0\x9D\x99\xBA" => "\x6B",
            "\xF0\x9D\x99\xBB" => "\x6C",
            "\xF0\x9D\x99\xBC" => "\x6D",
            "\xF0\x9D\x99\xBD" => "\x6E",
            "\xF0\x9D\x99\xBE" => "\x6F",
            "\xF0\x9D\x99\xBF" => "\x70",
            "\xF0\x9D\x9A\x80" => "\x71",
            "\xF0\x9D\x9A\x81" => "\x72",
            "\xF0\x9D\x9A\x82" => "\x73",
            "\xF0\x9D\x9A\x83" => "\x74",
            "\xF0\x9D\x9A\x84" => "\x75",
            "\xF0\x9D\x9A\x85" => "\x76",
            "\xF0\x9D\x9A\x86" => "\x77",
            "\xF0\x9D\x9A\x87" => "\x78",
            "\xF0\x9D\x9A\x88" => "\x79",
            "\xF0\x9D\x9A\x89" => "\x7A",
            "\xF0\x9D\x9A\xA8" => "\xCE\xB1",
            "\xF0\x9D\x9A\xA9" => "\xCE\xB2",
            "\xF0\x9D\x9A\xAA" => "\xCE\xB3",
            "\xF0\x9D\x9A\xAB" => "\xCE\xB4",
            "\xF0\x9D\x9A\xAC" => "\xCE\xB5",
            "\xF0\x9D\x9A\xAD" => "\xCE\xB6",
            "\xF0\x9D\x9A\xAE" => "\xCE\xB7",
            "\xF0\x9D\x9A\xAF" => "\xCE\xB8",
            "\xF0\x9D\x9A\xB0" => "\xCE\xB9",
            "\xF0\x9D\x9A\xB1" => "\xCE\xBA",
            "\xF0\x9D\x9A\xB2" => "\xCE\xBB",
            "\xF0\x9D\x9A\xB3" => "\xCE\xBC",
            "\xF0\x9D\x9A\xB4" => "\xCE\xBD",
            "\xF0\x9D\x9A\xB5" => "\xCE\xBE",
            "\xF0\x9D\x9A\xB6" => "\xCE\xBF",
            "\xF0\x9D\x9A\xB7" => "\xCF\x80",
            "\xF0\x9D\x9A\xB8" => "\xCF\x81",
            "\xF0\x9D\x9A\xB9" => "\xCE\xB8",
            "\xF0\x9D\x9A\xBA" => "\xCF\x83",
            "\xF0\x9D\x9A\xBB" => "\xCF\x84",
            "\xF0\x9D\x9A\xBC" => "\xCF\x85",
            "\xF0\x9D\x9A\xBD" => "\xCF\x86",
            "\xF0\x9D\x9A\xBE" => "\xCF\x87",
            "\xF0\x9D\x9A\xBF" => "\xCF\x88",
            "\xF0\x9D\x9B\x80" => "\xCF\x89",
            "\xF0\x9D\x9B\x93" => "\xCF\x83",
            "\xF0\x9D\x9B\xA2" => "\xCE\xB1",
            "\xF0\x9D\x9B\xA3" => "\xCE\xB2",
            "\xF0\x9D\x9B\xA4" => "\xCE\xB3",
            "\xF0\x9D\x9B\xA5" => "\xCE\xB4",
            "\xF0\x9D\x9B\xA6" => "\xCE\xB5",
            "\xF0\x9D\x9B\xA7" => "\xCE\xB6",
            "\xF0\x9D\x9B\xA8" => "\xCE\xB7",
            "\xF0\x9D\x9B\xA9" => "\xCE\xB8",
            "\xF0\x9D\x9B\xAA" => "\xCE\xB9",
            "\xF0\x9D\x9B\xAB" => "\xCE\xBA",
            "\xF0\x9D\x9B\xAC" => "\xCE\xBB",
            "\xF0\x9D\x9B\xAD" => "\xCE\xBC",
            "\xF0\x9D\x9B\xAE" => "\xCE\xBD",
            "\xF0\x9D\x9B\xAF" => "\xCE\xBE",
            "\xF0\x9D\x9B\xB0" => "\xCE\xBF",
            "\xF0\x9D\x9B\xB1" => "\xCF\x80",
            "\xF0\x9D\x9B\xB2" => "\xCF\x81",
            "\xF0\x9D\x9B\xB3" => "\xCE\xB8",
            "\xF0\x9D\x9B\xB4" => "\xCF\x83",
            "\xF0\x9D\x9B\xB5" => "\xCF\x84",
            "\xF0\x9D\x9B\xB6" => "\xCF\x85",
            "\xF0\x9D\x9B\xB7" => "\xCF\x86",
            "\xF0\x9D\x9B\xB8" => "\xCF\x87",
            "\xF0\x9D\x9B\xB9" => "\xCF\x88",
            "\xF0\x9D\x9B\xBA" => "\xCF\x89",
            "\xF0\x9D\x9C\x8D" => "\xCF\x83",
            "\xF0\x9D\x9C\x9C" => "\xCE\xB1",
            "\xF0\x9D\x9C\x9D" => "\xCE\xB2",
            "\xF0\x9D\x9C\x9E" => "\xCE\xB3",
            "\xF0\x9D\x9C\x9F" => "\xCE\xB4",
            "\xF0\x9D\x9C\xA0" => "\xCE\xB5",
            "\xF0\x9D\x9C\xA1" => "\xCE\xB6",
            "\xF0\x9D\x9C\xA2" => "\xCE\xB7",
            "\xF0\x9D\x9C\xA3" => "\xCE\xB8",
            "\xF0\x9D\x9C\xA4" => "\xCE\xB9",
            "\xF0\x9D\x9C\xA5" => "\xCE\xBA",
            "\xF0\x9D\x9C\xA6" => "\xCE\xBB",
            "\xF0\x9D\x9C\xA7" => "\xCE\xBC",
            "\xF0\x9D\x9C\xA8" => "\xCE\xBD",
            "\xF0\x9D\x9C\xA9" => "\xCE\xBE",
            "\xF0\x9D\x9C\xAA" => "\xCE\xBF",
            "\xF0\x9D\x9C\xAB" => "\xCF\x80",
            "\xF0\x9D\x9C\xAC" => "\xCF\x81",
            "\xF0\x9D\x9C\xAD" => "\xCE\xB8",
            "\xF0\x9D\x9C\xAE" => "\xCF\x83",
            "\xF0\x9D\x9C\xAF" => "\xCF\x84",
            "\xF0\x9D\x9C\xB0" => "\xCF\x85",
            "\xF0\x9D\x9C\xB1" => "\xCF\x86",
            "\xF0\x9D\x9C\xB2" => "\xCF\x87",
            "\xF0\x9D\x9C\xB3" => "\xCF\x88",
            "\xF0\x9D\x9C\xB4" => "\xCF\x89",
            "\xF0\x9D\x9D\x87" => "\xCF\x83",
            "\xF0\x9D\x9D\x96" => "\xCE\xB1",
            "\xF0\x9D\x9D\x97" => "\xCE\xB2",
            "\xF0\x9D\x9D\x98" => "\xCE\xB3",
            "\xF0\x9D\x9D\x99" => "\xCE\xB4",
            "\xF0\x9D\x9D\x9A" => "\xCE\xB5",
            "\xF0\x9D\x9D\x9B" => "\xCE\xB6",
            "\xF0\x9D\x9D\x9C" => "\xCE\xB7",
            "\xF0\x9D\x9D\x9D" => "\xCE\xB8",
            "\xF0\x9D\x9D\x9E" => "\xCE\xB9",
            "\xF0\x9D\x9D\x9F" => "\xCE\xBA",
            "\xF0\x9D\x9D\xA0" => "\xCE\xBB",
            "\xF0\x9D\x9D\xA1" => "\xCE\xBC",
            "\xF0\x9D\x9D\xA2" => "\xCE\xBD",
            "\xF0\x9D\x9D\xA3" => "\xCE\xBE",
            "\xF0\x9D\x9D\xA4" => "\xCE\xBF",
            "\xF0\x9D\x9D\xA5" => "\xCF\x80",
            "\xF0\x9D\x9D\xA6" => "\xCF\x81",
            "\xF0\x9D\x9D\xA7" => "\xCE\xB8",
            "\xF0\x9D\x9D\xA8" => "\xCF\x83",
            "\xF0\x9D\x9D\xA9" => "\xCF\x84",
            "\xF0\x9D\x9D\xAA" => "\xCF\x85",
            "\xF0\x9D\x9D\xAB" => "\xCF\x86",
            "\xF0\x9D\x9D\xAC" => "\xCF\x87",
            "\xF0\x9D\x9D\xAD" => "\xCF\x88",
            "\xF0\x9D\x9D\xAE" => "\xCF\x89",
            "\xF0\x9D\x9E\x81" => "\xCF\x83",
            "\xF0\x9D\x9E\x90" => "\xCE\xB1",
            "\xF0\x9D\x9E\x91" => "\xCE\xB2",
            "\xF0\x9D\x9E\x92" => "\xCE\xB3",
            "\xF0\x9D\x9E\x93" => "\xCE\xB4",
            "\xF0\x9D\x9E\x94" => "\xCE\xB5",
            "\xF0\x9D\x9E\x95" => "\xCE\xB6",
            "\xF0\x9D\x9E\x96" => "\xCE\xB7",
            "\xF0\x9D\x9E\x97" => "\xCE\xB8",
            "\xF0\x9D\x9E\x98" => "\xCE\xB9",
            "\xF0\x9D\x9E\x99" => "\xCE\xBA",
            "\xF0\x9D\x9E\x9A" => "\xCE\xBB",
            "\xF0\x9D\x9E\x9B" => "\xCE\xBC",
            "\xF0\x9D\x9E\x9C" => "\xCE\xBD",
            "\xF0\x9D\x9E\x9D" => "\xCE\xBE",
            "\xF0\x9D\x9E\x9E" => "\xCE\xBF",
            "\xF0\x9D\x9E\x9F" => "\xCF\x80",
            "\xF0\x9D\x9E\xA0" => "\xCF\x81",
            "\xF0\x9D\x9E\xA1" => "\xCE\xB8",
            "\xF0\x9D\x9E\xA2" => "\xCF\x83",
            "\xF0\x9D\x9E\xA3" => "\xCF\x84",
            "\xF0\x9D\x9E\xA4" => "\xCF\x85",
            "\xF0\x9D\x9E\xA5" => "\xCF\x86",
            "\xF0\x9D\x9E\xA6" => "\xCF\x87",
            "\xF0\x9D\x9E\xA7" => "\xCF\x88",
            "\xF0\x9D\x9E\xA8" => "\xCF\x89",
            "\xF0\x9D\x9E\xBB" => "\xCF\x83",
            "\xF0\x9D\x9F\x8A" => "\xCF\x9D",
        );

        // do the case fold
        $text = $this->utf8_case_fold($text, $option);

        /* if (!class_exists('utf_normalizer')) {
          global $phpbb_root_path, $phpEx;
          $phpEx = "php";
          include('../web/forum/includes/utf/utf_normalizer.php');
          } */

        // convert to NFKC
        $this->nfkc($text);

        // FC_NFKC_Closure, http://www.unicode.org/Public/5.0.0/ucd/DerivedNormalizationProps.txt
        $text = strtr($text, $fc_nfkc_closure);

        return $text;
    }

    public static function nfkc(&$str) {
        define('UTF8_ASCII_RANGE', "\x20\x65\x69\x61\x73\x6E\x74\x72\x6F\x6C\x75\x64\x5D\x5B\x63\x6D\x70\x27\x0A\x67\x7C\x68\x76\x2E\x66\x62\x2C\x3A\x3D\x2D\x71\x31\x30\x43\x32\x2A\x79\x78\x29\x28\x4C\x39\x41\x53\x2F\x50\x22\x45\x6A\x4D\x49\x6B\x33\x3E\x35\x54\x3C\x44\x34\x7D\x42\x7B\x38\x46\x77\x52\x36\x37\x55\x47\x4E\x3B\x4A\x7A\x56\x23\x48\x4F\x57\x5F\x26\x21\x4B\x3F\x58\x51\x25\x59\x5C\x09\x5A\x2B\x7E\x5E\x24\x40\x60\x7F\x00\x01\x02\x03\x04\x05\x06\x07\x08\x0B\x0C\x0D\x0E\x0F\x10\x11\x12\x13\x14\x15\x16\x17\x18\x19\x1A\x1B\x1C\x1D\x1E\x1F");
        $pos = strspn($str, UTF8_ASCII_RANGE);
        $len = strlen($str);

        if ($pos == $len) {
            // ASCII strings return immediately
            return;
        }

        if (!isset($GLOBALS['utf_nfkc_qc'])) {
            global $phpbb_root_path, $phpEx;
            include('../web/forum/includes/utf/data/utf_nfkc_qc.php');
        }

        if (!isset($GLOBALS['utf_compatibility_decomp'])) {
            global $phpbb_root_path, $phpEx;
            include('../web/forum/includes/utf/data/utf_compatibility_decomp.php');
        }

        //$str = recompose($str, $pos, $len, $GLOBALS['utf_nfkc_qc'], $GLOBALS['utf_compatibility_decomp']);
    }

    function utf8_case_fold($text, $option = 'full') {
        static $uniarray = array();
        global $phpbb_root_path, $phpEx;

        // common is always set
        if (!isset($uniarray['c'])) {
            $uniarray['c'] = include('../web/forum/includes/utf/data/case_fold_c.php');
        }

        // only set full if we need to
        if ($option === 'full' && !isset($uniarray['f'])) {
            $uniarray['f'] = include('../web/forum/includes/utf/data/case_fold_f.php');
        }

        // only set simple if we need to
        if ($option !== 'full' && !isset($uniarray['s'])) {
            $uniarray['s'] = include('../web/forum/includes/utf/data/case_fold_s.php');
        }

        // common is always replaced
        $text = strtr($text, $uniarray['c']);

        if ($option === 'full') {
            // full replaces a character with multiple characters
            $text = strtr($text, $uniarray['f']);
        } else {
            // simple replaces a character with another character
            $text = strtr($text, $uniarray['s']);
        }

        return $text;
    }

    public function register() {
        if ($this->validate()) {
            $this->secretkey = base64_decode($this->_afr);
            $this->success = true;
            $this->addRegistrationAttempt();
            return $this->validateSecretKey();
        }
        return false;
    }

    public function addRegistrationAttempt() {
        $attempt = new RegistrationAttempts();
        $attempt->ip = Yii::$app->request->getUserIP();
        $attempt->date = date('d-m-Y H:i:s');
        $attempt->save();
    }

    public function get_web_page($url) {
        ini_set('max_execution_time', 300);
        $res = array();
        $options = array(
            CURLOPT_RETURNTRANSFER => true, // return web page 
            CURLOPT_HEADER => false, // do not return headers 
            CURLOPT_FOLLOWLOCATION => true, // follow redirects 
            CURLOPT_USERAGENT => "spider", // who am i 
            CURLOPT_AUTOREFERER => true, // set referer on redirect 
            CURLOPT_CONNECTTIMEOUT => 1200, // timeout on connect 
            CURLOPT_TIMEOUT => 1200, // timeout on response 
            CURLOPT_MAXREDIRS => 10, // stop after 10 redirects 
        );
        try {
            $ch = curl_init($url);
            curl_setopt_array($ch, $options);
            $content = curl_exec($ch);
            $err = curl_errno($ch);
            $errmsg = curl_error($ch);
            $header = curl_getinfo($ch);
            curl_close($ch);
            $res['content'] = $content;
            $res['url'] = $header['url'];
        } catch (\yii\base\ErrorException $e) {
            $res['content'] = "connection_failed";
            $res['url'] = "connection_failed";
        }

        return $res;
    }

    public function generateSecretKey() {
        $this->secretkey = mt_rand(100000000000000, 99999999999999999) . mt_rand(100000000000000, 99999999999999999);
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser() {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

}

?>