<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-group"></span> <?php echo at('Attendances Off'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<?php echo CHtml::link(at('Create'), array('create'), array('class'=>'btn btn-default')); ?>

				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>                                
			</div>
			<div class="panel-body">
				<?php 

				$this->widget('CGridView', array(
					'id' 			=> 'reference-geo-countries-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider' 	=> $model->search(),
					
					'columns' => array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'date', 'header'=>at('Date')),
						array('name'=>'employee_id', 'header'=>at('Employee'), 'value'=>'$data->employee->getFullname()'),
						array('name'=>'shift_id', 'header'=>at('Shift'), 'value'=>'$data->shift->name'),
						array('name'=>'location_id', 'header'=>at('Location'), 'value'=>'$data->location->name'),						
					
						array(
							'class' 		=> 'CButtonColumn',
							'template' 		=> '{view} {update}',
							'htmlOptions' 	=> array('style'=>'width: 50px'),

							'buttons' => array(								
								'update' => array('visible'=>'$data->status=="draft"')
							),
						),
					),
				)); 

				?>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->
	</div>
</div>

<div class="clear"></div>
