<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Allowance Groups'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<?php echo CHtml::link(at('Create Group'), array('create'), array('class'=>'btn btn-primary')); ?>
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>                                
			</div>
			<div class="panel-body">
				<?php $this->widget('CGridView', array(
					'id'=>'payroll-allowance-groups-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->search(),
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'name', 'header'=>'Name'),
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