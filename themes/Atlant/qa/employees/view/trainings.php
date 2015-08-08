

<?php $this->widget('DTGridView', array(
	'id' 			=>'masters-employee-trainings-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider' 	=>MastersEmployeeHistoryTrainings::model()->searchByEmployee($model->id),
	'columns' 		=>array(
		array('name'=>'id','header'=>'#','htmlOptions'=>array('style'=>'width:50px;')),
		array('name'=>'topic','header'=>at('Topic')),
		array('name'=>'certificate_date','header'=>at('Cert Date')),		
	),
)); ?>