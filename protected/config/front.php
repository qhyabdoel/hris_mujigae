<?php
return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'theme' => 'Atlant',
		'name'=>'HRIS',
		'language' =>'id',
		'params'=>array(
			
		),
	)
);