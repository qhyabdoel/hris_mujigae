

<?php $this->widget('DTGridView', array(
	'id' 			=> 'masters-employee-rewards-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider' 	=> MastersEmployeeHistoryRewards::model()->searchByEmployee($model->id),
	'columns' 		=> array(
		array('name'=>'id','header'=>'#','htmlOptions'=>array('style'=>'width:50px;') ),
		array('name'=>'reward_type','header'=>at('Type')),
		array('name'=>'name','header'=>at('Name')),
		array('name'=>'instantion','header'=>at('Instantion')),
		array('name'=>'certificate_date','header'=>at('Cert Date')),		
	),
)); ?>