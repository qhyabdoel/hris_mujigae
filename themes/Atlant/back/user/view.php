<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-arrow-circle-o-left"></span> <?php echo at("Viewing User '{name}'", array('{name}' => $model->name)) ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">
		<?php
		$this->widget('zii.widgets.jui.CJuiTabs',array(
			'tabs'=>array(
				at('Basic Information')=>array('content'=>$this->renderPartial('view/basic', array('model'=>$model), true)),
				at('Personal Information')=>array('content'=>$this->renderPartial('view/personalinfo', array('model'=>$model), true)),
				//at('Custom Fields')=>array('content'=>$this->renderPartial('view/customfields', array('model'=>$model), true)),
			),
			'options'=>array(
				'collapsible'=>false,
			),
			'id'=>'Tabs-User-View',
		));
		?>
	</div>
</div>