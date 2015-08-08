<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-crop"></span> <?php echo at('Employee Training Histories'); ?></h2>
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
					'id'=>'reference-geo-countries-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->search(),
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'employee_id', 'header'=>at('Employee'), 'value'=>'$data->employee->getFullname()'),
						array('name'=>'type_id', 'header'=>at('Type'), 'value'=>'$data->type->name'),
						array('name'=>'topic', 'header'=>at('Topic')),
						array('name'=>'long_trained', 'header'=>at('Long')),
						array('name'=>'is_internal', 'header'=>at('Status')),
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