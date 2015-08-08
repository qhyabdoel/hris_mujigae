<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('View Employee reward'); ?> - <span class="data-info"><?php echo $reward->name ?></span></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				

				<div class="panel-body form-group-separated">
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($reward->getAttributeLabel('employee_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($reward->employee->getFullname()), array('employees/view', 'id'=>$reward->employee_id)); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($reward->getAttributeLabel('reward_type')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($reward->reward_type); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($reward->getAttributeLabel('name')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($reward->name); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($reward->getAttributeLabel('certificate_no')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($reward->certificate_no); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($reward->getAttributeLabel('certificate_date')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($reward->certificate_date); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($reward->getAttributeLabel('instantion')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($reward->instantion); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>