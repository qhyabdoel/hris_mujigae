<?php echo CHtml::link(at('Create Operation'), array('permission/create', 'type' => CAuthItem::TYPE_OPERATION), array('class'=>'btn btn-primary')); ?>

<?php $this->widget('CGridView', array(
	'id'=>'permission-operation-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider'=>$roles->search(CAuthItem::TYPE_OPERATION),
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