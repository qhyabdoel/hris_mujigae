<?php

/**
 * This is the model class for table "payroll_employee_allowances".
 *
 * The followings are the available columns in table 'payroll_employee_allowances':
 * @property integer $id
 * @property integer $salary_id
 * @property integer $allowance_id
 * @property string $values
 */
class PayrollEmployeeAllowances extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payroll_employee_allowances';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('salary_id, allowance_id, values', 'required'),
			array('salary_id, allowance_id', 'numerical', 'integerOnly'=>true),
			array('values', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, salary_id, allowance_id, values', 'safe', 'on'=>'search'),
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
			'salary' 	=> array(self::BELONGS_TO, 'PayrollBasedSalaries', 'salary_id'),
			'allowance' => array(self::BELONGS_TO, 'PayrollAllowances', 'allowance_id'),
			'base'		=> array(self::BELONGS_TO, 'PayrollBasedAllowances', 'allowance_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' 			=> 'ID',
			'salary_id' 	=> 'Salary',
			'allowance_id' 	=> 'Allowance',
			'values' 		=> 'Values',
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
		$criteria->compare('salary_id',$this->salary_id);
		$criteria->compare('allowance_id',$this->allowance_id);
		$criteria->compare('values',$this->values,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PayrollEmployeeAllowances the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getBasic(){
		return $this->base->values;
	}
}
