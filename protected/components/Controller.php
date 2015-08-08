<?php
class Controller extends CController
{
	public $menu=array();
	public $title=array();
	public $breadcrumbs=array();
	
	public function init() {
		$this->title[] = Yii::app()->name;
		parent::init();
	}
	
	public function addBreadCrumb($title, $url=null) {
		$controller = $this->id;
		$action = $this->action ? $this->action->id : '';
		if($url) {
			$link = $url;
		} elseif($url === null) {
			$link = array($controller.'/'.$action);
		} elseif($url === false) {
			$link = null;
		}
		$this->breadcrumbs[$title] = $link;
	}
}