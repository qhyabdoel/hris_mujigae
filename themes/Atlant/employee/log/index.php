<?php /*echo Yii::app()->user->id;die();*/ ?>

<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span>
		<?php echo at('Admin Logs'); ?>
		<?php if($user): ?>
			- <?php echo at('Viewing logs for {name}', array('{name}' => $user->name)); ?>
		<?php endif; ?>	
	</h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>
			</div>
			<div class="panel-body">
				<?php $this->widget('CGridView', array(
					'id' 			=> 'admin-logs',
					'itemsCssClass' => 'table datatable',
					'dataProvider' 	=> $model->search(Yii::app()->user->id),
					
					'columns' => array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 30px')),
						array('name'=>'created_at', 'filter' => false, 'htmlOptions'=>array('style'=>'width: 120px'), 'header'=>'Created Date', 'value' => 'dateTime( $data->created_at)'),
						array('name'=>'note', 'header'=>'Note'),
						// array('name'=>'user_id', 'header'=>'User', 'type' => 'raw', 'htmlOptions'=>array('style'=>'width: 100px'), 'value' => '$data->getUserLink()'),
						array('name'=>'ip_address', 'header'=>'IP', 'htmlOptions'=>array('style'=>'width: 80px')),
						array('name'=>'controller', 'header'=>'Controller', 'htmlOptions'=>array('style'=>'width: 100px'), 'value' => '$data->controller ? ucfirst($data->controller) : "N/A"'),
						array('name'=>'action', 'header'=>'Action', 'htmlOptions'=>array('style'=>'width: 100px'), 'value' => '$data->action ? ucfirst($data->action) : "N/A"'),
					),
				)); ?>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->
	</div>
</div>

<div class="clear"></div>