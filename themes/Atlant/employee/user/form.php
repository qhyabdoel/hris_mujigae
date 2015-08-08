<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-arrow-circle-o-left"></span> <?php echo at('Permissions Manager'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<?php $label_class = 'col-md-3 col-xs-12 control-label'; ?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
<div class="row">
    <div class="col-md-12">
		<?php
		$this->widget('zii.widgets.jui.CJuiTabs',array(
			'tabs'=>array(
				at('Basic Information')=>array('content'=>$this->renderPartial('form/basic', array('model'=>$model, 'label_class'=>$label_class), true)),
				at('Personal Information')=>array('content'=>$this->renderPartial('form/personalinfo', array('model'=>$model, 'label_class'=>$label_class), true)),
				at('Custom Fields')=>array('content'=>$this->renderPartial('form/customfields', array('model'=>$model, 'label_class'=>$label_class), true)),
				at('Roles & Permissions')=>array('content'=>$this->renderPartial('form/roles_permissions', array('model'=>$model, 'items'=>$items, 'label_class'=>$label_class), true)),
			),
			'options'=>array(
				'collapsible'=>false,
			),
			'id'=>'Tabs-User-Form',
		));
		?>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<?php cs()->registerScriptFile(themeUrl('js/modules/city.js'), CClientScript::POS_END); ?>