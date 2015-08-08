<?php $urlCreate = Yii::app()->createUrl('employee/familys/create'); ?>

<?php $this->widget('DTGridView', array(
	'id'=>'masters-employee-familys-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider'=>MastersEmployeeFamilys::model()->searchByEmployee($model->id),
	'columns'=>array(
		array('name'=>'id','header'=>'#','htmlOptions'=>array('style'=>'width:50px;') ),
		array('name'=>'status_id','header'=>at('Status'),'value'=>'$data->viewStatus()'),
		array('name'=>'name','header'=>at('Name')),
		array('name'=>'gender','header'=>at('Gender'),'value'=>'MyHelper::viewGender($data->gender)',),
		array('name'=>'education_level','header'=>at('Education')),
		array('name'=>'job_position','header'=>at('Job')),		
	),
)); ?>

