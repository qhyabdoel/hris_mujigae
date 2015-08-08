<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'name', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">                                                                                                                                           
		<?php echo CHtml::activeTextField($model, 'name', array('class' => 'validate[required] form-control')); ?>
		<?php echo CHtml::error($model, 'name'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'email', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">                                                                                                                                           
		<?php echo CHtml::activeTextField($model, 'email', array('class' => 'validate[required,custom[email]] form-control')); ?>
		<?php echo CHtml::error($model, 'email'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'role', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">                                                                                                                                           
		<?php echo CHtml::activeDropDownList($model, 'role', CHtml::listData(AuthItem::model()->findAll('type=:type', array(':type' => CAuthItem::TYPE_ROLE)), 'name', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'chzn-select validate[required] form-control select')); ?>
		<?php echo CHtml::error($model, 'role'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'new_password', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">
		<?php echo CHtml::activePasswordField($model, 'new_password', array('class' => 'validate[minSize[6]] form-control')); ?>
		<?php echo CHtml::error($model, 'new_password'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'notes', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">
		<?php echo CHtml::activeTextArea($model, 'notes', array('class' => 'form-control', 'rows' => 5)); ?>
	</div>
</div>