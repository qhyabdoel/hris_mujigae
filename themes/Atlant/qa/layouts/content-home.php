<?php 
// echo getUser()->employee->outlet_i_lead->id;die(); /* @var $this Controller */

$this->beginContent('//layouts/main'); ?>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
	<!-- START WIDGETS -->                    
	<div class="row">
		<?php $this->renderPartial('//layouts/main/widgets'); ?>
	</div>
	<!-- END WIDGETS -->

	<div class="row">
		<?php $this->renderPartial('//layouts/main/charts'); ?>
	</div>

	<div class="row">
		<div class="col-md-12">
			<?php echo $content; ?>
		</div>
	</div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
<?php $this->endContent(); ?>