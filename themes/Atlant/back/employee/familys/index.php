<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-crop"></span> <?php echo at('Employee Familys'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<?php echo CHtml::link(at('Create Family'), array('create'), array('class'=>'btn btn-primary')); ?>
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
						array('name'=>'status_id', 'header'=>at('Status'), 'value'=>'$data->viewStatus()'),
						array('name'=>'name', 'header'=>at('Name')),
						array('name'=>'gender', 'header'=>at('Gender'), 'value'=>'MyHelper::viewGender($data->gender)',),
						array('name'=>'education_level', 'header'=>at('Education')),
						array('name'=>'job_position', 'header'=>at('Job')),
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