<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Users;
use app\models\Forum;
use app\models\PasswordResetAttempts;
use app\models\Logs;

class Lostpassword extends \yii\base\Model {

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
    public $pers_id;
    public $user;
    public $forumuser;
    public $passwordreset_tries;
    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            // username and password are both required
            [
                ['username', '_afr'], 'required'],
            ['secretkey', 'validateSecretKey'],
        ];
    }

    public function passwordResetAttempts() {
        $this->passwordreset_tries = PasswordResetAttempts::getAttemptsLastHour(Yii::$app->request->getUserIP());
    }

    public function attributeLabels() {
        return [
            'username' => 'Ник',
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
        //check if user with this nick already registered
        $this->username = htmlentities($this->username);
        if (Users::findByUsername($this->username)) {
            $regex = '#[^a-zA-Z0-9]#i';
            $this->generatedpassword = substr(preg_replace($regex, '', Yii::$app->getSecurity()->generateRandomString(40)), 0, 8);
            $this->user = Users::findByUsername($this->username);
            if ($this->user->active == 1) {
                $this->user->newpassword = md5($this->generatedpassword);
                $this->user->approvekey = "!." . $this->secretkey . ".!";
                $this->user->save();
                $log->addRecord($this->user->id, $this->user->username, Yii::$app->request->getUserIP(), "[PASS_RESET_REQUEST] username: " . $this->user->username . " | userId: " . $this->user->id." ", "REQUESTED");
            } else {
                $this->error = "Нет возможности сменить пароль неактивированного аккаунта.";
            }
            /*   $this->url = "http://newforest.apeha.ru/info.html?nick=" . urlencode(iconv("UTF-8", "CP1251", $this->username));
              $this->pers_info = $this->get_web_page($this->url);
              if (strpos($this->pers_info['content'], 'location.href="http://') !== false) {
              $first_parse_for_new_url = explode('location.href="http://', $this->pers_info['content']);
              $this->temp_link = explode('";', $first_parse_for_new_url[1]);
              $this->pers_link = $this->temp_link[0];
              //$this->pers_info_content = iconv("CP1251", "UTF-8", $this->pers_info['content']);
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
              //if (strpos($this->pers_info_content, "!.D5Z-NGzOPexyxHg4QGEmC0DMUlWHnc.!") !== false) {
              //ALL FINE. UPDATING ACCOUNT HERE
              $this->generatedpassword = Yii::$app->getSecurity()->generateRandomString(8);
              $this->user = Users::findByUsername($this->username);
              $this->user->authKey = Yii::$app->getSecurity()->generateRandomString(12);
              $this->user->password = md5($this->generatedpassword);
              $this->user->save();

              $this->forumuser = Forum::getUserByUsername($this->username);
              $this->forumuser->user_password = md5($this->generatedpassword);
              $this->forumuser->user_form_salt = "";
              $this->forumuser->save();
              } else {
              $this->error = "Кодовая строка <span style=\"color:red;\">$." . $this->secretkey . ".$</span> не найдена в профиле персонажа.";
              }
              }
             */
        } else {
            $this->error = "<span style=\"color:red\">Пользователь с ником <b>" . $this->username . "</b> не зарегистрирован</span>";
        }

        return true;
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function restorePassword() {
        if ($this->validate()) {
            $this->secretkey = base64_decode($this->_afr);
            $this->success = true;
            $this->addRestorePasswordAttempt();
            return $this->validateSecretKey();
        }
        return false;
    }

    public function addRestorePasswordAttempt() {
        $attempt = new PasswordResetAttempts();
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
        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        $err = curl_errno($ch);
        $errmsg = curl_error($ch);
        $header = curl_getinfo($ch);
        curl_close($ch);

        $res['content'] = $content;
        $res['url'] = $header['url'];
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