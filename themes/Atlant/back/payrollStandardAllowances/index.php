<?php
/* @var $this PayrollBasedAllowancesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Payroll Standard Allowances',
);

$this->menu=array(
	array('label'=>'Create PayrollBasedAllowances', 'url'=>array('create')),
	array('label'=>'Manage PayrollBasedAllowances', 'url'=>array('admin')),
);
?>

<h1>Payroll Standard Allowances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
