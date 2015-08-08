<?php
/* @var $this MastersEmployees1Controller */
/* @var $model MastersEmployees */

$this->breadcrumbs=array(
	'Masters Employees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MastersEmployees', 'url'=>array('index')),
	array('label'=>'Manage MastersEmployees', 'url'=>array('admin')),
);
?>

<h1>Create MastersEmployees</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>