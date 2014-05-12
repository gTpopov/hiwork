<?php

return array(
	'basePath'          => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'              => 'HiWork',
	'defaultController' => 'index',
	'sourceLanguage'    => 'ru',

	'preload' => array('log'),

	'import' => array(
		'application.models.*',
		'application.components.*',
	),

	'modules' => array(
		'gii' => array(
			'class'     => 'system.gii.GiiModule',
			'password'  => '19953103',
			'ipFilters' => array('127.0.0.1','::1','93.78.21.*'),
		),
	),

	'components' => array(

		'user' => array(
			'allowAutoLogin' => true,
		),

		'urlManager' => array(
			'urlFormat'      => 'path',
			'showScriptName' => false,
			'rules'          => array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'db' => array(
			'connectionString'  => 'mysql:host=hwsite.mysql.ukraine.com.ua;dbname=hwsite_db',
			'emulatePrepare'    => true,
			'username'          => 'hwsite_grag',
			'password'          => '19953103',
			'charset'           => 'utf8',
		),

		'errorHandler' => array(
			'errorAction'=>'/error/index',
		),

		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
                    'class'     => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'ipFilters' => array('127.0.0.1','::1','93.78.21.*'),
					'levels'    => 'error, warning',
				),
				/*
				array(
					'class' => 'CWebLogRoute',
				),
				*/
			),
		),
        'clientScript' => array(
            'packages' => array(
                'bootstrap' => array(
                    'baseUrl' => '/css/bootstrap/',
                    'js'      => array(YII_DEBUG ? 'js/bootstrap.min.js' : 'js/bootstrap.js'),
                    'css'     => array(YII_DEBUG ? 'css/bootstrap.min.css' : 'css/bootstrap.css'),
                    'depends' => array('jquery'),
                ),
            )
        )
	),

	// using Yii::app()->params['paramName']
	'params' => array(
		'adminEmail' => 'greghiworld@icloud.com',
	),
);