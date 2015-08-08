<?php
class GenerateAttendanceForm extends CFormModel
{
	public $periode_type;
	public $start_date;
	public $end_date;
	public $department_id;
	public $employee_id;

	public function rules()
	{
		return array(
			array('periode_type, start_date, end_date', 'required'),
			array('department_id, employee_id', 'numerical', 'integerOnly'=>true),
		);
	}

	public function attributeLabels()
	{
		return array(
			'periode_type' => at('Range'),
			'start_date' => at('From'),
			'end_date' => at('To'),
			'department_id' => at('Department'),
			'employee_id' => at('Employee'),
		);
	}
	
	public function viewChooseEmployee()
	{
		$employee = MastersEmployees::model()->findByPk($this->employee_id);
		return (isset($employee)) && (count($employee) > 0) ? $employee->getFullnameWithDept() : '';
	}
	
	public function getPeriodeType()
	{
		return array('current' => at('Current Pay Periode'), 'custom' => at('Custom'));
	}
	
	public function moveDataToRecap()
	{
		try
		{
			$query = "
				INSERT INTO attendance_presences_recap (employee_id, date, shift_id, check_in, check_out, break_out, break_in, total_hours, is_late, created_at ) 
				SELECT employee_id, date, shift_id
					, min(case type when 'CI' then presence_date else NULL end) as `CheckIn`
					, max(case type when 'CO' then presence_date else NULL end) as `CheckOut`
					, max(case type when 'BO' then presence_date else NULL end) as `BreakOut`
					, min(case type when 'BI' then presence_date else NULL end) as `BreakIn`
					, 0, 0, now()
				FROM (SELECT employee_id, date, case type when 'LV' then 2 else (case type when 'S' then 3 else (case when shift_id IS NULL then 1 else shift_id end) end) end AS `shift_id`, type, presence_date
						FROM `attendance_presences`
						WHERE date BETWEEN '".$this->start_date."' AND '".$this->end_date."') AS A
				GROUP BY employee_id, date, shift_id
			";
			
			$command= Yii::app()->db->createCommand($query);
			$command->execute();
			
			fok(at('Data recapitulation successfully Generated.'));
		} catch(Exception $e) {
			ferror(at('Failed to generate data recapitulation. \n'. $e));
			exit;
			$transaction->rollBack();
		}
	}
	
	public function generateEmployeeSalaries()
	{
		
	}
}