<?php 

$isform = isset($isform) ? $isform : false; 
$url 	= Yii::app()->createUrl('employee/addresses/create'.'&id='.$model->id);

?>

<?php $this->widget('DTGridView', array(
	'id' 			=>'masters-employee-familys-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider' 	=> MastersEmployeeAddresses::model()->searchByEmployee($model->id),
	
	'columns' => array(
		array('name'=>'id','header'=>'#','htmlOptions'=>array('style'=>'width:50px;') ),
		array('name'=>'label','header'=> at('Label')),
		array('name'=>'street1','header'=> at('Street1')),
		array('name'=>'street2','header'=> at('Street2')),
		array('name'=>'geography','header'=> at('Geography'), 'value'=>'$data->getGeography()'),
		array('name'=>'poscode','header'=> at('Poscode'), 'htmlOptions'=>array('style'=>'width:100px;'),),
		array('name'=>'phone','header'=> at('Phone')),		
	),
)); ?>