<?php
/* @var $this PositionTypesController */
/* @var $model MastersPositionTypes */

$this->breadcrumbs=array(
	'Masters Position Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MastersPositionTypes', 'url'=>array('index')),
	array('label'=>'Create MastersPositionTypes', 'url'=>array('create')),
	array('label'=>'View MastersPositionTypes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MastersPositionTypes', 'url'=>array('admin')),
);
?>

<h1>Update MastersPositionTypes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>