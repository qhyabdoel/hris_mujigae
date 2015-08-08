<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="language" content="en" />

	<?php 
	/*<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->*/ 
	?>
	<!--link rel="stylesheet" type="text/css" href="<?php //echo themeUrl('js/plugins/bootstrap/bootstrap.min.css'); ?>" /-->
	<link rel="stylesheet" type="text/css" href="<?php echo themeUrl('css/theme-default.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo themeUrl('css/custom.css'); ?>" />
	<!--link rel="stylesheet" type="text/css" href="http://fullcalendar.io/js/fullcalendar-2.3.1/fullcalendar.css" /-->
	
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
				'links'=>$this->breadcrumbs,
				'tagName'=>'ul',
				'htmlOptions'=>array('class'=>'breadcrumb'),
				'separator'=>'',
				'activeLinkTemplate'=>'<li class="active"><a href="{url}">{label}</a></li>',
				'inactiveLinkTemplate'=>'<li>{label}</li>',
				'homeLink'=>'<li><a href="'.Yii::app()->homeUrl.'">Home</a></li>',
			)); ?>
		<?php endif?>
		<!-- END BREADCRUMB -->
		
		<!-- PAGE CONTENT -->
		<?php echo $content; ?>
		<!-- END PAGE CONTENT -->
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

<!-- START SCRIPTS -->
	<!-- START PLUGINS -->
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap.min.js'); ?>"></script>
	<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
	<!-- END PLUGINS -->

	<!-- START THIS PAGE PLUGINS-->        
	<script type='text/javascript' src="<?php echo themeUrl('js/plugins/icheck/icheck.min.js'); ?>"></script>        
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/scrolltotop/scrolltopcontrol.js'); ?>"></script>
	
	<?php /*<script type="text/javascript" src="<?php echo themeUrl('js/plugins/morris/raphael-min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/morris/morris.min.js'); ?>"></script> */?>       
	
	<?php /*GRAPH - BUAT RANDOM DATA*/ ?>
	<?php /*<script type="text/javascript" src="<?php echo themeUrl('js/plugins/rickshaw/d3.v3.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/rickshaw/rickshaw.min.js'); ?>"></script>
	
	<script type='text/javascript' src="<?php echo themeUrl('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
	<script type='text/javascript' src="<?php echo themeUrl('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>*/?>
	<script type='text/javascript' src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap-datepicker.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/owl/owl.carousel.min.js'); ?>"></script>
	
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/moment.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
	<!-- END THIS PAGE PLUGINS-->        

	<?php /*FORMS*/ ?>
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap-dialog.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap-select.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap-datepicker.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap-timepicker.min.js'); ?>"></script>
	
	<?php /*<script type="text/javascript" src="<?php echo themeUrl('js/plugins/fullcalendar/moment.min.js'); ?>"></script>*/?>
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/fullcalendar/fullcalendar.min.js'); ?>"></script>
	<!--script type="text/javascript" src="<?php //echo themeUrl('js/app.js'); ?>"></script-->
	
	<!-- START TEMPLATE -->
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/tableexport/tableExport.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/tableexport/jquery.base64.js'); ?>"></script>
	
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/smartwizard/jquery.smartWizard-2.0.min.js'); ?>"></script>
	
	<script type="text/javascript" src="<?php echo themeUrl('js/settings.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins.js'); ?>"></script>    
	<script type="text/javascript" src="<?php echo themeUrl('js/actions.js'); ?>"></script>
	
	<!--script type="text/javascript" src="<?php //echo themeUrl('js/plugins/bootstrap/bootstrap-duallistbox.js'); ?>"></script-->
	
	
	<!--script type="text/javascript" src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script-->
	<!--script type="text/javascript" src="<?php //echo themeUrl('js/plugins/datatables/dataTables.tableTools.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php //echo themeUrl('js/plugins/datatables/dataTables.editor.min.js'); ?>"></script-->
	
	
	<?php /*<script type="text/javascript" src="<?php echo themeUrl('js/demo_dashboard.js'); ?>"></script>*/?>
	<!-- END TEMPLATE -->
<!-- END SCRIPTS -->

</body>
</html>
