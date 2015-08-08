<?php
class EmployeesController extends BackEndController
{
	public $icon_class = 'glyphicon glyphicon-user';

	public function actionTes()
	{
		$model = $this->loadModel(1);		
		$this->renderPartial('/employees/_formAjax',array('employee'=>$model));
	}
	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MastersEmployees']))
		{
			$model->attributes=$_POST['MastersEmployees'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionIndex()
	{		
		$this->render('view',array('model'=>$this->loadModel(getUser()->employee_id)));
	}

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

	public function actionAjaxgetdata(){
		$model = $this->loadModel($_POST['id']);		
		$this->renderPartial('/employees/_formAjax',array('employee'=>$model));
	}

	public function actionAjaxupdate($id)
	{
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
	}
}
