<?php
/* @var $this PayrollStandardAllowancesController */
/* @var $model PayrollStandardAllowances */

$this->breadcrumbs=array(
	'Payroll Standard Allowances'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PayrollStandardAllowances', 'url'=>array('index')),
	array('label'=>'Create PayrollStandardAllowances', 'url'=>array('create')),
	array('label'=>'View PayrollStandardAllowances', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PayrollStandardAllowances', 'url'=>array('admin')),
);
?>

<h1>Update PayrollStandardAllowances <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>