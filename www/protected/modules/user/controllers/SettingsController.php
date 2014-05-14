<?php

    class SettingsController extends AccessController{

        public function actionIndex(){
            $user = new Users; $image = new UserOwnPhotos;

            $user_data = $user->findByPk(Yii::app()->user->id);

            $this->render('index',array(
                'user_data' => $user_data,
                'image'     => $image
            ));
        }

        public function actionUploadLayout(){

            if(Yii::app()->request->isAjaxRequest){

                $model = new UserOwnPhotos;

                $model->attributes = $_POST['UserOwnPhotos'];
                $model->image = CUploadedFile::getInstance($model,'image');
                if($model->save()){
                    $model->image->saveAs('images/app.user.files/'.$model->image);
                }

                 echo CHtml::encode(1);

            }else{
                $this->redirect(Yii::app()->user->returnUrl);
            }

        }

    }