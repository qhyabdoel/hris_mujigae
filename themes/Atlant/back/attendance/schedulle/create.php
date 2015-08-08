<?php
/* @var $this SchedulleController */
/* @var $model AttendanceSchedulle */

$this->breadcrumbs=array(
	'Attendance Schedulles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AttendanceSchedulle', 'url'=>array('index')),
	array('label'=>'Manage AttendanceSchedulle', 'url'=>array('admin')),
);
?>

<h1>Attendance Schedulle</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'employees'=>$employees,'daysValue'=>$daysValue,'holidays'=>$holidays,)); ?>