<?php
class SlipController extends BackEndController
{
	public $icon_class = 'glyphicon glyphicon-user';
	
	public function init() {
		parent::init();

		// Add Breadcrumb
		$this->addBreadCrumb(at('Salary Slip'));
		$this->title[] = at('Salary Slip');
	}
	
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionIndex()
	{
		$model=new PayrollSalary('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PayrollSalary']))
			$model->attributes=$_GET['PayrollSalary'];

		$this->render('index',array(
			'model'=>$model,
			'employee'=>MastersEmployees::model()->findByPk(getUser()->id),
		));
	}

	public function loadModel($id)
	{
		$model=PayrollSalary::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
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
}
