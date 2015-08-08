<?php
/* @var $this SalaryController */
/* @var $model PayrollSalary */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payroll-salary-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'recap_id'); ?>
		<?php echo $form->textField($model,'recap_id'); ?>
		<?php echo $form->error($model,'recap_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_id'); ?>
		<?php echo $form->textField($model,'employee_id'); ?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year'); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'month'); ?>
		<?php echo $form->textField($model,'month'); ?>
		<?php echo $form->error($model,'month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'basic_salary'); ?>
		<?php echo $form->textField($model,'basic_salary',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'basic_salary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_allowance'); ?>
		<?php echo $form->textField($model,'total_allowance',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'total_allowance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_salary'); ?>
		<?php echo $form->textField($model,'total_salary',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'total_salary'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->