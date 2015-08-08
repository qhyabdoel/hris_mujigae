<?php $this->widget('CGridView', array(
	'id' 			=> 'masters-employee-educations-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider' 	=> MastersEmployeeHistoryEducations::model()->searchByEmployee($model->id),
	'columns' 		=> array(
		array('name'=>'id','header'=>'#','htmlOptions'=>array('style'=>'width:50px;')),
		array('name'=>'education_id','header'=>at('Level'),'value'=>'$data->education->short'),
		array('name'=>'school','header'=>at('School')),
		array('name'=>'department','header'=>at('Department')),
		array('name'=>'certificate_year','header'=>at('Cert Year')),		
	),
)); ?>