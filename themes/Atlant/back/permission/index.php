<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-arrow-circle-o-left"></span> <?php echo at('Permissions Manager'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">
		<?php
		$this->widget('zii.widgets.jui.CJuiTabs',array(
			'tabs'=>array(
				at('Roles')=>array('content'=>$this->renderPartial('index/roles', array('roles'=>$roles), true)),
				at('Tasks')=>array('content'=>$this->renderPartial('index/tasks', array('roles'=>$roles), true)),
				at('Operations')=>array('content'=>$this->renderPartial('index/operations', array('roles'=>$roles), true)),
			),
			'options'=>array(
				'collapsible'=>false,
			),
			'id'=>'Tabs-Customers',
		));
		?>
	</div>
</div>