<?php

class LeavesController extends BackEndController
{
	public function init() {
		parent::init();
		
		// Check Access
		//checkAccessThrowException('op_masters_leaves_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Leaves'));
		$this->title[] = at('Leaves');
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new LeaveRequest;		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LeaveRequest']))
		{
			$model->attributes 	= $_POST['LeaveRequest'];
			$model->status 		= 'draft';			

			if($_POST['command']=='save') $model->status = 'request';

			if($model->save()) $this->redirect(array('view','id'=>$model->id));
		} 
		
		// else if(getUser()->role == 'employee' || getUser()->role == '')
		// {
		// 	$model->employee_id = getUser()->employee_id;
		// }

		$this->render('create',array('model'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LeaveRequest']))
		{
			// print_r($_POST);die();

			$model->attributes 	= $_POST['LeaveRequest'];						
			$model->status 		= 'draft';			

			if($_POST['command']=='save') $model->status = 'request';
			
			if($model->save()){
				if($_POST['command']=='save')
				$this->redirect(array('view','id'=>$model->id));
			} 
		}

		$this->render('update',array('model'=>$model));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new LeaveRequest('search');
	
		$model->unsetAttributes();  // clear any default values
	
		if(isset($_GET['LeaveRequest']))
			$model->attributes=$_GET['LeaveRequest'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return LeaveRequest the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LeaveRequest::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LeaveRequest $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='leave-request-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	public function actionRequest()
	{
		$model=new LeaveRequest('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LeaveRequest']))
			$model->attributes=$_GET['LeaveRequest'];

		$this->render('request',array(
			'model'=>$model,
		));
	}
	
	public function actionApprove($id)
	{
		$model = $this->loadModel($id);
		$status = isset($_GET['s']) ? ($_GET['s'] == 1 ? 'approved' : 'rejected') : 'rejected';
		
		if(getUser()->role == 'rm')
		{
			$model->approval_by_rm = $status;
			$model->approval_by_rm_time = date('Y-m-d H:i:s');			
		}
		if(getUser()->role == 'bm')
		{
			$model->approval_by_bm = $status;
			$model->approval_by_bm_time = date('Y-m-d H:i:s');			
		}
		if(getUser()->role == 'kadept')
		{
			$model->approval_by_hr = $status;
			$model->approval_by_hr_time = date('Y-m-d H:i:s');			
		}
		
		if($model->save())
			$this->redirect(array('view','id'=>$model->id));
	}

	public function approve($id){		
		$model = $this->loadModel($id);

		if(getUser()->role == 'rm')
		{
			$model->approval_by_rm 		= 'approved';
			$model->approval_by_rm_time = date('Y-m-d H:i:s');			
		}
		
		if(getUser()->role == 'bm')
		{
			$model->approval_by_bm 		= 'approved';
			$model->approval_by_bm_time = date('Y-m-d H:i:s');			
		}
		
		if(getUser()->role == 'kadept')
		{
			$model->approval_by_dm 		= 'approved';
			$model->approval_by_dm_time = date('Y-m-d H:i:s');			
		}

		$model->save();
	}

	public function actionReject($id)
	{
		$model 			= $this->loadModel($id);
		$model->status 	= 'rejected';

		$model->save();
	}
}
