<?php

/**
 * This is the model class for table "payroll_employee_salary".
 *
 * The followings are the available columns in table 'payroll_employee_salary':
 * @property integer $id
 * @property integer $employee_id
 * @property integer $salary_id
 * @property string $basic_salary
 */
class PayrollEmployeeSalary extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payroll_employee_salary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, salary_id, basic_salary', 'required'),
			array('employee_id, salary_id', 'numerical', 'integerOnly'=>true),
			array('basic_salary', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, salary_id, basic_salary', 'safe', 'on'=>'search'),
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
			'employee' 	=> array(self::BELONGS_TO, 'MastersEmployees', 'employee_id'),
			'salary' 	=> array(self::BELONGS_TO, 'PayrollBasedSalaries', 'salary_id'),
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
			'salary_id' 	=> 'Salary',
			'basic_salary' 	=> 'Basic Salary',
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
		$criteria->compare('salary_id',$this->salary_id);
		$criteria->compare('basic_salary',$this->basic_salary,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PayrollEmployeeSalary the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getAllowances(){
		$allowances = $this->salary->allowances;

		return $allowances;
	}
}
