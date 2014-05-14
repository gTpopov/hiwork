<?php
    Yii::import('application.modules.user.controllers.AccessController');
    class SettingsController extends AccessController{

        public function actionIndex(){

            $this->render('index');
        }

    }