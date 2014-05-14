<?php

    Yii::import('application.modules.user.controllers.AccessController');
    class IndexController extends AccessController{

        public function actionIndex(){

            $this->render('index');
        }

    }
