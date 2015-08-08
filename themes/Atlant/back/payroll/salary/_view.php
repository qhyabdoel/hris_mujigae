<?php
/* @var $this SalaryController */
/* @var $data PayrollSalary */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recap_id')); ?>:</b>
	<?php echo CHtml::encode($data->recap_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('month')); ?>:</b>
	<?php echo CHtml::encode($data->month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('basic_salary')); ?>:</b>
	<?php echo CHtml::encode($data->basic_salary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_allowance')); ?>:</b>
	<?php echo CHtml::encode($data->total_allowance); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('total_salary')); ?>:</b>
	<?php echo CHtml::encode($data->total_salary); ?>
	<br />

	*/ ?>

</div>