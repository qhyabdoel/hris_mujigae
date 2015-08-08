<?php
/* @var $this PositionTypesController */
/* @var $model MastersPositionTypes */

$this->breadcrumbs=array(
	'Masters Position Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MastersPositionTypes', 'url'=>array('index')),
	array('label'=>'Manage MastersPositionTypes', 'url'=>array('admin')),
);
?>

<h1>Create MastersPositionTypes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>