<?php

    Yii::import('application.controllers.DefAccessController');
    class EnterController extends Controller{

        public function actionIndex(){

            $model = new LoginForm();

            if(isset($_POST['LoginForm']))
            {
                $model->attributes = $_POST['LoginForm'];

                if($model->validate() && $model->login())
                    $this->redirect(Yii::app()->user->returnUrl);

            }

            if(Yii::app()->user->isGuest){
                $this->render('index',array(
                    'model' => $model
                ));
            }else{
                $this->redirect(Yii::app()->user->returnUrl);
            }

        }

        public function actionExit()
        {
            Yii::app()->user->logout();
            $this->redirect(Yii::app()->homeUrl);
        }

    }
?>