<?php
/* @var $this PayrollBasedAllowancesController */
/* @var $model PayrollBasedAllowances */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payroll-standard-allowances-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'standard_id'); ?>
		<?php echo $form->textField($model,'standard_id'); ?>
		<?php echo $form->error($model,'standard_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allowance_id'); ?>
		<?php echo $form->textField($model,'allowance_id'); ?>
		<?php echo $form->error($model,'allowance_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'calc_type'); ?>
		<?php echo $form->textField($model,'calc_type',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'calc_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'formula'); ?>
		<?php echo $form->textField($model,'formula',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'formula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'values'); ?>
		<?php echo $form->textField($model,'values',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'values'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->