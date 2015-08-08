<?php

class AttendancesController extends BackEndController
{
	public function init() {
		parent::init();
		
		// Check Access
		//checkAccessThrowException('op_attendances_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Attendances'));
		$this->title[] = at('Attendances');
	}

	public function actionTes(){
		print_r(AttendancePresencesRecap::model()->find()->location);
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
		$model=new AttendancePresencesRecap;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AttendancePresencesRecap']))
		{
			$model->attributes=$_POST['AttendancePresencesRecap'];
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

		if(isset($_POST['AttendancePresencesRecap']))
		{
			$model->attributes=$_POST['AttendancePresencesRecap'];
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
		$model 	= array();
		$year 	= date('Y');
		$month 	= date('j');

		if(isset($_POST['period_month'])){			
			$model 	= new AttendancePresencesRecap;
			$year 	= $_POST['period_year'];
			$month 	= $_POST['period_month'];
			$month 	= $month+1;					
			$period = MyHelper::getPayPeriode($month,$year);
			$month 	= $month-1;

			// echo $period['from'].', '.$period['to'];

			$model->unsetAttributes();  // clear any default values
			
			$model = $model->searchBy(Yii::app()->user->id,$period);
			$model->pagination = false;
		}	
		
		if(isset($_GET['AttendancePresencesRecap'])) $model->attributes=$_GET['AttendancePresencesRecap'];

		$this->render('index',array('model'=>$model,'year_val'=>$year,'month'=>$month));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AttendancePresences the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AttendancePresencesRecap::model()->findByPk($id);
		// if($model===null)
		// 	throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AttendancePresencesRecap $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='attendance-presences-recap-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionBeritaacara_view($id){
		$model = AttendancePresencesRequest::model()->findByPk($id);
		if($model->status=='draft') $this->redirect(array('beritaacara_update','id'=>$id));
		$this->render('beritaacara_view',array('model'=>$model));
	}

	public function actionBeritaacara_update($id)
	{
		$model 				= AttendancePresencesRequest::model()->findByPk($id);
		$model->check_in 	= substr($model->check_in, -8);
		$model->check_out 	= substr($model->check_out, -8);
		$model->break_out 	= substr($model->break_out, -8);
		$model->break_in 	= substr($model->break_in, -8);
		$locations			= CHtml::listData(MastersLocation::model()->findAll(), 'id', 'name');


		if(isset($_POST['AttendancePresencesRequest']))
		{
			$model->attributes=$_POST['AttendancePresencesRequest'];						
			$model->attendance_id = $_POST['attendance_id'];

			$break_out 	= '00:00:00';
			$break_in 	= '00:00:00';

			if(isset($_POST['AttendancePresencesRequest']['break_out'])){
				$break_out = $_POST['AttendancePresencesRequest']['break_out'];
				$break_in  = $_POST['AttendancePresencesRequest']['break_in'];
			}	

			$check_in 			= $_POST['AttendancePresencesRequest']['check_in'];
			$check_out 			= $_POST['AttendancePresencesRequest']['check_out'];			
			$date 				= $_POST['AttendancePresencesRequest']['date'];			
			$model->check_in 	= $date.' '.$check_in;
			$model->check_out 	= $date.' '.$check_out;
			$model->break_out 	= $date.' '.$break_out;
			$model->break_in 	= $date.' '.$break_in;		
			$model->status 		= 'saved';		
			
			if($model->save()) $this->redirect(array('beritaacara_view','id'=>$model->id));
			else print_r($model->errors);
		}

		$this->render('beritaacara',array(
			'model' 		=> $model,
			'locations' 	=> $locations,
			'attendance_id' => $model->attendance_id
		));
	}

	public function actionBeritaacara()
	{				
		$model 		= new AttendancePresencesRequest;		
		$locations	= CHtml::listData(MastersLocation::model()->findAll(), 'id', 'name');	
		$request 	= 0;

		if(isset($_GET['id'])) {
			$attendance	= $this->loadModel($_GET['id']);			

			$request = AttendancePresencesRequest::model()->findByAttributes(array(
				'attendance_id' 	=> $_GET['id'],				
			));

			if(isset($attendance))
			{				
				$attendances = AttendancePresencesRecap::model()->findAllByAttributes(array(
					'employee_id' 	=> $attendance->employee_id,
					'date' 			=> $attendance->date,				
				));
			}
			else{
				$attendances = AttendancePresencesRecap::model()->findAllByAttributes(array(
					'employee_id' 	=> $request->employee_id,
					'date' 			=> $request->date,				
				));	
			}			

			if(count($request)!=0){
				if($request->status=='draft' and $request->created_by='rm')
					$model = $request;
				else $this->redirect(array('beritaacara_view','id'=>$request->id));
			} 

			$locations = array();

			foreach ($attendances as $value) {
				$locations[$value->location_id] = $value->location->name;
			}
		}		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AttendancePresencesRequest']))
		{			
			if(isset($_POST['yt0']) or isset($_POST['yt1']) or isset($_POST['yt2'])){				
				$model->attributes=$_POST['AttendancePresencesRequest'];			
				if(isset($_POST['yt1'])) $model->status = 'saved';
				if(isset($_POST['yt0']) and $_POST['yt0']=='Save') $model->status = 'saved';
				$model->attendance_id = $_POST['attendance_id'];

				$break_out 	= '00:00:00';
				$break_in 	= '00:00:00';

				if(isset($_POST['AttendancePresencesRequest']['break_out'])){
					$break_out = $_POST['AttendancePresencesRequest']['break_out'];
					$break_in  = $_POST['AttendancePresencesRequest']['break_in'];
				}	

				$check_in 			= $_POST['AttendancePresencesRequest']['check_in'];
				$check_out 			= $_POST['AttendancePresencesRequest']['check_out'];			
				$date 				= $_POST['AttendancePresencesRequest']['date'];			
				$model->check_in 	= $date.' '.$check_in;
				$model->check_out 	= $date.' '.$check_out;
				$model->break_out 	= $date.' '.$break_out;
				$model->break_in 	= $date.' '.$break_in;				
				$model->created_by 	= getUser()->role;
				
				if($model->save()) $this->redirect(array('beritaacara_view','id'=>$model->id));
				else print_r($model->errors);
			}
			else{
				$attendance	= AttendancePresencesRecap::model()->findByAttributes(array(
					'employee_id' 	=> $_POST['AttendancePresencesRequest']['employee_id'],
					'date' 			=> $_POST['AttendancePresencesRequest']['date'],
					'location_id' 	=> $_POST['AttendancePresencesRequest']['location_id']	
				));				
			}
		}

		if(isset($attendance)){			
			if(count($request)==0) $model->attributes = $attendance->attributes;

			if(isset($_GET['request']))
				$model = AttendancePresencesRequest::model()->findByPk($_GET['request']);				
		}		

		$model->check_in 	= substr($model->check_in, 10);
		$model->break_out 	= substr($model->break_out, 10);
		$model->break_in 	= substr($model->break_in, 10);
		$model->check_out 	= substr($model->check_out, 10);

		if($model->check_in==null) $model->check_in = '00:00:00';
		if($model->break_out==null) $model->break_out = '00:00:00';
		if($model->break_in==null) $model->break_in = '00:00:00';
		if($model->check_out==null) $model->check_out = '00:00:00';	

		$attendance_id = 0;
		if(isset($_GET['id'])) $attendance_id = $_GET['id'];

		$this->render('beritaacara',array(
			'model' 		=> $model,
			'locations' 	=> $locations,
			'attendance_id' => $attendance_id
		));
	}

	public function actionBeritaacara_index()
	{
		$model = new AttendancePresencesRequest('search');

		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['AttendancePresencesRequest']))
			$model->attributes = $_GET['AttendancePresencesRequest'];

		$this->render('beritaacara_index',array(
			'model' => $model,
		));
	}

	public function actionBeritaacara_approve($id){		
		$request = AttendancePresencesRequest::model()->findByPk($id);		
		$request->approved_by = getUser()->role;				
		$request->save();

		$this->render('beritaacara_view',array(
			'model' => $request,			
		));
	}

	public function actionBeritaacara_reject($id){		
		$request 				= AttendancePresencesRequest::model()->findByPk($id);		
		$request->status 		= 'rejected';
		$request->rejected_by 	= getUser()->role;				
		$request->save();

		$this->render('beritaacara_view',array(
			'model' => $request,			
		));
	}
}
