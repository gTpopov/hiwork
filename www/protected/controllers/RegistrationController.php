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
                $model->user_role_access = (int) 1;

                if($model->validate())
                {

                    $now = new CDbExpression('NOW()');
                    $model->user_registration_date = $now;

                    if($model->save())
                    {

                        $model->user_password = $_POST['Users']['user_password'];

                        $user_id = Yii::app()->db->lastInsertID;

                        // Send message on mail
                        Yii::app()->mailer->From = "test@mail.com";
                        Yii::app()->mailer->FromName = "Delphis - servise.";
                        Yii::app()->mailer->AddAddress("mih_76@mail.ru", 'Имя');
                        Yii::app()->mailer->IsHTML(true);
                        Yii::app()->mailer->Subject = "Поступил новый заказ Delphis";
                        Yii::app()->mailer->Body = "Message test {$user_id}";

                        if(!Yii::app()->mailer->Send()) {
                            Yii::app()->user->setFlash('failed-registration',"Ошибка отправки сообщения ".Yii::app()->mailer->ErrorInfo);
                        }
                        else {
                            Yii::app()->user->setFlash('success-registration',"На вашу почту отправлено письмо с дальнейшими инструкциями.");

                        }
                        //Yii::app()->mailer->ClearAddresses();

                    }
                    else {

                        $model->user_password = $_POST['Users']['user_password'];
                        Yii::app()->user->setFlash('failed-registration',"Что-то пошло не так, попробуйте позже.");
                    }

                }
            }

            if(Yii::app()->user->isGuest){
                $this->render('index',array(
                    'model' => $model
                ));
            }else{
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }

        protected function actionAddUser(){

        }


    }