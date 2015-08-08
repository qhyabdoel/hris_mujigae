<?php
/* @var $this SchedulleController */
/* @var $model AttendanceSchedulle */

$this->breadcrumbs=array(
	'Attendance Schedulles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AttendanceSchedulle', 'url'=>array('index')),
	array('label'=>'Create AttendanceSchedulle', 'url'=>array('create')),
	array('label'=>'Update AttendanceSchedulle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AttendanceSchedulle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AttendanceSchedulle', 'url'=>array('admin')),
);
?>

<h1>View AttendanceSchedulle #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'employee_id',
		'schedulle_date',
		'shift_id',
	),
)); ?>
