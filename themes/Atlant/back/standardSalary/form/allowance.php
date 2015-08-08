<?php $allowances = $model->payrollBasedAllowances; ?>

<div class="custom-panel-heading">
<?php echo CHtml::link(at('Add Allowance'), array('create'), array('class'=>'btn btn-primary', 'id'=>'new-allowance')); ?>
</div>

<?php $this->widget('CGridView', array(
		'id'=>'payroll-based-allowances-grid',
		'itemsCssClass' => 'table datatable',
		'dataProvider'=>PayrollBasedAllowances::model()->searchAllowances($model->id),
		'columns'=>array(
			array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
			array('name'=>'allowance_id', 'header'=>at('Allowance'), 'value'=>'$data->allowance->name'),
			array('name'=>'calc_type', 'header'=>at('Type')),
			array('name'=>'formula', 'header'=>at('Formula')),
			array('name'=>'values', 'header'=>at('Values'), 'value'=>'formatCurrency($data->values)'),
			array(
				'class'=>'CButtonColumn',
				'htmlOptions'=>array('style'=>'width: 70px'),
			),
		),
	)); ?>