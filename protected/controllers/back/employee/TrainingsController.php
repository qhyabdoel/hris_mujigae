<?php

class TrainingsController extends BackEndController
{
	public $icon_class = 'fa fa-map-marker';
	
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_masters_employee_rewards_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Rewards'));
		$this->title[] = at('Employee Rewards');
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
		$model=new MastersEmployeeHistoryTrainings;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_GET['id']))
			$model->employee_id = $_GET['id'];

		if(isset($_POST['MastersEmployeeHistoryTrainings']))
		{
			$model->attributes=$_POST['MastersEmployeeHistoryTrainings'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['MastersEmployeeHistoryTrainings']))
		{
			$model->attributes=$_POST['MastersEmployeeHistoryTrainings'];
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
		$model=new MastersEmployeeHistoryTrainings('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MastersEmployeeHistoryTrainings']))
			$model->attributes=$_GET['MastersEmployeeHistoryTrainings'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MastersEmployeeHistoryTrainings the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MastersEmployeeHistoryTrainings::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MastersEmployeeHistoryTrainings $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='masters-employee-history-training-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAjaxgetdata()
	{
		if($_POST['id']==0) {
			$model 				= new MastersEmployeeHistoryTrainings;
			$model->employee_id = $_POST['employee_id'];
		}
		else{
			$model = $this->loadModel($_POST['id']);
		}

		if($_POST['action']!='view') $this->renderPartial('/employee/trainings/_formAjax', array('training'=>$model));
		else $this->renderPartial('/employee/trainings/_viewAjax', array('training'=>$model));
	}

	public function actionAjaxcreate($id){
		$model = new MastersEmployeeHistoryTrainings;
		
		if($id!='') $model = MastersEmployeeHistoryTrainings::model()->findByPk($id);				
	      
		// print_r($_POST);die();
		$model->employee_id 		= $_POST['employee_id'];
		$model->type_id				= $_POST['type_id'];
		$model->is_internal 		= $_POST['is_internal'];
		$model->topic  				= $_POST['topic'];
		$model->trainer_name		= $_POST['trainer_name'];		
		$model->organizer 			= $_POST['organizer'];
		$model->training_date 		= $_POST['training_date'];
		$model->long_trained 		= $_POST['long_trained'];
		$model->certificate_date	= $_POST['certificate_date'];
		$model->certificate_no 		= $_POST['certificate_no'];


		if($model->save()) $_POST['success'] = 1;
		else $_POST['success'] = 0;

		$_POST['id'] 						= $id;
		$_POST['error_employee_id']			= '';
		$_POST['error_type_id'] 			= '';
		$_POST['error_is_internal'] 		= '';
		$_POST['error_topic'] 				= '';
		$_POST['error_trainer_name']		= '';	
		$_POST['error_organizer'] 			= '';
		$_POST['error_training_date'] 		= '';
		$_POST['error_long_trained'] 		= '';
		$_POST['error_certificate_date'] 	= '';
		$_POST['error_certificate_no']  	= '';

		if(isset($model->errors['employee_id'][0])) $_POST['error_employee_id'] = $model->errors['employee_id'][0];
		if(isset($model->errors['type_id'][0])) $_POST['error_type_id'] = $model->errors['type_id'][0];
		if(isset($model->errors['is_internal'][0])) $_POST['error_is_internal'] = $model->errors['is_internal'][0];
		if(isset($model->errors['topic'][0])) $_POST['error_topic'] = $model->errors['topic'][0];
		if(isset($model->errors['trainer_name'][0])) $_POST['error_trainer_name'] = $model->errors['trainer_name'][0];
		if(isset($model->errors['organizer'][0])) $_POST['error_organizer'] = $model->errors['organizer'][0];		
		if(isset($model->errors['training_date'][0])) $_POST['error_training_date'] = $model->errors['training_date'][0];		
		if(isset($model->errors['long_trained'][0])) $_POST['error_long_trained'] = $model->errors['long_trained'][0];		
		if(isset($model->errors['certificate_date'][0])) $_POST['error_certificate_date'] = $model->errors['certificate_date'][0];		
		if(isset($model->errors['certificate_no'][0])) $_POST['error_certificate_no'] = $model->errors['certificate_no'][0];		

		echo json_encode($_POST);
	}
}
