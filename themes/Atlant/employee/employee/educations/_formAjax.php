<?php
$label_class = 'col-md-3 col-xs-12 control-label';
$form_name = 'MastersEmployeeHistoryEducations';
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
					<?php echo CHtml::activeLabelEx($education, 'employee_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<div class="input-group">
							<?php echo CHtml::textField('employee_name', $education->viewChooseEmployee(), array('size'=>60,'readonly'=>true,'class' => 'validate[required] form-control disabled')); ?>
							<?php echo CHtml::activeHiddenField($education, 'employee_id', array('class' => 'validate[required] form-control')); ?>							
						</div>
						<div id="error_employee_id" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($education, 'education_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeDropDownList($education, 'education_id', CHtml::listData(ReferenceEducations::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<div id="error_education_id" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($education, 'school', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($education, 'school', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="error_school" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($education, 'department', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($education, 'department', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="error_department" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($education, 'major', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($education, 'major', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="error_major" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($education, 'certificate_year', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($education, 'certificate_year', MastersEmployeeHistoryEducations::model()->getCertYears(), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<div id="error_certificate_year" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($education, 'notes', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($education, 'notes', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="error_notes" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($education, 'address_street1', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($education, 'address_street1', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="error_address_street1" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($education, 'address_street2', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($education, 'address_street2', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="error_address_street2" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($education, 'address_country_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($education, 'address_country_id', CHtml::listData(ReferenceGeoCountries::model()->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' 	=> at('Please select one...'),
											'prompt' 			=> '',
											'data-live-search' 	=> 'true',
											'class' 			=> 'validate[required] form-control select',											
										)
									); ?>
						<div id="error_address_country_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($education, 'address_state_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($education, 'address_state_id', CHtml::listData(ReferenceGeoStates::model()->byCountry($education->address_country_id)->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' => at('Please select one...'),
											'prompt' => '',
											'data-live-search' => 'true',
											'class' => 'validate[required] form-control select',											
										)
									); ?>
						<div id="error_address_state_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($education, 'address_city_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($education, 'address_city_id', CHtml::listData(ReferenceGeoCities::model()->byState($education->address_state_id)->byOrder()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<div id="error_address_city_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($education, 'address_poscode', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($education, 'address_poscode', array('size'=>5,'maxlength'=>5,'class' => 'form-control')); ?>
						<div id="error_address_poscode" class="errorMessage"></div>
					</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>				
				<a href="#" class="btn btn-primary pull-right" id="btnsubmitEducations"><?php echo $education->isNewRecord ? 'Create' : 'Save'; ?></a>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<?php $this->renderPartial('/ajax/sm-choose-dialog'); ?>

<script>
$('#MastersEmployeeHistoryEducations_education_id').selectpicker();
$('#MastersEmployeeHistoryEducations_certificate_year').selectpicker();
$('#MastersEmployeeHistoryEducations_address_country_id').selectpicker();
$('#MastersEmployeeHistoryEducations_address_state_id').selectpicker();
$('#MastersEmployeeHistoryEducations_address_city_id').selectpicker();	

$('#btnsubmitEducations').click(function () {
	var id 					= '<?php echo $education->id ?>';
	var education_id 		= $('#MastersEmployeeHistoryEducations_education_id').val();
	var school  			= $('#MastersEmployeeHistoryEducations_school').val();
	var department  		= $('#MastersEmployeeHistoryEducations_department').val();
	var major 		 		= $('#MastersEmployeeHistoryEducations_major').val();
	var certificate_year 	= $('#MastersEmployeeHistoryEducations_certificate_year').val();
	var notes 			 	= $('#MastersEmployeeHistoryEducations_notes').val();
	var address_street1 	= $('#MastersEmployeeHistoryEducations_address_street1').val();
	var address_street2 	= $('#MastersEmployeeHistoryEducations_address_street2').val();
	var address_country_id 	= $('#MastersEmployeeHistoryEducations_address_country_id').val();
	var address_state_id 	= $('#MastersEmployeeHistoryEducations_address_state_id').val();
	var address_city_id	 	= $('#MastersEmployeeHistoryEducations_address_city_id').val();
	var address_poscode	 	= $('#MastersEmployeeHistoryEducations_address_poscode').val();
	var url 		 		= '<?php echo Yii::app()->createUrl("employee/educations/ajaxcreate&id="); ?>'+id;

	$.post(
		'<?php echo Yii::app()->createUrl("employee/educations/ajaxcreate&id="); ?>'+id,
		{
			employee_id 		: '<?php echo $education->employee_id; ?>',
			education_id 		: education_id,
			school 				: school,
			department  		: department,
			major 		 		: major,
			certificate_year 	: certificate_year,
			notes 			 	: notes,
			address_street1 	: address_street1,
			address_street2 	: address_street2,
			address_country_id 	: address_country_id,
			address_state_id	: address_state_id,
			address_city_id 	: address_city_id,
			address_poscode 	: address_poscode,
		},
		function (data,status) {
			// alert(data);

			data = $.parseJSON(data);
			
			if(data.success==1){
				href = window.location.href;
				href = href.split('#');	
				href = href[0];

				if(href.indexOf('&tab') != -1){
					href = href.split('&tab');
					href = href[0];
				}			
		
				window.location.href = href+'&tab=2';
			}
			else{
				$('#error_employee_id').text(data.error_employee_id);
				$('#error_education_id').text(data.error_education_id);
				$('#error_school').text(data.error_school);
				$('#error_department').text(data.error_department);
				$('#error_major').text(data.error_major);
				$('#error_certificate_year').text(data.error_certificate_year);
				$('#error_notes').text(data.error_notes);
				$('#error_address_street1').text(data.error_address_street1);
				$('#error_address_street2').text(data.error_address_street2);
				$('#error_address_country_id').text(data.error_address_country_id);
				$('#error_address_state_id').text(data.error_address_state_id);
				$('#error_address_city_id').text(data.error_address_city_id);
				$('#error_address_poscode').text(data.error_address_poscode);
			}
		}
	);
});

$('#MastersEmployeeHistoryEducations_address_country_id').change(function () {
	var url = '<?php echo Yii::app()->createUrl("geography/countries/dynamicStates"); ?>&id='+$(this).val();
	$.get(url, function (data) {updateDropdown(this, $("#MastersEmployeeHistoryEducations_address_state_id"), data);});
});

$('#MastersEmployeeHistoryEducations_address_state_id').change(function () {
	var url = '<?php echo Yii::app()->createUrl("geography/states/dynamicCities"); ?>&id='+$(this).val();
	$.get(url, function (data) {updateDropdown(this, $("#MastersEmployeeHistoryEducations_address_city_id"), data);});
});

</script>