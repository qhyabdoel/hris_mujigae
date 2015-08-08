<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-group"></span> <?php echo at('View Berita Acara'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="panel-controls">
						<li>
							<?php
							$url = '';
							if($model->status=='draft' or $model->created_by!='employee') $url = 'attendances/beritaacara&id='.$model->attendance_id;
							echo CHtml::link(at('Back'), createUrl($url), array('class'=>'btn btn-default')); 
							?>
						</li>
						<?php if($model->status=='saved'){
						?>
							<li>
								<?php

								if($model->created_by=='employee' and $model->approved_by != 'rm' and $model->approved_by != 'kadept'){
									echo CHtml::link(at('Approve'), createUrl('attendances/beritaacara_approve', array(
										'id'=>$model->id)), array('class'=>'btn btn-primary','id'=>'Approve'
									));
								} 

								?>
							</li>	

							<li>
								<?php

								if($model->created_by=='employee' and $model->approved_by != 'rm' and $model->approved_by != 'kadept'){
									echo CHtml::link(at('Reject'), createUrl('attendances/beritaacara_reject', array(
										'id'=>$model->id)), array('class'=>'btn btn-primary','id'=>'Reject'
									));
								} 

								?>
							</li>						
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
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('date')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->date); ?></div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('shift_id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php if(isset($model->shift)) echo CHtml::encode($model->shift->name); ?></div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('check_in')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->check_in); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('check_out')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->check_out); ?></div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('break_out')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->break_out); ?></div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('break_in')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->break_in); ?></div>
						</div>						

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->status); ?></div>
						</div>					
					</div>
		
				</div>
			</div>
		</div>
	</div>
</div>

<script>

</script>