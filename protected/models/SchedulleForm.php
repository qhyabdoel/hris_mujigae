<?php
class SchedulleForm extends CFormModel
{
	public $department_id;
	public $month;
	public $year;
	public $days;
	
	public function rules()
	{
		return array(
			array('department_id, month, year', 'required'),
			array('days','safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			// 'employee' => array(self::BELONGS_TO, 'MastersEmployees', 'department_id'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'department_id' => at('Department'),
			'month' 		=> at('Month'),
			'year' 			=> at('Year'),
			'days' 			=> at('Schedulle'),
		);
	}

	public function getAttendanceSchedulles($employee_id,$department_id){
		$AttendanceSchedulles = AttendanceSchedulles::model()->findByAttributes(array(
			'employee_id' 	=> $employee_id,
			'department_id' => $department_id,
			'year' 			=> $this->year,
			'month' 		=> $this->month,
		));
		
		if(count($AttendanceSchedulles)==0){
			$AttendanceSchedulles 					= new AttendanceSchedulles;
			$AttendanceSchedulles->employee_id 		= $employee_id;
			$AttendanceSchedulles->department_id 	= $department_id;
			$AttendanceSchedulles->year 			= $this->year;
			$AttendanceSchedulles->month 			= $this->month;								
		}

		return $AttendanceSchedulles;
	}
	
	public function save()
	{
		// $employee = MastersEmployees::model()->findByPk($this->department_id);
		// foreach($this->days as $key => $val)
		// {
		// 	$c = new CDbCriteria;
		// 	$c->compare('department_id', $this->department_id);
		// 	$c->compare('department_id', $employee->department_id);
		// 	$c->compare('schedulle_date', $this->year.'-'.($this->month+1).'-'.$key);
		// 	$schedulle = AttendanceSchedulle::model()->find($c);
			
		// 	if(AttendanceSchedulle::model()->count($c) == 0){
		// 		$schedulle = new AttendanceSchedulle;
		// 	}
		// 	$schedulle->department_id = $employee->department_id;
		// 	$schedulle->department_id = $this->department_id;
		// 	$schedulle->schedulle_date = $this->year.'-'.($this->month+1).'-'.$key;
		// 	$schedulle->shift_id = $val;
		// 	$schedulle->save();
		// }

		foreach ($this->days as $key => $days) {
			$employee 				= MastersEmployees::model()->findByPk($key);						
			$AttendanceSchedulles 	= $this->getAttendanceSchedulles($employee->id,$employee->department_id);	

			foreach ($days as $key => $value) {
				if(strlen($key)==1) $date = 'date_0'.$key;
				else $date = 'date_'.$key;
				$AttendanceSchedulles->$date = $value;
			}

			$AttendanceSchedulles->save();
		}
	}

	public function getDaysValue(){
		$this->days = array();

		foreach ($this->employees as $key => $employee) {
			$schedulles 			= array();			
			$AttendanceSchedulles 	= $this->getAttendanceSchedulles($employee->id,$employee->department_id);			

			for ($i=1; $i < 32; $i++) { 
				if(strlen($i)==1) $date = 'date_0'.$i;
				else $date = 'date_'.$i;				
				
				if(isset($AttendanceSchedulles->$date)) $schedulles[$i] = $AttendanceSchedulles->$date;					
			}	

			$this->days[$employee->id]	= $schedulles;		

			// echo "<pre>";
			// if(!isset($AttendanceSchedulles->date_01)) echo "string";
			// print_r($AttendanceSchedulles->date_01);
			// echo "</pre>";
			// echo "<br>";
		}

		return $this->days;
	}

	public function getEmployees()
	{
		$employees = MastersEmployees::model()->findAllByAttributes(array('department_id'=>$this->department_id));
		return $employees;
	}
}