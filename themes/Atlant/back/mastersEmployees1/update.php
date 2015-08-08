<?php
/* @var $this MastersEmployees1Controller */
/* @var $model MastersEmployees */

$this->breadcrumbs=array(
	'Masters Employees'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MastersEmployees', 'url'=>array('index')),
	array('label'=>'Create MastersEmployees', 'url'=>array('create')),
	array('label'=>'View MastersEmployees', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MastersEmployees', 'url'=>array('admin')),
);
?>

<h1>Update MastersEmployees <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>