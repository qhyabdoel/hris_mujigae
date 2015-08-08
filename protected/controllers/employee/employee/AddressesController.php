<?php

class AddressesController extends BackEndController
{
	public $icon_class = 'fa fa-map-marker';
	
	public function init() {
		parent::init();

		// Add Breadcrumb
		$this->addBreadCrumb(at('My Addresses'));
		$this->title[] = at('My Addresses');
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
		$model=new MastersEmployeeAddresses;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MastersEmployeeAddresses']))
		{
			$model->attributes=$_POST['MastersEmployeeAddresses'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		} else {
			$model->employee_id = getUser()->id;
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

		if(isset($_POST['MastersEmployeeAddresses']))
		{
			$model->attributes=$_POST['MastersEmployeeAddresses'];
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
		$model=new MastersEmployeeAddresses('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MastersEmployeeAddresses']))
			$model->attributes=$_GET['MastersEmployeeAddresses'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MastersEmployeeAddresses the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$c = new CDbCriteria();
		$c->compare('id', $id);
		$c->compare('employee_id', getUser()->id);
		
		$model=MastersEmployeeAddresses::model()->find($c);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MastersEmployeeAddresses $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='masters-employee-addresses-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAjaxgetdata(){
		if($_POST['id']==0) {
			$model 				= new MastersEmployeeAddresses;
			$model->employee_id = $_POST['employee_id'];
		}
		else{
			$model = $this->loadModel($_POST['id']);
		}

		if($_POST['action']!='view') $this->renderPartial('/employee/addresses/_formAjax', array('address'=>$model));
		else $this->renderPartial('/employee/addresses/_viewAjax',array('address'=>$model));
	}

	public function actionAjaxCreate($id){
		
	}
}
