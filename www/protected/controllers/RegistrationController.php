<?php

    class RegistrationController extends Controller{


        public function actionIndex(){

            $model = new Users();

            if(isset($_POST['Users']))
            {

                $model->setScenario('registration');
                $model->user_main_email  = (string) mb_strtolower(str_replace(" ","",$_POST['Users']['user_main_email']));
                $model->user_password    = (string) $_POST['Users']['user_password'];
                $model->user_nick_name   = (string) str_replace(" ","",$_POST['Users']['user_nick_name']);
                $model->user_role_access = (int) 0;

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