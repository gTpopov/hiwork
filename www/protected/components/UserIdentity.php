<?php

class UserIdentity extends CUserIdentity {

    protected $_id;

    public function authenticate(){

        $user = Users::model()->find('LOWER(user_main_email)=?', array(strtolower($this->username)));

        //Activation with post mail -> (no md5())
        if(isset(Yii::app()->request->cookies['__utId']->value))
        {
            if(($user === null) || ($this->password !== $user->user_password)) {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }
            else {
                $this->_id       = $user->user_id;
                $this->username  = $user->user_main_email;
                $this->errorCode = self::ERROR_NONE;
            }
        }
        else {

            if(($user === null) || (md5('HiWork.greg.2014'.$this->password) !== $user->user_password)) {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            } else {
                $this->_id      = $user->user_id;
                $this->username = $user->user_main_email;

                $this->errorCode = self::ERROR_NONE;
            }

        }

        return !$this->errorCode;

    }

    public function getId(){
        return $this->_id;
    }
}