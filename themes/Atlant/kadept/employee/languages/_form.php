<?php
$label_class = 'col-md-3 col-xs-12 control-label';
$form_name = 'MastersEmployeeFamilys';
?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			</div>

			<div class="panel-body">
				<?php echo CHtml::activeHiddenField($model, 'employee_id', array('class' => 'validate[required] form-control')); ?>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'language_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'language_id', CHtml::listData(ReferenceLanguages::model()->byOrder()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'language_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'level', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">    
						<?php echo CHtml::activeRadioButtonList($model, 'level', MyHelper::getLangAbility(), array('class' => 'validate[required] form-control iradio', 'separator'=>' &nbsp; &nbsp; &nbsp; &nbsp; ')); ?>
						<?php echo CHtml::error($model, 'level'); ?>
					</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary pull-right')); ?>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>