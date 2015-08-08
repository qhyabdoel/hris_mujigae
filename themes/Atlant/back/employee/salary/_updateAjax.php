<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Update Employee Salary'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<?php

// print_r($salary->salary->salary);

$label_class 	= 'col-md-3 col-xs-12 control-label';
$form_name 		= 'salary->salary';

?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			</div>

			<div class="panel-body">
				<?php 

				$employee = $salary;
				
				if(count($employee->salary->salary) == 0) { 
					echo at('Salary not set yet'); 
				} 
				else { 
					$salary = $employee->salary->salary; 
				
				?>
				
				<div class="form-group form-inline">
					<label class="col-md-2 col-xs-12 control-label"><?php echo CHtml::encode('Salary'); ?></label>
					<div class="col-md-3 col-xs-12 input-group">
						<span class="input-group-addon">Rp</span>
						<?php 
						
						echo CHtml::textField(
							$form_name.'[basicsalary]', 
							$salary->basic_salary_from, 
							
							array(
								'readOnly' 	=> true,
								'maxlength' => 10,
								'class' 	=> 'validate[required] form-control',
								'id' 		=> 'field_basicsalary'
						)); 
						
						?>
					</div>
					+
					<div class="col-md-3 col-xs-12 input-group">
						<span class="input-group-addon">Rp</span>
						<?php 
						
						echo CHtml::textField(
							$form_name.'[salaryincrease]', 
							$employee->salaryincrease, 
							
							array(
								'maxlength' => 10,
								'class' 	=> 'validate[required] form-control',
								'id' 		=> 'field_salaryincrease'
						)); 
						
						?>
					</div>
					=
					<div class="col-md-3 col-xs-12 input-group">
						<span class="input-group-addon">Rp</span>
						<?php 
						
						echo CHtml::textField(
							$form_name.'[total_salary]', 
							$employee->salaryincrease+$salary->basic_salary_from, 
							
							array(
								'readOnly' 	=> true,
								'maxlength' => 10,
								'class' 	=> 'validate[required] form-control',
								'id' 		=> 'field_salaryincrease'
						)); 
						
						?>
					</div>
				</div>				

				<?php 
				$allowances 		= $salary->allowances;
				$allowance_count 	= 0;

				// print_r($salary);die();

				foreach($allowances as $allowance) { 
					$allowance_count++;?>
					
					<div class="form-group form-inline">
						<label class="col-md-2 col-xs-12 control-label"><?php echo CHtml::encode($allowance->allowance->name); ?></label>
						
						<div class="col-md-3 col-xs-12 input-group">
							<span class="input-group-addon">Rp</span>
							
							<?php echo CHtml::textField($form_name.'[allowances]['.$allowance->id.']', $allowance->basic, array(
								'readOnly' 	=> true,
								'maxlength' => 10,
								'class' 	=> 'validate[required] form-control',
								'id' 		=> 'allowance_'.$allowance_count
							)); ?>
							
							<input value="<?php echo $allowance->id; ?>" id="allowance_id_<?php echo $allowance_count; ?>" hidden>
						</div>
						+
						<div class="col-md-3 col-xs-12 input-group">
							<span class="input-group-addon">Rp</span>
							
							<?php echo CHtml::textField(
								$form_name.'[allowanceincreases]['.$allowance->id.']', 
								$allowance->values, 

								array(
									'maxlength' => 10,
									'class' 	=> 'validate[required] form-control',
									'id' 		=> 'allowanceincrease_'.$allowance_count
							)); ?>
							
							<input value="<?php echo $allowance->id; ?>" id="allowance_id_<?php echo $allowance_count; ?>" hidden>
						</div>
						=
						<div class="col-md-3 col-xs-12 input-group">
							<span class="input-group-addon">Rp</span>
							
							<?php echo CHtml::textField(
								$form_name.'[total_allowances]['.$allowance->id.']', 
								$allowance->basic+$allowance->values, 

								array(
									'readOnly' 	=> true,
									'maxlength' => 10,
									'class' 	=> 'validate[required] form-control',
									'id' 		=> 'allowance_'.$allowance_count
							)); ?>
							
							<input value="<?php echo $allowance->id; ?>" id="allowance_id_<?php echo $allowance_count; ?>" hidden>
						</div>
					</div>
				<?php } ?>
			
				<?php 
				
				} 				
				
				?>
			</div>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>
				<a href="#" class="btn btn-primary pull-right" id="btnSubmitSalary"><?php echo $salary->isNewRecord ? 'Create' : 'Save'; ?></a>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<script>

$('#btnSubmitSalary').click(function () {
	var id 					= '<?php echo $salary->id; ?>';
	var employee_id 		= '<?php echo $employee->id; ?>';
	var basicsalary 		= $('#field_basicsalary').val();
	var salaryincrease 		= $('#field_salaryincrease').val();
	var allowance_count 	= '<?php echo $allowance_count; ?>';
	var allowances 			= [];	

	for (var i = 1; i <= allowance_count ; i++) {		
		allowances[$('#allowance_id_'+i).val()] = $('#allowanceincrease_'+i).val();
	};	

	$.post(
		'<?php echo Yii::app()->createUrl("employee/salary/ajaxupdate&id="); ?>'+id,
		{
			id 					: id,
			employee_id 		: employee_id,
			basicsalary 		: basicsalary,
			salaryincrease 		: salaryincrease,
			allowances 			: allowances,			
		},
		function (data,status) {
			// alert(data);

			href = window.location.href;
			href = href.split('#');	
			href = href[0];

			if(href.indexOf('&tab') != -1){
				href = href.split('&tab');
				href = href[0];
			}			
	
			window.location.href = href+'&tab=7';
		}
	);
});

</script>