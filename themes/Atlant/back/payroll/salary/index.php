<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Employee\'s Salaries'); ?></h2>
</div>
<!-- END PAGE TITLE -->
<?php //echo Yii::app()->numberFormatter->formatCurrency('100000', 'IDR'); ?>
<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<?php echo CHtml::link(at('Print Slip'), array('create'), array('class'=>'btn btn-default')); ?>
				<?php echo CHtml::link(at('Generate Current Payment'), array('generate'), array('class'=>'btn btn-primary')); ?>
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>                                
			</div>
			<div class="panel-body">
				<?php $this->widget('CGridView', array(
					'id'=>'payroll-ump-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->search(),
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'employee_id', 'header'=>at('Employee'), 'value'=>'$data->employee->getFullName()'),
						array('name'=>'year', 'header'=>at('Periode'), 'value'=>'$data->year'),
						array('name'=>'basic_salary', 'header'=>at('Basic Salary'), 'value'=>'formatCurrency($data->basic_salary)'),
						array('name'=>'total_allowance', 'header'=>at('Total Allowance'), 'value'=>'formatCurrency($data->total_allowance)'),
						array('name'=>'total_salary', 'header'=>at('Total Salary'), 'value'=>'formatCurrency($data->total_salary)'),
						array(
							'class'=>'CButtonColumn',
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
