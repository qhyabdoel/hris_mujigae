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

<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Create Attendance Off'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>