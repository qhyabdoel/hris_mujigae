<?php 
// echo "string"; die(); 
?>

<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('View Employee'); ?> - <span class="data-info"><?php echo $model->getFullname() ?></span></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="panel-controls">
						<li>
							<?php /*echo CHtml::link(at('Edit'), createUrl('employees#model_id#edit#'.$model->id), array('class'=>'btn btn-primary'));*/  
							// echo CHtml::link(at('Edit'), createUrl('employees/update', array('id'=>$model->id)), array('class'=>'btn btn-primary')); ?>
						</li>
					</ul>
				</div>

				<div class="panel-body">
					<div class="col-md-6 form-group-separated">
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo at('NIK'); ?></label>
							<div class="col-md-6 col-xs-12">
								<?php echo CHtml::encode($model->code); ?> 
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->email); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo at('Full Name'); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo $model->getFullname(); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('gender')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->getGender()); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('religion_id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo $model->religion->name; ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo at('Birthday'); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->birthdate); ?></div>
						</div>
					</div>

					<div class="col-md-6 form-group-separated">
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('ethnic_id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo $model->ethnic->name; ?></div>
						</div>

						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('married_status')); ?></label>
							<div class="col-md-6 col-xs-12">
								<?php echo $model->married_status; ?>
								<?php if(!in_array($model->married_date, array('0000-00-00', null, ''))) echo ' ( '.at('Date').': '.$model->married_date.' )'; ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('child_amount')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo $model->child_amount; ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('hiredate')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo $model->hiredate; ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo $model->status; ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('is_active')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo $model->is_active; ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<br/>
<div class="row">
	<div class="col-md-12">
		<?php
		$this->widget('zii.widgets.jui.CJuiTabs',array(
			'tabs'=>array(
				at('Addresses') 	=> array('content'=>$this->renderPartial('view/addresses', array('model'=>$model, 'isform'=>false), true)),
				at('Familys') 		=> array('content'=>$this->renderPartial('view/familys', array('model'=>$model, 'isform'=>false), true)),
				at('Educations') 	=> array('content'=>$this->renderPartial('view/educations', array('model'=>$model, 'isform'=>false), true)),
				at('Employments') 	=> array('content'=>$this->renderPartial('view/employments', array('model'=>$model, 'isform'=>false), true)),
				at('Rewards') 		=> array('content'=>$this->renderPartial('view/rewards', array('model'=>$model, 'isform'=>false), true)),
				at('Trainings') 	=> array('content'=>$this->renderPartial('view/trainings', array('model'=>$model, 'isform'=>false), true)),
				at('Languages') 	=> array('content'=>$this->renderPartial('view/languages', array('model'=>$model, 'isform'=>false), true)),				
			),
			'options'=>array(
				'collapsible'=>false,
			),
			'id'=>'Tabs-Employee-Info',
		));
		?>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelModal" tabindex="-1" role="dialog" aria-labelledby="modelModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modelModalLabel">Employee</h4>
      </div>
      <div class="modal-body" id="modelModalBody">
      <!-- tampilan dari ajax -->
      </div>
    </div>
  </div>
</div>