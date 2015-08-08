<?php

class CountriesController extends BackEndController
{
	public $icon_class = 'fa fa-map-marker';
	
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_reference_countries_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Geography'));
		$this->addBreadCrumb(at('Countries'));
		$this->title[] = at('Countries');
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
		$model=new ReferenceGeoCountries;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ReferenceGeoCountries']))
		{
			$model->attributes=$_POST['ReferenceGeoCountries'];
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

		if(isset($_POST['ReferenceGeoCountries']))
		{
			$model->attributes=$_POST['ReferenceGeoCountries'];
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

	private function sqlData($filterParams=array())
	{
		//$sql = "EXECUTE sp_RECAP_PRESENCES @periode_start=:p_start, @periode_end=:p_end";
		//$sql = "CALL sp_RECAP_PRESENCES('2015-03-30', '2015-03-30')";
		$sql = "select * from reference_geo_countries";
		
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
	
		/*if(array_key_exists('periodeStart', $filterParams)){
			$command->bindValue(":p_start", $filterParams['periodeStart ']);
		} else{
			$command->bindValue(":p_start", "2015-03-30");
		}

		if(array_key_exists('periodeEnd', $filterParams)){
			$command->bindValue(":p_end", $filterParams['periodeEnd ']);
		}else{
			$command->bindValue(":p_end", "2015-03-30");
		}*/
		
		$results = $command->queryAll();
		
		//$results=ReferenceGeoCountries::model()->findAll();
		//print_r($results); die();
		
		return new CArrayDataProvider($results, array(
			//'keyField'=>'id',
			'pagination'=>false,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		/*$model=new ReferenceGeoCountries('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ReferenceGeoCountries']))
			$model->attributes=$_GET['ReferenceGeoCountries'];*/

		$model = $this->sqlData();
		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ReferenceGeoCountries the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ReferenceGeoCountries::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ReferenceGeoCountries $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='reference-geo-countries-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionDynamicStates($id)
	{
		$model = $this->loadModel($id);
		echo CHtml::tag('option', array('value'=>''), '', true);
		foreach($model->referenceGeoStates as $state)
		{
			echo CHtml::tag('option', array('value'=>$state->id), CHtml::encode($state->name), true);
		}
	}
}
