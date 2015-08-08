<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-heart"></span> <?php echo at('Leaves Request'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-body">
				<?php $this->widget('CGridView', array(
					'id'=>'reference-religions-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->search(),
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'employee_id', 'header'=>at('Employee')),
						array('name'=>'department_id', 'header'=>at('Department')),
						array('name'=>'type_id', 'header'=>at('Type')),
						array('name'=>'date_start', 'header'=>at('Date Start')),
						array('name'=>'date_end', 'header'=>at('Date End')),
						array('name'=>'long_leave', 'header'=>at('Long')),
						array('name'=>'status', 'header'=>at('Status')),
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
