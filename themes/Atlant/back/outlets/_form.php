<?php 
	$label_class 	= 'col-md-3 col-xs-12 control-label'; 
 	$form_name 		= 'MastersOutlets'; 

 	// echo "string";die();
 ?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			</div>

			<div class="panel-body">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'area_city_id', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeDropDownList($model, 'area_city_id', CHtml::listData(PayrollCities::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($model, 'area_city_id'); ?>
						</div>
					</div>
				
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'code', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeTextField($model, 'code', array('maxlength'=>10,'class' => 'validate[required] form-control')); ?>
							<?php echo CHtml::error($model, 'code'); ?>
						</div>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'name', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeTextField($model, 'name', array('maxlength'=>100,'class' => 'validate[required] form-control')); ?>
							<?php echo CHtml::error($model, 'name'); ?>
						</div>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'employee_needed', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeTextField($model, 'employee_needed', array('maxlength'=>3,'class' => 'form-control')); ?>
							<?php echo CHtml::error($model, 'employee_needed'); ?>
						</div>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'rm_id', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<div class="input-group">
								<?php 
									echo CHtml::textField('employee_name', $model->viewRmName(), array(
										'readonly'=>true,'class' => 'validate[required] form-control disabled'
									)); 
								?>

								<?php 
									// echo CHtml::activeHiddenField($model, 'employee_id', array(
									// 	'class' => 'validate[required] form-control'
									// )); 
								?>

								<?php 
									echo CHtml::activeHiddenField($model, 'rm_id', array('maxlength'=>15,'class' => 'form-control')); 
								?>
								
								<span class="input-group-btn">
									<button type="button" class="btn btn-default" id="choose_employee"><?php echo at('Choose !'); ?></button>
								</span>
							</div>
							<?php echo CHtml::error($model, 'rm_id'); ?>
						</div>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'is_active', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeDropDownList($model, 'is_active', MyHelper::getIsactive(), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($model, 'is_active'); ?>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'street1', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeTextField($model, 'street1', array('maxlength'=>100,'class' => 'validate[required] form-control')); ?>
							<?php echo CHtml::error($model, 'street1'); ?>
						</div>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'street2', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeTextField($model, 'street2', array('maxlength'=>100,'class' => 'form-control')); ?>
							<?php echo CHtml::error($model, 'street2'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'country_id', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeDropDownList($model, 'country_id', CHtml::listData(ReferenceGeoCountries::model()->byOrder()->findAll(), 'id', 'name')
											, array(
												'data-placeholder' 	=> at('Please select one...'),
												'prompt' 			=> '',
												'data-live-search' 	=> 'true',
												'class' 			=> 'validate[required] form-control select',
												'ajax'  			=> array(
													'type' 		=> 'GET',
													'url'  		=> array('geography/countries/dynamicStates'),
													'data' 		=>array('id'=>'js:this.value'),
													'success' 	=> 'function(data){
																	updateDropdown(this, $("#'.$form_name.'_state_id"), data);
																}',
												)
											)
										); ?>
							<?php echo CHtml::error($model, 'country_id'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'state_id', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeDropDownList($model, 'state_id', CHtml::listData(ReferenceGeoStates::model()->byOrder()->findAll(), 'id', 'name')
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
																	updateDropdown(this, $("#'.$form_name.'_city_id"), data);
																}',
												)
											)
										); ?>
							<?php echo CHtml::error($model, 'state_id'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'city_id', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeDropDownList($model, 'city_id', CHtml::listData(ReferenceGeoCities::model()->byOrder()->findAll(), 'id', 'name')
											, array(
												'data-placeholder' 	=> at('Please select one...'),
												'prompt' 			=> '',
												'data-live-search' 	=> 'true',
												'class' 			=> 'validate[required] form-control select',
												'ajax' 				=> array(
													'type' 		=> 'GET',
													'url' 		=> array('geography/cities/dynamicDistricts'),
													'data' 		=> array('id'=>'js:this.value'),
													'success' 	=> 'function(data){
																	updateDropdown(this, $("#'.$form_name.'_district_id"), data);
																}',
												)
											)
										); ?>
							<?php echo CHtml::error($model, 'city_id'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'district_id', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeDropDownList($model, 'district_id', CHtml::listData(ReferenceGeoDistricts::model()->byOrder()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($model, 'district_id'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'poscode', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeTextField($model, 'poscode', array('maxlength'=>5,'class' => 'form-control')); ?>
							<?php echo CHtml::error($model, 'poscode'); ?>
						</div>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'phone', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeTextField($model, 'phone', array('maxlength'=>15,'class' => 'form-control')); ?>
							<?php echo CHtml::error($model, 'phone'); ?>
						</div>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'fax', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeTextField($model, 'fax', array('maxlength'=>15,'class' => 'form-control')); ?>
							<?php echo CHtml::error($model, 'fax'); ?>
						</div>
					</div>
					  
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'mobile', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeTextField($model, 'mobile', array('maxlength'=>15,'class' => 'form-control')); ?>
							<?php echo CHtml::error($model, 'mobile'); ?>
						</div>
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

<?php $this->renderPartial('/ajax/sm-choose-dialog',array('with_department'=>0)); ?>

<!-- employee_id -->