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
				<?php if(user()->hasFlash('ok')): ?>
					<div class="alert succes_msg">
						<span class="alert_close"></span><?php echo user()->getFlash('ok'); ?>
					</div>
				<?php endif; ?>
				
				<?php if(user()->hasFlash('error')): ?>
					<div class="alert error_msg">
						<span class="alert_close"></span><?php echo user()->getFlash('error'); ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="panel-body">
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
		
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>
				<?php echo CHtml::submitButton('Save', array('class'=>'btn btn-primary pull-right')); ?>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>