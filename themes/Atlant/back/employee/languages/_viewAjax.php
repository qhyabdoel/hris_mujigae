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
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($language->getAttributeLabel('employee_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($language->employee->getFullname()), array('employees/view', 'id'=>$language->employee_id)); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($language->getAttributeLabel('language_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($language->language->name); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($language->getAttributeLabel('level')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo MyHelper::viewLangAbility($language->level); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>