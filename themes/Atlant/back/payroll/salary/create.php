<?php
/* @var $this SalaryController */
/* @var $model PayrollSalary */

$this->breadcrumbs=array(
	'Payroll Salaries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PayrollSalary', 'url'=>array('index')),
	array('label'=>'Manage PayrollSalary', 'url'=>array('admin')),
);
?>

<h1>Create PayrollSalary</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>