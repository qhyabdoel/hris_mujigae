<?php

class StandardSalaryController extends BackEndController
{
	public $icon_class = 'fa fa-suitcase';
	
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_payroll_standard_salary_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Standard Salary'));
		$this->title[] = at('Standard Salary');
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
		$model=new PayrollBasedSalaries;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PayrollBasedSalaries']))
		{
			$model->attributes=$_POST['PayrollBasedSalaries'];
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

		if(isset($_POST['PayrollBasedSalaries']))
		{
			$model->attributes=$_POST['PayrollBasedSalaries'];
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
		$model=new PayrollBasedSalaries('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PayrollBasedSalaries']))
			$model->attributes=$_GET['PayrollBasedSalaries'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PayrollBasedSalaries the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PayrollBasedSalaries::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PayrollBasedSalaries $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='payroll-standard-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionImport()
	{
		$model = new ImportForm;
		if(isset($_POST['ImportForm']))
		{
			$model->attributes=$_POST['ImportForm'];
			MyHelper::ImportFile($model,
					AttendancePresences::model()->tableSchema->name,
					'`year`, `city_id`, `department_id`, `section_id`, `position_id`, `years_of_service_start`, `years_of_service_end`, `level_id`, `grade_id`, `basic_salary_from`, `basic_salary_to`, `basic_salary_inc_amount`, `basic_salary_inc_percentage`',
					array("attendance/schedulle"));
		}

		$this->render("importcsv",array('model'=>$model));
	}
}
