<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'first_name', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">                                                                                                                                           
		<?php echo CHtml::activeTextField($model, 'first_name', array('class' => 'form-control')); ?>
		<?php echo CHtml::error($model, 'first_name'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'last_name', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">                                                                                                                                           
		<?php echo CHtml::activeTextField($model, 'last_name', array('class' => 'form-control')); ?>
		<?php echo CHtml::error($model, 'last_name'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'birth_date', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">                                                                                                                                           
		<?php echo CHtml::activeTextField($model, 'birth_date', array('readonly' => 'readonly', 'class' => 'datePickerBirthDate form-control')); ?>
		<?php echo CHtml::error($model, 'birth_date'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'company', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">                                                                                                                                           
		<?php echo CHtml::activeTextField($model, 'company', array('class' => 'form-control')); ?>
		<?php echo CHtml::error($model, 'company'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'contact', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">
		<?php echo CHtml::activeTextField($model, 'contact', array('class' => 'form-control')); ?>
		<?php echo CHtml::error($model, 'contact'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'home_phone', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">
		<?php $this->widget('CMaskedTextField', array('mask'=>'9999 999 9999', 'model' => $model, 'attribute'=>'home_phone', 'htmlOptions'=>array('class' => 'form-control'))); ?>
		<?php echo CHtml::error($model, 'home_phone'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'cell_phone', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">
		<?php $this->widget('CMaskedTextField', array('mask'=>'9999 9999 9999', 'model' => $model, 'attribute'=>'cell_phone', 'htmlOptions'=>array('class' => 'form-control'))); ?>
		<?php echo CHtml::error($model, 'cell_phone'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'work_phone', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">
		<?php $this->widget('CMaskedTextField', array('mask'=>'9999 9999 9999', 'model' => $model, 'attribute'=>'work_phone', 'htmlOptions'=>array('class' => 'form-control'))); ?>
		<?php echo CHtml::error($model, 'work_phone'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'fax', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">
		<?php $this->widget('CMaskedTextField', array('mask'=>'9999 999 9999', 'model' => $model, 'attribute'=>'fax', 'htmlOptions'=>array('class' => 'form-control'))); ?>
		<?php echo CHtml::error($model, 'fax'); ?>
	</div>
</div>