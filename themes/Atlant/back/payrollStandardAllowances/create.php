<?php
/* @var $this PayrollBasedAllowancesController */
/* @var $model PayrollBasedAllowances */

$this->breadcrumbs=array(
	'Payroll Standard Allowances'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PayrollBasedAllowances', 'url'=>array('index')),
	array('label'=>'Manage PayrollBasedAllowances', 'url'=>array('admin')),
);
?>

<h1>Create PayrollBasedAllowances</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>