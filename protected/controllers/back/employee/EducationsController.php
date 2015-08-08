<?php

class EducationsController extends BackEndController
{
	public $icon_class = 'fa fa-map-marker';
	
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_masters_employee_educations_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Educations'));
		$this->title[] = at('Employee Educations');
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
		$model=new MastersEmployeeHistoryEducations;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_GET['id']))
			$model->employee_id = $_GET['id'];

		if(isset($_POST['MastersEmployeeHistoryEducations']))
		{
			$model->attributes=$_POST['MastersEmployeeHistoryEducations'];
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

		if(isset($_POST['MastersEmployeeHistoryEducations']))
		{
			$model->attributes=$_POST['MastersEmployeeHistoryEducations'];
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
		$model = new MastersEmployeeHistoryEducations('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['MastersEmployeeHistoryEducations'])) 
			$model->attributes=$_GET['MastersEmployeeHistoryEducations'];

		$this->render('index',array('model'=>$model));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MastersEmployeeHistoryEducations the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MastersEmployeeHistoryEducations::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MastersEmployeeHistoryEducations $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='masters-employee-history-educations-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAjaxgetdata()
	{
		if($_POST['id']==0) {
			$model 				= new MastersEmployeeHistoryEducations;
			$model->employee_id = $_POST['employee_id'];
		}
		else{
			$model = $this->loadModel($_POST['id']);
		}

		if($_POST['action']!='view') $this->renderPartial('/employee/educations/_formAjax', array('education'=>$model));
		else $this->renderPartial('/employee/educations/_viewAjax',array('education'=>$model));
	}

	public function actionAjaxcreate($id){
		$model = new MastersEmployeeHistoryEducations;
		
		if($id!='') $model = MastersEmployeeHistoryEducations::model()->findByPk($id);		
	      
		$model->employee_id 		= $_POST['employee_id'];
		$model->education_id		= $_POST['education_id'];
		$model->school 		 		= $_POST['school'];
		$model->department 			= $_POST['department'];
		$model->major 	 			= $_POST['major'];
		$model->certificate_year	= $_POST['certificate_year'];
		$model->notes 				= $_POST['notes'];
		$model->address_street1		= $_POST['address_street1'];
		$model->address_street2		= $_POST['address_street2'];
		$model->address_country_id	= $_POST['address_country_id'];
		$model->address_state_id	= $_POST['address_state_id'];
		$model->address_city_id		= $_POST['address_city_id'];
		$model->address_poscode		= $_POST['address_poscode'];

		if($model->save()) $_POST['success'] = 1;
		else $_POST['success'] = 0;

		$_POST['id'] 						= $id;
		$_POST['error_employee_id'] 		= '';
		$_POST['error_education_id'] 		= '';
		$_POST['error_school'] 				= '';
		$_POST['error_department']  		= '';
		$_POST['error_major'] 	 			= '';
		$_POST['error_certificate_year'] 	= '';
		$_POST['error_notes'] 			 	= '';
		$_POST['error_address_street1'] 	= '';
		$_POST['error_address_street2'] 	= '';
		$_POST['error_address_country_id']	= '';
		$_POST['error_address_state_id']	= '';
		$_POST['error_address_city_id']		= '';
		$_POST['error_address_poscode']		= '';

		if(isset($model->errors['employee_id'][0])) $_POST['error_employee_id'] = $model->errors['employee_id'][0];
		if(isset($model->errors['education_id'][0])) $_POST['error_education_id'] = $model->errors['education_id'][0];
		if(isset($model->errors['school'][0])) $_POST['error_school'] = $model->errors['school'][0];
		if(isset($model->errors['department'][0])) $_POST['error_department'] = $model->errors['department'][0];
		if(isset($model->errors['major'][0])) $_POST['error_major'] = $model->errors['major'][0];
		if(isset($model->errors['certificate_year'][0])) $_POST['error_certificate_year'] = $model->errors['certificate_year'][0];
		if(isset($model->errors['notes'][0])) $_POST['error_notes'] = $model->errors['notes'][0];
		if(isset($model->errors['address_street1'][0])) $_POST['error_address_street1'] = $model->errors['address_street1'][0];
		if(isset($model->errors['address_street2'][0])) $_POST['error_address_street2'] = $model->errors['address_street2'][0];
		if(isset($model->errors['address_country_id'][0])) $_POST['error_address_country_id'] = $model->errors['address_country_id'][0];
		if(isset($model->errors['address_state_id'][0])) $_POST['error_address_state_id'] = $model->errors['address_state_id'][0];
		if(isset($model->errors['address_city_id'][0])) $_POST['error_address_city_id'] = $model->errors['address_city_id'][0];
		if(isset($model->errors['address_poscode'][0])) $_POST['error_address_poscode'] = $model->errors['address_poscode'][0];		

		echo json_encode($_POST);
	}
}
