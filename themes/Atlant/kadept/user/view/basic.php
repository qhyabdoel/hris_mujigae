<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->attributes,
	'attributes'=>array(
		array('name'=>'name', 'label'=>'Name'),
		array('name'=>'email', 'label'=>'Email'),
		array('name'=>'role', 'label'=>'Role'),
		array('name'=>'notes', 'label'=>'Notes'),
		array('name'=>'created_at', 'header'=>'Created Date', 'value' => timeSince($model->created_at)),
		array('name'=>'updated_at', 'header'=>'Updated Date', 'value' => timeSince($model->updated_at)),
	),
)); ?>