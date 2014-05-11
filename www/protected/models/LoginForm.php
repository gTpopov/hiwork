<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $user_main_email;
	public $user_password;
	public $remember_me;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that user_main_email and user_password are required,
	 * and user_password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('user_main_email, user_password', 'required'),
			array('remember_me', 'boolean'),
			array('user_password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array( 'remember_me'=>'запомнить меня', );
	}

	/**
	 * Authenticates the user_password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity = new UserIdentity($this->user_main_email,$this->user_password);
			if(!$this->_identity->authenticate())
				$this->addError('user_password','Неправильная пара email/пароль.');
		}
	}

	/**
	 * Logs in the user using the given user_main_email and user_password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity === null)
		{
			$this->_identity = new UserIdentity($this->user_main_email,$this->user_password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode === UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
