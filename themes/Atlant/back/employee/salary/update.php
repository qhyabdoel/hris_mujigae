<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Update Employee Salary'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<?php
$label_class = 'col-md-3 col-xs-12 control-label';
$form_name = 'EmployeeSalary';
?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			</div>

			<div class="panel-body">
				<?php if(count($model->employeeSalary) == 0) { echo at('Salary not set yet'); } else { $salary = $model->employeeSalary; ?>
				<div class="form-group">
					<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($salary->getAttributeLabel('basic_salary')); ?></label>
					<div class="col-md-6 col-xs-12 input-group">
						<span class="input-group-addon">Rp</span>
						<?php echo CHtml::textField($form_name.'[basicsalary]', $salary->basic_salary, array('maxlength'=>10,'class' => 'validate[required] form-control')); ?>
					</div>
				</div>
				
				<?php 
				$allowances = $salary->allowances;
				foreach($allowances as $allowance) { ?>
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($allowance->allowance->name); ?></label>
						<div class="col-md-6 col-xs-12 input-group">
							<span class="input-group-addon">Rp</span>
							<?php echo CHtml::textField($form_name.'[allowances]['.$allowance->id.']', $allowance->values, array('maxlength'=>10,'class' => 'validate[required] form-control')); ?>
						</div>
					</div>
				<?php } ?>
			
			<?php } ?>
			</div>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary pull-right')); ?>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>