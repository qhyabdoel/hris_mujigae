<?php

class SchedulleController extends BackEndController
{
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_attendance_schedulles_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Attendance Schedulles'));
		$this->title[] = at('Attendance Schedulles');
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
		JSFile(themeUrl('js/plugins/smcalendar/smcalendar.js'), CClientScript::POS_HEAD);
		$model 		= new SchedulleForm;
		$employees 	= array();
		$daysValue 	= array();
		$holidays  	= CHtml::listData(PayrollHolidayPay::model()->findAll(), 'id', 'date');		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SchedulleForm']))
		{
			$model->attributes=$_POST['SchedulleForm'];
			$model->save();
			
			$employees = MastersEmployees::model()->findAllByAttributes(array('department_id'=>$model->department_id));
			$daysValue = $model->daysValue;
			
			// if($model->save()) $this->redirect(array('update','model'=>$model));						
		} else {
			// $model->employee_id = 1;
			
			$model->year = (int)date('Y');
			$model->month = (int)date('m')-1;
		}
		
		// $model = $this->setSchedulleDays($model);

		$this->render('create',array(
			'model' 	=> $model,
			'employees' => $employees,
			'daysValue' => $daysValue,
			'holidays' 	=> $holidays,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{		
		JSFile(themeUrl('js/plugins/smcalendar/smcalendar.js'), CClientScript::POS_HEAD);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SchedulleForm']))
		{
			$model->attributes=$_POST['SchedulleForm'];
			$model->save();
			if($model->save()) $this->redirect(array('update','model'=>$model));						
		} else {
			// $model->employee_id = 1;
			$model->year = (int)date('Y');
			$model->month = (int)date('m')-1;
		}

		$employees = MastersEmployees::model()->findAllByAttributes(array('department_id'=>$model->department_id));

		$this->render('update',array(
			'model'=>$model,'employees'=>$employees,
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
		$model=new AttendanceSchedulle('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AttendanceSchedulle']))
			$model->attributes=$_GET['AttendanceSchedulle'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AttendanceSchedulle the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AttendanceSchedulle::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AttendanceSchedulle $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='attendance-schedulle-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	private function sqlData()
	{
		$sql = "EXECUTE sp_RECAP_PRESENCES @periode_start=:p_start, @periode_end=:p_end";
	}
	
	// public function setSchedulleDays($model)
	// {
	// 	if($model->employee_id > 0)
	// 	{
	// 		$employee = MastersEmployees::model()->findByPk($model->employee_id);
	// 		if(count($employee) == 0)
	// 			$model->employee_id = '';
	// 		else {
	// 			$c = new CDbCriteria;
	// 			$c->select = 'schedulle_date, DAY(schedulle_date) AS sch_day, shift_id';
	// 			$c->compare('employee_id', $model->employee_id);
	// 			$c->compare('department_id', $employee->department_id);
	// 			$c->compare('YEAR(schedulle_date)', $model->year);
	// 			$c->compare('MONTH(schedulle_date)', $model->month+1);
	// 			$schedulles = AttendanceSchedulle::model()->findAll($c);
				
	// 			foreach($schedulles as $schedulle)
	// 			{
	// 				$model->days[$schedulle->sch_day] = $schedulle->shift_id;
	// 			}
	// 		}
	// 	}
		
	// 	return $model;
	// }


	
	public function actionSmcalendar()
	{
		$model = new SchedulleForm;

		if(isset($_POST['SchedulleForm']))
		{
			$model->attributes=$_POST['SchedulleForm'];
		}	

		$employees = MastersEmployees::model()->findAllByAttributes(array('department_id'=>$model->department_id));		
		$daysValue = $model->daysValue;
		$holidays  = CHtml::listData(PayrollHolidayPay::model()->findAll(), 'id', 'date');
		
		$this->renderPartial('smcalendar',array(
			'model' 	=> $model,
			'employees' => $employees,
			'daysValue' => $daysValue,
			'holidays' 	=> $holidays,
		));
	}
	
	public function actionEmployeeSchedulle()
	{
		header('Content-type: application/json');
		$schedulles = AttendanceSchedulle::model()->findAll();
		$data = array();
		foreach($schedulles as $schedulle)
		{
			$data[] = array('title'=>$schedulle->shift->name, 'start'=>$schedulle->schedulle_date, 'allDay'=>true);
		}
		echo CJSON::encode($data);
	}
}
