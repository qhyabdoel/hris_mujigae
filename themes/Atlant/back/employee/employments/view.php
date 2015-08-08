<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('View Employee Employement'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="panel-controls">
						<li><?php echo CHtml::link(at('Back'), createUrl('employee/employments'), array('class'=>'btn btn-default')); ?></li>
						<li><?php echo CHtml::link(at('Edit'), createUrl('employee/employments/update', array('id'=>$model->id)), array('class'=>'btn btn-primary')); ?></li>
					</ul>
				</div>

				<div class="panel-body form-group-separated">
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('employee_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($model->employee->getFullname()), array('employees/view', 'id'=>$model->employee_id)); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('company_name')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->company_name); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo at('Address'); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo $model->viewAddress(); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('position')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->position); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('last_position')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->last_position); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('work_date')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->work_date); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('resign_date')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->resign_date); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('resign_reason')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->resign_reason); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>