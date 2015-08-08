<?php
/* @var $this MastersEmployees1Controller */
/* @var $model MastersEmployees */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'masters-employees-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php echo $form->textField($model,'type_id'); ?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nickname'); ?>
		<?php echo $form->textField($model,'nickname',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nickname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'religion_id'); ?>
		<?php echo $form->textField($model,'religion_id'); ?>
		<?php echo $form->error($model,'religion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ethnic_id'); ?>
		<?php echo $form->textField($model,'ethnic_id'); ?>
		<?php echo $form->error($model,'ethnic_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthplace_country_id'); ?>
		<?php echo $form->textField($model,'birthplace_country_id'); ?>
		<?php echo $form->error($model,'birthplace_country_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthplace_state_id'); ?>
		<?php echo $form->textField($model,'birthplace_state_id'); ?>
		<?php echo $form->error($model,'birthplace_state_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthplace_city_id'); ?>
		<?php echo $form->textField($model,'birthplace_city_id'); ?>
		<?php echo $form->error($model,'birthplace_city_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthplace_district_id'); ?>
		<?php echo $form->textField($model,'birthplace_district_id'); ?>
		<?php echo $form->error($model,'birthplace_district_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'poscode'); ?>
		<?php echo $form->textField($model,'poscode',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'poscode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthdate'); ?>
		<?php echo $form->textField($model,'birthdate'); ?>
		<?php echo $form->error($model,'birthdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'married_status'); ?>
		<?php echo $form->textField($model,'married_status',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'married_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'married_date'); ?>
		<?php echo $form->textField($model,'married_date'); ?>
		<?php echo $form->error($model,'married_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'child_amount'); ?>
		<?php echo $form->textField($model,'child_amount'); ?>
		<?php echo $form->error($model,'child_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'height'); ?>
		<?php echo $form->textField($model,'height',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'height'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'identity_type_id'); ?>
		<?php echo $form->textField($model,'identity_type_id'); ?>
		<?php echo $form->error($model,'identity_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'identity_number'); ?>
		<?php echo $form->textField($model,'identity_number',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'identity_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hiredate'); ?>
		<?php echo $form->textField($model,'hiredate'); ?>
		<?php echo $form->error($model,'hiredate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active'); ?>
		<?php echo $form->error($model,'is_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department_id'); ?>
		<?php echo $form->textField($model,'department_id'); ?>
		<?php echo $form->error($model,'department_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'section_id'); ?>
		<?php echo $form->textField($model,'section_id'); ?>
		<?php echo $form->error($model,'section_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'outlet_id'); ?>
		<?php echo $form->textField($model,'outlet_id'); ?>
		<?php echo $form->error($model,'outlet_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position_id'); ?>
		<?php echo $form->textField($model,'position_id'); ?>
		<?php echo $form->error($model,'position_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level_id'); ?>
		<?php echo $form->textField($model,'level_id'); ?>
		<?php echo $form->error($model,'level_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grade_id'); ?>
		<?php echo $form->textField($model,'grade_id',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'grade_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resident_status'); ?>
		<?php echo $form->textField($model,'resident_status',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'resident_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_periode_start'); ?>
		<?php echo $form->textField($model,'contract_periode_start'); ?>
		<?php echo $form->error($model,'contract_periode_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_periode_end'); ?>
		<?php echo $form->textField($model,'contract_periode_end'); ?>
		<?php echo $form->error($model,'contract_periode_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_name'); ?>
		<?php echo $form->textField($model,'bank_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'bank_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_account_no'); ?>
		<?php echo $form->textField($model,'bank_account_no',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'bank_account_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_account_name'); ?>
		<?php echo $form->textField($model,'bank_account_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'bank_account_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_address'); ?>
		<?php echo $form->textField($model,'bank_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'bank_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salary_id'); ?>
		<?php echo $form->textField($model,'salary_id'); ?>
		<?php echo $form->error($model,'salary_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_area_id'); ?>
		<?php echo $form->textField($model,'city_area_id'); ?>
		<?php echo $form->error($model,'city_area_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->