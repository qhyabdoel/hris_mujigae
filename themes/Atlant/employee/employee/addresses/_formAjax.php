<?php $label_class = 'col-md-3 col-xs-12 control-label'; ?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($address, 'employee_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<div class="input-group">
							<?php echo CHtml::textField('employee_name', $address->viewChooseEmployee(), array('size'=>60,'readonly'=>true,'class' => 'validate[required] form-control')); ?>
							<?php echo CHtml::activeHiddenField($address, 'employee_id', array('class' => 'validate[required] form-control')); ?>
						</div>
						<div id="errorEmployee_id" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($address, 'label', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($address, 'label', array('size'=>60,'maxlength'=>255,'class' => 'validate[required] form-control')); ?>
						<div id="errorLabel" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($address, 'street1', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($address, 'street1', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="errorStreet1" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($address, 'street2', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($address, 'street2', array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
						<div id="errorStreet2" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($address, 'country_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php
						$datas = CHtml::listData(ReferenceGeoCountries::model()->byOrder()->findAll(), 'id', 'name');

						echo CHtml::activeDropDownList($address, 'country_id', $datas
										, array(
											'data-placeholder' 	=> at('Please select one...'),
											'prompt' 			=> '',
											'data-live-search' 	=> 'true',
											'class' 			=> 'validate[required] form-control select',
										)
									); ?>
						<div id="errorCountry_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($address, 'state_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($address, 'state_id', CHtml::listData(ReferenceGeoStates::model()->byCountry($address->country_id)->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' 	=> at('Please select one...'),
											'prompt' 			=> '',
											'data-live-search' 	=> 'true',
											'class' 			=> 'validate[required] form-control select',
										)
									); ?>
						<div id="errorState_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($address, 'city_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($address, 'city_id', CHtml::listData(ReferenceGeoCities::model()->byState($address->state_id)->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' 	=> at('Please select one...'),
											'prompt' 			=> '',
											'data-live-search' 	=> 'true',
											'class' 			=> 'validate[required] form-control select',
										)
									); ?>
						<div id="errorCity_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($address, 'district_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($address, 'district_id', CHtml::listData(ReferenceGeoDistricts::model()->byCity($address->city_id)->byOrder()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<div id="errorDistrict_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($address, 'poscode', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($address, 'poscode', array('size'=>5,'maxlength'=>5,'class' => 'form-control')); ?>
						<div id="errorPoscode" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($address, 'phone', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($address, 'phone', array('size'=>15,'maxlength'=>15,'class' => 'form-control')); ?>
						<div id="errorPhone" class="errorMessage"></div>
					</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>
				<a href="#" class="btn btn-primary pull-right" id="btnsubmitAddresses"><?php echo $address->isNewRecord ? 'Create' : 'Save'; ?></a>
			</div>
		</div>
	</div>
</div>

<?php $this->renderPartial('/ajax/sm-choose-dialog'); ?>

<script>

$('#MastersEmployeeAddresses_country_id').change(function () {
	var url = '<?php echo Yii::app()->createUrl("geography/countries/dynamicStates"); ?>&id='+$(this).val();
	$.get(url, function (data) {updateDropdown(this, $("#MastersEmployeeAddresses_state_id"), data);});
});

$('#MastersEmployeeAddresses_state_id').change(function () {
	var url = '<?php echo Yii::app()->createUrl("geography/states/dynamicCities"); ?>&id='+$(this).val();
	$.get(url, function (data) {updateDropdown(this, $("#MastersEmployeeAddresses_city_id"), data);});
});

$('#MastersEmployeeAddresses_city_id').change(function () {
	var url = '<?php echo Yii::app()->createUrl("geography/cities/dynamicDistricts"); ?>&id='+$(this).val();
	$.get(url, function (data) {updateDropdown(this, $("#MastersEmployeeAddresses_district_id"), data);});
});

$('#btnsubmitAddresses').click(function(){
	var id 			= '<?php echo $address->id ?>';
	var employee_id = $('#MastersEmployeeAddresses_employee_id').val();
	var label 		= $('#MastersEmployeeAddresses_label').val();
	var street1 	= $('#MastersEmployeeAddresses_street1').val();
	var street2 	= $('#MastersEmployeeAddresses_street2').val();
	var country_id 	= $('#MastersEmployeeAddresses_country_id').val();
	var state_id 	= $('#MastersEmployeeAddresses_state_id').val();
	var city_id 	= $('#MastersEmployeeAddresses_city_id').val();
	var district_id = $('#MastersEmployeeAddresses_district_id').val();
	var poscode 	= $('#MastersEmployeeAddresses_poscode').val();
	var phone 	 	= $('#MastersEmployeeAddresses_phone').val();
	var url 		= '<?php echo Yii::app()->createUrl("employee/addresses/ajaxcreate&id="); ?>'+id;

	$.post(
		'<?php echo Yii::app()->createUrl("employee/addresses/ajaxcreate&id="); ?>'+id,
		{
			employee_id : employee_id,
			label 		: label,
			street1 	: street1,
			street2 	: street2,
			country_id 	: country_id,
			state_id 	: state_id,
			city_id 	: city_id,
			district_id : district_id,
			poscode 	: poscode,
			phone 		: phone
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
		
				window.location.href = href+'&tab=0';
			}
			else{
				$('#errorEmployee_id').text(data.error_employee_id);
				$('#errorLabel').text(data.error_label);
				$('#errorStreet1').text(data.error_street1);
				$('#errorStreet2').text(data.error_street2);
				$('#errorCountry_id').text(data.error_country_id);
				$('#errorState_id').text(data.error_state_id);
				$('#errorCity_id').text(data.error_city_id);
				$('#errorDistrict_id').text(data.error_district_id);
				$('#errorPoscode').text(data.error_poscode);
				$('#errorPhone').text(data.error_phone);
			}
		}
	);
});

</script>