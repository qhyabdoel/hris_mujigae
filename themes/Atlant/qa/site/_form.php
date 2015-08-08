<?php

$label_class 	= 'col-md-3 col-xs-12 control-label';
$form_name  	= 'MastersEmployees';

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
						<?php echo CHtml::activeLabelEx($model, 'code', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeTextField($model, 'code', array('readonly'=>true,'class' => 'validate[required] form-control disabled')); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'email', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon">@</span>
								<?php echo CHtml::activeTextField($model, 'email', array('size'=>60,'maxlength'=>255,'class' => 'validate[required,custom[email]] form-control')); ?>
							</div>
							<?php echo CHtml::error($model, 'email'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'title', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeTextField($model, 'title', array('size'=>10,'maxlength'=>10,'class' => 'validate[required] form-control')); ?>
							<?php echo CHtml::error($model, 'title'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'firstname', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<?php echo CHtml::activeTextField($model, 'firstname', array('size'=>50,'maxlength'=>50,'class' => 'validate[required] form-control')); ?>
							</div>
							<?php echo CHtml::error($model, 'firstname'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'lastname', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<?php echo CHtml::activeTextField($model, 'lastname', array('size'=>50,'maxlength'=>50,'class' => 'validate[required] form-control')); ?>
							</div>
							<?php echo CHtml::error($model, 'lastname'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'nickname', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<?php echo CHtml::activeTextField($model, 'nickname', array('size'=>50,'maxlength'=>50,'class' => 'validate[required] form-control')); ?>
							</div>
							<?php echo CHtml::error($model, 'nickname'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'gender', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeRadioButtonList($model, 'gender', ReferenceEmployeeStatuses::model()->getGender(), array('class' => 'validate[required] form-control iradio', 'separator'=>' &nbsp; &nbsp; &nbsp; &nbsp; ')); ?>
							<?php echo CHtml::error($model, 'gender'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'religion_id', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeDropDownList($model, 'religion_id', CHtml::listData(ReferenceReligions::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($model, 'religion_id'); ?>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'ethnic', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeDropDownList($model, 'ethnic', CHtml::listData(ReferenceEthnics::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($model, 'ethnic'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'married_status', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeDropDownList($model, 'married_status', CHtml::listData(ReferenceEmployeeStatuses::model()->maritalStatus()->findAll(), 'name', 'label'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($model, 'married_status'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'married_date', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
								<?php echo CHtml::activeTextField($model, 'married_date', array('class' => 'form-control datepicker')); ?>
							</div>
							<?php echo CHtml::error($model, 'married_date'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'child_amount', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeTextField($model, 'child_amount', array('class' => 'form-control')); ?>
							<?php echo CHtml::error($model, 'child_amount'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'hiredate', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
								<?php echo CHtml::activeTextField($model, 'hiredate', array('class' => 'validate[required] form-control datepicker',  'data-date-format' => 'dd-mm-yyyy')); ?>
							</div>
							<?php echo CHtml::error($model, 'hiredate'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'status', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeDropDownList($model, 'status', CHtml::listData(ReferenceEmployeeStatuses::model()->attendanceStatus()->findAll(), 'name', 'label'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($model, 'status'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'is_active', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeDropDownList($model, 'is_active', ReferenceEmployeeStatuses::model()->getIsActive(), array('class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($model, 'is_active'); ?>
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
						<?php echo CHtml::activeLabelEx($model, 'identity_type_id', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeDropDownList($model, 'identity_type_id', CHtml::listData(ReferenceIdentityTypes::model()->byOrder()->findAll(), 'id', 'label'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($model, 'identity_type_id'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'identity_number', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeTextField($model, 'identity_number', array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
							<?php echo CHtml::error($model, 'identity_number'); ?>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'weight', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeTextField($model, 'weight', array('size'=>5,'maxlength'=>5,'class' => 'form-control')); ?>
							<?php echo CHtml::error($model, 'weight'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'height', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::activeTextField($model, 'height', array('size'=>5,'maxlength'=>5,'class' => 'form-control')); ?>
							<?php echo CHtml::error($model, 'height'); ?>
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
					<?php echo CHtml::activeLabelEx($model, 'birthplace_country_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'birthplace_country_id', CHtml::listData(ReferenceGeoCountries::model()->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' => at('Please select one...'),
											'prompt' => '',
											'data-live-search' => 'true',
											'class' => 'validate[required] form-control select',
											'ajax' => array(
												'type' => 'GET',
												'url' => array('geography/countries/dynamicStates'),
												'data'=>array('id'=>'js:this.value'),
												'success' => 'function(data){
																updateDropdown(this, $("#'.$form_name.'_birthplace_state_id"), data);
															}',
											)
										)
									); ?>
						<?php echo CHtml::error($model, 'birthplace_country_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'birthplace_state_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'birthplace_state_id', CHtml::listData(ReferenceGeoStates::model()->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' => at('Please select one...'),
											'prompt' => '',
											'data-live-search' => 'true',
											'class' => 'validate[required] form-control select',
											'ajax' => array(
												'type' => 'GET',
												'url' => array('geography/states/dynamicCities'),
												'data'=>array('id'=>'js:this.value'),
												'success' => 'function(data){
																updateDropdown(this, $("#'.$form_name.'_birthplace_city_id"), data);
															}',
											)
										)
									); ?>
						<?php echo CHtml::error($model, 'birthplace_state_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'birthplace_city_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'birthplace_city_id', CHtml::listData(ReferenceGeoCities::model()->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' => at('Please select one...'),
											'prompt' => '',
											'data-live-search' => 'true',
											'class' => 'validate[required] form-control select',
											'ajax' => array(
												'type' => 'GET',
												'url' => array('geography/cities/dynamicDistricts'),
												'data'=>array('id'=>'js:this.value'),
												'success' => 'function(data){
																updateDropdown(this, $("#'.$form_name.'_birthplace_district_id"), data);
															}',
											)
										)
									); ?>
						<?php echo CHtml::error($model, 'birthplace_city_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'birthplace_district_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'birthplace_district_id', CHtml::listData(ReferenceGeoDistricts::model()->byOrder()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'birthplace_district_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'poscode', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'poscode', array('size'=>5,'maxlength'=>5,'class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'poscode'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'birthdate', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField($model, 'birthdate', array('class' => 'validate[required] form-control datepicker')); ?>
						</div>
						<?php echo CHtml::error($model, 'birthdate'); ?>
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
					<?php echo CHtml::activeLabelEx($model, 'department_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'department_id', CHtml::listData(MastersDepartments::model()->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' => at('Please select one...'),
											'prompt' => '',
											'data-live-search' => 'true',
											'class' => 'validate[required] form-control select',
											'ajax' => array(
												'type' => 'GET',
												'url' => array('departments/actionDynamicSections'),
												'data'=>array('id'=>'js:this.value'),
												'success' => 'function(data){
																updateDropdown(this, $("#MastersEmployees_section_id"), data);
															}',
											)
										)
									); ?>
						<?php echo CHtml::error($model, 'department_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'section_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'section_id', CHtml::listData(MastersSections::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'section_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'position_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'position_id', CHtml::listData(MastersPositions::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'position_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'level_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'level_id', CHtml::listData(ReferenceLevels::model()->findAll(), 'id', 'level'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'level_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'grade_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'grade_id', CHtml::listData(ReferenceGrades::model()->findAll(), 'id', 'grade'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'grade_id'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-12">
		<div class="panel-footer">
			<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary pull-right')); ?>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>