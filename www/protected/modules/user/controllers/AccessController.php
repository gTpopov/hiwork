<?php

    class AccessController extends Controller{

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