<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Employee\'s Payments'); ?></h2>
</div>
<!-- END PAGE TITLE -->
<?php //echo Yii::app()->numberFormatter->formatCurrency('100000', 'IDR'); ?>
<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<?php echo CHtml::link(at('Create Current Payment'), array('generate'), array('class'=>'btn btn-primary')); ?>
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
						array('name'=>'year', 'header'=>at('Year'), 'value'=>'$data->year'),
						array('name'=>'month', 'header'=>at('Month'), 'value'=>'$data->month'),
						array('name'=>'payment_type', 'header'=>at('Payment Type')),
						array('name'=>'payment_date', 'header'=>at('Payment Date')),
						array('name'=>'status', 'header'=>at('Total Salary')),
						array('name'=>'created_at', 'header'=>at('Created At')),
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
