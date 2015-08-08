<?php echo CHtml::link(at('Create Task'), array('permission/create', 'type' => CAuthItem::TYPE_TASK), array('class'=>'btn btn-primary')); ?>

<?php $this->widget('CGridView', array(
	'id'=>'permission-task-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider'=>$roles->search(CAuthItem::TYPE_TASK),
	'columns'=>array(
		array('name'=>'name', 'header'=>'Name'),
		array('name'=>'description', 'header'=>'Description'),
		array('header' => 'Childs', 'value' => '$data->getChildsCount()'),
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width: 80px'),
		),
	),
)); ?>