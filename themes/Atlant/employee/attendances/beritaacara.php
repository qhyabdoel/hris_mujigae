<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Create Berita Acara'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<?php
$label_class 	= 'col-md-3 col-xs-12 control-label';
$form_name 		= 'AttendancePresencesRecap';

$break_in_option = array(
	'class'  	=> 'validate[required] form-control timepicker24',
	'disabled' 	=> 'true',
	'id' 	 	=> 'break_in',
	'value' 	=> '00:00:00',
); 

$break_out_option = array(
	'class'  	=> 'validate[required] form-control timepicker24',
	'disabled' 	=> 'true',
	'id' 	 	=> 'break_out',
	'value' 	=> '00:00:00',
); 

if($model->break_in!=null){
	$break_in_option = array(
		'class'  	=> 'validate[required] form-control timepicker24',		
		'id' 	 	=> 'break_in',
	); 		
}

if($model->break_out!=null){
	$break_out_option = array(
		'class'  	=> 'validate[required] form-control timepicker24',		
		'id' 	 	=> 'break_out',
	); 		
}
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
							<?php 
							if($model->id!=0){
								echo CHtml::textField('employee_name', $model->viewChooseEmployee(), array(
									'size' 		=> 100,
									'readonly' 	=> true,
									'class' 	=> 'validate[required] form-control'
								));
							}		
							else{
								echo CHtml::textField('employee_name', $model->viewChooseEmployee(), array(
									'readonly'=>true,'class' => 'validate[required] form-control disabled'
								));
							}						
							?>
							
							<?php echo CHtml::activeHiddenField($model, 'employee_id', array('class' => 'validate[required] form-control')); ?>
							
							<?php if($model->id==0){
							?>
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" id="choose_employee">Choose</button>
							</span>
							<?php
							} ?>
						</div>
						<div id="errorEmployee_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'shift_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php 
							if($model->id==0){
								echo CHtml::activeDropDownList(
									$model, 
									'shift_id', 
									CHtml::listData(ReferenceAttendanceShifts::model()->findAll(), 'id', 'name'), 

									array(
										'data-placeholder' => at('Please select one...'), 
										'prompt' => '', 
										'data-live-search' => 'true', 
										'class' => 'validate[required] form-control select'
								));
							}
							else{
								echo CHtml::textField('shift_name', $model->shift_name, array(
									'size'=>100,'readonly'=>true,'class' => 'validate[required] form-control'
								)); 

								echo CHtml::activeHiddenField($model, 'shift_id', array('class' => 'validate[required] form-control')); 
							}								
						?>
						
						<?php echo CHtml::error($model, 'shift_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'location_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList(
							$model, 
							'location_id', 
							$locations, 
							
							array(
								'data-placeholder' 	=> at('Please select one...'), 
								'prompt' 			=> '', 								
								'class' 			=> 'validate[required] form-control select'
						)); ?>
						
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
					<div class="col-md-3 col-xs-12 control-label"></div>				
					<button>Search</button>
				</div>			
			</div>

			<div class="panel-body">																	
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
								<span class="checkbox">
									<label>
										<?php if($model->break_out==null){
										?><input type="checkbox" id="check_break_out"><?php
										}
										else{
										?><input type="checkbox" id="check_break_out" checked><?php
										} ?>
									</label>
								</span>
							</span>
							
							<?php 
							echo CHtml::activeTextField($model, 'break_out', $break_out_option); 
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
								<span class="checkbox">
									<label>
										<?php if($model->break_in==null){
										?><input type="checkbox" id="check_break_in"><?php
										}
										else{
										?><input type="checkbox" id="check_break_in" checked><?php
										} ?>
									</label>
								</span>
							</span>
							
							<?php 
							echo CHtml::activeTextField($model, 'break_in', $break_in_option); 
							?>
							
							<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
						</div>
						<?php echo CHtml::error($model, 'break_in'); ?>
					</div>
				</div>
			</div>

			<input name="attendance_id" value="<?php echo $attendance_id; ?>" hidden>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>

				<span class="pull-right">

				<?php if ($model->isNewRecord==1) {
					echo CHtml::SubmitButton('Draft' , array('class' => 'btn btn-primary'));
				} ?>				

				<?php echo CHtml::SubmitButton($model->isNewRecord ? 'Create' : 'Save', array(
					'class' => 'btn btn-primary', 					
				)); ?>
				</span>
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