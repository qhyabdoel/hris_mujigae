<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('My Salary'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel-heading">
				<h3><?php echo at('Current Salary'); ?></h3>                            
			</div>
			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-body form-group-separated">
					<?php if(count($employee->employeeSalary) == 0) { echo at('Salary not set yet'); } else { $salary = $employee->employeeSalary; ?>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($salary->getAttributeLabel('basic_salary')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo formatCurrency($salary->basic_salary); ?></div>
						</div>
						
						<?php 
						$allowances = $salary->allowances;
						foreach($allowances as $allowance) { ?>
							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($allowance->allowance->name); ?></label>
								<div class="col-md-6 col-xs-12"><?php echo formatCurrency($allowance->values); ?></div>
							</div>
						<?php } ?>
					
					<?php } ?>
				</div>
			</div>
			<!-- END DEFAULT DATATABLE -->
		</div>
	</div>
</div>

<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 style="float:left;"><?php echo at('Salary Histories'); ?></h3>
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
					<li><?php echo CHtml::link(at('Print Slip'), array('create'), array('class'=>'btn btn-primary')); ?></li>
				</ul>                                
			</div>
			<div class="panel-body">
				<?php $this->widget('CGridView', array(
					'id'=>'payroll-ump-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->searchByEmployee(),
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'employee_id', 'header'=>at('Employee'), 'value'=>'$data->employee->getFullName()'),
						array('name'=>'year', 'header'=>at('Periode'), 'value'=>'$data->year'),
						array('name'=>'basic_salary', 'header'=>at('Basic Salary'), 'value'=>'formatCurrency($data->basic_salary)'),
						array('name'=>'total_allowance', 'header'=>at('Total Allowance'), 'value'=>'formatCurrency($data->total_allowance)'),
						array('name'=>'total_salary', 'header'=>at('Total Salary'), 'value'=>'formatCurrency($data->total_salary)'),
						array(
							'class'=>'CButtonColumn',
							'template'=>'{view}',
							'htmlOptions'=>array('style'=>'width: 70px'),
						),
					),
				)); ?>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->
	</div>
</div>

<div class="clear"></div>
