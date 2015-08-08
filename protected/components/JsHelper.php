<?php
class JsHelper
{
	function topJs()
	{
		JSFile(themeUrl('js/plugins/bootstrap/bootstrap.min.js'));
		JSFile(themeUrl('js/plugins/icheck/icheck.min.js'));
		JSFile(themeUrl('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'));
		JSFile(themeUrl('js/plugins/scrolltotop/scrolltopcontrol.js'));
		JSFile(themeUrl('js/plugins/owl/owl.carousel.min.js'));
	}
	
	function bottomJs()
	{
		JSFile(themeUrl('js/settings.js'));
		JSFile(themeUrl('js/plugins.js'));
		JSFile(themeUrl('js/actions.js'));
	}
	
	public static function allJs()
	{
		self::topJs();
		JSFile(themeUrl('js/plugins/datatables/jquery.dataTables.min.js'));
		JSFile(themeUrl('js/plugins/bootstrap/bootstrap-select.js'));
		JSFile(themeUrl('js/plugins/bootstrap/bootstrap-datepicker.js'));
		JSFile(themeUrl('js/plugins/bootstrap/bootstrap-timepicker.min.js'));
		JSFile(themeUrl('js/plugins/fullcalendar/moment.min.js'));
		JSFile(themeUrl('js/plugins/fullcalendar/fullcalendar.min.js'));
		self::bottomJs();
	}
	
	public static function defaultJs()
	{
		self::topJs();
		self::bottomJs();
	}
	
	public static function gridJs()
	{
		self::topJs();
		JSFile(themeUrl('js/plugins/datatables/jquery.dataTables.min.js'));
		self::bottomJs();
	}
	
	public static function formJs()
	{
		self::topJs();
		JSFile(themeUrl('js/plugins/bootstrap/bootstrap-select.js'));
		JSFile(themeUrl('js/plugins/bootstrap/bootstrap-datepicker.js'));
		JSFile(themeUrl('js/plugins/bootstrap/bootstrap-timepicker.min.js'));
		self::bottomJs();
	}
	
	public static function graphJs()
	{
		self::topJs();
		JSFile(themeUrl('js/plugins/rickshaw/d3.v3.js'));
		JSFile(themeUrl('js/plugins/rickshaw/rickshaw.min.js'));
		self::bottomJs();
	}
	
	public static function graphMorrisJs()
	{
		//self::topJs();
		JSFile(themeUrl('js/plugins/morris/raphael-min.js'));
		JSFile(themeUrl('js/plugins/morris/morris.min.js'));
		//self::bottomJs();
	}
}