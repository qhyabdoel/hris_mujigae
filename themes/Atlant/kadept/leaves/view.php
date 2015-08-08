<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-group"></span> <?php echo at('View Leave Request'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="panel-controls">
						<li><?php echo CHtml::link(at('Back'), createUrl('leaves'), array('class'=>'btn btn-default')); ?></li>
						<?php 
						
						if($model->status == 'draft' && $model->created_by==getUser()->role) 
						{ ?>
							<li><?php echo CHtml::link(at('Edit'), createUrl('leaves/update', array('id'=>$model->id)), array('class'=>'btn btn-primary')); ?></li>
						<?php 
						} ?>
						
						<?php 
						// echo $model->created_by; die();

						if($model->status == 'request' && $model->level_approval==getUser()->role) 
						{ 
						?>
							<li><?php echo CHtml::link(at('Approve'), createUrl('leaves/approve', array('id'=>$model->id, 's'=>1)), array('class'=>'btn btn-primary')); ?></li>
							<li><?php echo CHtml::link(at('Reject'), createUrl('leaves/reject', array('id'=>$model->id)), array('class'=>'btn btn-primary')); ?></li>
						<?php
						} ?>
					</ul>
				</div>

				<div class="panel-body form-group-separated">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id'=>$model->id)); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('employee_id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->employee->getFullName()); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('type_id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->type->name); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('date_start')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->date_start); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('long_leave')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->long_leave); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('reason')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->reason); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->status); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('created_at')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->created_at); ?></div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('approval_by_rm')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->approval_by_rm); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('approval_by_rm_time')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->approval_by_rm_time); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('approval_by_bm')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->approval_by_bm); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('approval_by_bm_time')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->approval_by_bm_time); ?></div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('approval_by_dm')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->approval_by_dm); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('approval_by_dm_time')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->approval_by_dm_time); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('approval_by_hr')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->approval_by_hr); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('approval_by_hr_time')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->approval_by_hr_time); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
