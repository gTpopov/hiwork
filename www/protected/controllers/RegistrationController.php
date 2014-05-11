<?php

    class RegistrationController extends Controller{

        public function actionIndex(){

            $model = new Users();

            $this->render('index',array(
                'model' => $model
            ));
        }
    }