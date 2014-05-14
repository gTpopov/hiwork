<?php

    class RegistrationController extends Controller {


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

                        //$model->user_password = $_POST['Users']['user_password'];

                        $user_id   = (int) Yii::app()->db->lastInsertID;
                        $password  = (string) trim($_POST['Users']['user_password']);
                        $key       = (string) md5('HiWork.greg.2014'.$password);

                        //$user_id                = (int) Yii::app()->user->getState('__uu_Id');
                        $model->user_password   = (string) $_POST['Users']['user_password_repeat'];

                        $message = '<p>
                                    <b>'.$_POST['Users']['user_nick_name'].' приветсвуем на HiWork!</b>
                                    <br> Подтвердите свою регистрацию перейдя по
                                    <a href="'.Yii::app()->request->hostInfo.'/registration/activation?_ukey='.$key.'&uid='.$user_id.'&__utime='.time().'">
                                    ссылке
                                    </a> или скопируйте '.Yii::app()->request->hostInfo.'/registration/activation?_ukey='.$key.'&uid='.$user_id.'&__utime='.time().'
                                    </p>';

                        // Send message on mail
                        Yii::app()->mailer->From = "test@mail.com";
                        Yii::app()->mailer->FromName = "Delphis - servise.";
                        Yii::app()->mailer->AddAddress("mih_76@mail.ru", 'Имя');
                        Yii::app()->mailer->IsHTML(true);
                        Yii::app()->mailer->Subject = "Поступил новый заказ Delphis";
                        Yii::app()->mailer->Body = $message;

                        if(!Yii::app()->mailer->Send()) {
                            Yii::app()->user->setFlash('failed-registration',"Ошибка отправки сообщения ".Yii::app()->mailer->ErrorInfo);
                        }
                        else {
                            Yii::app()->user->setFlash('success-registration',"На вашу почту отправлено письмо с дальнейшими инструкциями.");


                            //send md5()



                        }
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
            } else {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }

        protected function actionAddUser(){

        }

        /**
         * Function activation account from mail
         */
        public function actionActivation()
        {

            if(isset($_GET['_ukey']))
            {
                //$model = new Users();
                $uid = intval($_GET['uid']);
                $str = Users::model()->findByPk($uid);

                $key = $str->user_password;


                if($key === $_GET['_ukey'] && $str->user_account_status === '0')
                {
                    $cookieID = new CHttpCookie('__utId',$uid);
                    Yii::app()->request->cookies['__utId']  = $cookieID;

                    $model_auto_login = new LoginForm;
                    //$model_auto_login->setScenario('classicEnter');
                    $_POST['LoginForm']['user_main_email'] = $str->user_main_email;
                    $_POST['LoginForm']['user_password']   = $str->user_password;

                    $model_auto_login->attributes = $_POST['LoginForm'];

                    if($model_auto_login->login())
                    {
                        unset(Yii::app()->request->cookies['__utId']);

                        if(Users::model()->updateByPk($uid,array('user_account_status'=>'1')))
                        {
                            //print 'success';
                            $this->redirect(Yii::app()->user->returnUrl);
                        }
                        else {

                            //print 1;
                            $this->redirect('/');
                        }

                    }
                    else {
                        //print 2;
                        $this->redirect("/");
                    }
                }
                else {
                    //print 3;
                    $this->redirect("/");
                }
            }

        }


    }
