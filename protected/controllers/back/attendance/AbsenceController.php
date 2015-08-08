<?php

class AbsenceController extends BackEndController
{
	public function init() {
		parent::init();
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Absence'));
		$this->title[] = at('Absence');
	}

	public function actionTes()
	{
		
	}

	public function actionCreate(){
		$model 		= new AttendanceAbsences;
		$modelPhoto = new ImportForm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AttendanceAbsences']))
		{
			$model->attributes 		= $_POST['AttendanceAbsences'];			
			$modelPhoto->attributes = $_POST['ImportForm'];
			$imgFile 				= CUploadedFile::getInstance($modelPhoto, 'file');

			if($_POST['command']=='save') $model->status = 'approved';
			
			if($model->doctor_note==1)
			{
				if(count($imgFile)==0) 
					$model->validatorList->add(CValidator::createValidator('letter_required', $model, 'doctor_letter_proof'));
			} 

			if($model->save()){								 	
				if(count($imgFile)!=0) $imgFile->saveAs(letterPaths().$model->id.'.jpg');
				if($_POST['command']=='save' && $model->type!='Late') $model->savePresence();				
				$this->redirect(array('index'));
			}				
		}

		$this->render('create',array(
			'model' 		=> $model,
			'modelPhoto' 	=> $modelPhoto
		));
	}

		/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model 		= AttendanceAbsences::model()->findByPk($id);
		$modelPhoto = new ImportForm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AttendanceAbsences']))
		{
			$model->attributes 		= $_POST['AttendanceAbsences'];
			$model->status 			= 'approved';
			$modelPhoto->attributes = $_POST['ImportForm'];
			$imgFile 				= CUploadedFile::getInstance($modelPhoto, 'file');

			if(count($imgFile)==1) $imgFile->saveAs(letterPaths().$id.'.jpg');

			if($model->save()){
				if($_POST['command']=='save' && $model->type!='Late') $model->savePresence();
				$this->redirect(array('index'));
			}
		}

		$this->render('update',array(
			'model' 		=> $model,
			'modelPhoto' 	=> $modelPhoto,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model = new AttendanceAbsences('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AttendanceAbsences']))
			$model->attributes=$_GET['AttendanceAbsences'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model' => AttendanceAbsences::model()->findByPk($id)
		));
	}

	public function actionDelete($id)
	{
		$model 				= AttendanceAbsences::model()->findByPk($id);
		$model->is_deleted 	= 1;
		$model->save();		

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
}
