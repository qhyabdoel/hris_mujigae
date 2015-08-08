<?php 
$title = 'Create Mutation';
if($model->type=='rotation') $title = 'Create Rotation';
?>

<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at($title); ?></h2>
</div>
<!-- END PAGE TITLE -->

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
					<?php echo CHtml::activeLabelEx($model, 'employee_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<div class="input-group">
							<?php echo CHtml::textField('employee_name', $model->viewChooseEmployee(), array('size'=>100,'readonly'=>true,'class' => 'validate[required] form-control')); ?>							
						</div>
						<div id="errorEmployee_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'city_area_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'city_area_id', CHtml::listData(PayrollCities::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'city_area_id'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'department_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'department_id', CHtml::listData(MastersDepartments::model()->byOrder()->findAll(), 'id', 'name')
										, array(
											'data-placeholder' 	=> at('Please select one...'),
											'prompt'			=> '',
											'data-live-search' 	=> 'true',
											'class' 			=> 'validate[required] form-control select',
											'ajax' 				=> array(
												'type' 		=> 'GET',
												'url' 		=> array('departments/actionDynamicSections'),
												'data' 		=> array('id'=>'js:this.value'),
												'success' 	=> 'function(data){updateDropdown(this, $("#MastersEmployees_section_id"), data);}',
											)
										)
									); ?>
						<?php echo CHtml::error($model, 'department_id'); ?>
					</div>
				</div>

				<div class="form-group">
				<?php if($model->type!='rotation'){
				?>

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

				<?php
				} ?>

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

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'active_date', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField($model, 'active_date', array('class' => 'validate[required] form-control datepicker')); ?>
						</div>
						<?php echo CHtml::error($model, 'active_date'); ?>
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