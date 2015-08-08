<?php
class EmployeeSalaryUpgrade extends CFormModel
{
	public $id;
	public $department_id;
	public $section_id;
	public $position_id;
	public $level_id;
	public $grade_id;
	public $city_area_id;
	
	public function rules()
	{
		return array(
			array('id, department_id, section_id, position_id, level_id, grade_id, city_area_id', 'required'),
			array('id, department_id, section_id, position_id, level_id, grade_id, city_area_id', 'numerical', 'integerOnly'=>true),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'id' => at('Employee ID'),
			'department_id' => at('Department'),
			'section_id' => at('Section'),
			'position_id' => at('Position'),
			'level_id' => at('Level'),
			'grade_id' => at('Grade'),
			'city_area_id' => at('City Area'),
		);
	}
}