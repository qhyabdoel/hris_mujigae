<?php
$label_class = 'col-md-3 col-xs-12 control-label';
$form_name = 'MastersEmployeeHistoryEmployments';
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
					<?php echo CHtml::activeLabelEx($model, 'employee_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<div class="input-group">
							<?php echo CHtml::textField('employee_name', $model->viewChooseEmployee(), array('readonly'=>true,'class' => 'validate[required] form-control disabled')); ?>
							<?php echo CHtml::activeHiddenField($model, 'employee_id', array('class' => 'validate[required] form-control')); ?>
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" id="choose_employee">Choose</button>
							</span>
						</div>
						<?php echo CHtml::error($model, 'employee_id'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'company_name', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($model, 'company_name', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'company_name'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'company_address_street1', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'company_address_street1', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'company_address_street1'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'company_address_street2', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'company_address_street2', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'company_address_street2'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'company_address_country_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'company_address_country_id', CHtml::listData(ReferenceGeoCountries::model()->byOrder()->findAll(), 'id', 'name')
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
																updateDropdown(this, $("#'.$form_name.'_company_address_state_id"), data);
															}',
											)
										)
									); ?>
						<?php echo CHtml::error($model, 'company_address_country_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'company_address_state_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'company_address_state_id', CHtml::listData(ReferenceGeoStates::model()->byOrder()->findAll(), 'id', 'name')
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
																updateDropdown(this, $("#'.$form_name.'_company_address_city_id"), data);
															}',
											)
										)
									); ?>
						<?php echo CHtml::error($model, 'company_address_state_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'company_address_city_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'company_address_city_id', CHtml::listData(ReferenceGeoCities::model()->byOrder()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'company_address_city_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'company_address_poscode', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'company_address_poscode', array('size'=>5,'maxlength'=>5,'class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'company_address_poscode'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'position', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'position', array('size'=>5,'maxlength'=>100,'class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'position'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'last_position', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'last_position', array('size'=>5,'maxlength'=>100,'class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'last_position'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'work_date', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'work_date', array('size'=>5,'maxlength'=>100,'class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'work_date'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'resign_date', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField($model, 'resign_date', array('class' => 'validate[required] form-control datepicker')); ?>
						</div>
						<?php echo CHtml::error($model, 'resign_date'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'resign_reason', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'resign_reason', array('size'=>5,'maxlength'=>255,'class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'resign_reason'); ?>
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

<?php $this->renderPartial('/ajax/sm-choose-dialog'); ?>