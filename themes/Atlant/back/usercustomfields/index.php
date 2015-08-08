<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-arrow-circle-o-left"></span> Users - Custom Fields</h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<h3 class="panel-title"><?php echo CHtml::link(at('Create User`s Custom Field'), array('usercustomfields/create'), array('class'=>'btn btn-primary')); ?></h3>
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>                                
			</div>
			<div class="panel-body">
				<?php $this->widget('CGridView', array(
					'id'=>'user-custom-field-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;')),
						array('name'=>'title', 'header'=>'Title'),
						array('name'=>'type', 'filter' => UserCustomField::model()->fieldType, 'header'=>'Type'),
						array('name'=>'status', 'filter' => array(0 => at('Public'), 1 => at('Hidden')), 'header'=>'Status', 'value' => '$data->status ? at("Public") : at("Hidden")'),
						array('name'=>'is_public', 'filter' => array(0 => at('Yes'), 1 => at('No')), 'header'=>'On Site', 'value' => '$data->is_public ? at("Yes") : at("No")'),
						array('name'=>'is_editable', 'filter' => array(0 => at('Yes'), 1 => at('No')), 'header'=>'Editable', 'value' => '$data->is_editable ? at("Yes") : at("No")'),
						array('name'=>'created_at', 'filter' => false, 'header'=>'Created Date', 'value' => 'timeSince($data->created_at)'),
						array('name'=>'author_id', 'filter' => false, 'header'=>'Author', 'type' => 'raw', 'htmlOptions'=>array('style'=>'width: 100px'), 'value' => '$data->getAuthorLink("author")'),
						array('name'=>'updated_at', 'filter' => false, 'header'=>'Updated Date', 'value' => 'timeSince($data->updated_at)'),
						array('name'=>'updated_author_id', 'filter' => false, 'header'=>'Last Author', 'type' => 'raw', 'htmlOptions'=>array('style'=>'width: 150px'), 'value' => '$data->getAuthorLink("last_author")'),
						array(
							'class'=>'CButtonColumn',
							'htmlOptions'=>array('style'=>'width: 50px'),
							'template' => '{update}{delete}',
						),
					),
				)); ?>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->
	</div>
</div>

<div class="clear"></div>