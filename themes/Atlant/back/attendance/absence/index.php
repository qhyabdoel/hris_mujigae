<?php /*die();*/ ?><!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-heart"></span> <?php echo at('Absences'); ?></h2>
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
					'id' 			=> 'reference-religions-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider' 	=> $model->searchNotDeleted(),
					
					'columns' => array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'employee_id', 'header'=>at('Employee'), 'value'=>'$data->employee->getFullname()'),
						array('name'=>'type', 'header'=>at('Type')),
						array('name'=>'start_date', 'header'=>at('Date Start')),
						array('name'=>'end_date', 'header'=>at('Date End')),
						array('name'=>'reason', 'header'=>at('Reason')),
						
						array(
							'class' 		=> 'CButtonColumn',							
							'htmlOptions' 	=> array('style'=>'width: 70px'),
							'buttons' 		=> array(								
							'update' 	 	=> array('visible'=>'$data->status=="waiting"')
							),							
						),
						//approval_by_rm, approval_by_rm_time, approval_by_bm, approval_by_bm_time, approval_by_hr, approval_by_hr_time
					),
				)); ?>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->
	</div>
</div>

<div class="clear"></div>
