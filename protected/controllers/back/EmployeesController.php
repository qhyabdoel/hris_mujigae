<?php

class EmployeesController extends BackEndController
{
	public $icon_class = 'glyphicon glyphicon-user';
	
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_masters_employees_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Employees'));
		$this->title[] = at('Employees');
	}

	public function actionTes()
	{
		$employees = MastersEmployees::model()->findAll();
		
		foreach ($employees as $key => $value) {
			$value->code = '0'.$value->code;
			$value->save();			
		}		
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
		$model 		= new MastersEmployees;
		$modelPhoto = new ImportForm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MastersEmployees']))
		{
			$model->attributes=$_POST['MastersEmployees'];
			if($model->save())
			{
				if(isset($_POST['ImportForm'])){
					$modelPhoto->attributes=$_POST['ImportForm'];
					$imgFile = CUploadedFile::getInstance($modelPhoto, 'file');
					//$imgFile->saveAs(profilePaths.$model->code.'.jpg');
				}
				$this->redirect(array('update','id'=>$model->id));
			}
		} else {
			$model->type_id = 2;	//Probation 1
		}

		$this->render('create',array(
			'model' 	 => $model,
			'modelPhoto' => $modelPhoto,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model 		= $this->loadModel($id);
		$modelPhoto = new ImportForm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MastersEmployees']))
		{
			$model->attributes = $_POST['MastersEmployees'];
			
			if($model->save())
			{
				if(isset($_POST['ImportForm'])){
					$modelPhoto->attributes=$_POST['ImportForm'];
					$imgFile = CUploadedFile::getInstance($modelPhoto, 'file');
					if(isset($imgFile)) $imgFile->saveAs(profilePaths().$model->code.'.jpg');										
				}
				$this->redirect(array('update','id'=>$model->id));
			}
		}

		if(isset($_GET['tab']))$select_tab = $_GET['tab'];
		else $select_tab = 0;

		$this->render('update',array(
			'model' 		=> $model,
			'modelPhoto' 	=> $modelPhoto,
			'select_tab' 	=> $select_tab,
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
		$model=new MastersEmployees('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MastersEmployees']))
			$model->attributes=$_GET['MastersEmployees'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MastersEmployees the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = MastersEmployees::model()->findByPk($id);
		
		if($model===null) throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MastersEmployees $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='masters-employees-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionDynamicStatuses($id)
	{
		$c = new CDbCriteria();
		$c->compare('family_group_id', $id);
		$model = ReferenceFamilyStatuses::model()->findAll($c);
		echo CHtml::tag('option', array('value'=>''), '', true);
		foreach($model as $status)
		{
			echo CHtml::tag('option', array('value'=>$status->id), CHtml::encode($status->name), true);
		}
	}
	
	public function actionChooseList()
	{
		$model=new MastersEmployees('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MastersEmployees']))
			$model->attributes=$_GET['MastersEmployees'];

		$this->renderPartial('chooselist',array(
			'model'=>$model,
		),false,true);
		
		Yii::app()->end();
	}
	
	public function actionSelect($id)
	{
		$model = MastersEmployees::model()->findByPk($id);

		echo CJSON::encode(array
		(
			'id' 		=> $model->primaryKey,
			'name' 		=> $model->getFullName(),
			'dept_id' 	=> $model->department_id,
		));
		
		Yii::app()->end();
	}
	
	public function actionPromotion($id)
	{
		$model = MastersEmployees::model()->findByPk($id);
		
		if(isset($_POST['duallistbox_outlets']))
		{
			print_r($_POST['duallistbox_outlets']);
		}		
		
		$this->render('promotion',array(
			'model'=>$model,
		));
	}
	
	public function actionChooseaa()
	{
		$model = MastersEmployees::model()->findByPk(1);
		echo $model->getFullName();
	}
	
	public function actionSelectlist()
	{
		$model=new MastersEmployees('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MastersEmployees']))
			$model->attributes=$_GET['MastersEmployees'];

		$this->renderPartial('selectlist',array(
			'model'=>$model,
		), false, true);
	}
	
	public function actionMutation($id)
	{
		$model = MutationsRequest::model()->find(array(
			'condition' => 'employee_id = '.$id.' and status <> "rejected" and active_date > Now()'
		));

		if(!isset($model)) $model = new MutationsRequest;
		else $this->redirect(array('mutation_view','id'=>$model->id));

		$model->fill($id);
		
		if(isset($_POST['MutationsRequest']))
		{			
			// echo $_POST['MutationsRequest']['action']; die();
			
			$model->attributes 	= $_POST['MutationsRequest'];
			$model->status 		= 'approved';			

			if($_POST['action']=='draft')
			{
				$model->status = 'draft';	
			}
			else
			{
				$model->approved_by = getUser()->role;
				$model->approved_at = date('Y-m-d h:i:s');
			} 
			
			if($model->save()) $this->redirect(array('mutation_view','id'=>$model->id));		
		}		
		
		$this->render('mutation',array(
			'model'=>$model,
		));
	}

	public function actionMutation_view($id)
	{
		$model = MutationsRequest::model()->findByPk($id);

		$this->render('mutation_view',array(
			'model'=>$model,
		));	
	}

	public function actionMutation_approve($id)
	{
		$model 				= MutationsRequest::model()->findByPk($id);
		$model->status 		= 'approved';
		$model->approved_by = getUser()->role;
		$model->approved_at = date('Y-m-d h:i:s');
		$model->save();

		$this->redirect(array('mutation_view','id'=>$id));
	}

	public function actionMutation_cancel($id)
	{
		$model 				= MutationsRequest::model()->findByPk($id);
		$model->status 		= 'rejected';
		$model->canceled_by = getUser()->role;
		$model->canceled_at = date('Y-m-d h:i:s');
		$model->save();

		$this->redirect(array('mutation_view','id'=>$id));
	}

	public function actionMutation_update($id)
	{
		$model = MutationsRequest::model()->findByPk($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MutationsRequest']))
		{
			$model->attributes 	= $_POST['MutationsRequest'];
			$model->status 		= 'approved';
			$model->approved_by = getUser()->role;
			$model->approved_at = date('Y-m-d h:i:s');

			if($model->save())
				$this->redirect(array('mutation_view','id'=>$id));
		}

		$this->render('mutation_update',array(
			'model'=>$model,
		));
	}

	public function actionRotation($id)
	{
		$model = MutationsRequest::model()->findByAttributes(array('employee_id'=>$id,'status'=>'request'));

		if(!isset($model)) $model = new MutationsRequest;
		else $this->redirect(array('mutation_view','id'=>$model->id));

		$model->fill($id);
		$model->is_rotation();
		
		if(isset($_POST['MutationsRequest']))
		{			
			$model->attributes 	= $_POST['MutationsRequest'];
			$model->status 		= 'approved';
			$model->approved_by = getUser()->role;
			$model->approved_at = date('Y-m-d h:i:s');

			if($model->save()) $this->redirect(array('mutation_view','id'=>$model->id));		
		}		

		$this->render('mutation',array(
			'model'=>$model,
		));
	}
}
