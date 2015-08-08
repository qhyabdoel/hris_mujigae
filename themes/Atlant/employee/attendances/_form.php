<?php
/* @var $this AttendancesController */
/* @var $model AttendancePresences */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendance-presences-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_id'); ?>
		<?php echo $form->textField($model,'employee_id'); ?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shift_id'); ?>
		<?php echo $form->textField($model,'shift_id'); ?>
		<?php echo $form->error($model,'shift_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'check_in'); ?>
		<?php echo $form->textField($model,'check_in'); ?>
		<?php echo $form->error($model,'check_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'check_out'); ?>
		<?php echo $form->textField($model,'check_out'); ?>
		<?php echo $form->error($model,'check_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'break_out'); ?>
		<?php echo $form->textField($model,'break_out'); ?>
		<?php echo $form->error($model,'break_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'break_in'); ?>
		<?php echo $form->textField($model,'break_in'); ?>
		<?php echo $form->error($model,'break_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_hours'); ?>
		<?php echo $form->textField($model,'total_hours',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'total_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->