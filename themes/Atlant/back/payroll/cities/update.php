<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Update Area City'); ?> - <span class="data-info"><?php echo $model->name ?></span></h2>
</div>
<!-- END PAGE TITLE -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>