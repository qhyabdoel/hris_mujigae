<?php

class LanguagesController extends BackEndController
{
	public $icon_class = 'fa fa-map-marker';
	
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_masters_employee_languages_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Languages'));
		$this->title[] = at('Employee Languages');
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
		$model=new MastersEmployeeLanguages;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_GET['id']))
			$model->employee_id = $_GET['id'];

		if(isset($_POST['MastersEmployeeLanguages']))
		{
			$model->attributes=$_POST['MastersEmployeeLanguages'];
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

		if(isset($_POST['MastersEmployeeLanguages']))
		{
			$model->attributes=$_POST['MastersEmployeeLanguages'];
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
		$model=new MastersEmployeeLanguages('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MastersEmployeeLanguages']))
			$model->attributes=$_GET['MastersEmployeeLanguages'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MastersEmployeeLanguages the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MastersEmployeeLanguages::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MastersEmployeeLanguages $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='masters-employee-languages-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAjaxgetdata()
	{
		if($_POST['id']==0) {
			$model 				= new MastersEmployeeLanguages;
			$model->employee_id = $_POST['employee_id'];
		}
		else{
			$model = $this->loadModel($_POST['id']);
		}

		if($_POST['action']!='view') $this->renderPartial('/employee/languages/_formAjax', array('language'=>$model));
		else $this->renderPartial('/employee/languages/_viewAjax', array('language'=>$model));
	}

	public function actionAjaxcreate($id){
		$model = new MastersEmployeeLanguages;
		
		if($id!='') $model = MastersEmployeeLanguages::model()->findByPk($id);				
	      
		// print_r($_POST);die();
		$model->employee_id = $_POST['employee_id'];
		$model->language_id	= $_POST['language_id'];
		$model->level 		= $_POST['level'];
		
		if($model->save()) $_POST['success'] = 1;
		else $_POST['success'] = 0;

		$_POST['id'] 				= $id;
		$_POST['error_employee_id']	= '';
		$_POST['error_language_id']	= '';
		$_POST['error_level'] 		= '';

		if(isset($model->errors['employee_id'][0])) $_POST['error_employee_id'] = $model->errors['employee_id'][0];
		if(isset($model->errors['language_id'][0])) $_POST['error_language_id'] = $model->errors['language_id'][0];
		if(isset($model->errors['level'][0])) $_POST['error_level'] = $model->errors['level'][0];		

		echo json_encode($_POST);
	}
}
