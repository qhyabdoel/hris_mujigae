<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('View Employee MCU'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="panel-controls">
						<li><?php echo CHtml::link(at('Back'), createUrl('employee/mcu'), array('class'=>'btn btn-default')); ?></li>
						<li><?php echo CHtml::link(at('Edit'), createUrl('employee/mcu/update', array('id'=>$model->id)), array('class'=>'btn btn-primary')); ?></li>
					</ul>
				</div>

				<div class="panel-body form-group-separated">
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('employee_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($model->employee->getFullname()), array('employees/view', 'id'=>$model->employee_id)); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('mcu_date')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->mcu_date); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('mcu_place')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->mcu_place); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('mcu_status')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->mcu_status); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('mcu_notes')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->mcu_notes); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('deases')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->deases); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('alergy')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->alergy); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('created_at')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->created_at); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
