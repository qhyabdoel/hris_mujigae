<?php
/* @var $this MastersEmployees1Controller */
/* @var $model MastersEmployees */

$this->breadcrumbs=array(
	'Masters Employees'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MastersEmployees', 'url'=>array('index')),
	array('label'=>'Create MastersEmployees', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#masters-employees-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Masters Employees</h1>

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
	'id'=>'masters-employees-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'type_id',
		'code',
		'email',
		'title',
		'firstname',
		/*
		'lastname',
		'nickname',
		'gender',
		'religion_id',
		'ethnic_id',
		'birthplace_country_id',
		'birthplace_state_id',
		'birthplace_city_id',
		'birthplace_district_id',
		'poscode',
		'birthdate',
		'married_status',
		'married_date',
		'child_amount',
		'weight',
		'height',
		'identity_type_id',
		'identity_number',
		'hiredate',
		'status',
		'is_active',
		'department_id',
		'section_id',
		'outlet_id',
		'position_id',
		'level_id',
		'grade_id',
		'resident_status',
		'contract_periode_start',
		'contract_periode_end',
		'bank_name',
		'bank_account_no',
		'bank_account_name',
		'bank_address',
		'salary_id',
		'city_area_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
