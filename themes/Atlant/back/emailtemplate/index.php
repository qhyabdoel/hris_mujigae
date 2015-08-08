<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Email Templates Manager'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<?php echo CHtml::link(at('Create Template'), array('create'), array('class'=>'btn btn-primary')); ?>
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>                                
			</div>
			<div class="panel-body">
				<?php $this->widget('CGridView', array(
					'id'=>'reference-educations-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider'=>$model->search(),
					'columns'=>array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'title'),
						array('name'=>'email_key'),
						array('name'=>'created_at', 'value' => 'timeSince($data->created_at)'),
						array('name'=>'author_id', 'type' => 'raw', 'htmlOptions'=>array('style'=>'width: 100px'), 'value' => '$data->getAuthorLink("author")'),
						array('name'=>'updated_at', 'value' => 'timeSince($data->updated_at)'),
						array('name'=>'updated_author_id', 'type' => 'raw', 'htmlOptions'=>array('style'=>'width: 150px'), 'value' => '$data->getAuthorLink("last_author")'),
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