<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Upgrade Employee Salary'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<?php
$label_class = 'col-md-3 col-xs-12 control-label';
$form_name = 'EmployeeSalaryUpgrade';
?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">										
				<div class="errorMessage" id="alert_error_msg"></div>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($salary, 'city_area_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList(
							$salary, 
							'city_area_id', 
							CHtml::listData(PayrollCities::model()->findAll(), 'id', 'name'), 
							array(
								'data-placeholder' 	=> at('Please select one...'), 
								'prompt' 			=> '', 
								'data-live-search' 	=> 'true', 
								'class' 			=> 'validate[required] form-control select',
								'id' 				=> 'field_city_area_id'
							)
						); ?>
						<?php echo CHtml::error($salary, 'city_area_id'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($salary, 'department_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($salary, 'department_id', CHtml::listData(MastersDepartments::model()->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' 	=> at('Please select one...'),
											'prompt' 			=> '',
											'data-live-search' 	=> 'true',
											'class' 			=> 'validate[required] form-control select',
											'id' 				=> 'field_department_id',
											'ajax' 				=> array(
												'type' 		=> 'GET',
												'url' 		=> array('departments/actionDynamicSections'),
												'data' 		=> array('id'=>'js:this.value'),
												'success' 	=> 'function(data){
																updateDropdown(this, $("#MastersEmployees_section_id"), data);
															}',
											)
										)
									); ?>
						<?php echo CHtml::error($salary, 'department_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($salary, 'section_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($salary, 'section_id', CHtml::listData(MastersSections::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select','id'=>'field_section_id')); ?>
						<?php echo CHtml::error($salary, 'section_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($salary, 'position_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($salary, 'position_id', CHtml::listData(MastersPositions::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select','id'=>'field_position_id')); ?>
						<?php echo CHtml::error($salary, 'position_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($salary, 'level_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($salary, 'level_id', CHtml::listData(ReferenceLevels::model()->findAll(), 'id', 'level'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select','id'=>'field_level_id')); ?>
						<?php echo CHtml::error($salary, 'level_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($salary, 'grade_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($salary, 'grade_id', CHtml::listData(ReferenceGrades::model()->findAll(), 'id', 'grade'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select','id'=>'field_grade_id')); ?>
						<?php echo CHtml::error($salary, 'grade_id'); ?>
					</div>
				</div>
			</div>
		
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>
				<?php 
					// echo CHtml::submitButton('Save', array('class'=>'btn btn-primary pull-right')); 
				?>
				<a class="btn btn-primary pull-right" href="#" id="btnUpgradeSalary">Save</a>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<script>		
	$('#field_city_area_id').selectpicker();
	$('#field_department_id').selectpicker();
	$('#field_section_id').selectpicker();
	$('#field_position_id').selectpicker();
	$('#field_level_id').selectpicker();
	$('#field_grade_id').selectpicker();
	
	$('#btnUpgradeSalary').click(function () {		
		var id 				= '<?php echo $salary->id; ?>';
		var is_ajax 		= 1;
		var city_area_id 	= $('#field_city_area_id').val();
		var department_id 	= $('#field_department_id').val();
		var section_id 		= $('#field_section_id').val();
		var position_id 	= $('#field_position_id').val();
		var level_id 		= $('#field_level_id').val();
		var grade_id 		= $('#field_grade_id').val();

		$.post(
			'<?php echo Yii::app()->createUrl("employee/salary/upgrade&id="); ?>'+id,
			{			
				is_ajax 		: is_ajax,			
				city_area_id  	: city_area_id,
				department_id 	: department_id,
				section_id 		: section_id,
				position_id 	: position_id,
				level_id 		: level_id,
				grade_id 		: grade_id,
			},
			function (data,status) {				
				data = $.parseJSON(data);
				
				if(data.ajax_error==''){
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
					$('#alert_error_msg').text(data.ajax_error);
				}
			}
		);
	});	
</script>