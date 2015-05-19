<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_identity = null;


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
		$this->_identity = null;
        if (!$this->hasErrors()) {
			if($identity = \Yii::$app->user->findByUsername($this->username)){
				if(\Yii::$app->user->validatePassword(
					$identity, $this->password)){
					// authentication is successfull
					$this->_identity = $identity;
				}else{
					// invalid password
					$this->addError('password', "Invalid Password");
				}
			}else{
				// invalid username
				$this->addError('username', "Invalid User name");
			}
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login(
				$this->_identity, $this->rememberMe ? 3600*24*30 : 0);
        } else {
            return false;
        }
    }
}
