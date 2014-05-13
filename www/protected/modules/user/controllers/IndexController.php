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
                    'allow',
                    'roles'   => array(Users::ROLE_USER),
                ),
                array(
                    'deny',
                    'roles' => array(
                        Users::ROLE_GUEST,
                        Users::ROLE_MODER,
                        Users::ROLE_ADMIN,
                    ),
                ),
            );
        }

    }
