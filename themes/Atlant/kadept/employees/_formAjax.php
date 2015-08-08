<?php

// echo "string";die();

$label_class 	= 'col-md-3 col-xs-12 control-label';
$form_name  	= 'MastersEmployees';

if($employee->married_date=='0000-00-00') $employee->married_date = '2000-01-01';

?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>General Info</h3>
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			</div>

			<div class="panel-body">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'code', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeTextField($employee, 'code', array('readonly'=>true,'class' => 'validate[required] form-control disabled')); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'email', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon">@</span>
								<?php echo CHtml::activeTextField($employee, 'email', array('size'=>60,'maxlength'=>255,'class' => 'validate[required,custom[email]] form-control')); ?>
							</div>
							<?php echo CHtml::error($employee, 'email'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'title', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeTextField($employee, 'title', array('size'=>10,'maxlength'=>10,'class' => 'validate[required] form-control')); ?>
							<?php echo CHtml::error($employee, 'title'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'firstname', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<?php echo CHtml::activeTextField($employee, 'firstname', array('size'=>50,'maxlength'=>50,'class' => 'validate[required] form-control')); ?>
							</div>
							<?php echo CHtml::error($employee, 'firstname'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'lastname', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<?php echo CHtml::activeTextField($employee, 'lastname', array('size'=>50,'maxlength'=>50,'class' => 'validate[required] form-control')); ?>
							</div>
							<?php echo CHtml::error($employee, 'lastname'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'nickname', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<?php echo CHtml::activeTextField($employee, 'nickname', array('size'=>50,'maxlength'=>50,'class' => 'validate[required] form-control')); ?>
							</div>
							<?php echo CHtml::error($employee, 'nickname'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'gender', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeDropDownList($employee, 'gender', ReferenceEmployeeStatuses::model()->getGender(), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($employee, 'gender'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'religion_id', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeDropDownList($employee, 'religion_id', CHtml::listData(ReferenceReligions::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($employee, 'religion_id'); ?>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'ethnic', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeDropDownList($employee, 'ethnic', CHtml::listData(ReferenceEthnics::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($employee, 'ethnic'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'married_status', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeDropDownList($employee, 'married_status', CHtml::listData(ReferenceEmployeeStatuses::model()->maritalStatus()->findAll(), 'name', 'label'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($employee, 'married_status'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'married_date', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
								<?php echo CHtml::activeTextField(
									$employee, 
									'married_date', 
									array('class' => 'form-control datepicker')
								); ?>
							</div>
							<?php echo CHtml::error($employee, 'married_date'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'child_amount', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeTextField($employee, 'child_amount', array('class' => 'form-control')); ?>
							<?php echo CHtml::error($employee, 'child_amount'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'hiredate', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
								<?php echo CHtml::activeTextField($employee, 'hiredate', array('class' => 'validate[required] form-control datepicker',  'data-date-format' => 'dd-mm-yyyy')); ?>
							</div>
							<?php echo CHtml::error($employee, 'hiredate'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'status', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeDropDownList($employee, 'status', CHtml::listData(ReferenceEmployeeStatuses::model()->attendanceStatus()->findAll(), 'name', 'label'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($employee, 'status'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'is_active', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeDropDownList($employee, 'is_active', ReferenceEmployeeStatuses::model()->getIsActive(), array('class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($employee, 'is_active'); ?>
						</div>
					</div>

					
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Identity</h3>
			</div>

			<div class="panel-body">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'identity_type_id', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeDropDownList($employee, 'identity_type_id', CHtml::listData(ReferenceIdentityTypes::model()->byOrder()->findAll(), 'id', 'label'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($employee, 'identity_type_id'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'identity_number', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeTextField($employee, 'identity_number', array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
							<?php echo CHtml::error($employee, 'identity_number'); ?>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'weight', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeTextField($employee, 'weight', array('size'=>5,'maxlength'=>5,'class' => 'form-control')); ?>
							<?php echo CHtml::error($employee, 'weight'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($employee, 'height', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeTextField($employee, 'height', array('size'=>5,'maxlength'=>5,'class' => 'form-control')); ?>
							<?php echo CHtml::error($employee, 'height'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Birthday</h3>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employee, 'birthplace_country_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($employee, 'birthplace_country_id', CHtml::listData(ReferenceGeoCountries::model()->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' 	=> at('Please select one...'),
											'prompt' 			=> '',
											'data-live-search' 	=> 'true',
											'class' 			=> 'validate[required] form-control select',											
										)
									); ?>
						<?php echo CHtml::error($employee, 'birthplace_country_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employee, 'birthplace_state_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($employee, 'birthplace_state_id', CHtml::listData(ReferenceGeoStates::model()->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' 	=> at('Please select one...'),
											'prompt' 			=> '',
											'data-live-search' 	=> 'true',
											'class' 			=> 'validate[required] form-control select',											
										)
									); ?>
						<?php echo CHtml::error($employee, 'birthplace_state_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employee, 'birthplace_city_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($employee, 'birthplace_city_id', CHtml::listData(ReferenceGeoCities::model()->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' 	=> at('Please select one...'),
											'prompt' 			=> '',
											'data-live-search' 	=> 'true',
											'class' 			=> 'validate[required] form-control select',											
										)
									); ?>
						<?php echo CHtml::error($employee, 'birthplace_city_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employee, 'birthplace_district_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($employee, 'birthplace_district_id', CHtml::listData(ReferenceGeoDistricts::model()->byOrder()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($employee, 'birthplace_district_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employee, 'poscode', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($employee, 'poscode', array('size'=>5,'maxlength'=>5,'class' => 'form-control')); ?>
						<?php echo CHtml::error($employee, 'poscode'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employee, 'birthdate', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField(
								$employee, 
								'birthdate', 
								array('class' => 'validate[required] form-control datepicker')
							); ?>
						</div>
						<?php echo CHtml::error($employee, 'birthdate'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Department</h3>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employee, 'department_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($employee, 'department_id', CHtml::listData(MastersDepartments::model()->byOrder()->findAll(), 'id', 'name')
							, array(
								'data-placeholder' 	=> at('Please select one...'),
								'prompt' 			=> '',
								'data-live-search' 	=> 'true',
								'class' 			=> 'validate[required] form-control select',											
							)
						); ?>
						<?php echo CHtml::error($employee, 'department_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employee, 'section_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($employee, 'section_id', CHtml::listData(MastersSections::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($employee, 'section_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employee, 'position_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($employee, 'position_id', CHtml::listData(MastersPositions::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($employee, 'position_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employee, 'level_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($employee, 'level_id', CHtml::listData(ReferenceLevels::model()->findAll(), 'id', 'level'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($employee, 'level_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employee, 'grade_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($employee, 'grade_id', CHtml::listData(ReferenceGrades::model()->findAll(), 'id', 'grade'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($employee, 'grade_id'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-12">
		<div class="panel-footer">
			<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>			
			<a href="#" class="btn btn-primary pull-right" id="btnSubmitEmployee"><?php echo $employee->isNewRecord ? 'Create' : 'Save' ?></a>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<script>

$('#MastersEmployees_birthdate').datepicker({format: 'yyyy-mm-dd'});
$('#MastersEmployees_hiredate').datepicker({format: 'yyyy-mm-dd'});	
$('#MastersEmployees_married_date').datepicker({format: 'yyyy-mm-dd'});	
	
$('#MastersEmployees_birthplace_country_id').change(function () {
	var url = '<?php echo Yii::app()->createUrl("geography/countries/dynamicStates"); ?>&id='+$(this).val();
	$.get(url, function (data) {updateDropdown(this, $("#MastersEmployees_birthplace_state_id"), data);});
});

$('#MastersEmployees_birthplace_state_id').change(function () {
	var url = '<?php echo Yii::app()->createUrl("geography/states/dynamicCities"); ?>&id='+$(this).val();
	$.get(url, function (data) {updateDropdown(this, $("#MastersEmployees_birthplace_city_id"), data);});
});

$('#MastersEmployees_birthplace_city_id').change(function () {
	var url = '<?php echo Yii::app()->createUrl("geography/cities/dynamicDistricts"); ?>&id='+$(this).val();
	$.get(url, function (data) {updateDropdown(this, $("#MastersEmployees_birthplace_district_id"), data);});
});

$('#MastersEmployees_department_id').change(function () {
	var url = '<?php echo Yii::app()->createUrl("departments/actionDynamicSections"); ?>&id='+$(this).val();
	$.get(url, function (data) {updateDropdown(this, $("#MastersEmployees_section_id"), data);});
});

$('#btnSubmitEmployee').click(function(){
	/*
	[id] => 1
    [type_id] => 1
    [code] => 1409001
    [email] => siti_plb@yahoo.com
    [title] => Miss
    [firstname] => Dewi Novitasari
    [lastname] => Panggabean
    [nickname] => Sari
    [gender] => F
    [religion_id] => 1
    [ethnic_id] => 1
    [birthplace_country_id] => 101
    [birthplace_state_id] => 12
    [birthplace_city_id] => 181
    [birthplace_district_id] => 35
    [poscode] => 32123
    [birthdate] => 1980-11-29
    [married_status] => single
    [married_date] => 0000-00-00
    [child_amount] => 
    [weight] => 0.00
    [height] => 0.00
    [identity_type_id] => 1
    [identity_number] => 21212
    [hiredate] => 2012-09-22
    [resigndate] => 
    [status] => active
    [is_active] => 1
    [department_id] => 2
    [section_id] => 4
    [outlet_id] => 
    [position_id] => 6
    [level_id] => 1
    [grade_id] => 1
    [resident_status] => 
    [contract_periode_start] => 
    [contract_periode_end] => 
    [bank_name] => 
    [bank_account_no] => 
    [bank_account_name] => 
    [bank_address] => 
    [salary_id] => 5
    [city_area_id] => 1
    [is_system] => 0
    */

	var id 			= '<?php echo $employee->id ?>';	
	var email  		= $('#MastersEmployees_email').val();
	var title 		= $('#MastersEmployees_title').val();
	var firstname 	= $('#MastersEmployees_firstname').val();
	var lastname 	= $('#MastersEmployees_lastname').val();
	var nickname 	= $('#MastersEmployees_nickname').val();
	var gender 			= $('#MastersEmployees_gender').val();
	var religion_id 	= $('#MastersEmployees_religion_id').val();
	var ethnic_id 	 	= $('#MastersEmployees_ethnic_id').val();
	var married_status	= $('#MastersEmployees_married_status').val();
	var married_date	= $('#MastersEmployees_married_date').val();
	var child_amount	= $('#MastersEmployees_child_amount').val();
	var hiredate 		= $('#MastersEmployees_hiredate').val();
	var status 			= $('#MastersEmployees_status').val();
	var is_active			= $('#MastersEmployees_is_active').val();
	var identity_type_id	= $('#MastersEmployees_identity_type_id').val();
	var identity_number		= $('#MastersEmployees_identity_number').val();
	var weight 	 			= $('#MastersEmployees_weight').val();
	var height 	 				= $('#MastersEmployees_height').val();
	var birthplace_country_id 	= $('#MastersEmployees_birthplace_country_id').val();
	var birthplace_state_id 	= $('#MastersEmployees_birthplace_state_id').val();
	var birthplace_city_id  	= $('#MastersEmployees_birthplace_city_id').val();
	var birthplace_district_id 	= $('#MastersEmployees_birthplace_district_id').val();
	var poscode 			 	= $('#MastersEmployees_poscode').val();
	var birthdate 		= $('#MastersEmployees_birthdate').val();
	var department_id 	= $('#MastersEmployees_department_id').val();
	var section_id 	 	= $('#MastersEmployees_section_id').val();
	var position_id	 	= $('#MastersEmployees_position_id').val();
	var level_id 	 	= $('#MastersEmployees_level_id').val();
	var grade_id 	 	= $('#MastersEmployees_grade_is').val();

	// alert(identity_number);

	$.post(
		'<?php echo Yii::app()->createUrl("employees/ajaxupdate&id="); ?>'+id,
		{			
			email 	: email,
			title 		: title,
			firstname	: firstname,
			lastname 	: lastname,
			nickname 	: nickname,
			gender  		: gender,
			religion_id 	: religion_id,
			ethnic_id 		: ethnic_id,
			married_status 	: married_status,
			married_date 	: married_date,
			child_amount 	: child_amount,
			hiredate 	 	: hiredate,
			status 	 			: status,
			is_active 			: is_active,
			identity_type_id 	: identity_type_id,
			identity_number 	: identity_number,
			weight 					: weight,
			height 					: height,
			birthplace_country_id 	: birthplace_country_id,
			birthplace_state_id 	: birthplace_state_id,
			birthplace_city_id 		: birthplace_city_id,
			birthplace_district_id 	: birthplace_district_id,
			poscode 				: poscode,
			birthdate 		: birthdate,
			department_id 	: department_id,
			section_id 		: section_id,
			level_id 		: level_id,
			grade_id 		: grade_id
		},
		function (data,status) {			
			alert(data);

			// data = $.parseJSON(data);
			
			// if(data.success==1){
			// 	href = window.location.href;
			// 	href = href.split('#');	
			// 	href = href[0];

			// 	if(href.indexOf('&tab') != -1){
			// 		href = href.split('&tab');
			// 		href = href[0];
			// 	}			
		
			// 	window.location.href = href+'&tab=0';
			// }
			// else{
			// 	$('#errorEmployee_id').text(data.error_employee_id);
			// 	$('#errorLabel').text(data.error_label);
			// 	$('#errorStreet1').text(data.error_street1);
			// 	$('#errorStreet2').text(data.error_street2);
			// 	$('#errorCountry_id').text(data.error_country_id);
			// 	$('#errorState_id').text(data.error_state_id);
			// 	$('#errorCity_id').text(data.error_city_id);
			// 	$('#errorDistrict_id').text(data.error_district_id);
			// 	$('#errorPoscode').text(data.error_poscode);
			// 	$('#errorPhone').text(data.error_phone);
			// }
		}
	);
});

</script>