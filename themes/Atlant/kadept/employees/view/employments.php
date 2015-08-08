

<?php $this->widget('DTGridView', array(
	'id'=>'masters-employee-employments-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider'=>MastersEmployeeHistoryEmployments::model()->searchByEmployee($model->id),
	'enableSorting'=>false,
	'columns'=>array(
		array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
		array('name'=>'company_name', 'header'=>at('Company')),
		array('name'=>'position', 'header'=>at('Position')),
		array('name'=>'last_position', 'header'=>at('Last Position')),
		array('name'=>'resign_reason', 'header'=>at('Reason')),		
	),
)); ?>