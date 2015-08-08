<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	
	<!--link rel="stylesheet" type="text/css" href="http://fullcalendar.io/js/fullcalendar-2.3.1/fullcalendar.css" /-->
	
	
</head>

<body>

<!-- START PAGE CONTAINER -->
<div class="page-container">
	<!-- PAGE CONTENT -->
	<div class="page-content">
		<?php echo $content; ?>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->


<!-- END MESSAGE BOX-->

<!-- START SCRIPTS -->
	<!-- START PLUGINS -->
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/jquery/jquery-ui.min.js'); ?>"></script>
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
