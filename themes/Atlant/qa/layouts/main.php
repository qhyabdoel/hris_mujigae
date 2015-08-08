<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="language" content="en" />	

	<link rel="stylesheet" type="text/css" href="<?php echo themeUrl('css/theme-default.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo themeUrl('css/custom.css'); ?>" />	
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<!-- START PAGE CONTAINER -->
<div class="page-container">
	<!-- START PAGE SIDEBAR -->
	<?php $this->renderPartial('//layouts/main/sidebar'); ?>
	<!-- END PAGE SIDEBAR -->
	
	<!-- PAGE CONTENT -->
	<div class="page-content">
		<!-- START X-NAVIGATION VERTICAL -->
		<?php $this->renderPartial('//layouts/main/navigation'); ?>
		<!-- END X-NAVIGATION VERTICAL -->
		
		<!-- START BREADCRUMB -->
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links' 				=> $this->breadcrumbs,
				'tagName' 				=> 'ul',
				'htmlOptions' 			=> array('class'=>'breadcrumb'),
				'separator' 			=> '',
				'activeLinkTemplate' 	=> '<li class="active"><a href="{url}">{label}</a></li>',
				'inactiveLinkTemplate' 	=> '<li>{label}</li>',
				'homeLink' 				=> '<li><a href="'.Yii::app()->homeUrl.'">Home</a></li>',
			)); ?>
		<?php endif?>
		<!-- END BREADCRUMB -->
		
		<!-- PAGE CONTENT -->
		<?php echo $content; ?>
		<!-- END CONTENT -->
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
	<div class="mb-container">
		<div class="mb-middle">
			<div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
			<div class="mb-content">
				<p>Are you sure you want to log out?</p>                    
				<p>Press No if youwant to continue work. Press Yes to logout current user.</p>
			</div>
			<div class="mb-footer">
				<div class="pull-right">
					<a href="<?php echo $this->createUrl('login/logout'); ?>" class="btn btn-success btn-lg">Yes</a>
					<button class="btn btn-default btn-lg mb-control-close">No</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MESSAGE BOX-->

<script type="text/javascript" src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap.min.js'); ?>"></script>
<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>

<script type="text/javascript" src="<?php echo themeUrl('js/plugins/icheck/icheck.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/plugins/scrolltotop/scrolltopcontrol.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/plugins/owl/owl.carousel.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap-select.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap-datepicker.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap-timepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/plugins/fullcalendar/moment.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/plugins/fullcalendar/fullcalendar.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap-dialog.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap-select.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap-datepicker.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap-timepicker.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo themeUrl('js/settings.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/plugins.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/actions.js'); ?>"></script>

<?php //JsHelper::allJs(); ?>

</body>
</html>
