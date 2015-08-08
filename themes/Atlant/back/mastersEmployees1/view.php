<?php
/* @var $this MastersEmployees1Controller */
/* @var $model MastersEmployees */

$this->breadcrumbs=array(
	'Masters Employees'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List MastersEmployees', 'url'=>array('index')),
	array('label'=>'Create MastersEmployees', 'url'=>array('create')),
	array('label'=>'Update MastersEmployees', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MastersEmployees', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MastersEmployees', 'url'=>array('admin')),
);
?>

<h1>View MastersEmployees #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type_id',
		'code',
		'email',
		'title',
		'firstname',
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
	),
)); ?>
