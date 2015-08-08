<?php
return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'theme' => 'Atlant',
		'name' => 'Mujigae HRIS',
		'language' => 'en',
		'defaultController' => 'site/index',
		'import'=>array(
			
		),
		'components'=>array(
			'user'=>array(
				// enable cookie-based authentication
				'allowAutoLogin'=>true,
				'loginUrl'=>array('/login/index'),
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
	)
);