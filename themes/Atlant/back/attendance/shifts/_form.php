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
					<?php echo CHtml::activeLabelEx($model, 'short', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'short', array('class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'short'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'name', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'name', array('class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'name'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'time_check_in', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group bootstrap-timepicker">
							<?php echo CHtml::activeTextField($model, 'time_check_in', array('class' => 'validate[required] form-control timepicker24')); ?>
							<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
						</div>
						<?php echo CHtml::error($model, 'time_check_in'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'time_check_out', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group bootstrap-timepicker">
							<?php echo CHtml::activeTextField($model, 'time_check_out', array('class' => 'validate[required] form-control timepicker24')); ?>
							<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
						</div>
						<?php echo CHtml::error($model, 'time_check_out'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'time_break_out', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group bootstrap-timepicker">
							<?php echo CHtml::activeTextField($model, 'time_break_out', array('class' => 'validate[required] form-control timepicker24')); ?>
							<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
						</div>
						<?php echo CHtml::error($model, 'time_break_out'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'time_break_in', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group bootstrap-timepicker">
							<?php echo CHtml::activeTextField($model, 'time_break_in', array('class' => 'validate[required] form-control timepicker24')); ?>
							<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
						</div>
						<?php echo CHtml::error($model, 'time_break_in'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'max_time_check_out', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group bootstrap-timepicker">
							<?php echo CHtml::activeTextField($model, 'max_time_check_out', array('class' => 'validate[required] form-control timepicker24')); ?>
							<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
						</div>
						<?php echo CHtml::error($model, 'max_time_check_out'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'description', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextArea($model, 'description', array('class' => 'form-control')); ?>
						<?php echo CHtml::error($model, 'description'); ?>
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