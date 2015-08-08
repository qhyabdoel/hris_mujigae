<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Settings Manager'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<?php echo CHtml::link(at('Add Setting Group'), array('addgroup'), array('class'=>'btn btn-primary')); ?>
				<?php echo CHtml::link(at('Add Setting'), array('addsetting'), array('class'=>'btn btn-primary')); ?>
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>                                
			</div>
			<div class="panel-body">
				<?php $this->widget('CGridView', array(
					'id'=>'settings-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->search(),
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'title', 'header'=>'Title'),
						array('name'=>'description', 'header'=>'Description'),
						//array('name'=>'groupkey', 'header'=>'Key'),
						array('name'=>'count', 'header'=>'Settings'),
						array(
							'class'=>'CButtonColumn',
							'template'=>'{view}{update}{deletegroup}',
							'buttons'=>array(
								'create' => array(
									'label'=>'Add Setting',
									'url'=>'Yii::app()->createUrl("setting/addsetting", array("cid"=>$data->id))',
								),
								'view' => array(
									'label'=>'View',
									'url'=>'Yii::app()->createUrl("setting/viewgroup", array("id"=>$data->id))',
								),
								'update' => array(
									'label'=>'Edit',
									'url'=>'Yii::app()->createUrl("setting/editgroup", array("id"=>$data->id))',
								),
								'deletegroup' => array(
									'label'=>'<i class="icon-trash"></i>',
									'options' => array('class' => 'delete'),
									'url'=>'Yii::app()->createUrl("setting/deletegroup", array("id"=>$data->id))',
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