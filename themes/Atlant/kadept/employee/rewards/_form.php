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
					<?php echo CHtml::activeLabelEx($model, 'reward_type', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'reward_type', array('size'=>60,'maxlength'=>50,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'reward_type'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'name', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'name', array('size'=>60,'maxlength'=>255,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'name'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'certificate_no', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'certificate_no', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'certificate_no'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'certificate_date', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField($model, 'certificate_date', array('class' => 'validate[required] form-control datepicker')); ?>
						</div>
						<?php echo CHtml::error($model, 'certificate_date'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'instantion', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'instantion', array('maxlength'=>255,'class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'instantion'); ?>
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