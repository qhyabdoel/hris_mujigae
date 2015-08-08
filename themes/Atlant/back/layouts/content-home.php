<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
	<!-- START WIDGETS -->                    
	<div class="row">
		<?php $this->renderPartial('//layouts/home/widgets'); ?>
	</div>
	<!-- END WIDGETS -->
	
	<div class="row">
		<?php $this->renderPartial('//layouts/home/charts'); ?>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<?php echo $content; ?>
		</div>
	</div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
<?php $this->endContent(); ?>