<?php
/* @var $this PositionTypesController */
/* @var $model MastersPositionTypes */

$this->breadcrumbs=array(
	'Masters Position Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List MastersPositionTypes', 'url'=>array('index')),
	array('label'=>'Create MastersPositionTypes', 'url'=>array('create')),
	array('label'=>'Update MastersPositionTypes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MastersPositionTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MastersPositionTypes', 'url'=>array('admin')),
);
?>

<h1>View MastersPositionTypes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
