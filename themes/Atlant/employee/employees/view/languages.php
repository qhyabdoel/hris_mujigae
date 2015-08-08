

<?php $this->widget('DTGridView', array(
	'id'=>'masters-employee-languages-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider'=>MastersEmployeeLanguages::model()->searchByEmployee($model->id),
	'columns'=>array(
		array('name'=>'id','header'=>'#','htmlOptions'=>array( 'style' => 'width:50px;')),
		array('name'=>'language_id','header'=>at('Language'),'value'=>'$data->language->short'),
		array('name'=>'level','header'=>at('Level')),		
	),
)); ?>

