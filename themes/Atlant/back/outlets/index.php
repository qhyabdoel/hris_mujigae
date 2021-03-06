<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-crop"></span> <?php echo at('Outlets'); ?></h2>
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
				<?php $this->widget('DTGridView', array(
					'id'=>'masters-outlets-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->search(),
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'code', 'header'=>at('Code')),
						array('name'=>'name', 'header'=>at('Name')),
						array('name'=>'area_city_id', 'header'=>at('Area'), 'value'=>'$data->areaCity->name'),
						array('name'=>'phone', 'header'=>at('Phone')),
						array('name'=>'rm_id', 'header'=>at('RM'), 'value'=>'$data->viewRmName()'),
						array('name'=>'employee_needed', 'header'=>at('Emp. Needed')),
						array('name'=>'employee_needed', 'header'=>at('Cur. Employee'), 'value'=>'$data->employeeCount'),
						array('name'=>'is_active', 'header'=>at('Status')),
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