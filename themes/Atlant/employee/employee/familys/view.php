<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('My Family'); ?> - <span class="data-info"><?php echo $model->name ?></span></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="panel-controls">
						<li><?php echo CHtml::link(at('Back'), createUrl('employee/familys'), array('class'=>'btn btn-default')); ?></li>
						<li><?php echo CHtml::link(at('Edit'), createUrl('employee/familys/update', array('id'=>$model->id)), array('class'=>'btn btn-primary')); ?></li>
					</ul>
				</div>

				<div class="panel-body form-group-separated">
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('status_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->viewStatus()); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('name')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->name); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('gender')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo MyHelper::viewGender($model->gender); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('address_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo $model->viewAddress(); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo at('Birthday'); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo $model->viewBirthday(); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('mobile')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->mobile); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('phone')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->phone); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('education_level')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->education_level); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('job')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo $model->viewJob(); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>