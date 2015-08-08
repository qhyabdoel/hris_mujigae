<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-group"></span> <?php echo at('View Shift'); ?> - <span class="data-info"><?php echo $model->name ?></span></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="panel-controls">
						<li><?php echo CHtml::link(at('Back'), createUrl('attendance/shifts'), array('class'=>'btn btn-default')); ?></li>
						<li><?php echo CHtml::link(at('Edit'), createUrl('attendance/shifts/update', array('id'=>$model->id)), array('class'=>'btn btn-default')); ?></li>
					</ul>
				</div>

				<div class="col-md-6 col-xs-12">
				<div class="panel-body form-group-separated">
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id'=>$model->id)); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('short')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->short); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('name')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->name); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('description')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->description); ?></div>
					</div>
				</div>
				</div>
				
				<div class="col-md-6 col-xs-12">
					<div class="panel-body form-group-separated">
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo at('Time Check'); ?></label>
							<div class="col-md-8 col-xs-12">
								<label class="col-xs-2"><?php echo at('IN'); ?>: </label>
								<div class="col-xs-4"><?php echo CHtml::encode($model->time_check_in); ?></div>
								<label class="col-xs-2"><?php echo at('OUT'); ?>: </label>
								<div class="col-xs-4"><?php echo CHtml::encode($model->time_check_out); ?></div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo at('Time Break'); ?></label>
							<div class="col-md-8 col-xs-12">
								<label class="col-xs-2"><?php echo at('OUT'); ?>: </label>
								<div class="col-xs-4"><?php echo CHtml::encode($model->time_break_out); ?></div>
								<label class="col-xs-2"><?php echo at('IN'); ?>: </label>
								<div class="col-xs-4"><?php echo CHtml::encode($model->time_break_in); ?></div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('max_time_check_out')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->max_time_check_out); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>