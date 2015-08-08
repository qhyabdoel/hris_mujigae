<?php

/**
 * This is the model class for table "payroll_employee_payments".
 *
 * The followings are the available columns in table 'payroll_employee_payments':
 * @property integer $id
 * @property integer $employee_id
 * @property integer $year
 * @property integer $month
 * @property string $created_at
 * @property integer $created_by
 * @property string $payment_type
 * @property string $payment_date
 * @property string $status
 *
 * The followings are the available model relations:
 * @property PayrollEmployeePaymentAllowances[] $payrollEmployeePaymentAllowances
 * @property PayrollEmployeePaymentSalaries[] $payrollEmployeePaymentSalaries
 * @property MastersEmployees $employee
 */
class PayrollEmployeePayments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payroll_employee_payments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, year, month, created_at, created_by, payment_type, status', 'required'),
			array('employee_id, year, month, created_by', 'numerical', 'integerOnly'=>true),
			array('payment_type, status', 'length', 'max'=>50),
			array('payment_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, year, month, created_at, created_by, payment_type, payment_date, status', 'safe', 'on'=>'search'),
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
			'payrollEmployeePaymentAllowances' => array(self::HAS_MANY, 'PayrollEmployeePaymentAllowances', 'payment_id'),
			'payrollEmployeePaymentSalaries' => array(self::HAS_MANY, 'PayrollEmployeePaymentSalaries', 'payment_id'),
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
			'created_at' => 'Created At',
			'created_by' => 'Created By',
			'payment_type' => 'Payment Type',
			'payment_date' => 'Payment Date',
			'status' => 'Status',
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
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('payment_type',$this->payment_type,true);
		$criteria->compare('payment_date',$this->payment_date,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PayrollEmployeePayments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
