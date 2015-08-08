<?php
/* @var $this McuController */
/* @var $data MastersEmployeeMcu */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mcu_date')); ?>:</b>
	<?php echo CHtml::encode($data->mcu_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mcu_place')); ?>:</b>
	<?php echo CHtml::encode($data->mcu_place); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mcu_status')); ?>:</b>
	<?php echo CHtml::encode($data->mcu_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mcu_notes')); ?>:</b>
	<?php echo CHtml::encode($data->mcu_notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deases')); ?>:</b>
	<?php echo CHtml::encode($data->deases); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('alergy')); ?>:</b>
	<?php echo CHtml::encode($data->alergy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	*/ ?>

</div>