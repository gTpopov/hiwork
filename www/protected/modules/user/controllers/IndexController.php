<?php

    class IndexController extends Controller{

        public function actionIndex(){

            $this->render('index');
        }

        public function filters()
        {
            return array(
                'accessControl',
            );
        }

        public function accessRules()
        {
            return array(
                array(
                    'deny',
                    'roles' => array(
                        Users::ROLE_GUEST, // 'user'
                        Users::ROLE_MODER, // 'moderator'
                        Users::ROLE_ADMIN,
                    ),
                ),
                array(
                    'allow',
                    'actions' => array('*'),
                    'roles'   => array(Users::ROLE_USER),
                ),
            );
        }

    }
