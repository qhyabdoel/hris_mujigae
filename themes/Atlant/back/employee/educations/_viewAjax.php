<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('View Employee Education'); ?> - <span class="data-info"><?php echo $education->school ?></span></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-body form-group-separated">
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($education->getAttributeLabel('employee_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($education->employee->getFullname()), array('employees/view', 'id'=>$education->employee_id)); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($education->getAttributeLabel('education_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($education->education->name); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($education->getAttributeLabel('school')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($education->school); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($education->getAttributeLabel('department')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($education->department); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($education->getAttributeLabel('major')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($education->major); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($education->getAttributeLabel('certificate_year')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($education->certificate_year); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($education->getAttributeLabel('notes')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($education->notes); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo at('Address'); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo $education->viewAddress(); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>