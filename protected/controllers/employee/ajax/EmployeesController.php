<?php

class EmployeesController extends BackEndController
{
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_ajax_masters_employees_view');
	}
	
	public function actionList()
	{
		$model=new MastersEmployees('search');
		$model->unsetAttributes();
		if(isset($_GET['MastersEmployees']))
			$model->attributes=$_GET['MastersEmployees'];
		
		$this->renderPartial('list',array(
			'model'=>$model,
		),false,true);
	}

	public function actionGetemployee($id)
	{
		$model=$this->loadModel($id);
		header('Content-type: application/json');
		echo CJSON::encode(array('id'=>$model->id, 'name'=>$model->getFullname().' :: '.$model->department->name));
	}
	
	public function loadModel($id)
	{
		$model=MastersEmployees::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
