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
					<?php echo CHtml::activeLabelEx($model, 'type_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeDropDownList($model, 'type_id', CHtml::listData(ReferenceTrainingTypes::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'type_id'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'is_internal', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeRadioButtonList($model, 'is_internal', ReferenceTrainingTypes::model()->getStatus(), array('class' => 'validate[required] form-control iradio', 'separator'=>' &nbsp; &nbsp; &nbsp; &nbsp; ')); ?>
						<?php echo CHtml::error($model, 'is_internal'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'topic', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($model, 'topic', array('maxlength'=>255,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'topic'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'trainer_name', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($model, 'trainer_name', array('maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'trainer_name'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'organizer', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($model, 'organizer', array('maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'organizer'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'training_date', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField($model, 'training_date', array('class' => 'validate[required] form-control datepicker',  'data-date-format' => 'dd-mm-yyyy')); ?>
						</div>
						<?php echo CHtml::error($model, 'training_date'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'long_trained', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($model, 'long_trained', array('class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'long_trained'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'certificate_date', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField($model, 'certificate_date', array('class' => 'validate[required] form-control datepicker',  'data-date-format' => 'dd-mm-yyyy')); ?>
						</div>
						<?php echo CHtml::error($model, 'certificate_date'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'certificate_no', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($model, 'certificate_no', array('maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'certificate_no'); ?>
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