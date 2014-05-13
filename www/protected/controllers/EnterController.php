<?php
    class EnterController extends Controller{

        public function actionIndex(){

            $model = new LoginForm();

            $this->render('index',array(
                'model' => $model
            ));
        }

    }
?>