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
                    'actions' => array('index'),
                    'roles'   => array('user'),
                ),
            );
        }

    }
