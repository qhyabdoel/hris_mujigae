<?php
$label_class 	= 'col-md-3 col-xs-12 control-label';
$form_name 		= 'MastersEmployeeHistoryEmployments';
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
					<?php echo CHtml::activeLabelEx($employment, 'employee_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<div class="input-group">
							<?php echo CHtml::textField('employee_name', $employment->viewChooseEmployee(), array('size'=>60,'readonly'=>true,'class' => 'validate[required] form-control disabled')); ?>
							<?php echo CHtml::activeHiddenField($employment, 'employee_id', array('class' => 'validate[required] form-control')); ?>
						</div>
						<div id="error_employee_id" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employment, 'company_name', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($employment, 'company_name', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="error_company_name" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employment, 'company_address_street1', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($employment, 'company_address_street1', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="error_company_address_street1" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employment, 'company_address_street2', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($employment, 'company_address_street2', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="error_company_address_street2" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employment, 'company_address_country_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($employment, 'company_address_country_id', CHtml::listData(ReferenceGeoCountries::model()->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' => at('Please select one...'),
											'prompt' => '',
											'data-live-search' => 'true',
											'class' => 'validate[required] form-control select',											
										)
									); ?>
						<div id="error_company_address_country_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employment, 'company_address_state_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($employment, 'company_address_state_id', CHtml::listData(ReferenceGeoStates::model()->byCountry($employment->company_address_country_id)->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' 	=> at('Please select one...'),
											'prompt' 			=> '',
											'data-live-search' 	=> 'true',
											'class' 			=> 'validate[required] form-control select',											
										)
									); ?>
						<div id="error_company_address_state_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employment, 'company_address_city_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($employment, 'company_address_city_id', CHtml::listData(ReferenceGeoCities::model()->byState($employment->company_address_state_id)->byOrder()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<div id="error_company_address_city_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employment, 'company_address_poscode', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($employment, 'company_address_poscode', array('size'=>5,'maxlength'=>5,'class' => 'form-control')); ?>
						<div id="error_company_address_poscode" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employment, 'position', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($employment, 'position', array('size'=>5,'maxlength'=>100,'class' => 'form-control')); ?>
						<div id="error_position" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employment, 'last_position', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($employment, 'last_position', array('size'=>5,'maxlength'=>100,'class' => 'form-control')); ?>
						<div id="error_last_position" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employment, 'work_date', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField($employment, 'work_date', array('class' => 'validate[required] form-control datepicker','style'=>'z-index:1151 !important;')); ?>
						</div>
						<div id="error_work_date" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employment, 'resign_date', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField($employment, 'resign_date', array('class' => 'validate[required] form-control datepicker','style'=>'z-index:1151 !important;')); ?>
						</div>
						<div id="error_resign_date" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($employment, 'resign_reason', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($employment, 'resign_reason', array('size'=>5,'maxlength'=>255,'class' => 'form-control')); ?>
						<div id="error_resign_reason" class="errorMessage"></div>
					</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>				
				<a href="#" class="btn btn-primary pull-right" id="btnSubmitEmployments"><?php echo $employment->isNewRecord ? 'Create' : 'Save'; ?></a>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<?php $this->renderPartial('/ajax/sm-choose-dialog'); ?>

<script>
$('#MastersEmployeeHistoryEmployments_company_address_country_id').selectpicker();
$('#MastersEmployeeHistoryEmployments_company_address_state_id').selectpicker();
$('#MastersEmployeeHistoryEmployments_company_address_city_id').selectpicker();			 	
$('#MastersEmployeeHistoryEmployments_work_date').datepicker({format:'yyyy-mm-dd'});
$('#MastersEmployeeHistoryEmployments_resign_date').datepicker({format:'yyyy-mm-dd'});

$('#btnSubmitEmployments').click(function () {
	var id 							= '<?php echo $employment->id ?>';
	var company_name 				= $('#MastersEmployeeHistoryEmployments_company_name').val();
	var company_address_street1		= $('#MastersEmployeeHistoryEmployments_company_address_street1').val();
	var company_address_street2		= $('#MastersEmployeeHistoryEmployments_company_address_street2').val();
	var company_address_country_id 	= $('#MastersEmployeeHistoryEmployments_company_address_country_id').val();
	var company_address_state_id	= $('#MastersEmployeeHistoryEmployments_company_address_state_id').val();
	var company_address_city_id		= $('#MastersEmployeeHistoryEmployments_company_address_city_id').val();
	var company_address_poscode		= $('#MastersEmployeeHistoryEmployments_company_address_poscode').val();
	var position 			 		= $('#MastersEmployeeHistoryEmployments_position').val();
	var last_position 		 		= $('#MastersEmployeeHistoryEmployments_last_position').val();
	var work_date 			 		= $('#MastersEmployeeHistoryEmployments_work_date').val();
	var resign_date 				= $('#MastersEmployeeHistoryEmployments_resign_date').val();
	var resign_reason 		 		= $('#MastersEmployeeHistoryEmployments_resign_reason').val();
	var url 		 				= '<?php echo Yii::app()->createUrl("employee/educations/ajaxcreate&id="); ?>'+id;

	$.post(
		'<?php echo Yii::app()->createUrl("employee/employments/ajaxcreate&id="); ?>'+id,
		{
			employee_id 				: '<?php echo $employment->employee_id; ?>',
			company_name 				: company_name,
			company_address_street1 	: company_address_street1,
			company_address_street2 	: company_address_street2,
			company_address_country_id 	: company_address_country_id,
			company_address_state_id	: company_address_state_id,
			company_address_city_id		: company_address_city_id,
			company_address_poscode 	: company_address_poscode,
			position 					: position,
			last_position 				: last_position,
			work_date					: work_date,
			resign_date					: resign_date,
			resign_reason 				: resign_reason,
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
		
				window.location.href = href+'&tab=3';
			}
			else{
				$('#error_employee_id').text(data.error_employee_id);
				$('#error_company_name').text(data.error_company_name);
				$('#error_company_address_street1').text(data.error_company_address_street1);
				$('#error_company_address_street2').text(data.error_company_address_street2);
				$('#error_company_address_country_id').text(data.error_company_address_country_id);
				$('#error_company_address_state_id').text(data.error_company_address_state_id);
				$('#error_company_address_city_id').text(data.error_company_address_city_id);
				$('#error_address_poscode').text(data.error_address_poscode);
				$('#error_position').text(data.error_position);
				$('#error_last_postion').text(data.error_last_postion);
				$('#error_work_date').text(data.error_work_date);
				$('#error_resign_date').text(data.error_resign_date);
				$('#error_resign_reason').text(data.error_resign_reason);
			}
			
			// alert(data);
		}
	);
});

$('#MastersEmployeeHistoryEmployments_company_address_country_id').change(function () {
	var url = '<?php echo Yii::app()->createUrl("geography/countries/dynamicStates"); ?>&id='+$(this).val();
	$.get(url, function (data) {updateDropdown(this, $("#MastersEmployeeHistoryEmployments_company_address_state_id"), data);});
});

$('#MastersEmployeeHistoryEmployments_company_address_state_id').change(function () {
	var url = '<?php echo Yii::app()->createUrl("geography/states/dynamicCities"); ?>&id='+$(this).val();
	$.get(url, function (data) {updateDropdown(this, $("#MastersEmployeeHistoryEmployments_company_address_city_id"), data);});
});

</script>