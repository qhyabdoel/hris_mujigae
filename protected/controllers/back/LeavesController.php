<?php

class LeavesController extends BackEndController
{
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_masters_leaves_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Leaves'));
		$this->title[] = at('Leaves');
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
		$model=new LeaveRequest;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LeaveRequest']))
		{
			$model->attributes = $_POST['LeaveRequest'];
			$model->status = 'draft';
			
			if($_POST['command']=='save'){
				$model->approval_by_hr 		= 'approved';
				$model->approval_by_hr_time = date('Y-m-d H:i:s');
				$model->status 				= 'approved';
			} 

			if($model->save()) $this->redirect(array('view','id'=>$model->id));
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
		$model = $this->loadModel($id);
		
		// echo "<pre>";
		// print_r($model);
		// echo "</pre>";

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LeaveRequest']))
		{
			$model->attributes 			= $_POST['LeaveRequest'];
			$model->approval_by_hr 		= 'approved';
			$model->approval_by_hr_time = date('Y-m-d H:i:s');
			$model->status 				= 'approved';

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
		$model=new LeaveRequest('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LeaveRequest']))
			$model->attributes=$_GET['LeaveRequest'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return LeaveRequest the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LeaveRequest::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LeaveRequest $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='leave-request-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	public function actionRequest()
	{
		$model=new LeaveRequest('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LeaveRequest']))
			$model->attributes=$_GET['LeaveRequest'];

		$this->render('request',array(
			'model'=>$model,
		));
	}
	
	public function actionApprove($id)
	{
		$model = $this->loadModel($id);

		$model->status 				= 'approved';
		$model->approval_by_hr 		= 'approved';
		$model->approval_by_hr_time = date('Y-m-d H:i:s');

		// $status = isset($_GET['s']) ? ($_GET['s'] == 1 ? 'approved' : 'rejected') : 'rejected';
		// if(getUser()->role == 'rm')
		// {
		// 	$model->approval_by_rm = $status;
		// 	$model->approval_by_rm_time = date('Y-m-d H:i:s');
		// 	if($status == 'rejected')
		// 		$model->status = $status;
		// }
		// if(getUser()->role == 'bm')
		// {
		// 	$model->approval_by_bm = $status;
		// 	$model->approval_by_bm_time = date('Y-m-d H:i:s');
		// 	$model->status = $status;
		// }
		// if(getUser()->role == 'hr')
		// {
		// 	$model->approval_by_hr = $status;
		// 	$model->approval_by_hr_time = date('Y-m-d H:i:s');
		// 	$model->status = $status;
		// }
		
		if($model->save())
			$this->redirect(array('view','id'=>$model->id));
	}
	
	public static function getemailtemple($temppalatename) {
            
		 return $templatedetail=  EmailTemplate1::model()->find("name='".$temppalatename."'");
		
	}
		
	public function VariableReplaceArray($message,$variables) 
	{
		//print_r($variable);
		
		$getvariableArray=array_keys($variables);
		$replacevariableArray=array_values($variables);
		return str_replace($getvariableArray,$replacevariableArray,$message);
	}
	
	public function actionEmail()
	{

		// get data on variable by channa
		$variables = array(
			'{fname}' 		=> 'channa',
			'{lname}' 		=> 'bandara',
			'{email}' 		=> 'channasmcs@gmail.com',
			'{dob}' 		=> '1989-01-01',
			'{password}' 	=> 'thisiamy password',
		);
		  
		//get template using template name by channa
		$templatedata = self::getemailtemple('User Registration Template') ;// function in controller(configuration)            
		
		//get template data in to variable by channa
		$description 	= $templatedata->description;
		$subject 		= $templatedata->subject;
	
		//send $description $description to VariableReplaceArray by channa 
		$emailbody = $this->VariableReplaceArray($description, $variables) ; //function in controller(configuration)  
	 
 		//send email detail to templte using renderPartial by channa
					 
		$emailbodydetail = array('emailbodydetail' => $emailbody);  
				
		//send message detail to template by channa
		$messageUser = $this->renderPartial('/emailtemplate/template',$emailbodydetail,true);

		//set up email configuration by channa
		
		$mail = new YiiMailer();
		//$mail->setLayout('mail');
		$mail->setView('template');
		$mail->setFrom('sari@lapar.com', 'Sarimoon');
		$mail->setTo('sari@beegros.com');
		$mail->setData($emailbodydetail);
		$mail->setSubject('Testing Email');
		
		if ($mail->send()) echo 'sent';
		else echo 'failed';
		
		/*$name = 'channa';
		$email = 'hellochannasmcs@gmail.com';
		$Telephone = '0715977097';
		$to = 'hellochannasmcs@hotmail.com';
		$subject = $subject;           
				 
		$messageAdmin = "Deal Admin";		
					  
		self::email($name, $email, $subject, $messageUser);
		self::email($name, $email, $subject, $messageAdmin, TRUE);      

		$this->render('email');*/
	}
}
