<?php

class StatesController extends BackEndController
{
	public $icon_class = 'fa fa-map-marker';
	
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_reference_states_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Geography'));
		$this->addBreadCrumb(at('States'));
		$this->title[] = at('States');
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->addBreadCrumb(at('View').' #'.$id);
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
		$this->addBreadCrumb(at('Create'));
		$model=new ReferenceGeoStates;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ReferenceGeoStates']))
		{
			$model->attributes=$_POST['ReferenceGeoStates'];
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
		$this->addBreadCrumb(at('Update').' #'.$id);
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ReferenceGeoStates']))
		{
			$model->attributes=$_POST['ReferenceGeoStates'];
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
		$model=new ReferenceGeoStates('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ReferenceGeoStates']))
			$model->attributes=$_GET['ReferenceGeoStates'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ReferenceGeoStates the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ReferenceGeoStates::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ReferenceGeoStates $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='reference-geo-states-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionDynamicCities($id)
	{
		echo CHtml::tag('option', array('value'=>''), '', true);
		if ($id <> '')
		{
			$model = $this->loadModel($id);
			foreach($model->referenceGeoCities as $city)
			{
				echo CHtml::tag('option', array('value'=>$city->id), CHtml::encode($city->name), true);
			}
		}
	}
}
