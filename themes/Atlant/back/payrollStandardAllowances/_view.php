<?php
/* @var $this PayrollBasedAllowancesController */
/* @var $data PayrollBasedAllowances */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('standard_id')); ?>:</b>
	<?php echo CHtml::encode($data->standard_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allowance_id')); ?>:</b>
	<?php echo CHtml::encode($data->allowance_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calc_type')); ?>:</b>
	<?php echo CHtml::encode($data->calc_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('formula')); ?>:</b>
	<?php echo CHtml::encode($data->formula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('values')); ?>:</b>
	<?php echo CHtml::encode($data->values); ?>
	<br />


</div>