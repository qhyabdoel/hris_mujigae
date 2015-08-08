<?php
$root=dirname(__FILE__).'/../..';
$webroot = Yii::getPathOfAlias('webroot');

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('themes', $root.'/themes');
Yii::setPathOfAlias('photoprofile', $root.'/images/profiles');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
		'ext.YiiMailer.YiiMailer',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'a',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			'class'=>'WebUser',
			'allowAutoLogin'=>true,
		),
		'settings' => array(
			'class' => 'CustomSettings',
        ),
		'authManager'=>array(
		    'class'=>'application.extensions.authcache.ECachedDbAuthManager',
			'cacheID' => 'cache',
            'connectionID'=>'db',
			'cachingDuration' => !YII_DEBUG ? 3600*24 : 0,
			'itemTable' => 'auth_item',
			'itemChildTable' => 'auth_item_child',
			'assignmentTable' => 'auth_assignment',
		),
		'numberFormatter'=>array(
			'class'=>'NumberFormatter',
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
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' 	=> 'mysql:host=localhost;dbname=hris_20150702',
			'emulatePrepare' 	=> true,
			'username' 			=> 'root',
			'password' 			=> '',
			'charset' 			=> 'utf8',
			'attributes' 		=> array(PDO::MYSQL_ATTR_LOCAL_INFILE => true),
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
		
		'clientScript'=>array(
			'packages'=>array(
				'jquery'=>array(
					'baseUrl'=>'themes/Atlant/js/plugins/jquery',
					'js'=>array('jquery.min.js')
				),
				'jquery-ui'=>array(
					'baseUrl'=>'themes/Atlant/js/plugins/jquery',
					'js'=>array('jquery-ui.min.js')
				),
			)
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'adminUrl'=>'/hris/backend.php',
		'employeeUrl'=>'/hris/employee.php',
	),
	
	'behaviors'=>array(
		'runEnd'=>array(
			'class'=>'application.components.WebApplicationEndBehavior',
		),
	),
);