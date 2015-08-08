<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'periode_type', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">
		<?php echo CHtml::activeDropDownList($model, 'periode_type', GenerateAttendanceForm::getPeriodeType()
						, array(
							'data-live-search' => 'true',
							'class' => 'validate[required] form-control select',
						)
					); ?>
		<?php echo CHtml::error($model, 'periode_type'); ?>
	</div>
</div>

<div class="form-group">
	<label class="col-md-3 col-xs-12 control-label required"><?php echo at('Periode') ?></label>
	<div class="col-md-6">
		<div class="form-inline">
			<?php //echo CHtml::activeLabelEx($model, 'start_date', array('class' => $label_class)); ?>
			From: &nbsp; &nbsp; 
			<div class="input-group">
				<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
				<?php echo CHtml::activeTextField($model, 'start_date', array('class' => 'form-control datepicker')); ?>
			</div>
		
			<?php //echo CHtml::activeLabelEx($model, 'end_date', array('class' => $label_class)); ?>
			&nbsp; &nbsp; &nbsp; &nbsp; To: &nbsp; &nbsp; 
			<div class="input-group">
				<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
				<?php echo CHtml::activeTextField($model, 'end_date', array('class' => 'form-control datepicker')); ?>
			</div>
		</div>
		<?php echo CHtml::error($model, 'start_date'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo CHtml::activeLabelEx($model, 'department_id', array('class' => $label_class)); ?>
	<div class="col-md-6">
		<?php echo CHtml::activeDropDownList($model, 'department_id', CHtml::listData(MastersDepartments::model()->byOrder()->findAll(), 'id', 'name')
						, array(
							'data-placeholder' => at('Please select one...'),
							'prompt' => '',
							'data-live-search' => 'true',
							'class' => 'validate[required] form-control select',
						)
					); ?>
		<?php echo CHtml::error($model, 'department_id'); ?>
	</div>
</div>

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