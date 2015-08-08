<?php
return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'name'=>'Cron',
		'components'=>array(
			'log'=>array(
				'class'=>'CLogRouter',
				'routes'=>array(
					array(
						'class'=>'CFileLogRoute',
						'logFile'=>'cron.log',
						'levels'=>'error, warning',
					),
					array(
						'class'=>'CFileLogRoute',
						'logFile'=>'cron_trace.log',
						'levels'=>'trace',
					),
				),
			),
		),
	)
);