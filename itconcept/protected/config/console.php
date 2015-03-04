<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),
	'timeZone' => 'Asia/Singapore',
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.commands.*',
	),
	// application components
	'components'=>array(
		'Smtpmail' => array(
            'class' => 'application.extensions.smtpmail.PHPMailer',
            //'Host' => "mail.budgetdesign.com.sg",
            //'Username' => 'testing@budgetdesign.com.sg',
            //'Password' => 'testing',
            'Mailer' => 'smtp',
            //'Port' => 25,
            'SMTPAuth' => true,
        ),
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=cmsyii_greateastern',
			'emulatePrepare' => true,
			'username' => 'cmsyii_kuugaDag',
			'password' => 'kuug4dagub42000',
			'charset' => 'utf8',
		),
		
		'dbRoot'=>array(
			'class'=>'CDbConnection',
			'connectionString' => 'mysql:host=localhost;dbname=cmsyii_greateasternbase',
            'emulatePrepare' => true,
            'username' => 'cmsyii_kuugaDag',
			'password' => 'kuug4dagub42000',
            'charset' => 'utf8',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				/*array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning,info',
					//'categories'=>'system.*',
				),*/
				array(
                   'class' => 'CFileLogRoute',
                   'levels'=>'error, warning,info,trace',
                   'logFile' => date('Y-m-d').'.log',
                   //'categories'=>'system.fking.ajax.check',
                ), 
				array(
		            'class'=>'CEmailLogRoute',
		            'levels'=>'error, warning,info',
		            'except'=>'system.CModule.*', // Will email everything except any CModule logs
		            'emails'=>'ryuki.servaiv@gmail.com',
		        ),
		        /*
		        array(
		        	'class'=>'CProfileLogRoute',
                	'report'=>'summary',
				),*/
				/*array(
                    'class'=>'CEmailLogRoute',
                    'levels'=>'error, warning',
                    'emails'=>array('kuuga@itconcept.com'),
                ),*/
               /*
                array(
            		'class'=>'CWebLogRoute',
            		'levels'=>'trace',
            		'enabled'=>YII_DEBUG,
        		),*/
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		/*'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),*/
	),
);