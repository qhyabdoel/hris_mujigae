<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-heart"></span> <?php echo at('View Outlet'); ?> - <span class="data-info"><?php echo $model->name ?></span></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="panel-controls">
						<li><?php echo CHtml::link(at('Back'), createUrl('outlets'), array('class'=>'btn btn-default')); ?></li>
						<li><?php echo CHtml::link(at('Edit'), createUrl('outlets/update', array('id'=>$model->id)), array('class'=>'btn btn-primary')); ?></li>
					</ul>
				</div>

				<div class="panel-body form-group-separated">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id'=>$model->id)); ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('code')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->code); ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('name')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->name); ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('rm_id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo $model->rm->getFullName(); ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo at('Total Employee'); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo '<strong>'.$model->employeeCount.'</strong> / '.$model->employee_needed; ?></div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('area_city_id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->areaCity->name); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo at('Address'); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo $model->viewAddress(); ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('phone')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->phone); ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('fax')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->fax); ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('mobile')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->mobile); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3><?php echo at("Outlet's Employees") ?></h3>
				</div>

				<div class="panel-body">
					<?php $this->widget('DTGridView', array(
						'id'=>'masters-employees-grid',
						'itemsCssClass' => 'table datatable',
						'dataProvider'=>MastersEmployees::model()->searchByOutlet($model->id),
						'columns'=>array(
							array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
							array('name'=>'code', 'header'=>at('NIK')),
							array('name'=>'email', 'header'=>at('Email')),
							array('name'=>'firstname', 'header'=>at('Full Name'), 'value'=>'$data->getFullname()'),
							array(
								'name'=>'gender',
								'header'=>at("Gender"),
								'value'=>'MyHelper::viewGender($data->gender)',
							),
							array('name'=>'hiredate', 'header'=>at('Hire Date')),
							array(
								'name'=>'grade', 
								'header'=>at('Grade'),
								'value'=>'$data->level->level.$data->grade->grade',
							),
							array(
								'name'=>'status',
								'header'=>at("Status"),
								'value'=>'$data->viewStatus()',
							),
							array(
								'name'=>'is_active',
								'header'=>at("Is Active"),
								'value'=>'$data->is_active == 1 ? at("Active") : at("Not Active")',
								'filter'=>CHtml::dropDownList('Products[is_active]', $model->is_active,  
									array(
										''=>'',
										'1'=>at('Active'),
										'0'=>at('Not Active'),
									)
								),
							),
							array(
								'class'=>'CButtonColumn',
								'htmlOptions'=>array('style'=>'width: 70px'),
								'template'=>'{view}{update}{delete}{promotion}',
								'buttons'=>array(
									'promotion'=>array(
										'title'=>'Promotion',
										'url'=>'createUrl("employees/promotion", array("id"=>"$data->id"))',
									),
								),
							),
						),
					)); ?>
				</div>
			</div>
		</div>
	</div>
</div>