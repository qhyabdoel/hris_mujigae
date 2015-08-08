<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-heart"></span> <?php echo at('Update Training'); ?> - <span class="data-info"><?php echo $model->topic ?></span></h2>
</div>
<!-- END PAGE TITLE -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>