<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Standard Salary'); ?></h2>
</div>
<!-- END PAGE TITLE -->
<?php //echo Yii::app()->numberFormatter->formatCurrency('100000', 'IDR'); ?>
<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<?php echo CHtml::link(at('Create New Standard'), array('create'), array('class'=>'btn btn-primary')); ?>
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>                                
			</div>
			<div class="panel-body">
				<?php $this->widget('CGridView', array(
					'id'=>'payroll-standard-salary-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->search(),
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'year', 'header'=>at('Year')),
						array('name'=>'city_id', 'header'=>at('Area City'), 'value'=>'$data->city->name'),
						array('name'=>'department_id', 'header'=>at('Department'), 'value'=>'$data->department->name'),
						array('name'=>'section_id', 'header'=>at('Section'), 'value'=>'$data->section->name'),
						array('name'=>'position_id', 'header'=>at('Position'), 'value'=>'$data->position->name'),
						array('name'=>'grade', 'header'=>at('Grade'), 'value'=>'$data->viewGrade()'),
						array('name'=>'basic_salary_from', 'header'=>at('Basic Salary'), 'value'=>'formatCurrency($data->basic_salary_from)'),
						array('name'=>'basic_salary_inc_amount', 'header'=>at('Inc Amount'), 'value'=>'formatCurrency($data->basic_salary_inc_amount)'),
						array('name'=>'basic_salary_inc_percentage', 'header'=>at('Inc Percent'), 'value'=>'$data->basic_salary_inc_percentage."%"'),
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