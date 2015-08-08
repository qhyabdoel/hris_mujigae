<?php
/* @var $this MastersEmployees1Controller */
/* @var $model MastersEmployees */
/* @var $form CActiveForm */

$label_class = 'col-md-3 control-label';
?>

<div class="panel-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action' 		=> Yii::app()->createUrl($this->route),
	'method' 		=> 'get',
	'htmlOptions' 	=> array('class'=>'form-horizontal'),
)); ?>

<div class="col-md-4">
	<div class="form-group">
		<?php echo $form->label($model,'type_id',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'type_id',array('class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'code',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'code',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'email',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'firstname',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'firstname',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'lastname',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'lastname',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'nickname',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'nickname',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'gender',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->dropDownList($model, 'gender', ReferenceEmployeeStatuses::model()->getGender(), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'form-control select')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'religion_id',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->dropDownList($model, 'religion_id', CHtml::listData(ReferenceReligions::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'form-control select')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'ethnic_id',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->dropDownList($model, 'ethnic_id', CHtml::listData(ReferenceEthnics::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'form-control select')); ?></div>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<?php echo $form->label($model,'birthdate',array('class'=>$label_class)); ?>
		<div class="col-md-8">
			<div class="input-group">
				<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
				<?php echo $form->textField($model, 'birthdate', array('class' => 'form-control datepicker', 'data-date-format'=>'yyyy-mm-dd')); ?>
			</div>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'married_status',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->dropDownList($model, 'married_status', CHtml::listData(ReferenceEmployeeStatuses::model()->maritalStatus()->findAll(), 'name', 'label'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'form-control select')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'married_date',array('class'=>$label_class)); ?>
		<div class="col-md-8">
			<div class="input-group">
				<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
				<?php echo $form->textField($model, 'married_date', array('class' => 'form-control datepicker', 'data-date-format'=>'yyyy-mm-dd')); ?>
			</div>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'child_amount',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'child_amount',array('class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'weight',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'weight',array('size'=>5,'maxlength'=>5,'class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'height',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'height',array('size'=>5,'maxlength'=>5,'class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'identity_type_id',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->dropDownList($model, 'identity_type_id', CHtml::listData(ReferenceIdentityTypes::model()->byOrder()->findAll(), 'id', 'label'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'form-control select')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'identity_number',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'identity_number',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'hiredate',array('class'=>$label_class)); ?>
		<div class="col-md-8">
			<div class="input-group">
				<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
				<?php echo $form->textField($model, 'hiredate', array('class' => 'form-control datepicker', 'data-date-format'=>'yyyy-mm-dd')); ?>
			</div>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'status',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'status',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'is_active',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'is_active',array('class'=>'form-control')); ?></div>
	</div>

</div>

<div class="col-md-4">
	<div class="form-group">
		<?php echo $form->label($model,'city_area_id',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'city_area_id',array('class'=>'form-control')); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->label($model,'department_id',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'department_id',array('class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'section_id',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'section_id',array('class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'outlet_id',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'outlet_id',array('class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'position_id',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'position_id',array('class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'level_id',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'level_id',array('class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'grade_id',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'grade_id',array('size'=>5,'maxlength'=>5,'class'=>'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'resident_status',array('class'=>$label_class)); ?>
		<div class="col-md-8"><?php echo $form->textField($model,'resident_status',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?></div>
	</div>
</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->