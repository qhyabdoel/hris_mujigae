<?php

/**
 * This is the model class for table "payroll_salary".
 *
 * The followings are the available columns in table 'payroll_salary':
 * @property integer $id
 * @property integer $recap_id
 * @property integer $employee_id
 * @property integer $year
 * @property integer $month
 * @property string $basic_salary
 * @property string $total_allowance
 * @property string $total_salary
 *
 * The followings are the available model relations:
 * @property MastersEmployees $employee
 * @property PayrollSalaryAllowances[] $payrollSalaryAllowances
 */
class PayrollSalary extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payroll_salary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('recap_id, employee_id, year, month, basic_salary, total_allowance, total_salary', 'required'),
			array('recap_id, employee_id, year, month', 'numerical', 'integerOnly'=>true),
			array('basic_salary, total_allowance, total_salary', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, recap_id, employee_id, year, month, basic_salary, total_allowance, total_salary', 'safe', 'on'=>'search'),
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
			'payrollSalaryAllowances' => array(self::HAS_MANY, 'PayrollSalaryAllowances', 'salary_id'),
			'attendancerecap' => array(self::BELONGS_TO, 'AttendanceMonthlyRecap', 'recap_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' 				=> 'ID',
			'recap_id' 			=> 'Recap',
			'employee_id' 		=> 'Employee',
			'year' 				=> 'Year',
			'month' 			=> 'Month',
			'basic_salary' 		=> 'Basic Salary',
			'total_allowance' 	=> 'Total Allowance',
			'total_salary' 		=> 'Total Salary',
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
		$criteria->compare('recap_id',$this->recap_id);
		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('year',$this->year);
		$criteria->compare('month',$this->month);
		$criteria->compare('basic_salary',$this->basic_salary,true);
		$criteria->compare('total_allowance',$this->total_allowance,true);
		$criteria->compare('total_salary',$this->total_salary,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchByEmployee()
	{
		$this->employee_id = getUser()->id;
		return $this->search();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PayrollSalary the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function viewPeriode()
	{
		return $this->month.', '.$this->year;
	}
	
}
