<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-group"></span> <?php echo at('Attendance Shifts'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<?php echo CHtml::link(at('Create Shift'), array('create'), array('class'=>'btn btn-primary')); ?>
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>                                
			</div>
			<div class="panel-body">
				<?php $this->widget('CGridView', array(
					'id'=>'reference-geo-countries-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->search(),
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'name', 'header'=>at('Name')),
						array('name'=>'short', 'header'=>at('Short')),
						array('name'=>'time_check_in', 'header'=>at('Check In')),
						array('name'=>'time_check_out', 'header'=>at('Check Out')),
						array('name'=>'time_break_out', 'header'=>at('Break Out')),
						array('name'=>'time_break_in', 'header'=>at('Break In')),
						array('name'=>'max_time_check_out', 'header'=>at('Maxtime Check Out')),
						array('name'=>'description', 'header'=>at('Description')),
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
