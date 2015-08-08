<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('View Allowance'); ?> - <span class="data-info"><?php echo $model->name ?></span></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="panel-controls">
						<li><?php echo CHtml::link(at('Back'), createUrl('allowances'), array('class'=>'btn btn-default')); ?></li>
						<li><?php echo CHtml::link(at('Edit'), createUrl('allowances/update', array('id'=>$model->id)), array('class'=>'btn btn-default')); ?></li>
					</ul>
				</div>

				<div class="panel-body form-group-separated">
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id'=>$model->id)); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('group_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->group->name); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('name')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->name); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('calc_type')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->calc_type); ?></div>
					</div>

					<?php /*<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('formula')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->formula); ?></div>
					</div>*/?>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('sort_order')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->sort_order); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>