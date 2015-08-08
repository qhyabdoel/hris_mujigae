<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('My Language'); ?> - <span class="data-info"><?php echo $model->id ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="panel-controls">
						<li><?php echo CHtml::link(at('Back'), createUrl('employee/languages'), array('class'=>'btn btn-default')); ?></li>
						<li><?php echo CHtml::link(at('Edit'), createUrl('employee/languages/update', array('id'=>$model->id)), array('class'=>'btn btn-primary')); ?></li>
					</ul>
				</div>

				<div class="panel-body form-group-separated">
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('language_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->language->name); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('level')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo MyHelper::viewLangAbility($model->level); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>