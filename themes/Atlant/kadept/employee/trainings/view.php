<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('View Employee Language'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="panel-controls">
						<li><?php echo CHtml::link(at('Back'), createUrl('employee/trainings'), array('class'=>'btn btn-default')); ?></li>
						<li><?php echo CHtml::link(at('Edit'), createUrl('employee/trainings/update', array('id'=>$model->id)), array('class'=>'btn btn-primary')); ?></li>
					</ul>
				</div>

				<div class="panel-body form-group-separated">
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('employee_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($model->employee->getFullname()), array('employees/view', 'id'=>$model->employee_id)); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('type_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->type->name); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('is_internal')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo ReferenceTrainingTypes::model()->viewStatus($model->type_id); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('topic')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->topic); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('trainer_name')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->trainer_name); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('organizer')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->organizer); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('training_date')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->training_date); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('long_trained')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->long_trained); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('certificate_date')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->certificate_date); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('certificate_no')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->certificate_no); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>