<?php

    class RegistrationController extends Controller{


        public function actionIndex(){

            $model = new Users();

            if(isset($_POST['Users']))
            {

                $model->setScenario('registration');
                $model->attributes = $_POST['Users'];

                if($model->validate())
                {

                    $now = new CDbExpression('NOW()');
                    $model->user_registration_date = $now;

                    if($model->save())
                    {

                        $model->user_password = $_POST['Users']['user_password'];
                        Yii::app()->user->setFlash('success-registration',"На вашу почту отправлено письмо с дальнейшими инструкциями.");

                    }else
                    {

                        $model->user_password = $_POST['Users']['user_password'];
                        Yii::app()->user->setFlash('failed-registration',"Что-то пошло не так, попробуйте позже.");
                    }

                }
            }

            $this->render('index',array(
                'model' => $model
            ));
        }

        protected function actionAddUser(){

        }


    }