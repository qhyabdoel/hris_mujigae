<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('View Employee Address'); ?> - <span class="data-info"><?php echo $address->label ?></span></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-body form-group-separated">
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($address->getAttributeLabel('employee_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($address->employee->getFullname()), array('employees/view', 'id'=>$address->employee_id)); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($address->getAttributeLabel('label')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($address->label); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo at('Address'); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo $address->viewAddress(); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($address->getAttributeLabel('phone')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($address->phone); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>