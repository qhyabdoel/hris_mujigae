<?php
return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'theme' => 'Atlant',
		'name' => 'Employee',
		'defaultController' => 'site/index',
		'import'=>array(
			
		),
		'components'=>array(
			'user'=>array(
				// enable cookie-based authentication
				'allowAutoLogin'=>true,
				'loginUrl'=>array('/login/index'),
			),
		),
	)
);