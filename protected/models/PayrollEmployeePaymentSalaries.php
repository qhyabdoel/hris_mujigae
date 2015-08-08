<?php

/**
 * This is the model class for table "payroll_employee_payment_salaries".
 *
 * The followings are the available columns in table 'payroll_employee_payment_salaries':
 * @property integer $id
 * @property integer $payment_id
 * @property string $recap_id
 * @property string $basic_salary
 * @property string $total_allowance
 * @property string $total_salary
 *
 * The followings are the available model relations:
 * @property PayrollEmployeePaymentAllowances[] $payrollEmployeePaymentAllowances
 * @property PayrollEmployeePayments $payment
 * @property AttendancePresencesMonthlyRecap $recap
 */
class PayrollEmployeePaymentSalaries extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payroll_employee_payment_salaries';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('payment_id, recap_id, basic_salary, total_allowance, total_salary', 'required'),
			array('payment_id', 'numerical', 'integerOnly'=>true),
			array('recap_id', 'length', 'max'=>11),
			array('basic_salary, total_allowance, total_salary', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, payment_id, recap_id, basic_salary, total_allowance, total_salary', 'safe', 'on'=>'search'),
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
			'payrollEmployeePaymentAllowances' => array(self::HAS_MANY, 'PayrollEmployeePaymentAllowances', 'salary_id'),
			'payment' => array(self::BELONGS_TO, 'PayrollEmployeePayments', 'payment_id'),
			'recap' => array(self::BELONGS_TO, 'AttendancePresencesMonthlyRecap', 'recap_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'payment_id' => 'Payment',
			'recap_id' => 'Recap',
			'basic_salary' => 'Basic Salary',
			'total_allowance' => 'Total Allowance',
			'total_salary' => 'Total Salary',
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
		$criteria->compare('payment_id',$this->payment_id);
		$criteria->compare('recap_id',$this->recap_id,true);
		$criteria->compare('basic_salary',$this->basic_salary,true);
		$criteria->compare('total_allowance',$this->total_allowance,true);
		$criteria->compare('total_salary',$this->total_salary,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PayrollEmployeePaymentSalaries the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
