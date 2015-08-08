<?php

class OffController extends BackEndController
{
	public function init() {
		parent::init();
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Attendance Off'));
		$this->title[] = at('Attendance Off');
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
	 * Manages all models.
	 */
	public function actionIndex()
	{
		// $this->redirect(array('create'));

		$model = new AttendancePresencesRequestOff('search');

		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['AttendancePresencesRequestOff']))
			$model->attributes = $_GET['AttendancePresencesRequestOff'];

		$this->render('index',array(
			'model' => $model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AttendancePresencesRequestOff']))
		{
			$model->attributes 	= $_POST['AttendancePresencesRequestOff'];
			$model->status 		= 'saved';

			if($model->save()) $this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionCreate(){
		$model = new AttendancePresencesRequestOff;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AttendancePresencesRequestOff']))
		{
			$model->attributes 	= $_POST['AttendancePresencesRequestOff'];
			$model->status 		= 'draft';
			$model->created_by 	= getUser()->role;
			$model->created_at 	= date('Y-m-d H:i:s');

			if($_POST['action']=='Save') $model->status = 'saved';
			
			if($model->save()) $this->redirect(array('view','id'=>$model->id));
			else print_r($model->errors);
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AttendancePresencesRequestOff the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AttendancePresencesRequestOff::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionSmcalendar()
	{
		$model=new SchedulleForm;
		if(isset($_POST['SchedulleForm']))
		{
			$model->attributes=$_POST['SchedulleForm'];
		}
		$model = $this->setSchedulleDays($model);
		
		$this->renderPartial('smcalendar',array(
			'model'=>$model,
		));
	}
}
