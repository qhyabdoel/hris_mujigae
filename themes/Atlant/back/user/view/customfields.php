<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>User::model()->getFieldsData($model->id),
	'attributes'=>User::model()->getFieldsAttributes($model->id),
)); ?>