<?php echo CHtml::link(at('Create Role'), array('permission/create', 'type' => CAuthItem::TYPE_ROLE), array('class'=>'btn btn-primary')); ?>

<?php $this->widget('CGridView', array(
	'id'=>'permission-role-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider'=>$roles->search(CAuthItem::TYPE_ROLE),
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