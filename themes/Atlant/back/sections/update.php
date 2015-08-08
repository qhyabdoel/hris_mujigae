<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-crop"></span></span> <?php echo at('Update Section'); ?> - <span class="data-info"><?php echo $model->name ?></span></h2>
</div>
<!-- END PAGE TITLE -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>