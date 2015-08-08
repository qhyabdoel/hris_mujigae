<?php
/* @var $this AttendancesController */
/* @var $model AttendancePresences */

$this->breadcrumbs=array(
	'Attendance Presences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AttendancePresences', 'url'=>array('index')),
	array('label'=>'Create AttendancePresences', 'url'=>array('create')),
	array('label'=>'Update AttendancePresences', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AttendancePresences', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AttendancePresences', 'url'=>array('admin')),
);
?>

<h1>View AttendancePresences #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'employee_id',
		'date',
		'shift_id',
		'check_in',
		'check_out',
		'break_out',
		'break_in',
		'total_hours',
		'created_at',
	),
)); ?>
