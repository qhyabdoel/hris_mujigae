<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('View Employee Employement'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				

				<div class="panel-body form-group-separated">
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($employment->getAttributeLabel('employee_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($employment->employee->getFullname()), array('employees/view', 'id'=>$employment->employee_id)); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($employment->getAttributeLabel('company_name')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($employment->company_name); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo at('Address'); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo $employment->viewAddress(); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($employment->getAttributeLabel('position')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($employment->position); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($employment->getAttributeLabel('last_position')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($employment->last_position); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($employment->getAttributeLabel('work_date')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($employment->work_date); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($employment->getAttributeLabel('resign_date')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($employment->resign_date); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($employment->getAttributeLabel('resign_reason')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($employment->resign_reason); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>