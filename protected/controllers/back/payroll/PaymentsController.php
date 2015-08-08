<?php

class PaymentsController extends BackEndController
{
	public $icon_class = 'fa fa-sun-o';
	
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_payroll_payments_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Employee\'s Salaries'));
		$this->title[] = at('Employee\'s Salaries');
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
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PayrollEmployeePayments']))
		{
			$model->attributes=$_POST['PayrollEmployeePayments'];
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
		$model=new PayrollEmployeePayments('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PayrollEmployeePayments']))
			$model->attributes=$_GET['PayrollEmployeePayments'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PayrollEmployeePayments the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PayrollEmployeePayments::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PayrollEmployeePayments $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='payroll-salary-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionGenerate()
	{
		$model = new GenerateAttendanceForm;
		
		if(isset($_POST['GenerateAttendanceForm']))
		{
			$model->attributes=$_POST['GenerateAttendanceForm'];
			$model->generateEmployeeSalaries();
		} else {
			$model->periode_type = 'current';
		}
		
		$currentPeriode = PayrollHelper::getCurrentPayPeriode();
		if($model->periode_type == 'current')
		{
			if($model->start_date == '')
				$model->start_date = $currentPeriode['from'];
			
			if($model->end_date == '')
				$model->end_date = $currentPeriode['to'];
		}

		$this->render("generate",array(
			'model' => $model,
			'currentPeriode' => $currentPeriode,
		));
	}
}