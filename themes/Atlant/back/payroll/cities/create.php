<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Create Area City'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>