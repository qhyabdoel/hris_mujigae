<?php
/* @var $this MastersEmployees1Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Masters Employees',
);

$this->menu=array(
	array('label'=>'Create MastersEmployees', 'url'=>array('create')),
	array('label'=>'Manage MastersEmployees', 'url'=>array('admin')),
);
?>

<h1>Masters Employees</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
