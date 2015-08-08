<?php $label_class = 'col-md-3 col-xs-12 control-label'; ?>
<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal mainform')); ?>

<div class="panel-body">
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'standard_id', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12">                                                                                                                                           
			<?php echo CHtml::activeTextField($model, 'standard_id', array('class' => 'validate[required] form-control')); ?>
			<?php echo CHtml::error($model, 'standard_id'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'allowance_id', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12">                                                                                                                                           
			<?php echo CHtml::activeDropDownList($model, 'allowance_id', CHtml::listData(PayrollAllowances::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
			<?php echo CHtml::error($model, 'allowance_id'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'calc_type', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12">                                                                                                                                           
			<?php echo CHtml::activeDropDownList($model, 'calc_type', PayrollAllowances::model()->getAllowanceType(), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
			<?php echo CHtml::error($model, 'calc_type'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'formula', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12">                                                                                                                                           
			<?php echo CHtml::activeTextField($model, 'formula', array('size'=>60,'maxlength'=>255,'class' => 'validate[required] form-control')); ?>
			<?php echo CHtml::error($model, 'formula'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'values', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12">                                                                                                                                           
			<?php echo CHtml::activeTextField($model, 'values', array('class' => 'validate[required] form-control')); ?>
			<?php echo CHtml::error($model, 'values'); ?>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>