<?php

/**
 * This is the model class for table "attendance_presences_recap".
 *
 * The followings are the available columns in table 'attendance_presences_recap':
 * @property integer $id
 * @property integer $employee_id
 * @property string $date
 * @property integer $shift_id
 * @property string $check_in
 * @property string $check_out
 * @property string $break_out
 * @property string $break_in
 * @property string $total_hours
 * @property integer $is_late
 * @property string $created_at
 */
class AttendancePresencesRecap extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'attendance_presences_recap';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, date, shift_id', 'required'),
			array('employee_id, shift_id, is_late', 'numerical', 'integerOnly'=>true),
			array('total_hours', 'length', 'max'=>10),
			array('check_in, check_out, break_out, break_in, created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, date, shift_id, check_in, check_out, break_out, break_in, total_hours, is_late, created_at', 'safe', 'on'=>'search'),
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
			'shift' 	=> array(self::BELONGS_TO, 'ReferenceAttendanceShifts', 'shift_id'),
			'employee' 	=> array(self::BELONGS_TO, 'MastersEmployees', 'employee_id'),
			'location' 	=> array(self::BELONGS_TO, 'MastersLocation', 'location_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' 			=> 'ID',
			'employee_id' 	=> 'Employee',
			'date' 			=> 'Date',
			'shift_id' 		=> 'Shift',
			'check_in' 		=> 'Check In',
			'check_out' 	=> 'Check Out',
			'break_out' 	=> 'Break Out',
			'break_in' 		=> 'Break In',
			'total_hours' 	=> 'Total Hours',
			'is_late' 		=> 'Is Late',
			'created_at' 	=> 'Created At',
			'location_id' 	=> 'Location',
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

		$criteria = new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('shift_id',$this->shift_id);
		$criteria->compare('check_in',$this->check_in,true);
		$criteria->compare('check_out',$this->check_out,true);
		$criteria->compare('break_out',$this->break_out,true);
		$criteria->compare('break_in',$this->break_in,true);
		$criteria->compare('total_hours',$this->total_hours,true);
		$criteria->compare('is_late',$this->is_late);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->with 	= 'employee';

		if(getUser()->role == 'rm')
		{
			$criteria->compare('employee.outlet_id',getUser()->outlet_id,true);
		}
		elseif(getUser()->role == 'kadept') 
		{
			$criteria->compare('employee.department_id',getUser()->employee->department_i_lead->id);			
		}		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getArea_id(){
		return $this->employee->outlet->outlet_area_id;
	}

	public function searchBy($employee_id,$period)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->condition = 'date <= "'.$period['to'].'" and date >= "'.$period['from'].'"';
		$criteria->compare('id',$this->id);
		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('shift_id',$this->shift_id);
		$criteria->compare('check_in',$this->check_in,true);
		$criteria->compare('check_out',$this->check_out,true);
		$criteria->compare('break_out',$this->break_out,true);
		$criteria->compare('break_in',$this->break_in,true);
		$criteria->compare('total_hours',$this->total_hours,true);
		$criteria->compare('is_late',$this->is_late);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->with = array('employee','employee.outlet');		

		if(getUser()->role == 'rm')
		{
			$criteria->compare('employee.outlet_id',getUser()->outlet_id,true);
		}
		elseif(getUser()->role == 'kadept') 
		{
			$criteria->compare('department_id',getUser()->employee->department_i_lead->id);			
		}
		elseif (getUser()->role == 'bm') 
		{
			$criteria->compare('outlet_area_id',getUser()->employee->area_i_lead->id);
		}
		elseif (getUser()->role == 'employee') 
		{
			$criteria->compare('employee_id',getUser()->employee->id);
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	// public function beforeSave()
	// {
	// 	if ($this->isNewRecord)
	// 	{
	// 		$this->total_hours = 0;
	// 		$this->is_late = 0;
	// 		$this->created_at = date('Y-m-d H:i:s');
	// 	}
		
	// 	return parent::beforeSave();
	// }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AttendancePresencesRecap1 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function viewShift()
	{
		if(in_array($this->shift_id, array('', null, 0)))
			return '';
		else $this->shift->name;
	}
	
	public function viewChooseEmployee()
	{
		return isset($this->employee) ? $this->employee->getFullnameWithDept() : '';
	}

	// public function viewType(){
		
	// }
}
