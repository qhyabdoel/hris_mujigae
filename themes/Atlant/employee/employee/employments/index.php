<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-crop"></span> <?php echo at('My Employments'); ?></h2>
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
					'dataProvider'=>$model->searchByEmployee(Yii::app()->user->id),
					'enableSorting'=>false,
					'filter'=>null,
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'company_name', 'header'=>at('Company Name')),
						array('name'=>'position', 'header'=>at('Position')),
						array('name'=>'last_position', 'header'=>at('Last Position')),
						array('name'=>'resign_reason', 'header'=>at('Reason')),
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