<?php $label_class = 'col-md-3 col-xs-12 control-label'; ?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal','id'=>'training_form')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($training, 'employee_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<div class="input-group">
							<?php echo CHtml::textField('employee_name', $training->viewChooseEmployee(), array('size'=>60,'readonly'=>true,'class' => 'validate[required] form-control disabled')); ?>
							<?php echo CHtml::activeHiddenField($training, 'employee_id', array('class' => 'validate[required] form-control')); ?>
							
						</div>
						<div id="error_employee_id" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($training, 'type_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeDropDownList($training, 'type_id', CHtml::listData(ReferenceTrainingTypes::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<div id="error_type_id" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($training, 'is_internal', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeRadioButtonList($training, 'is_internal', ReferenceTrainingTypes::model()->getStatus(), array('separator'=>' &nbsp; &nbsp; &nbsp; &nbsp; ')); ?>
						<div id="error_is_internal" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($training, 'topic', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($training, 'topic', array('maxlength'=>255,'class' => 'validate[required] form-control')); ?>
						<div id="error_topic" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($training, 'trainer_name', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($training, 'trainer_name', array('maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="trainer_name" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($training, 'organizer', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($training, 'organizer', array('maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="error_organizer" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($training, 'training_date', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField($training, 'training_date', array('class' => 'validate[required] form-control datepicker',  'data-date-format' => 'dd-mm-yyyy','style'=>'z-index:1151 !important;')); ?>
						</div>
						<div id="error_training_date" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($training, 'long_trained', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($training, 'long_trained', array('class' => 'validate[required] form-control')); ?>
						<div id="error_long_trained" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($training, 'certificate_date', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField($training, 'certificate_date', array('class' => 'validate[required] form-control datepicker',  'data-date-format' => 'dd-mm-yyyy','style'=>'z-index:1151 !important;')); ?>
						</div>
						<div id="error_certificate_date" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($training, 'certificate_no', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($training, 'certificate_no', array('maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="error_certificate_no" class="errorMessage"></div>
					</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>				
				<a href="#" class="btn btn-primary pull-right" id="btnSubmitTrainings"><?php echo $training->isNewRecord ? 'Create' : 'Save'; ?></a>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<?php $this->renderPartial('/ajax/sm-choose-dialog'); ?>

<script>

$('#MastersEmployeeHistoryTrainings_type_id').selectpicker();
$('#MastersEmployeeHistoryTrainings_training_date').datepicker({format:'yyyy-mm-dd'});
$('#MastersEmployeeHistoryTrainings_certificate_date').datepicker({format:'yyyy-mm-dd'});

$('#btnSubmitTrainings').click(function () {
	var id 					= '<?php echo $training->id ?>';
	var type_id				= $('#MastersEmployeeHistoryTrainings_type_id').val();
	var is_internal 		= $('input[type="radio"]:checked', '#training_form').val();
	var topic				= $('#MastersEmployeeHistoryTrainings_topic').val();	
	var trainer_name		= $('#MastersEmployeeHistoryTrainings_trainer_name').val();
	var organizer			= $('#MastersEmployeeHistoryTrainings_organizer').val();
	var training_date		= $('#MastersEmployeeHistoryTrainings_training_date').val();
	var long_trained		= $('#MastersEmployeeHistoryTrainings_long_trained').val();
	var certificate_date	= $('#MastersEmployeeHistoryTrainings_certificate_date').val();
	var certificate_no		= $('#MastersEmployeeHistoryTrainings_certificate_no').val();

	$.post(
		'<?php echo Yii::app()->createUrl("employee/trainings/ajaxcreate&id="); ?>'+id,
		{
			employee_id 		: '<?php echo $training->employee_id; ?>',
			type_id				: type_id,
			is_internal			: is_internal,
			topic				: topic,
			trainer_name 		: trainer_name,
			training_date 		: training_date,
			long_trained		: long_trained,			
			certificate_date 	: certificate_date,
			certificate_no 		: certificate_no,
			organizer 			: organizer,
		},
		function (data,status) {
			data = $.parseJSON(data);
			
			if(data.success==1){
				href = window.location.href;
				href = href.split('#');	
				href = href[0];

				if(href.indexOf('&tab') != -1){
					href = href.split('&tab');
					href = href[0];
				}			
		
				window.location.href = href+'&tab=5';
			}
			else{
				$('#error_employee_id').text(data.error_employee_id);
				$('#error_type_id').text(data.error_type_id);
				$('#error_is_internal').text(data.error_is_internal);
				$('#error_topic').text(data.error_topic);
				$('#error_trainer_name').text(data.error_trainer_name);
				$('#error_organizer').text(data.error_organizer);				
				$('#error_long_trained').text(data.error_long_trained);				
				$('#error_certificate_date').text(data.error_certificate_date);				
				$('#error_certificate_no').text(data.error_certificate_no);				
			}
			
			// alert(data);
		}
	);
});

</script>