<?php
/* @var $this PayrollBasedAllowancesController */
/* @var $model PayrollBasedAllowances */
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
		<?php echo $form->label($model,'standard_id'); ?>
		<?php echo $form->textField($model,'standard_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'allowance_id'); ?>
		<?php echo $form->textField($model,'allowance_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'calc_type'); ?>
		<?php echo $form->textField($model,'calc_type',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'formula'); ?>
		<?php echo $form->textField($model,'formula',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'values'); ?>
		<?php echo $form->textField($model,'values',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->