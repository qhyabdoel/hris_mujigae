<?php
$label_class 	= 'col-md-3 col-xs-12 control-label';
$form_name 		= 'MastersEmployeeFamilys';
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
					<?php echo CHtml::activeLabelEx($model, 'check_in', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group bootstrap-timepicker">
							<?php echo CHtml::activeTextField($model, 'check_in', array('class' => 'validate[required] form-control timepicker24')); ?>
							<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
						</div>
						<?php echo CHtml::error($model, 'check_in'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'check_out', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group bootstrap-timepicker">
							<?php echo CHtml::activeTextField($model, 'check_out', array('class' => 'validate[required] form-control timepicker24')); ?>
							<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
						</div>
						<?php echo CHtml::error($model, 'check_out'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'break_out', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group bootstrap-timepicker">
							<span class="input-group-addon">
								<span class="checkbox"><label><input type="checkbox" id="check_break_out"></label></span>
							</span>
							
							<?php 
							echo CHtml::activeTextField($model, 'break_out', array(
								'class' 	=> 'validate[required] form-control timepicker24',
								'disabled' 	=> 'true',
								'id' 	 	=> 'break_out',
								'value' 	=> '00:00:00',
							)); 
							?>
							
							<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
						</div>
						<?php echo CHtml::error($model, 'break_out'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'break_in', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group bootstrap-timepicker">
							<span class="input-group-addon">
								<span class="checkbox"><label><input type="checkbox" id="check_break_in"></label></span>
							</span>
							
							<?php 
							echo CHtml::activeTextField($model, 'break_in', array(
								'class'  	=> 'validate[required] form-control timepicker24',
								'disabled' 	=> 'true',
								'id' 	 	=> 'break_in',
								'value' 	=> '00:00:00',
							)); 
							?>
							
							<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
						</div>
						<?php echo CHtml::error($model, 'break_in'); ?>
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

<?php $this->renderPartial('/ajax/sm-choose-dialog'); ?>

<script>

$('#check_break_out').change(function (argument) {
	var checked = $(this).is(':checked');

	if(checked==true){
		$('#break_out').attr('disabled',false);
		$('#break_out').val('12:00:00');
	}
	else{
		$('#break_out').attr('disabled',true);	
		$('#break_out').val('00:00:00');
	}
});

$('#check_break_in').change(function (argument) {
	var checked = $(this).is(':checked');

	if(checked==true){
		$('#break_in').attr('disabled',false);
		$('#break_in').val('13:00:00');
	}
	else{
		$('#break_in').attr('disabled',true);
		$('#break_in').val('00:00:00');
	}
});

</script>