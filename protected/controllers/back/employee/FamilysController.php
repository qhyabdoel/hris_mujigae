<?php

class FamilysController extends BackEndController
{
	public $icon_class = 'fa fa-map-marker';
	
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_masters_employee_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Familys'));
		$this->title[] = at('Employee Familys');
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
		$model=new MastersEmployeeFamilys;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_GET['id']))
			$model->employee_id = $_GET['id'];

		if(isset($_POST['MastersEmployeeFamilys']))
		{
			$model->attributes=$_POST['MastersEmployeeFamilys'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		} else {
			if(isset($_GET['id'])) $model->employee_id = $_GET['id'];
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

		if(isset($_POST['MastersEmployeeFamilys']))
		{
			$model->attributes=$_POST['MastersEmployeeFamilys'];
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
		$model=new MastersEmployeeFamilys('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MastersEmployeeFamilys']))
			$model->attributes=$_GET['MastersEmployeeFamilys'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MastersEmployeeFamilys the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MastersEmployeeFamilys::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MastersEmployeeFamilys $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='masters-employee-familys-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAjaxcreate($id){
		$model = new MastersEmployeeFamilys;
		
		if($id!='') $model = MastersEmployeeFamilys::model()->findByPk($id);
	      
		$model->employee_id = $_POST['employee_id'];
		$model->group_id	= $_POST['group_id'];
		$model->status_id 	= $_POST['status_id'];
		$model->family_no 	= $_POST['family_no'];
		$model->name 		= $_POST['name'];
		$model->gender 		= $_POST['gender'];
		$model->address_id 	= $_POST['address_id'];

		$model->birthplace_country_id 		= $_POST['birthplace_country_id'];
		$model->birthplace_state_id 		= $_POST['birthplace_state_id'];
		$model->birthplace_city_id 			= $_POST['birthplace_city_id'];
		$model->birthplace_district_id 		= $_POST['birthplace_district_id'];
		
		$model->poscode 			= $_POST['poscode'];
		$model->birthdate 			= $_POST['birthdate'];
		$model->age 				= $_POST['age'];
		$model->mobile 				= $_POST['mobile'];
		$model->phone 				= $_POST['phone'];
		$model->education_level		= $_POST['education_level'];
		$model->job 				= $_POST['job'];
		$model->job_position 		= $_POST['job_position'];

		if($model->save()) $_POST['success'] = 1;
		else $_POST['success'] = 0;

		$_POST['id'] 				= $id;
		$_POST['error_employee_id'] = '';
		$_POST['error_group_id'] 	= '';
		$_POST['error_status_id'] 	= '';
		$_POST['error_family_no'] 	= '';
		$_POST['error_name'] 		= '';
		$_POST['error_gender'] 		= '';
		$_POST['error_address_id'] 	= '';

		$_POST['error_birthplace_country_id'] 	= '';
		$_POST['error_birthplace_state_id'] 	= '';
		$_POST['error_birthplace_city_id'] 		= '';
		$_POST['error_birthplace_district_id']	= '';

		$_POST['error_poscode']			= '';
		$_POST['error_birthdate']		= '';
		$_POST['error_age']				= '';
		$_POST['error_mobile']			= '';
		$_POST['error_phone']			= '';
		$_POST['error_education_level']	= '';
		$_POST['error_job']				= '';
		$_POST['error_job_position']	= '';

		if(isset($model->errors['employee_id'][0])) $_POST['error_employee_id'] = $model->errors['employee_id'][0];
		if(isset($model->errors['group_id'][0])) $_POST['error_group_id'] = $model->errors['group_id'][0];
		if(isset($model->errors['status_id'][0])) $_POST['error_status_id'] = $model->errors['status_id'][0];
		if(isset($model->errors['family_no'][0])) $_POST['error_family_no'] = $model->errors['family_no'][0];
		if(isset($model->errors['name'][0])) $_POST['error_name'] = $model->errors['name'][0];
		if(isset($model->errors['gender'][0])) $_POST['error_gender'] = $model->errors['gender'][0];
		if(isset($model->errors['address_id'][0])) $_POST['address_id'] = $model->errors['address_id'][0];
		if(isset($model->errors['birthplace_country_id'][0])) $_POST['error_birthplace_country_id'] = $model->errors['birthplace_country_id'][0];
		if(isset($model->errors['birthplace_state_id'][0])) $_POST['error_birthplace_state_id'] = $model->errors['birthplace_state_id'][0];
		if(isset($model->errors['birthplace_city_id'][0])) $_POST['error_birthplace_city_id'] = $model->errors['birthplace_city_id'][0];
		if(isset($model->errors['birthplace_district_id'][0])) $_POST['error_birthplace_district_id'] = $model->errors['birthplace_district_id'][0];
		if(isset($model->errors['poscode'][0])) $_POST['error_poscode'] = $model->errors['poscode'][0];
		if(isset($model->errors['birthdate'][0])) $_POST['error_birthdate'] = $model->errors['birthdate'][0];
		if(isset($model->errors['age'][0])) $_POST['error_age'] = $model->errors['age'][0];
		if(isset($model->errors['mobile'][0])) $_POST['error_mobile'] = $model->errors['mobile'][0];
		if(isset($model->errors['phone'][0])) $_POST['error_phone'] = $model->errors['phone'][0];
		if(isset($model->errors['education_level'][0])) $_POST['error_education_level'] = $model->errors['education_level'][0];
		if(isset($model->errors['job'][0])) $_POST['error_job'] = $model->errors['job'][0];
		if(isset($model->errors['job_position'][0])) $_POST['job_position'] = $model->errors['job_position'][0];

		echo json_encode($_POST);
	}

	public function actionAjaxgetdata(){
		if($_POST['id']==0) {
			$model 				= new MastersEmployeeFamilys;
			$model->employee_id = $_POST['employee_id'];
		}
		else{
			$model = $this->loadModel($_POST['id']);
		}

		if($_POST['action']!='view') $this->renderPartial('/employee/familys/_formAjax', array('family'=>$model));
		else $this->renderPartial('/employee/familys/_viewAjax',array('model'=>$model));
	}
}
