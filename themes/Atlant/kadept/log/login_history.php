<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span><?php echo at('Admin Login History'); ?></h2>
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
					'id'=>'admin-login-histories',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->search(getRParam('user')),
					'columns'=>array(
						array('name'=>'created_at', 'filter' => false, 'htmlOptions'=>array('style'=>'width: 100px'), 'header'=>'Created Date', 'value' => 'timeSince($data->created_at)'),
						// array('name'=>'username', 'header'=>'Username', 'htmlOptions'=>array('style'=>'width: 100px'), 'value' => '$data->username'),
						// array('name'=>'password', 'header'=>'Password', 'htmlOptions'=>array('style'=>'width: 100px'), 'value' => '$data->password'),
						array('name'=>'ip_address', 'header'=>'IP', 'htmlOptions'=>array('style'=>'width: 80px')),
						array('name'=>'browser', 'header'=>'Browser', 'htmlOptions'=>array('style'=>'width: 100px'), 'value' => '$data->browser ? ucfirst($data->browser) : "N/A"'),
						array('name'=>'platform', 'header'=>'Platform', 'htmlOptions'=>array('style'=>'width: 100px'), 'value' => '$data->platform ? ucfirst($data->platform) : "N/A"'),
						array('name'=>'is_ok', 'header'=>'Logged In?', 'htmlOptions'=>array('style'=>'width: 100px'), 'value' => '$data->is_ok ? "Yes" : "No"'),
					),
				)); ?>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->
	</div>
</div>

<div class="clear"></div>