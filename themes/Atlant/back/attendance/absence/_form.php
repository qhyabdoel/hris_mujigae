<?php $label_class = 'col-md-3 col-xs-12 control-label'; ?>

<?php echo CHtml::beginForm('', 'post', array(
	'class'=>'form-horizontal',
	'enableAjaxValidation'=>true,
	'enctype' => 'multipart/form-data'
)); ?>

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
							<?php echo CHtml::textField('employee_name', $model->viewChooseEmployee(), array('readonly'=>true,'class' => 'validate[required] form-control disabled', 'style'=>'color:#000000')); ?>
							<?php echo CHtml::activeHiddenField($model, 'employee_id', array('class' => 'validate[required] form-control', 'onchange'=>'changeEmployeeId()')); ?>
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" id="choose_employee">Choose</button>
							</span>
						</div>
						<div class="errorMessage" id="employeeIdErrorMessage"></div>
						<?php echo CHtml::error($model, 'employee_id'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'type', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'type', array('Normal'=>'Normal','Sick'=>'Sick','Late'=>'Late'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'type'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'start_date', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="form-inline">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
								<?php echo CHtml::activeTextField($model, 'start_date', array('class' => 'validate[required] form-control datepicker', 'onchange'=>'checkPeriodeDate()')); ?>
							</div>
							&nbsp; &nbsp; <label class="control-label"><?php echo at('To'); ?></label>&nbsp; &nbsp; 
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
								<?php echo CHtml::activeTextField($model, 'end_date', array('class' => 'validate[required] form-control datepicker', 'onchange'=>'checkPeriodeDate()')); ?>
							</div>
						</div>
						<?php echo CHtml::error($model, 'start_date'); ?>
					</div>
				</div>				
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'reason', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextArea($model, 'reason', array('class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'reason'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="<?php echo $label_class; ?>">Use Doctor Note</label>
					<div class="col-md-6 col-xs-12">
						<div class="form-control">
							<?php 
							echo CHtml::activeRadioButton($model, 'doctor_note', array(
							    'value'=>0,
							    'style'=>'width:10px;',	
							));
							?>
							<label style="width:100px;">No</label>
							<?php
							echo CHtml::activeRadioButton($model, 'doctor_note', array(							    
							    'value'=>1,
							)); 
							?>
							<label>Yes</label>
						</div>						
					</div>
				</div>

				<div class="form-group">
					<label class="<?php echo $label_class; ?>">Doctor Note</label>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::image($model->getLetter(), 'letter', array('height'=>'50px')); ?>
						<?php echo CHtml::activeFileField($modelPhoto, 'file', array('class' => 'btn btn-success')); ?>
						<?php echo CHtml::error($model, 'doctor_letter_proof'); ?>
					</div>					
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'number_of_hours', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'number_of_hours', array(
							'class' => 'validate[required] form-control',
							'style' => 'width:100px;',
							'value' => ''
						)); ?>
						<?php echo CHtml::error($model, 'number_of_hours'); ?>
					</div>
				</div>					
			</div>

			<input value="save" name="command" id="hiddenInputCommand" hidden>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>

				<span class="pull-right">

				<?php if ($model->isNewRecord==1) {
					?><a class="btn btn-primary" id="btnDraft">Draft</a><?php
				} ?>				

				<?php echo CHtml::SubmitButton($model->isNewRecord ? 'Create' : 'Save', array(
					'class' => 'btn btn-primary', 
					'id' 	=> 'btnSubmit'
				)); ?>
				</span>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<?php $this->renderPartial('/ajax/sm-choose-dialog'); ?>

<script>

function changeEmployeeId(){
	$.ajax({
		type: "GET",
		url: '<?php echo createUrl("ajax/employees/getleavesinfo"); ?>',
		data: 'id='+$('#LeaveRequest_employee_id').val(),
		success: function(data){
			// $("#employeeIdErrorMessage").html(data.leaves_pending);
			$("#long_leave_info").text(data.leaves_info);
			quota = data.leaves_quota;
		},
		error: function(){
			alert("failure");
		}
	});
}

$('#btnDraft').click(function(){
	$('#hiddenInputCommand').val('draft');
	$('#btnSubmit').click();
});

</script>