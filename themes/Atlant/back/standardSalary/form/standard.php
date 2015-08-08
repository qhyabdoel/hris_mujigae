<div class="panel-body">
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'year', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12">
			<?php echo CHtml::activeTextField($model, 'year', array('class' => 'validate[required] form-control')); ?>
			<?php echo CHtml::error($model, 'year'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'city_id', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12">
			<?php echo CHtml::activeDropDownList($model, 'city_id', CHtml::listData(PayrollCities::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
			<?php echo CHtml::error($model, 'city_id'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'department_id', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12">
			<?php echo CHtml::activeDropDownList($model, 'department_id', CHtml::listData(MastersDepartments::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
			<?php echo CHtml::error($model, 'department_id'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'section_id', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12">
			<?php echo CHtml::activeDropDownList($model, 'section_id', CHtml::listData(MastersSections::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
			<?php echo CHtml::error($model, 'section_id'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'position_id', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12">
			<?php echo CHtml::activeDropDownList($model, 'position_id', CHtml::listData(MastersPositions::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
			<?php echo CHtml::error($model, 'position_id'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'grade_id', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12"> 
			<div class="form-inline">
				<div class="col-md-6">
					<label class="col-md-3 control-label"><?php echo at('Level'); ?></label>
					<div class="col-md-6"><?php echo CHtml::activeTextField($model, 'level_id', array('class' => 'validate[required] form-control')); ?></div>
				</div>
				<div class="col-md-6">
					<label class="col-md-3 control-label"><?php echo at('Grade'); ?></label>
					<div class="col-md-6"><?php echo CHtml::activeTextField($model, 'grade_id', array('class' => 'validate[required] form-control')); ?></div>
				</div>
			</div>
			<?php echo CHtml::error($model, 'grade_id'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'years_of_service_start', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12"> 
			<div class="form-inline">
				<div class="col-md-6">
					<label class="col-md-3 control-label"><?php echo at('Start'); ?></label>
					<div class="col-md-6"><?php echo CHtml::activeTextField($model, 'years_of_service_start', array('class' => 'validate[required] form-control')); ?></div>
				</div>
				<div class="col-md-6">
					<label class="col-md-3 control-label"><?php echo at('End'); ?></label>
					<div class="col-md-6"><?php echo CHtml::activeTextField($model, 'years_of_service_end', array('class' => 'validate[required] form-control')); ?></div>
				</div>
			</div>
			<?php echo CHtml::error($model, 'years_of_service_start'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'basic_salary_from', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12">
			<div class="form-inline">
				<div class="col-md-6">
					<label class="col-md-3 control-label"><?php echo at('From'); ?></label>
					<div class="col-md-9 input-group">
						<span class="input-group-addon">Rp</span>
						<?php echo CHtml::activeTextField($model, 'basic_salary_from', array('maxlength'=>10,'class' => 'validate[required] form-control')); ?>
					</div>
				</div>
				<div class="col-md-6">
					<label class="col-md-3 control-label"><?php echo at('To'); ?></label>
					<div class="col-md-9 input-group">
						<span class="input-group-addon">Rp</span>
						<?php echo CHtml::activeTextField($model, 'basic_salary_to', array('maxlength'=>10,'class' => 'validate[required] form-control')); ?>
					</div>
				</div>
			</div>
			<?php echo CHtml::error($model, 'basic_salary_from'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'basic_salary_inc_amount', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12">
			<?php echo CHtml::activeTextField($model, 'basic_salary_inc_amount', array('class' => 'form-control', 'disabled' => 'disabled')); ?>
			<?php echo CHtml::error($model, 'basic_salary_inc_amount'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model, 'basic_salary_inc_percentage', array('class' => $label_class)); ?>
		<div class="col-md-6 col-xs-12">
			<?php echo CHtml::activeTextField($model, 'basic_salary_inc_percentage', array('class' => 'form-control', 'disabled' => 'disabled')); ?>
			<?php echo CHtml::error($model, 'basic_salary_inc_percentage'); ?>
		</div>
	</div>
</div>