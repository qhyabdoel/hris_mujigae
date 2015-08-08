<?php
/* @var $this AttendancesController */
/* @var $model AttendancePresences */

$this->breadcrumbs=array(
	'Attendance Presences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AttendancePresences', 'url'=>array('index')),
	array('label'=>'Manage AttendancePresences', 'url'=>array('admin')),
);
?>

<h1>Create AttendancePresences</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>