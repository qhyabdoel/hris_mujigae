<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-crop"></span> <?php echo at('Employee Employments'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<?php echo CHtml::link(at('Create Employment'), array('create'), array('class'=>'btn btn-primary')); ?>
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>                                
			</div>
			<div class="panel-body">
				<?php $this->widget('DTGridView', array(
					'id'=>'reference-geo-countries-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->search(),
					'enableSorting'=>false,
					'filter'=>null,
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'company_name', 'header'=>'Company Name'),
						array('name'=>'position', 'header'=>'position'),
						array('name'=>'last_position', 'header'=>'Last Position'),
						array('name'=>'resign_reason', 'header'=>'Reason'),
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