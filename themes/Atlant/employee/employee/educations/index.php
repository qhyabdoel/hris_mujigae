<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-crop"></span> <?php echo at('My Educations'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<?php echo CHtml::link(at('Create'), array('create'), array('class'=>'btn btn-primary')); ?>
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>                                
			</div>
			<div class="panel-body">
				<?php $this->widget('CGridView', array(
					'id'=>'reference-geo-countries-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->searchByEmployee(Yii::app()->user->id),
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'school', 'header'=>at('School')),
						array('name'=>'department', 'header'=>at('Department')),
						array('name'=>'education_id', 'header'=>at('Level'), 'value'=>'$data->education->name'),
						array(
							'class'=>'CButtonColumn',
							'htmlOptions'=>array('style'=>'width: 70px'),
						),
					),
				)); ?>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->
	</div>
</div>

<div class="clear"></div>

<?php /*$this->widget('CGridView', array(
	'id'=>'masters-employee-history-educations-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'employee_id',
		'education_id',
		'school',
		'department',
		'major',
		
		'certificate_year',
		'notes',
		'address_street1',
		'address_street2',
		'address_country_id',
		'address_state_id',
		'address_city_id',
		'address_poscode',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
));*/ ?>
