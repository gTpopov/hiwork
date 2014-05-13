<?php

    class WebUser extends CWebUser {

        private $_model = null;


        function getRole() {
            if($user = $this->getModel()){
                return $user->user_role_access;
            }else{
                return false;
            }
        }

        private function getModel(){
            if (!$this->isGuest && $this->_model === null){
                $this->_model = Users::model()->findByPk($this->id,array('select'=>'user_role_access'));
            }
            return $this->_model;
        }
    }