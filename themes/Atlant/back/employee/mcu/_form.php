<?php
$label_class = 'col-md-3 col-xs-12 control-label';
$form_name = 'MastersEmployeeMCU';
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
					<?php echo CHtml::activeLabelEx($model, 'mcu_date', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField($model, 'mcu_date', array('class' => 'validate[required] form-control datepicker',  'data-date-format' => 'dd-mm-yyyy')); ?>
						</div>
						<?php echo CHtml::error($model, 'mcu_date'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'mcu_place', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
							<?php echo CHtml::activeTextField($model, 'mcu_place', array('size'=>50,'maxlength'=>50,'class' => 'validate[required] form-control')); ?>
						</div>
						<?php echo CHtml::error($model, 'mcu_place'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'mcu_notes', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextArea($model, 'mcu_notes', array('size'=>50,'maxlength'=>50,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'mcu_notes'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'deases', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextArea($model, 'deases', array('size'=>50,'maxlength'=>50,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'deases'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'alergy', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextArea($model, 'alergy', array('size'=>50,'maxlength'=>50,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'alergy'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'mcu_status', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeRadioButtonList($model, 'mcu_status', MastersEmployeeMcu::model()->getStatuses(), array('class' => 'validate[required] form-control iradio', 'separator'=>' &nbsp; &nbsp; &nbsp; &nbsp; ')); ?>
						<?php echo CHtml::error($model, 'mcu_status'); ?>
					</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<?php 
				if($model->employee->type_id == 3)
					echo CHtml::submitButton('Appointment', array('name'=>'appointment', 'class'=>'btn btn-warning pull-right', 'style'=>'margin-left: 20px;'));
				?>
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary pull-right')); ?>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<?php $this->renderPartial('/ajax/sm-choose-dialog'); ?>