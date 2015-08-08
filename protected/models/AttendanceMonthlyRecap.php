<?php

/**
 * This is the model class for table "attendance_monthly_recap".
 *
 * The followings are the available columns in table 'attendance_monthly_recap':
 * @property integer $id
 * @property integer $employee_id
 * @property integer $year
 * @property integer $month
 * @property integer $total_in
 * @property integer $total_leave
 * @property integer $total_sick
 * @property integer $total_alpha
 * @property integer $total_late
 * @property integer $total_workday
 */
class AttendanceMonthlyRecap extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'attendance_monthly_recap';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, year, month, total_in, total_leave, total_sick, total_alpha, total_late, total_workday', 'required'),
			array('employee_id, year, month, total_in, total_leave, total_sick, total_alpha, total_late, total_workday', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, year, month, total_in, total_leave, total_sick, total_alpha, total_late, total_workday', 'safe', 'on'=>'search'),
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
			'employee' => array(self::BELONGS_TO, 'MastersEmployees', 'employee_id'),
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
			'year' => 'Year',
			'month' => 'Month',
			'total_in' => 'Total In',
			'total_leave' => 'Total Leave',
			'total_sick' => 'Total Sick',
			'total_alpha' => 'Total Alpha',
			'total_late' => 'Total Late',
			'total_workday' => 'Total Workday',
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
		$criteria->compare('year',$this->year);
		$criteria->compare('month',$this->month);
		$criteria->compare('total_in',$this->total_in);
		$criteria->compare('total_leave',$this->total_leave);
		$criteria->compare('total_sick',$this->total_sick);
		$criteria->compare('total_alpha',$this->total_alpha);
		$criteria->compare('total_late',$this->total_late);
		$criteria->compare('total_workday',$this->total_workday);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AttendanceMonthlyRecap the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
