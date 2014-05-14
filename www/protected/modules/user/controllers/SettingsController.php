<?php

    class SettingsController extends AccessController{

        public function actionIndex(){
            $user = new Users();

            $user_data = $user->findByPk(Yii::app()->user->id);

            $this->render('index',array(
                'user_data' => $user_data
            ));
        }

    }