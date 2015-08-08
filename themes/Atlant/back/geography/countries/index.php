<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Countries'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<?php echo CHtml::link(at('Create Country'), array('create'), array('class'=>'btn btn-primary')); ?>
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>  

				<div class="btn-group pull-right">
					<button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
					<ul class="dropdown-menu">
						<li><a href="#" onClick ="$('#reference-geo-countries-grid').tableExport({type:'csv',escape:'false'});"><img src='<?php echo themeUrl('img/icons/csv.png'); ?>' width="24"/> CSV</a></li>
						<li><a href="#" onClick ="$('#reference-geo-countries-grid').tableExport({type:'txt',escape:'false'});"><img src='<?php echo themeUrl('img/icons/txt.png'); ?>' width="24"/> TXT</a></li>
					</ul>
				</div> 
			</div>
			<div class="panel-body">
				<?php $this->widget('CGridView', array(
					'id'=>'reference-geo-countries-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->search(),
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'name', 'header'=>'Name'),
						array('name'=>'short', 'header'=>'Short'),
						array('name'=>'sort_order', 'header'=>'Sort Order'),
						array(
							'class'=>'CButtonColumn',
							'template'=>'{cview}',
							'buttons'=>array(
								'cview'=>array(
									'label'=>'View',
									'url'=>'Yii::app()->createUrl("geography/countries/view", array("id"=>$data["id"]))',
									'icon'=>'icon-pencil',
								),
							),
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
