<?php
class EmployeesController extends BackEndController
{
	public $icon_class = 'glyphicon glyphicon-user';

	public function actionTes()
	{
		$model = MastersEmployees::model()->findByAttributes(array('code'=>1201136));		
		echo $model->rolename;
	}
	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MastersEmployees']))
		{
			$model->attributes=$_POST['MastersEmployees'];
			if($model->save()) $this->redirect(array('index'));
		}

		$this->render('update',array('model'=>$model));
	}

	public function actionView($id)
	{		
		$this->render('view',array('model'=>$this->loadModel($id)));
	}

	public function actionIndex()
	{
		$model = new MastersEmployees('search');

		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['MastersEmployees'])) $model->attributes=$_GET['MastersEmployees'];

		$this->render('index',array('model'=>$model));
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

	public function actionMutation($id)
	{
		$model = MutationsRequest::model()->find(array(
			'condition' => 'employee_id = '.$id.' and active_date > Now() and status <> "rejected"'
		));

		if(!isset($model)) $model = new MutationsRequest;
		else $this->redirect(array('mutation_view','id'=>$model->id));

		$model->fill($id);
		
		if(isset($_POST['MutationsRequest']))
		{			
			$model->attributes = $_POST['MutationsRequest'];
			if($_POST['action']=='draft') $model->status = 'draft';
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
			$model->status 		= 'request';
			if($model->save()) $this->redirect(array('mutation_view','id'=>$model->id));
		}

		$this->render('mutation_update',array('model'=>$model));
	}

	public function actionRotation($id)
	{
		$model = MutationsRequest::model()->find(array(
			'condition' => 'employee_id = '.$id.' and active_date > Now() and status <> "canceled"'
		));

		if(!isset($model)) $model = new MutationsRequest;
		else $this->redirect(array('mutation_view','id'=>$model->id));

		$model->fill($id);
		$model->is_rotation();
		
		if(isset($_POST['MutationsRequest']))
		{			
			$model->attributes = $_POST['MutationsRequest'];
			if($model->save()) $this->redirect(array('mutation_view','id'=>$model->id));		
		}		

		$this->render('mutation',array(
			'model'=>$model,
		));
	}
}
