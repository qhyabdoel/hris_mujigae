<?php

class AttendancesController extends BackEndController
{
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_attendances_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Attendances'));
		$this->title[] = at('Attendances');
	}

	public function actionTes(){
		// $emailbodydetail 	= array('emailbodydetail' => '$message');
		// $mail 				= new YiiMailer();
		
		// $mail->setView('template');
		// $mail->setFrom('6309234@gmail.com', 'hris');
		// $mail->setTo('qhyabdoel@gmail.com');
		// $mail->setData($emailbodydetail);
		// $mail->setSubject('Berita Acara Request');
		// $mail->send();		

		$date_from_db 	= AttendancePresencesRecap::model()->find()->date;
		$date 			= strtotime($date_from_db);
		$date_indo 		= date('j',$date).' '.getMonthName()[date('n',$date)-1].' '.date('Y',$date);

		echo $date_from_db.' = '.$date_indo;
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
			// echo "<pre>";
			// print_r($_POST['AttendancePresencesRecap']);
			// echo "</pre>";
			// die();

			$check_in 			= $_POST['AttendancePresencesRecap']['check_in'];
			$check_out 			= $_POST['AttendancePresencesRecap']['check_out'];			
			$date 				= $_POST['AttendancePresencesRecap']['date'];
			$model->attributes 	= $_POST['AttendancePresencesRecap'];
			$model->check_in 	= $date.' '.$check_in;
			$model->check_out 	= $date.' '.$check_out;			

			if(isset($_POST['AttendancePresencesRecap']['break_out']))
				$model->break_out = $date.' '.$_POST['AttendancePresencesRecap']['break_out'];

			if(isset($_POST['AttendancePresencesRecap']['break_in']))
				$model->break_in  = $date.' '.$_POST['AttendancePresencesRecap']['break_in'];

			if($model->save()) $this->redirect(array('index'));
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
				$this->redirect(array('index'));
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
	 * @return AttendancePresencesRecap the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AttendancePresencesRecap::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
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
	
	public function actionImport()
	{
		$model = new ImportForm;
		
		if(isset($_POST['ImportForm']))
		{
			$model->attributes 	= $_POST['ImportForm'];
			$table 				= AttendancePresences::model();
			$table_name 		= $table->tableSchema->name;
			$table_name_temp 	= $table_name.'_temp';
			
			$table->clearTemporary($table_name_temp);
			MyHelper::ImportFile($model, $table_name_temp, '`employee_id`, `date`, `shift_id`, `type`, `presence_date`');
			$table->moveDataImport($table_name, $table_name_temp);
		}

		$this->render("import",array('model'=>$model));
	}
	
	public function actionGenerate()
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

		$this->render('generate',array('model'=>$model,'year_val'=>$year,'month'=>$month));

		// $model = new GenerateAttendanceForm;
		
		// if(isset($_POST['GenerateAttendanceForm']))
		// {
		// 	$model->attributes=$_POST['GenerateAttendanceForm'];
		// 	$model->moveDataToRecap();
		// } else {
		// 	$model->periode_type = 'current';
		// }
		
		// $currentPeriode = MyHelper::getCurrentPayPeriode();
		// if($model->periode_type == 'current')
		// {
		// 	if($model->start_date == '')
		// 		$model->start_date = $currentPeriode['from'];
			
		// 	if($model->end_date == '')
		// 		$model->end_date = $currentPeriode['to'];
		// }

		// $this->render("generate",array(
		// 	'model' 			=> $model,
		// 	'currentPeriode' 	=> $currentPeriode,
		// ));
	}

	public function actionBeritaacara_view($id){		
		$request = AttendancePresencesRequest::model()->findByPk($id);		
		if($request->status=='draft') $this->redirect(array('beritaacara&id='.$request->attendance_id.'&request='.$id));

		$this->render('beritaacara_view',array(
			'model' => $request,			
		));
	}

	public function actionBeritaacara_approve($id){		
		$request = AttendancePresencesRequest::model()->findByPk($id);		
		$request->approved_by = 'admin';
		$request->status = 'approved';		

		$recap = AttendancePresencesRecap::model()->findByAttributes(array(
			'employee_id'=>$request->employee_id, 'date'=>$request->date, 'location_id' => $request->location_id
		));

		if(count($recap)!=0){
			$recap->check_in 	= $request->check_in;
			$recap->check_out 	= $request->check_out;
			$recap->break_out 	= $request->break_out;
			$recap->break_in 	= $request->break_in;

			$recap->save();
		}
		else{
			$recap 				= new AttendancePresencesRecap;
			$recap->employee_id = $request->employee_id;
			$recap->shift_id 	= $request->shift_id;
			$recap->date 	 	= $request->date;
			$recap->type 	 	= $request->type;
			$recap->check_in 	= $request->check_in;
			$recap->check_out 	= $request->check_out;
			$recap->break_out 	= $request->break_out;
			$recap->break_in 	= $request->break_in;
			$recap->location_id	= $request->location_id;
			$recap->type 		= 'CI';

			$recap->save();	
		}			

		$request->save();

		$this->render('beritaacara_view',array(
			'model' => $request,			
		));
	}

	public function actionBeritaacara_reject($id){		
		$request 				= AttendancePresencesRequest::model()->findByPk($id);		
		$request->rejected_by 	= 'admin';
		$request->status 		= 'rejected';		

		$request->save();

		$this->render('beritaacara_view',array(
			'model' => $request,			
		));
	}
}
