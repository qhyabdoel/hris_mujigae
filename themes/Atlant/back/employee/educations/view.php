<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('View Employee Education'); ?> - <span class="data-info"><?php echo $model->school ?></span></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="panel-controls">
						<li><?php echo CHtml::link(at('Back'), createUrl('employee/educations'), array('class'=>'btn btn-default')); ?></li>
						<li><?php echo CHtml::link(at('Edit'), createUrl('employee/educations/update', array('id'=>$model->id)), array('class'=>'btn btn-primary')); ?></li>
					</ul>
				</div>

				<div class="panel-body form-group-separated">
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('employee_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($model->employee->getFullname()), array('employees/view', 'id'=>$model->employee_id)); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('education_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->education->name); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('school')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->school); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('department')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->department); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('major')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->major); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('certificate_year')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->certificate_year); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('notes')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->notes); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo at('Address'); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo $model->viewAddress(); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>