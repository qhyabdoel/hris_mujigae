<?php

class SchedulleController extends BackEndController
{
	public function init() {
		parent::init();
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Attendance Schedulles'));
		$this->title[] = at('Attendance Schedulles');
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
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new AttendanceSchedulle('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AttendanceSchedulle']))
			$model->attributes=$_GET['AttendanceSchedulle'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AttendanceSchedulle the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AttendanceSchedulle::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	private function sqlData()
	{
		$sql = "EXECUTE sp_RECAP_PRESENCES @periode_start=:p_start, @periode_end=:p_end";
	}
	
	public function setSchedulleDays($model)
	{
		if($model->employee_id > 0)
		{
			$employee = MastersEmployees::model()->findByPk($model->employee_id);
			if(count($employee) == 0)
				$model->employee_id = '';
			else {
				$c = new CDbCriteria;
				$c->select = 'schedulle_date, DAY(schedulle_date) AS sch_day, shift_id';
				$c->compare('employee_id', $model->employee_id);
				$c->compare('department_id', $employee->department_id);
				$c->compare('YEAR(schedulle_date)', $model->year);
				$c->compare('MONTH(schedulle_date)', $model->month+1);
				$schedulles = AttendanceSchedulle::model()->findAll($c);
				
				foreach($schedulles as $schedulle)
				{
					$model->days[$schedulle->sch_day] = $schedulle->shift_id;
				}
			}
		}
		
		return $model;
	}
	
	public function actionSmcalendar()
	{
		$model=new SchedulleForm;
		if(isset($_POST['SchedulleForm']))
		{
			$model->attributes=$_POST['SchedulleForm'];
		}
		$model = $this->setSchedulleDays($model);
		
		$this->renderPartial('smcalendar',array(
			'model'=>$model,
		));
	}
	
	public function actionEmployeeSchedulle()
	{
		header('Content-type: application/json');

		$schedulles	= AttendanceSchedulles::model()->findAllByAttributes(array('employee_id'=>getUser()->id));
		$data 		= array();

		foreach ($schedulles as $schedulle) {
			for ($i=1; $i <= 31; $i++) { 
				if(strlen($i)==1) $date = 'date_0'.$i;
				else $date = 'date_'.$i;

				$day = $schedulle->year.'-'.$schedulle->month.'-'.$i;
				$day = strtotime($day)+2678400;
				$day = date('Y-m-d',$day);

				if($schedulle->$date!='') {
					$shift 	= ReferenceAttendanceShifts::model()->findByPk($schedulle->$date)->name;
					$data[] = array('title'=>$shift, 'start'=>$day, 'allDay'=>true);
				}
			}
		}

		// $c = new CDbCriteria();
		// $c->compare('employee_id', getUser()->id);
		
		// $schedulles = AttendanceSchedulle::model()->findAll($c);
		// $data 		= array();
		
		// foreach($schedulles as $schedulle)
		// {
		// 	$data[] = array('title'=>$schedulle->shift->name, 'start'=>$schedulle->schedulle_date, 'allDay'=>true);
		// }
		
		echo CJSON::encode($data);
	}
}
