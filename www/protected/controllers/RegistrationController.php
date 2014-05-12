<?php

    class RegistrationController extends Controller{

        public function actionIndex(){

            $model = new Users();

            /*$result = Users::model()->findAllBySql('SELECT * FROM hiwork_users');
            foreach($result as $value) {
                print $value->user_main_email;
            }*/

            $this->render('index',array(
                'model' => $model
            ));
        }
    }