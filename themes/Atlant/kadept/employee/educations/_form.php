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
				<?php echo CHtml::activeHiddenField($model, 'employee_id', array('class' => 'validate[required] form-control')); ?>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'education_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'education_id', CHtml::listData(ReferenceEducations::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'education_id'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'school', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'school', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'school'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'department', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'department', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'department'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'major', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'major', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'major'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'certificate_year', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'certificate_year', MastersEmployeeHistoryEducations::model()->getCertYears(), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'certificate_year'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'notes', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'notes', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'notes'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'address_street1', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'address_street1', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'address_street1'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'address_street2', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'address_street2', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'address_street2'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'address_country_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'address_country_id', CHtml::listData(ReferenceGeoCountries::model()->byOrder()->findAll(), 'id', 'name')
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
																updateDropdown(this, $("#'.$form_name.'_address_state_id"), data);
															}',
											)
										)
									); ?>
						<?php echo CHtml::error($model, 'address_country_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'address_state_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'address_state_id', CHtml::listData(ReferenceGeoStates::model()->byOrder()->findAll(), 'id', 'name')
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
																updateDropdown(this, $("#'.$form_name.'_address_city_id"), data);
															}',
											)
										)
									); ?>
						<?php echo CHtml::error($model, 'address_state_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'address_city_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'address_city_id', CHtml::listData(ReferenceGeoCities::model()->byOrder()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'address_city_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'address_poscode', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'address_poscode', array('size'=>5,'maxlength'=>5,'class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'address_poscode'); ?>
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