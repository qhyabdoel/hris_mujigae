<?php $label_class = 'col-md-3 col-xs-12 control-label'; ?>
<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal mainform')); ?>

<div class="panel-body">
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'short', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12">                                                                                                                                           
			<?php echo CHtml::activeTextField($model, 'short', array('size'=>15,'maxlength'=>15,'class' => 'validate[required] form-control')); ?>
			<?php echo CHtml::error($model, 'short'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'name', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12">                                                                                                                                           
			<?php echo CHtml::activeTextField($model, 'name', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
			<?php echo CHtml::error($model, 'name'); ?>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>