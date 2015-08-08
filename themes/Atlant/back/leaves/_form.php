<?php $label_class = 'col-md-3 col-xs-12 control-label'; ?>

<?php echo CHtml::beginForm('', 'post', array(
			'class'=>'form-horizontal',
			'enableAjaxValidation'=>true,
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
							<?php echo CHtml::textField('employee_name', $model->viewChooseEmployee(), array('readonly'=>true,'class' => 'validate[required] form-control disabled')); ?>
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
					<?php echo CHtml::activeLabelEx($model, 'type_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'type_id', CHtml::listData(ReferenceLeaveTypes::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'type_id'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'date_start', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="form-inline">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
								<?php echo CHtml::activeTextField($model, 'date_start', array('class' => 'validate[required] form-control datepicker', 'onchange'=>'checkPeriodeDate()')); ?>
							</div>
							&nbsp; &nbsp; <label class="control-label"><?php echo at('To'); ?></label>&nbsp; &nbsp; 
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
								<?php echo CHtml::activeTextField($model, 'date_end', array('class' => 'validate[required] form-control datepicker', 'onchange'=>'checkPeriodeDate()')); ?>
							</div>
						</div>
						<?php echo CHtml::error($model, 'date_start'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'long_leave', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="form-inline">
							<?php echo CHtml::activeTextField($model, 'long_leave', array('maxlength'=>15,'class' => 'validate[required] form-control', 'onchange'=>'checkLongLeaves()')); ?>
							&nbsp; <span id="long_leave_info"></span>
						</div>
						<?php echo CHtml::error($model, 'long_leave'); ?>
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
					<?php echo CHtml::activeLabelEx($model, 'mode', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'mode', array('size'=>15,'maxlength'=>15,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'mode'); ?>
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
				
				<?php echo CHtml::SubmitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary', 'id'=>'btnSubmit')); ?>

				</span>				
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<?php $this->renderPartial('/ajax/sm-choose-dialog'); ?>

<script type="text/javascript">
var quota = 3;
function checkPeriodeDate(){
	var start 	= moment($('#LeaveRequest_date_start').val());
	var end 	= moment($('#LeaveRequest_date_end').val());
	var diff 	= end.diff(start, "days");
	
	if(typeof diff === 'number')
	{
		diff 		= diff + 1;
		var d 		= new Date();
		var now 	= moment(d.getYear()+'-'+d.getMonth()+'-'+d.getDate());
		var diff_ 	= start.diff(now, "days");
		var type 	= $('#LeaveRequest_type_id').val();
		
		if(type == 4 && diff_ < 3)
			alert('Permohonan cuti min 3 hari kedepan !');
		
		if(diff <= 0)
			alert('input periode salah');
		else {
			$('#LeaveRequest_long_leave').val(diff);
			$('#LeaveRequest_long_leave').change();
		}
	}
}
function checkLongLeaves(){
	var long_leave = $('#LeaveRequest_long_leave').val();
	if((long_leave != '') && (long_leave > 0))
	{
		if(type != 4)
		{
			if(long_leave > quota) alert('Lama permohonan cuti melebihi quota');
		}
	}
}
function changeEmployeeId(){
	$.ajax({
		type: "GET",
		url: '<?php echo createUrl("ajax/employees/getleavesinfo"); ?>',
		data: 'id='+$('#LeaveRequest_employee_id').val(),
		success: function(data){
			$("#employeeIdErrorMessage").html(data.leaves_pending);
			$("#long_leave_info").text(data.leaves_info);
			quota = data.leaves_quota;
			if(data.leaves_pending != '')
				$("#btnSubmit").attr({'disabled': 'disabled'});
			else $("#btnSubmit").removeAttr('disabled');
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