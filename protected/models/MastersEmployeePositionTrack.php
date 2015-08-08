<?php

/**
 * This is the model class for table "masters_employee_position_track".
 *
 * The followings are the available columns in table 'masters_employee_position_track':
 * @property integer $id
 * @property integer $employee_id
 * @property string $active_date
 * @property integer $year
 * @property integer $city_id
 * @property integer $department_id
 * @property integer $section_id
 * @property integer $position_id
 * @property integer $outlet_id
 * @property integer $grade_id
 * @property integer $level_id
 * @property integer $years_of_service
 * @property integer $salary_id
 * @property string $created_at
 * @property integer $user_id
 */
class MastersEmployeePositionTrack extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'masters_employee_position_track';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, active_date, year, city_id, department_id, section_id, position_id, grade_id, level_id, years_of_service, created_at, user_id', 'required'),
			array('employee_id, year, city_id, department_id, section_id, position_id, outlet_id, grade_id, level_id, years_of_service, salary_id, user_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, active_date, year, city_id, department_id, section_id, position_id, outlet_id, grade_id, level_id, years_of_service, salary_id, created_at, user_id', 'safe', 'on'=>'search'),
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
			'employee' 	=> array(self::HAS_ONE, 'MastersEmployees', 'current_track_id'),
			'salary' 	=> array(self::BELONGS_TO, 'PayrollBasedSalaries', 'salary_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'employee_id' => 'Employee',
			'active_date' => 'Active Date',
			'year' => 'Year',
			'city_id' => 'City',
			'department_id' => 'Department',
			'section_id' => 'Section',
			'position_id' => 'Position',
			'outlet_id' => 'Outlet',
			'grade_id' => 'Grade',
			'level_id' => 'Level',
			'years_of_service' => 'Years Of Service',
			'salary_id' => 'Salary',
			'created_at' => 'Created At',
			'user_id' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('active_date',$this->active_date,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('department_id',$this->department_id);
		$criteria->compare('section_id',$this->section_id);
		$criteria->compare('position_id',$this->position_id);
		$criteria->compare('outlet_id',$this->outlet_id);
		$criteria->compare('grade_id',$this->grade_id);
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('years_of_service',$this->years_of_service);
		$criteria->compare('salary_id',$this->salary_id);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MastersEmployeePositionTrack the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
	/* ADDITIONAL FUNCTION */
	public function getBasedSalary(){
		if($this->salary_id == NULL)
			return NULL;
		else return $this->salary;
	}
}
