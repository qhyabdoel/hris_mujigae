<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-arrow-circle-o-left"></span> <?php echo at('Users'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<h3 class="panel-title"><?php echo CHtml::link(at('Create User'), array('user/create'), array('class'=>'btn btn-primary')); ?></h3>
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>                                
			</div>
			<div class="panel-body">
				<?php $this->widget('CGridView', array(
					'id'=>'users-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->search(),
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'name', 'header'=>'Username'),
						array('name'=>'first_name', 'header'=>'First Name'),
						array('name'=>'last_name', 'header'=>'Last Name'),
						array('name'=>'contact', 'header'=>'Contact'),
						array('name'=>'company', 'header'=>'Company'),
						array('name'=>'email', 'header'=>'Email'),
						array('name'=>'role', 'header'=>'Role', 'filter' => CHtml::listData(AuthItem::model()->findAll('type=:type', array(':type' => CAuthItem::TYPE_ROLE)),'name','name')),
						array('name'=>'created_at', 'filter' => false, 'header'=>'Created Date', 'value' => 'timeSince($data->created_at, "short", null)'),
						array('name'=>'updated_at', 'filter' => false, 'header'=>'Updated Date', 'value' => 'timeSince($data->updated_at, "short", null)'),
						array('name'=>'last_visited', 'filter' => false, 'header'=>'Last Visited', 'value' => 'timeSince($data->last_visited, "short", null)'),
						array(
							'class'=>'CButtonColumn',
							'htmlOptions'=>array('style'=>'width: 50px'),
						),
					),
				)); ?>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->
	</div>
</div>

<div class="clear"></div>