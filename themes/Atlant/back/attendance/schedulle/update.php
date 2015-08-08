<?php
/* @var $this SchedulleController */
/* @var $model AttendanceSchedulle */

$this->breadcrumbs=array(
	'Attendance Schedulles'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AttendanceSchedulle', 'url'=>array('index')),
	array('label'=>'Create AttendanceSchedulle', 'url'=>array('create')),
	// array('label'=>'View AttendanceSchedulle', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AttendanceSchedulle', 'url'=>array('admin')),
);
?>

<h1>Update AttendanceSchedulle</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'employees'=>$employees)); ?>