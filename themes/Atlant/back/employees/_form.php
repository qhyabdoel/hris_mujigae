<?php
$label_class = 'col-md-3 col-xs-12 control-label';
$form_name = 'MastersEmployees';
?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal', 'enctype' => 'multipart/form-data')); ?>
<?php //echo CHtml::errorSummary($model); ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-6">
					<?php if (!isset($model->id)) { ?>
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'hiredate', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
								<?php echo CHtml::activeTextField($model, 'hiredate', array('onChange' => 'setContractPeriode();',  'class' => 'validate[required] form-control datepicker',  'data-date-format' => 'dd-mm-yyyy')); ?>
							</div>
							<?php echo CHtml::error($model, 'hiredate'); ?>
						</div>
					</div>
					
					<?php } else { ?>
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'hiredate', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
								<?php echo CHtml::activeTextField($model, 'hiredate', array(
									'readonly'=>true,'class' => 'validate[required] form-control disabled'
								)); ?>
							</div>
						</div>
					</div>
					
					<?php /*<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'type_id', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
								<?php echo CHtml::textField('type_id', $model->type->name, array(
									'readonly'=>true,'class' => 'validate[required] form-control disabled'
								)); ?>
							</div>
						</div>
					</div>*/?>
					<?php } ?>
					
					<?php if ($model->type_id == 1) { ?>
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'type_id', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
								<?php echo CHtml::textField('type_id', $model->type->name, array(
									'readonly'=>true,'class' => 'validate[required] form-control disabled'
								)); ?>
							</div>
						</div>
					</div>
					<?php } else { ?>
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'type_id', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeDropDownList($model, 'type_id', CHtml::listData(ReferenceEmployeeTypes::model()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' => at('Please select one...'), 
											'class' => 'validate[required] form-control select',
											'onChange' => 'setContractPeriode();'
										)); ?>
							<?php echo CHtml::error($model, 'type_id'); ?>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'contract_periode_start', array('class' => $label_class)); ?>
						<div class="col-md-8">
							<?php echo CHtml::activeTextField($model, 'contract_periode_start', array(
								'readonly'=>true,'class' => 'form-control'
							)); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'contract_periode_end', array('class' => $label_class)); ?>
						<div class="col-md-8">
							<?php echo CHtml::activeTextField($model, 'contract_periode_end', array(
								'readonly'=>true,'class' => 'form-control'
							)); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div style='float: right; position: relative;'>
					<div class="col-md-3"><?php echo CHtml::image($model->getPhoto(), $model->getFullname(), array('height'=>'50px')); ?></div>
					<div class="col-md-9"><!--input type="file" class="btn btn-success" name="employee_photo" id="employee_photo"/-->
						<?php echo CHtml::activeFileField($modelPhoto, 'file', array('class' => 'btn btn-success')); ?>
					</div>
				</div>
				<h3>General Info</h3>
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			</div>
			<div class="panel-body">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'code', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeTextField($model, 'code', array('readonly'=>true,'class' => 'validate[required] form-control disabled')); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'email', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon">@</span>
								<?php echo CHtml::activeTextField($model, 'email', array('size'=>60,'maxlength'=>255,'class' => 'validate[required,custom[email]] form-control')); ?>
							</div>
							<?php echo CHtml::error($model, 'email'); ?>
						</div>
					</div>

					<?php /*<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'title', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeTextField($model, 'title', array('size'=>10,'maxlength'=>10,'class' => 'validate[required] form-control')); ?>
							<?php echo CHtml::error($model, 'title'); ?>
						</div>
					</div>*/?>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'firstname', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<?php echo CHtml::activeTextField($model, 'firstname', array('size'=>50,'maxlength'=>50,'class' => 'validate[required] form-control')); ?>
							</div>
							<?php echo CHtml::error($model, 'firstname'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'lastname', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<?php echo CHtml::activeTextField($model, 'lastname', array('size'=>50,'maxlength'=>50,'class' => 'validate[required] form-control')); ?>
							</div>
							<?php echo CHtml::error($model, 'lastname'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'nickname', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<?php echo CHtml::activeTextField($model, 'nickname', array('size'=>50,'maxlength'=>50,'class' => 'validate[required] form-control')); ?>
							</div>
							<?php echo CHtml::error($model, 'nickname'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'gender', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeRadioButtonList($model, 'gender', ReferenceEmployeeStatuses::model()->getGender(), array('class' => 'validate[required] form-control iradio', 'separator'=>' &nbsp; &nbsp; &nbsp; &nbsp; ')); ?>
							<?php echo CHtml::error($model, 'gender'); ?>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'religion_id', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeDropDownList($model, 'religion_id', CHtml::listData(ReferenceReligions::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($model, 'religion_id'); ?>
						</div>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'ethnic_id', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeDropDownList($model, 'ethnic_id', CHtml::listData(ReferenceEthnics::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($model, 'ethnic_id'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'married_status', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeDropDownList($model, 'married_status', CHtml::listData(ReferenceEmployeeStatuses::model()->maritalStatus()->findAll(), 'name', 'label'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($model, 'married_status'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'married_date', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
								<?php echo CHtml::activeTextField($model, 'married_date', array('class' => 'form-control datepicker')); ?>
							</div>
							<?php echo CHtml::error($model, 'married_date'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'child_amount', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeTextField($model, 'child_amount', array('class' => 'form-control')); ?>
							<?php echo CHtml::error($model, 'child_amount'); ?>
						</div>
					</div>

					

					<?php /*<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'status', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeDropDownList($model, 'status', CHtml::listData(ReferenceEmployeeStatuses::model()->attendanceStatus()->findAll(), 'name', 'label'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($model, 'status'); ?>
						</div>
					</div>*/?>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'is_active', array('class' => $label_class)); ?>
						<div class="col-md-9">
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
						<div class="col-md-9">
							<?php echo CHtml::activeDropDownList($model, 'identity_type_id', CHtml::listData(ReferenceIdentityTypes::model()->byOrder()->findAll(), 'id', 'label'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
							<?php echo CHtml::error($model, 'identity_type_id'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'identity_number', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeTextField($model, 'identity_number', array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
							<?php echo CHtml::error($model, 'identity_number'); ?>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'weight', array('class' => $label_class)); ?>
						<div class="col-md-9">
							<?php echo CHtml::activeTextField($model, 'weight', array('size'=>5,'maxlength'=>5,'class' => 'form-control')); ?>
							<?php echo CHtml::error($model, 'weight'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabelEx($model, 'height', array('class' => $label_class)); ?>
						<div class="col-md-9">
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
					<div class="col-md-8">
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
					<div class="col-md-8">
						<?php echo CHtml::activeDropDownList($model, 'birthplace_state_id', CHtml::listData(ReferenceGeoStates::model()->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' 	=> at('Please select one...'),
											'prompt' 			=> '',
											'data-live-search' 	=> 'true',
											'class' 			=> 'validate[required] form-control select',
											'ajax' 				=> array(
												'type' 		=> 'GET',
												'url' 		=> array('geography/states/dynamicCities'),
												'data'		=> array('id'=>'js:this.value'),
												'success' 	=> 'function(data){
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
					<div class="col-md-8">
						<?php echo CHtml::activeDropDownList($model, 'birthplace_city_id', CHtml::listData(ReferenceGeoCities::model()->byOrder()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'birthplace_city_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'birthdate', array('class' => $label_class)); ?>
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField($model, 'birthdate', array('class' => 'validate[required] form-control datepicker', 'data-date-format'=>'yyyy-mm-dd')); ?>
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
				<?php if (!isset($model->id)) { ?>
			
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'city_area_id', array('class' => $label_class)); ?>
					<div class="col-md-8">
						<?php echo CHtml::activeDropDownList($model, 'city_area_id', CHtml::listData(PayrollCities::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'city_area_id'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'department_id', array('class' => $label_class)); ?>
					<div class="col-md-8">
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
					<div class="col-md-8">
						<?php echo CHtml::activeDropDownList($model, 'section_id', CHtml::listData(MastersSections::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'section_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'position_id', array('class' => $label_class)); ?>
					<div class="col-md-8">
						<?php echo CHtml::activeDropDownList($model, 'position_id', CHtml::listData(MastersPositions::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'position_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'level_id', array('class' => $label_class)); ?>
					<div class="col-md-8">
						<?php echo CHtml::activeDropDownList($model, 'level_id', CHtml::listData(ReferenceLevels::model()->findAll(), 'id', 'level'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'level_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'grade_id', array('class' => $label_class)); ?>
					<div class="col-md-8">
						<?php echo CHtml::activeDropDownList($model, 'grade_id', CHtml::listData(ReferenceGrades::model()->findAll(), 'id', 'grade'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'grade_id'); ?>
					</div>
				</div>
				
				<?php } else { ?>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'city_area_id', array('class' => $label_class)); ?>
					<div class="col-md-8">
						<?php echo CHtml::textField('city_area_name', $model->cityarea->name, array(
							'readonly'=>true,'class' => 'validate[required] form-control disabled'
						)); ?>												
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'department_id', array('class' => $label_class)); ?>
					<div class="col-md-8">
						<?php echo CHtml::textField('department_name', $model->department->name, array(
							'readonly'=>true,'class' => 'validate[required] form-control disabled'
						)); ?>												
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'section_id', array('class' => $label_class)); ?>
					<div class="col-md-8">
						<?php 
						$section = '';
						if(isset($model->section)) $section = $model->section->name;

						echo CHtml::textField('section_name', $section, array(
							'readonly'=>true,'class' => 'validate[required] form-control disabled'
						)); 
						?>												
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'position_id', array('class' => $label_class)); ?>
					<div class="col-md-8">
						<?php echo CHtml::textField('position_name', $model->position->name, array(
							'readonly'=>true,'class' => 'validate[required] form-control disabled'
						)); ?>												
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'level_id', array('class' => $label_class)); ?>
					<div class="col-md-8">
						<?php echo CHtml::textField('level', $model->level->level, array(
							'readonly'=>true,'class' => 'validate[required] form-control disabled'
						)); ?>												
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'grade_id', array('class' => $label_class)); ?>
					<div class="col-md-8">
						<?php echo CHtml::textField('grade', $model->grade->grade, array(
							'readonly'=>true,'class' => 'validate[required] form-control disabled'
						)); ?>												
					</div>
				</div>
				<?php } ?>
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

<br>

<?php if(!$model->isNewRecord) { ?>
<div class="row">
	<div class="col-md-12">
		<?php
		$this->widget('zii.widgets.jui.CJuiTabs',array(
			'tabs'=>array(
				at('Addresses')=>array('content'=>$this->renderPartial('view/addresses',array('model'=>$model,'isform'=>true),true)),
				at('Familys')=>array('content'=>$this->renderPartial('view/familys',array('model'=>$model,'isform'=>true),true)),
				at('Educations')=>array('content'=>$this->renderPartial('view/educations',array('model'=>$model,'isform'=>true),true)),
				at('Employments')=>array('content'=>$this->renderPartial('view/employments',array('model'=>$model,'isform'=>true),true)),
				at('Rewards')=>array('content'=>$this->renderPartial('view/rewards',array('model'=>$model,'isform'=>true),true)),
				at('Trainings')=>array('content'=>$this->renderPartial('view/trainings',array('model'=>$model,'isform'=>true),true)),
				at('Languages')=>array('content'=>$this->renderPartial('view/languages',array('model'=>$model,'isform'=>true),true)),
				at('Salary')=>array('content'=>$this->renderPartial('view/salary',array('model'=>$model,'isform'=>true),true)),
			),
			'options'=>array(
				'collapsible'	=> false,
				'selected' 		=> $select_tab,
			),
			'id' => 'Tabs-Employee-Info',			
		));
		?>
	</div>
</div>
<?php } ?>

<?php echo CHtml::endForm(); ?>

<div class="clear"></div>

<script type="text/javascript">

$().ready(function (argument) {
	var href = window.location.href;
	
	if(href.indexOf('tab') != -1){
		window.scrollTo(0,document.body.scrollHeight);
	}	
});

function setContractPeriode()
{
	var start = $('#MastersEmployees_hiredate').val();
	var type_id = +$('#MastersEmployees_type_id').val();
	var periode_start = $('#MastersEmployees_contract_periode_start');
	var periode_end = $('#MastersEmployees_contract_periode_end');
	
	if(type_id === 2){
		var dataSplit = start.split('-');
		end = new Date(dataSplit[0], dataSplit[1]-1, dataSplit[2]);
		end.setMonth(end.getMonth() + 3);
		periode_start.val(start);
		periode_end.val(end.toLocaleFormat('%Y-%m-%d'));
	} else if(type_id === 3){
		var dataSplit = start.split('-');
		start = new Date(dataSplit[0], dataSplit[1]-1, dataSplit[2]);
		start.setMonth(start.getMonth() + 3);
		
		end = new Date(start.valueOf()); end.setMonth(end.getMonth() + 3);
		periode_start.val(start.toLocaleFormat('%Y-%m-%d'));
		periode_end.val(end.toLocaleFormat('%Y-%m-%d'));
	} else {
		periode_start.val('');
		periode_end.val('');
	}
}

</script>

<br/><br/>