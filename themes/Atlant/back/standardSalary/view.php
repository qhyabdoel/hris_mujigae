<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('View Standard Payroll'); ?> - <span class="data-info"><?php echo $model->id ?></span></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="panel-controls">
						<li><?php echo CHtml::link(at('Back'), createUrl('standardsalary'), array('class'=>'btn btn-default')); ?></li>
						<li><?php echo CHtml::link(at('Edit'), createUrl('standardsalary/update', array('id'=>$model->id)), array('class'=>'btn btn-default')); ?></li>
					</ul>
				</div>

				<div class="col-md-6">
					<div class="panel-body form-group-separated">
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id'=>$model->id)); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('year')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->year); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('city_id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->city->name); ?></div>
						</div>

						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo at('Length of Work'); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo $model->getLengthOfWork(); ?></div>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="panel-body form-group-separated">
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('department_id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->department->name); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('section_id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->section->name); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('position_id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->position->name); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo at('Grade'); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo $model->viewGrade(); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3><?php echo at('Salary') ?></h3>
				</div>
				
				<div class="panel-body form-group-separated">
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('basic_salary_from')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo formatCurrency($model->basic_salary_from); ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('basic_salary_to')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo formatCurrency($model->basic_salary_to); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('basic_salary_inc_amount')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo formatCurrency($model->basic_salary_inc_amount); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('basic_salary_inc_percentage')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo $model->basic_salary_inc_percentage; ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3><?php echo at('Allowances') ?></h3>
				</div>
				
				<div class="col-md-12">
					<div class="panel-body form-group-separated">
						<?php $allowances = $model->payrollBasedAllowances; ?>
						<?php foreach($allowances as $allowance) { ?>
							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($allowance->allowance->name); ?></label>
								<div class="col-md-6 col-xs-12">
									<?php echo formatCurrency($allowance->values); ?>
									<?php if($allowance->calc_type == 'daily') {
										echo "<span class='label_info'> /".at("day")."</span>";
									} ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
