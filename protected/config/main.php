<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

Yii::setPathOfAlias('editable', dirname(__FILE__).'/../extensions/x-editable');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

	'name'=>'Directorio Online',
    'language'=>'es',
    'sourceLanguage'=>'es',
    'theme' => 'bootstrap',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.controllers.Mail',
       /* 'editable.*' //easy include of editable classes*/
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

	/*	'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),*/
	),
	// application components
	'components'=>array(
        // Envio de correos electronicos
        'Smtpmail'=>array(
            'class'=>'application.extensions.smtpmail.PHPMailer',
            'Host'=>"mail@cladian.com",
            'Username'=>'team@cladian.com',
            'Password'=>'',
            'Mailer'=>'smtp.cladian.com',
            'Port'=>465,
            'SMTPAuth'=>true,
        ),

        //X-editable config
       'editable' => array(
            'class'     => 'editable.EditableConfig',
            'form'      => 'bootstrap',        //form style: 'bootstrap', 'jqueryui', 'plain'
            'mode'      => 'popup',            //mode: 'popup' or 'inline'
            'defaults'  => array(              //default settings for all editable elements
                'emptytext' => 'Click to edit'
            )
        ),

        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
        /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
        */
		// uncomment the following to use a MySQL database

/*        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=cladiann_directorio',
            'emulatePrepare' => true,
            'username' => 'cladiann_cladian',
            'password' => 'D3s4rr0ll0',
            'charset' => 'utf8',
        ),*/

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=queseras_directorio',
			'emulatePrepare' => true,
			'username' => 'cladian',
			'password' => 'cladian',
			'charset' => 'utf8',
		),

        // Control de roles
        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
            'itemTable'=>'AuthItem', // Tabla que contiene los elementos de autorizacion
            'itemChildTable'=>'AuthItemChild', // Tabla que contiene los elementos padre-hijo
            'assignmentTable'=>'AuthAssignment', // Tabla que contiene la signacion usuario-autorizacion
        ),


		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['searchText']
	// using Yii::app()->params['idCons']

    'params'=>array(
        //this is used in contact page
        'adminEmail'=>'webmaster@example.com',
        'searchText'=>'También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación. <br/>',
        'searchTitle'=>'Búsqueda Avanzada',
        'requerido'=>'<p class="note">Los campos marcados con un <span class="required">*</span> son obligatorios.</p>',
        'saveSuccess'=>'El registro se almacenó correctamente',
        'idCons'=>1,
        'idPyme'=>2,
        'idCli'=>3,
        'idPro'=>4,

        'upload'=>'/../upload/',
    ),
);