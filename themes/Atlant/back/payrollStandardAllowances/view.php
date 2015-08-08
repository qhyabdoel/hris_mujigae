<?php
/* @var $this PayrollBasedAllowancesController */
/* @var $model PayrollBasedAllowances */

$this->breadcrumbs=array(
	'Payroll Standard Allowances'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PayrollBasedAllowances', 'url'=>array('index')),
	array('label'=>'Create PayrollBasedAllowances', 'url'=>array('create')),
	array('label'=>'Update PayrollBasedAllowances', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PayrollBasedAllowances', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PayrollBasedAllowances', 'url'=>array('admin')),
);
?>

<h1>View PayrollBasedAllowances #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'standard_id',
		'allowance_id',
		'calc_type',
		'formula',
		'values',
	),
)); ?>
