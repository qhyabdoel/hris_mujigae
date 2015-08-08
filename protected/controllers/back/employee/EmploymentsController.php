<?php

class EmploymentsController extends BackEndController
{
	public $icon_class = 'fa fa-map-marker';
	
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_masters_employee_employments_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Employments'));
		$this->title[] = at('Employee Employments');
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
		$model=new MastersEmployeeHistoryEmployments;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_GET['id']))
			$model->employee_id = $_GET['id'];

		if(isset($_POST['MastersEmployeeHistoryEmployments']))
		{
			$model->attributes=$_POST['MastersEmployeeHistoryEmployments'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		} else {
			if(isset($_GET['id'])) $model->employee_id = $_GET['id'];
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MastersEmployeeHistoryEmployments']))
		{
			$model->attributes=$_POST['MastersEmployeeHistoryEmployments'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
		$model=new MastersEmployeeHistoryEmployments('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MastersEmployeeHistoryEmployments']))
			$model->attributes=$_GET['MastersEmployeeHistoryEmployments'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MastersEmployeeHistoryEmployments the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MastersEmployeeHistoryEmployments::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MastersEmployeeHistoryEmployments $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='masters-employee-history-employments-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAjaxgetdata()
	{
		if($_POST['id']==0) {
			$model 				= new MastersEmployeeHistoryEmployments;
			$model->employee_id = $_POST['employee_id'];
		}
		else{
			$model = $this->loadModel($_POST['id']);
		}

		if($_POST['action']!='view') $this->renderPartial('/employee/employments/_formAjax', array('employment'=>$model));
		else $this->renderPartial('/employee/employments/_viewAjax', array('employment'=>$model));
	}

	public function actionAjaxcreate($id){
		$model = new MastersEmployeeHistoryEmployments;
		
		if($id!='') $model = MastersEmployeeHistoryEmployments::model()->findByPk($id);		
	      
		$model->employee_id 				= $_POST['employee_id'];
		$model->company_name				= $_POST['company_name'];
		$model->company_address_street1 	= $_POST['company_address_street1'];
		$model->company_address_street2 	= $_POST['company_address_street2'];
		$model->company_address_country_id	= $_POST['company_address_country_id'];
		$model->company_address_state_id	= $_POST['company_address_state_id'];
		$model->company_address_city_id 	= $_POST['company_address_city_id'];
		$model->company_address_poscode		= $_POST['company_address_poscode'];
		$model->position					= $_POST['position'];
		$model->last_position				= $_POST['last_position'];
		$model->work_date					= $_POST['work_date'];
		$model->resign_date					= $_POST['resign_date'];
		$model->resign_reason				= $_POST['resign_reason'];

		// print_r($model);die();

		if($model->save()) $_POST['success'] = 1;
		else $_POST['success'] = 0;

		$_POST['id'] 								= $id;
		$_POST['error_employee_id'] 				= '';
		$_POST['erorr_company_name'] 				= '';
		$_POST['erorr_company_address_street1']		= '';
		$_POST['erorr_company_address_street2'] 	= '';
		$_POST['erorr_company_address_country_id'] 	= '';
		$_POST['erorr_company_address_state_id']	= '';
		$_POST['erorr_company_address_city_id'] 	= '';
		$_POST['erorr_company_address_poscode'] 	= '';
		$_POST['erorr_position'] 					= '';
		$_POST['erorr_last_position'] 				= '';
		$_POST['erorr_work_date'] 					= '';
		$_POST['erorr_resign_date']					= '';
		$_POST['erorr_resign_reason'] 				= '';		

		if(isset($model->errors['employee_id'][0])) $_POST['error_employee_id'] = $model->errors['employee_id'][0];
		if(isset($model->errors['company_name'][0])) $_POST['error_company_name'] = $model->errors['company_name'][0];
		if(isset($model->errors['company_address_street1'][0])) $_POST['error_company_address_street1'] = $model->errors['company_address_street1'][0];
		if(isset($model->errors['company_address_street2'][0])) $_POST['error_company_address_street2'] = $model->errors['company_address_street2'][0];
		if(isset($model->errors['company_address_country_id'][0])) $_POST['erorr_company_address_country_id'] = $model->errors['company_address_country_id'][0];
		if(isset($model->errors['company_address_state_id'][0])) $_POST['erorr_company_address_state_id'] = $model->errors['company_address_state_id'][0];
		if(isset($model->errors['company_address_city_id'][0])) $_POST['erorr_company_address_city_id'] = $model->errors['company_address_city_id'][0];
		if(isset($model->errors['company_address_poscode'][0])) $_POST['erorr_company_address_poscode'] = $model->errors['company_address_poscode'][0];
		if(isset($model->errors['position'][0])) $_POST['error_position'] = $model->errors['position'][0];
		if(isset($model->errors['last_position'][0])) $_POST['erorr_last_position'] = $model->errors['last_position'][0];
		if(isset($model->errors['work_date'][0])) $_POST['erorr_work_date'] = $model->errors['work_date'][0];
		if(isset($model->errors['resign_date'][0])) $_POST['erorr_resign_date'] = $model->errors['resign_date'][0];
		if(isset($model->errors['resign_reason'][0])) $_POST['erorr_resign_reason'] = $model->errors['resign_reason'][0];		

		echo json_encode($_POST);
	}
}
