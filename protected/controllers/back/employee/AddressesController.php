<?php

// session_start();

class AddressesController extends BackEndController
{
	public $icon_class = 'fa fa-map-marker';
	
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_masters_employee_addresses_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Addresses'));
		$this->title[] = at('Employee Addresses');
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

		$model = new MastersEmployeeAddresses;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_GET['id']))
			$model->employee_id = $_GET['id'];

		if(isset($_POST['MastersEmployeeAddresses']))
		{
			$model->attributes = $_POST['MastersEmployeeAddresses'];
			if($model->save()) $this->redirect(array('view','id'=>$model->id));
		} 
		else 
		{
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

		if(isset($_POST['MastersEmployeeAddresses']))
		{
			$model->attributes=$_POST['MastersEmployeeAddresses'];
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
		$model=new MastersEmployeeAddresses('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MastersEmployeeAddresses']))
			$model->attributes=$_GET['MastersEmployeeAddresses'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MastersEmployeeAddresses the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MastersEmployeeAddresses::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MastersEmployeeAddresses $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='masters-employee-addresses-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAjaxcreate($id){
		$model = new MastersEmployeeAddresses;
		if($id!='') $model = MastersEmployeeAddresses::model()->findByPk($id);
	      
		$model->employee_id = $_POST['employee_id'];
		$model->label 		= $_POST['label'];
		$model->street1 	= $_POST['street1'];
		$model->street2 	= $_POST['street2'];
		$model->country_id 	= $_POST['country_id'];
		$model->state_id 	= $_POST['state_id'];
		$model->city_id 	= $_POST['city_id'];
		$model->district_id = $_POST['district_id'];
		$model->poscode 	= $_POST['poscode'];
		$model->phone 		= $_POST['phone'];

		if($model->save()) $_POST['success'] = 1;
		else $_POST['success'] = 0;

		$_POST['id'] 				= $id;
		$_POST['error_employee_id'] = '';
		$_POST['error_label'] 		= '';
		$_POST['error_street1'] 	= '';
		$_POST['error_street2'] 	= '';
		$_POST['error_country_id'] 	= '';
		$_POST['error_state_id'] 	= '';
		$_POST['error_city_id'] 	= '';
		$_POST['error_district_id'] = '';
		$_POST['error_poscode'] 	= '';
		$_POST['error_phone'] 		= '';

		if(isset($model->errors['employee_id'][0])) $_POST['error_employee_id'] = $model->errors['employee_id'][0];
		if(isset($model->errors['label'][0])) $_POST['error_label'] = $model->errors['label'][0];
		if(isset($model->errors['street1'][0])) $_POST['error_street1'] = $model->errors['street1'][0];
		if(isset($model->errors['street2'][0])) $_POST['error_street2'] = $model->errors['street2'][0];
		if(isset($model->errors['country_id'][0])) $_POST['error_country_id'] = $model->errors['country_id'][0];
		if(isset($model->errors['state_id'][0])) $_POST['error_state_id'] = $model->errors['state_id'][0];
		if(isset($model->errors['city_id'][0])) $_POST['error_city_id'] = $model->errors['city_id'][0];
		if(isset($model->errors['district_id'][0])) $_POST['error_district_id'] = $model->errors['district_id'][0];
		if(isset($model->errors['poscode'][0])) $_POST['error_poscode'] = $model->errors['poscode'][0];
		if(isset($model->errors['phone'][0])) $_POST['error_phone'] = $model->errors['phone'][0];

		echo json_encode($_POST);
	}

	public function actionAjaxgetdata(){
		if($_POST['id']==0) {
			$model 				= new MastersEmployeeAddresses;
			$model->employee_id = $_POST['employee_id'];
		}
		else{
			$model = $this->loadModel($_POST['id']);
		}

		if($_POST['action']!='view') $this->renderPartial('/employee/addresses/_formAjax', array('address'=>$model));
		else $this->renderPartial('/employee/addresses/_viewAjax',array('address'=>$model));
	}
}
