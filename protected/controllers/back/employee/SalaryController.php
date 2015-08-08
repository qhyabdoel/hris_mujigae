<?php

class SalaryController extends BackEndController
{
	public $icon_class = 'fa fa-map-marker';
	
	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_masters_employee_salary_view');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Employee Salary'));
		$this->title[] = at('Employee Salary');
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['EmployeeSalary']))
		{
			//save Basic Salary
			$model->employeeSalary->basic_salary = $_POST['EmployeeSalary']['basicsalary'];
			$model->employeeSalary->save();
			
			$allowances = $_POST['EmployeeSalary']['allowances'];
			foreach($allowances as $key => $value)
			{
				$allowance = PayrollEmployeeAllowances::model()->findByPk($key);
				$allowance->values = $value;
				$allowance->save();
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionUpgrade($id)
	{		
		// print_r($_POST);die();

		$employee 		= $this->loadModel($id);
		$model 			= new EmployeeSalaryUpgrade;		

		if(isset($_POST['EmployeeSalaryUpgrade']) or isset($_POST['is_ajax']))
		{
			if(isset($_POST['EmployeeSalaryUpgrade'])) $model->attributes=$_POST['EmployeeSalaryUpgrade'];
			else $model->attributes = $_POST;

			// print_r($model);die();
			
			$employee->department_id 	= $model->department_id;
			$employee->section_id 		= $model->section_id;
			$employee->position_id 		= $model->position_id;
			$employee->level_id 		= $model->level_id;
			$employee->grade_id 		= $model->grade_id;
			$employee->city_area_id 	= $model->city_area_id;

			if(!$employee->save()){
				ferror(at('Cannot upgrade employee grade.'));
				$_POST['ajax_error'] = 'Cannot upgrade employee grade.';
			}
			else {
				if(!$employee->saveSalary(true)){
					ferror(at('Cannot save new salary.'));
					$_POST['ajax_error'] = '';
				}
			}
		} else {
			$model->id 				= $id;
			$model->department_id 	= $employee->department_id;
			$model->section_id 		= $employee->section_id;
			$model->position_id		= $employee->position_id;
			$model->level_id 		= $employee->level_id;
			$model->grade_id 		= $employee->grade_id;
			$model->city_area_id 	= $employee->city_area_id;
		}

		if(isset($_POST['is_ajax'])) echo json_encode($_POST);
		else $this->render('upgrade',array('model'=>$model,));
	}

	public function loadModel($id)
	{
		$model=MastersEmployees::model()->findByPk($id);
		
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	}

	public function actionAjaxgetdata()
	{		
		$model = $this->loadModel($_POST['id']);

		if(!isset($model->salary->salary)) $this->newSalary($_POST['id']);

		if($_POST['action']!='upgrade') $this->renderPartial('/employee/salary/_updateAjax', array('salary'=>$model));
		else $this->renderPartial('/employee/salary/_upgradeAjax', array('salary'=>$model));
	}

	public function actionAjaxUpdate($id)
	{
		$model 		= $this->loadModel($_POST['employee_id']);
		$allowances = $_POST['allowances'];

		$salary 				= new PayrollEmployeeSalary;
		$salary->employee_id 	= $model->id;
		$salary->salary_id 		= $_POST['id'];
		$salary->basic_salary 	= $_POST['salaryincrease'];
		$salary->save();
		
		foreach($allowances as $key => $value)
		{
			$allowance = PayrollEmployeeAllowances::model()->findByPk($key);

			if(isset($allowance)){
				$allowance->values = $value;
				$allowance->save();				
			}
		}		
	}

	public function newSalary($id)
	{		
		$employee = $this->loadModel($id);

		$base = PayrollBasedSalaries::model()->findByAttributes(array(
			'year' 			=> date('Y'),
			'city_id' 		=> $employee->city_area_id,
			'department_id' => $employee->department_id,
			'section_id' 	=> $employee->section_id,
			'position_id' 	=> $employee->position_id,
			'level_id' 		=> $employee->level_id,
			'grade_id' 		=> $employee->grade_id,
		));

		if(!isset($base)) 
			$base = PayrollBasedSalaries::model()->findByAttributes(array('year'=>date('Y')));

		$salary 				= new PayrollEmployeeSalary;
		$salary->employee_id 	= $id;
		$salary->salary_id 		= $base->id;
		$salary->basic_salary 	= 0;
		$salary->save();
	}

	public function actionTes(){
		// $this->newSalary(1);
	}
}
