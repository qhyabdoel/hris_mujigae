<?php

class RewardsController extends BackEndController
{
	public $icon_class = 'fa fa-map-marker';
	
	public function init() {
		parent::init();

		// Add Breadcrumb
		$this->addBreadCrumb(at('My Rewards'));
		$this->title[] = at('My Rewards');
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
		$model=new MastersEmployeeHistoryRewards;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MastersEmployeeHistoryRewards']))
		{
			$model->attributes=$_POST['MastersEmployeeHistoryRewards'];
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

		if(isset($_POST['MastersEmployeeHistoryRewards']))
		{
			$model->attributes=$_POST['MastersEmployeeHistoryRewards'];
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
		$model=new MastersEmployeeHistoryRewards('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MastersEmployeeHistoryRewards']))
			$model->attributes=$_GET['MastersEmployeeHistoryRewards'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MastersEmployeeHistoryRewards the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$c = new CDbCriteria();
		$c->compare('id', $id);
		$c->compare('employee_id', getUser()->id);
		
		$model=MastersEmployeeHistoryRewards::model()->find($c);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MastersEmployeeHistoryRewards $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='masters-employee-history-rewards-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
