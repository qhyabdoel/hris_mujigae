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
		$model 	= $this->loadModel($id);
		$name 	= $model->getFullname();
		$id 	= $model->id;

		if(isset($_GET['with_department'])) 
			if($_GET['with_department']==1) $name = $name.' :: '.$model->department->name;

		header('Content-type: application/json');
		echo CJSON::encode(array('id'=>$id, 'name'=>$name));
	}
	
	public function actionGetleavesinfo($id)
	{
		header('Content-type: application/json');

		$employee 	= MastersEmployees::model()->findByPk($_GET['id']);
		$leave 		= LeaveRequest::model()->find(array('condition'=>'employee_id = '.$_GET['id'].' and (status = "new" or status = "request")'));
		// $leaves_pending_msg = count($leave);

		if(count($leave)==0) $leaves_pending_msg = '';
		else $leaves_pending_msg = at('There is a pending leaves request for this employee.');

		$leaves_quota = $employee->leave_quota;

		echo CJSON::encode(array(
			'leaves_pending' 	=> $leaves_pending_msg, 
			'leaves_info' 	 	=> '{ Current Leaves : 2 / 3 ( Max : 1 ) } { Total Leaves : 21 }', 
			'leaves_quota' 		=> $leaves_quota
		));
	}
	
	public function loadModel($id)
	{
		$model=MastersEmployees::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionTest1()
	{
		$this->renderPartial('test1',array(),false,true);
	}
	
	public function actionTest2()
	{
		$this->renderPartial('test2',array(),false,true);
	}
}
