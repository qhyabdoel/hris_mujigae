<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->attributes,
	'attributes'=>array(
		array('name'=>'first_name'),
		array('name'=>'last_name'),
		array('name'=>'birth_date'),
		array('name'=>'company'),
		array('name'=>'contact'),
		array('name'=>'home_phone'),
		array('name'=>'cell_phone'),
		array('name'=>'work_phone'),
		array('name'=>'fax'),
	),
)); ?>