<?php
/* @var $this MastersEmployees1Controller */
/* @var $model MastersEmployees */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_id'); ?>
		<?php echo $form->textField($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nickname'); ?>
		<?php echo $form->textField($model,'nickname',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'religion_id'); ?>
		<?php echo $form->textField($model,'religion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ethnic_id'); ?>
		<?php echo $form->textField($model,'ethnic_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birthplace_country_id'); ?>
		<?php echo $form->textField($model,'birthplace_country_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birthplace_state_id'); ?>
		<?php echo $form->textField($model,'birthplace_state_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birthplace_city_id'); ?>
		<?php echo $form->textField($model,'birthplace_city_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birthplace_district_id'); ?>
		<?php echo $form->textField($model,'birthplace_district_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'poscode'); ?>
		<?php echo $form->textField($model,'poscode',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birthdate'); ?>
		<?php echo $form->textField($model,'birthdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'married_status'); ?>
		<?php echo $form->textField($model,'married_status',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'married_date'); ?>
		<?php echo $form->textField($model,'married_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'child_amount'); ?>
		<?php echo $form->textField($model,'child_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weight'); ?>
		<?php echo $form->textField($model,'weight',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'height'); ?>
		<?php echo $form->textField($model,'height',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'identity_type_id'); ?>
		<?php echo $form->textField($model,'identity_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'identity_number'); ?>
		<?php echo $form->textField($model,'identity_number',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hiredate'); ?>
		<?php echo $form->textField($model,'hiredate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'department_id'); ?>
		<?php echo $form->textField($model,'department_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'section_id'); ?>
		<?php echo $form->textField($model,'section_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'outlet_id'); ?>
		<?php echo $form->textField($model,'outlet_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'position_id'); ?>
		<?php echo $form->textField($model,'position_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'level_id'); ?>
		<?php echo $form->textField($model,'level_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'grade_id'); ?>
		<?php echo $form->textField($model,'grade_id',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resident_status'); ?>
		<?php echo $form->textField($model,'resident_status',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_periode_start'); ?>
		<?php echo $form->textField($model,'contract_periode_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_periode_end'); ?>
		<?php echo $form->textField($model,'contract_periode_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_name'); ?>
		<?php echo $form->textField($model,'bank_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_account_no'); ?>
		<?php echo $form->textField($model,'bank_account_no',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_account_name'); ?>
		<?php echo $form->textField($model,'bank_account_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_address'); ?>
		<?php echo $form->textField($model,'bank_address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salary_id'); ?>
		<?php echo $form->textField($model,'salary_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city_area_id'); ?>
		<?php echo $form->textField($model,'city_area_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->