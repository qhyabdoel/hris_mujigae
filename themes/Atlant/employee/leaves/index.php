<?php /*echo getUser()->role;*/ ?>
<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-heart"></span> <?php echo at('Leaves'); ?></h2>
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
					'id'=>'reference-religions-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->search(),
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'employee_id', 'header'=>at('Employee'), 'value'=>'$data->employee->getFullname()'),
						array('name'=>'type_id', 'header'=>at('Type'), 'value'=>'$data->viewType()'),
						array('name'=>'date_start', 'header'=>at('Date Start')),
						array('name'=>'date_end', 'header'=>at('Date End')),
						array('name'=>'long_leave', 'header'=>at('Long')),
						array('name'=>'approval_by_rm', 'header'=>at('Appv RM')),
						array('name'=>'approval_by_bm', 'header'=>at('Appv BM')),
						array('name'=>'approval_by_dm', 'header'=>at('Appv DM')),
						array('name'=>'approval_by_hr', 'header'=>at('Appv HR')),
						array('name'=>'status', 'header'=>at('Status')),
						array(
							'class' 		=> 'CButtonColumn',
							'template' 		=> '{view}{update}',
							'htmlOptions' 	=> array('style'=>'width: 70px'),
							'buttons' 		=> array(								
							'update' 	 	=> array('visible'=>'$data->status=="draft" and $data->created_by==getUser()->role')
							),
						),
					),
				)); ?>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->
	</div>
</div>

<div class="clear"></div>
