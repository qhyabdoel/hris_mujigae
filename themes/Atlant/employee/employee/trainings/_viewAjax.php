<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('View Employee Language'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				

				<div class="panel-body form-group-separated">
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($training->getAttributeLabel('employee_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($training->employee->getFullname()), array('employees/view', 'id'=>$training->employee_id)); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($training->getAttributeLabel('type_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($training->type->name); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($training->getAttributeLabel('is_internal')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo ReferenceTrainingTypes::model()->viewStatus($training->type_id); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($training->getAttributeLabel('topic')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($training->topic); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($training->getAttributeLabel('trainer_name')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($training->trainer_name); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($training->getAttributeLabel('organizer')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($training->organizer); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($training->getAttributeLabel('training_date')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($training->training_date); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($training->getAttributeLabel('long_trained')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($training->long_trained); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($training->getAttributeLabel('certificate_date')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($training->certificate_date); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($training->getAttributeLabel('certificate_no')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($training->certificate_no); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>