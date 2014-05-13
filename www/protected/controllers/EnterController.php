<?php
    class EnterController extends Controller{

        public function actionIndex(){

            $model = new LoginForm();

            if(isset($_POST['LoginForm']))
            {
                $model->attributes = $_POST['LoginForm'];

                if($model->validate() && $model->login())
                    $this->redirect(Yii::app()->user->returnUrl);

            }

            $this->render('index',array(
                'model' => $model
            ));
        }

        public function actionExit()
        {
            Yii::app()->user->logout();
            $this->redirect(Yii::app()->homeUrl);
        }

    }
?>