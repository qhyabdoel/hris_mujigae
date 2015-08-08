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
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'employee_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<div class="input-group">
							<?php echo CHtml::textField('employee_name', $family->viewChooseEmployee(), array('size'=>60,'readonly'=>true,'class' => 'validate[required] form-control disabled')); ?>
							<?php echo CHtml::activeHiddenField($family, 'employee_id', array('class' => 'validate[required] form-control')); ?>							
						</div>
						<div id="error_employee_id" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'group_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($family, 'group_id', CHtml::listData(ReferenceFamilyGroups::model()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' 	=> at('Please select one...'),
											'prompt' 			=> '',
											'data-live-search' 	=> 'true',
											'class' 			=> 'validate[required] form-control select',
										)
									); ?>
						<div id="error_group_id" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'status_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($family, 'status_id', CHtml::listData(ReferenceFamilyStatuses::model()->byGroup($family->group_id)->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<div id="error_status_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'family_no', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($family, 'family_no', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="error_family_no" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'name', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($family, 'name', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="error_name" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'gender', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($family, 'gender', array('M'=>'Male','F'=>'Female'), array('class' => 'validate[required] form-control')); ?>
						<div id="error_gender" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'address_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($family, 'address_id', MastersEmployees::model()->findByPk(getUser()->id)->getArrayAddress(), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<div id="error_address_id" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'birthplace_country_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($family, 'birthplace_country_id', CHtml::listData(ReferenceGeoCountries::model()->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' 	=> at('Please select one...'),
											'prompt' 			=> '',
											'data-live-search' 	=> 'true',
											'class' 			=> 'validate[required] form-control select',
										)
									); ?>
						<div id="error_birthplace_country_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'birthplace_state_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($family, 'birthplace_state_id', CHtml::listData(ReferenceGeoStates::model()->byCountry($family->birthplace_country_id)->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' 	=> at('Please select one...'),
											'prompt' 			=> '',
											'data-live-search' 	=> 'true',
											'class' 			=> 'validate[required] form-control select',
										)
									); ?>
						<div id="error_birthplace_state_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'birthplace_city_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($family, 'birthplace_city_id', CHtml::listData(ReferenceGeoCities::model()->byState($family->birthplace_state_id)->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' => at('Please select one...'),
											'prompt' => '',
											'data-live-search' => 'true',
											'class' => 'validate[required] form-control select',
										)
									); ?>
						<div id="error_birthplace_city_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'birthplace_district_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($family, 'birthplace_district_id', CHtml::listData(ReferenceGeoDistricts::model()->byCity($family->birthplace_city_id)->byOrder()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<div id="error_birthplace_district_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'poscode', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($family, 'poscode', array('size'=>5,'maxlength'=>5,'class' => 'form-control')); ?>
						<div id="error_poscode" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'birthdate', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField($family, 'birthdate', array('class' => 'validate[required] form-control datepicker')); ?>
						</div>
						<div id="error_birthdate" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'age', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($family, 'age', array('class' => 'form-control')); ?>
						<div id="error_age" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'mobile', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($family, 'mobile', array('maxlength'=>15,'class' => 'form-control')); ?>
						<div id="error_mobile" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'phone', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($family, 'phone', array('maxlength'=>15,'class' => 'form-control')); ?>
						<div id="error_phone" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'education_level', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($family, 'education_level', array('class' => 'form-control')); ?>
						<div id="error_education_level" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'job', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($family, 'job', array('maxlength'=>50,'class' => 'form-control')); ?>
						<div id="error_job" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($family, 'job_position', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($family, 'job_position', array('maxlength'=>50,'class' => 'form-control')); ?>
						<div id="error_job_position" class="errorMessage"></div>
					</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>
				<a href="#" class="btn btn-primary pull-right" id="btnSubmitFamilys"><?php echo $family->isNewRecord ? 'Create' : 'Save'; ?></a>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<?php $this->renderPartial('/ajax/sm-choose-dialog'); ?>

<script>	
	$('#MastersEmployeeFamilys_birthdate').datepicker({format: 'yyyy-mm-dd'});	

 	$('#MastersEmployeeFamilys_group_id').change(function () {
		var url = '<?php echo Yii::app()->createUrl("employees/dynamicStatuses"); ?>&id='+$(this).val();
		$.get(url, function (data) {updateDropdown(this, $("#MastersEmployeeFamilys_status_id"), data);});
	});
	
	$('#MastersEmployeeFamilys_birthplace_country_id').change(function () {
		var url = '<?php echo Yii::app()->createUrl("geography/countries/dynamicStates"); ?>&id='+$(this).val();
		$.get(url, function (data) {updateDropdown(this, $("#MastersEmployeeFamilys_birthplace_state_id"), data);});
	});
	
	$('#MastersEmployeeFamilys_birthplace_state_id').change(function () {
		var url = '<?php echo Yii::app()->createUrl("geography/states/dynamicCities"); ?>&id='+$(this).val();
		$.get(url, function (data) {updateDropdown(this, $("#MastersEmployeeFamilys_birthplace_city_id"), data);});
	});

	$('#MastersEmployeeFamilys_birthplace_city_id').change(function () {
		var url = '<?php echo Yii::app()->createUrl("geography/cities/dynamicDistricts"); ?>&id='+$(this).val();
		$.get(url, function (data) {updateDropdown(this, $("#MastersEmployeeFamilys_birthplace_district_id"), data);});
	});

	$('#btnSubmitFamilys').click(function(){
		var id 			= '<?php echo $family->id ?>';
		var employee_id = $('#MastersEmployeeFamilys_employee_id').val();
		var group_id	= $('#MastersEmployeeFamilys_group_id').val();
		var status_id	= $('#MastersEmployeeFamilys_status_id').val();
		var family_no	= $('#MastersEmployeeFamilys_family_no').val();
		var name 	  	= $('#MastersEmployeeFamilys_name').val();
		var gender  	= $('#MastersEmployeeFamilys_gender').val();
		var address_id	= $('#MastersEmployeeFamilys_address_id').val();
		
		var birthplace_country_id 	= $('#MastersEmployeeFamilys_birthplace_country_id').val();
		var birthplace_state_id 	= $('#MastersEmployeeFamilys_birthplace_state_id').val();
		var birthplace_city_id 	 	= $('#MastersEmployeeFamilys_birthplace_city_id').val();
		var birthplace_district_id 	= $('#MastersEmployeeFamilys_birthplace_district_id').val();
		
		var poscode 	 	= $('#MastersEmployeeFamilys_poscode').val();
		var birthdate 	 	= $('#MastersEmployeeFamilys_birthdate').val();
		var age				= $('#MastersEmployeeFamilys_age').val();
		var mobile  		= $('#MastersEmployeeFamilys_mobile').val();
		var phone  			= $('#MastersEmployeeFamilys_phone').val();
		var education_level = $('#MastersEmployeeFamilys_education_level').val();
		var job  			= $('#MastersEmployeeFamilys_job').val();
		var job_position 	= $('#MastersEmployeeFamilys_job_position').val();
		
		var url = '<?php echo Yii::app()->createUrl("employee/addresses/ajaxcreate&id="); ?>'+id;

		$.post(
			'<?php echo Yii::app()->createUrl("employee/familys/ajaxcreate&id="); ?>'+id,
			{
				employee_id : employee_id,
				group_id	: group_id,
				status_id 	: status_id,
				family_no	: family_no,
				name 	 	: name,
				gender 		: gender,
				address_id 	: address_id,
				
				birthplace_country_id 	: birthplace_country_id,
				birthplace_state_id 	: birthplace_state_id,
				birthplace_city_id 		: birthplace_city_id,
				birthplace_district_id 	: birthplace_district_id,
				
				poscode 		: poscode,
				birthdate 		: birthdate,
				age 			: age,
				mobile 			: mobile,
				phone 			: phone,
				education_level : education_level,
				job 			: job,
				job_position 	: job_position
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
			
					window.location.href = href+'&tab=1';
				}
				else{
					$('#error_employee_id').text(data.error_employee_id);
					$('#error_group_id').text(data.error_group_id);
					$('#error_status_id').text(data.error_status_id);
					$('#error_family_no').text(data.error_family_no);
					$('#error_name').text(data.error_name);
					$('#error_gender').text(data.error_gender);
					$('#error_address_id').text(data.error_address_id);
					$('#error_birthplace_country_id').text(data.error_birthplace_country_id);
					$('#error_birthplace_state_id').text(data.error_birthplace_state_id);
					$('#error_birthplace_city_id').text(data.error_birthplace_city_id);
					$('#error_birthplace_district_id').text(data.error_birthplace_district_id);
					$('#error_poscode').text(data.error_poscode);
					$('#error_birthdate').text(data.error_birthdate);
					$('#error_age').text(data.error_age);
					$('#error_mobile').text(data.error_mobile);
					$('#error_phone').text(data.error_phone);
					$('#error_education_level').text(data.error_education_level);
					$('#error_job').text(data.error_job);
					$('#error_job_position').text(data.error_job_position);
				}
			}
		);
	});
</script>