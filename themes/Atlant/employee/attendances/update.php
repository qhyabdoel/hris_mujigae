<?php
/* @var $this AttendancesController */
/* @var $model AttendancePresences */

$this->breadcrumbs=array(
	'Attendance Presences'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AttendancePresences', 'url'=>array('index')),
	array('label'=>'Create AttendancePresences', 'url'=>array('create')),
	array('label'=>'View AttendancePresences', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AttendancePresences', 'url'=>array('admin')),
);
?>

<h1>Update AttendancePresences <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>