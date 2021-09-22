<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\LoginFails;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{

    public $username;
    public $password;
    public $newpassword;
    public $ipItem;
    public $rememberMe = true;
    private $_user = false;
    public $failedTries;

    public function attributeLabels()
    {
        return [
            'username' => 'Ник',
            'password' => 'Пароль',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            ['newpassword', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if ($user->newpassword != null && strlen($user->newpassword) > 0) {
                if ($this->user->validateNewPassword(md5($this->password))) {
                    $this->addError($attribute, 'Новый пароль ещё не был одобрен. Повторите попытку позже.');
                    return;
                }
            }

            if (!$user || !$user->validatePassword(md5($this->password))) {
                $this->addFailedTry();
                $this->addError($attribute, 'Неверный ник или пароль.');
            } else {
                $this->flushFailedTries();
                if ($user->validatePassword(md5($this->password))) {
                    if ($user->newpassword != null && strlen($user->newpassword) > 0) {
                        $user->newpassword = '';
                        $user->approvekey = '';
                        $user->save();
                    }
                }

            }
        }
    }

    public function addFailedTry()
    {
        $fail = new LoginFails();
        $fail->ip = Yii::$app->request->getUserIP();
        $fail->date = date('d-m-Y H:i:s');
        $fail->save();
    }

    public function flushFailedTries()
    {
        $tries = LoginFails::deleteAll(['ip' => Yii::$app->request->getUserIP()]);
    }

    public function verifyFailedTries()
    {
        $this->failedTries = LoginFails::getFailsLastHour(Yii::$app->request->getUserIP());
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $this->writeUserIp();
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }

    public function writeUserIp()
    {
        $this->getUser();
        $this->ipItem = new Loginip();
        $this->ipItem->user_id = $this->_user->id;
        $this->ipItem->date = date('d-m-Y H:i:s');
        $this->ipItem->ip = Yii::$app->request->getUserIP();
        $this->ipItem->save();
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Users::findByUsername($this->username);
        }

        return $this->_user;
    }

}
