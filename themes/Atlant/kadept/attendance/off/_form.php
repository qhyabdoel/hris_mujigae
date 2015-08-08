<?php
$label_class 	= 'col-md-3 col-xs-12 control-label';
$form_name 		= 'AttendancePresencesRequestOff';
?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'employee_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<div class="input-group">
							<?php echo CHtml::textField('employee_name', $model->viewChooseEmployee(), array('readonly'=>true,'class' => 'validate[required] form-control disabled')); ?>
							<?php echo CHtml::activeHiddenField($model, 'employee_id', array('class' => 'validate[required] form-control')); ?>
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" id="choose_employee">Choose</button>
							</span>
						</div>
						<?php echo CHtml::error($model, 'employee_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'shift_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'shift_id', CHtml::listData(ReferenceAttendanceShifts::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'shift_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'date', array('class' => $label_class)); ?>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField($model, 'date', array('class' => 'validate[required] form-control datepicker', 'data-date-format'=>'yyyy-mm-dd')); ?>
						</div>
						<?php echo CHtml::error($model, 'date'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'location_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList(
							$model, 
							'location_id', 
							CHtml::listData(MastersLocation::model()->findAll(), 'id', 'name'), 
							
							array(
								'data-placeholder' => at('Please select one...'), 
								'prompt' => '', 
								'data-live-search' => 'true', 
								'class' => 'validate[required] form-control select'
						)); ?>

						<?php echo CHtml::error($model, 'location_id'); ?>
					</div>
				</div>
			</div>

			<?php echo CHtml::hiddenField('action', '', array('id' => 'action')); ?>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>

				<span class="pull-right">

				<?php if ($model->isNewRecord==1) {
					echo CHtml::SubmitButton('Draft' , array(
						'class' => 'btn btn-primary',
						'id' 	=> 'Draft'
					));
				} ?>				

				<?php echo CHtml::SubmitButton($model->isNewRecord ? 'Create' : 'Save', array(
					'class' => 'btn btn-primary', 					
					'id' 	=> 'Save'
				)); ?>
				</span>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<?php $this->renderPartial('/ajax/sm-choose-dialog'); ?>

<script>
	$('#Draft').click(function () {
		$('#action').val('Draft');
	});

	$('#Save').click(function(){
		$('#action').val('Save');
	});
</script>