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
				<?php echo CHtml::activeHiddenField($model, 'employee_id'); ?>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'group_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'group_id', CHtml::listData(ReferenceFamilyGroups::model()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' => at('Please select one...'),
											'prompt' => '',
											'data-live-search' => 'true',
											'class' => 'validate[required] form-control select',
											'ajax' => array(
												'type' => 'GET',
												'url' => array('employees/dynamicStatuses'),
												'data'=>array('id'=>'js:this.value'),
												'success' => 'function(data){
																updateDropdown(this, $("#'.$form_name.'_status_id"), data);
															}',
											)
										)
									); ?>
						<?php echo CHtml::error($model, 'group_id'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'status_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'status_id', CHtml::listData(ReferenceFamilyStatuses::model()->byGroup($model->group_id)->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'status_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'family_no', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'family_no', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'family_no'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'name', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'name', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'name'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'gender', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'gender', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'gender'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'address_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'address_id', MastersEmployees::model()->findByPk(getUser()->id)->getArrayAddress(), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'address_id'); ?>
					</div>
				</div>
				
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
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'poscode', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'poscode', array('size'=>5,'maxlength'=>5,'class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'poscode'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'age', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'age', array('class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'age'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'mobile', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'mobile', array('maxlength'=>15,'class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'mobile'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'phone', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'phone', array('maxlength'=>15,'class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'phone'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'education_level', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'education_level', array('class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'education_level'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'job', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'job', array('maxlength'=>50,'class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'job'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'job_position', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'job_position', array('maxlength'=>50,'class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'job_position'); ?>
					</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary pull-right')); ?>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>