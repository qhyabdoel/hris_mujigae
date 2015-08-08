<?php
/* @var $this McuController */
/* @var $model MastersEmployeeMcu */

$this->breadcrumbs=array(
	'Masters Employee Mcus'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MastersEmployeeMcu', 'url'=>array('index')),
	array('label'=>'Create MastersEmployeeMcu', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#masters-employee-mcu-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Masters Employee Mcus</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'masters-employee-mcu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'employee_id',
		'mcu_date',
		'mcu_place',
		'mcu_status',
		'mcu_notes',
		/*
		'deases',
		'alergy',
		'created_at',
		'created_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
