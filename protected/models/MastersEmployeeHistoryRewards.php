<?php

/**
 * This is the model class for table "masters_employee_history_rewards".
 *
 * The followings are the available columns in table 'masters_employee_history_rewards':
 * @property integer $id
 * @property integer $employee_id
 * @property string $reward_type
 * @property string $name
 * @property string $certificate_no
 * @property string $certificate_date
 * @property string $instantion
 */
class MastersEmployeeHistoryRewards extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'masters_employee_history_rewards';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, reward_type, name, certificate_no, certificate_date, instantion', 'required'),
			array('employee_id', 'numerical', 'integerOnly'=>true),
			array('reward_type', 'length', 'max'=>50),
			array('name, instantion', 'length', 'max'=>255),
			array('certificate_no', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, reward_type, name, certificate_no, certificate_date, instantion', 'safe', 'on'=>'search'),
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
			'reward_type' => 'Reward Type',
			'name' => 'Name',
			'certificate_no' => 'Certificate No',
			'certificate_date' => 'Certificate Date',
			'instantion' => 'Instantion',
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
		$criteria->compare('reward_type',$this->reward_type,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('certificate_no',$this->certificate_no,true);
		$criteria->compare('certificate_date',$this->certificate_date,true);
		$criteria->compare('instantion',$this->instantion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchByEmployee($id=null)
	{
		$this->employee_id = is_null($id) ? 0 : $id;
		return $this->search();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MastersEmployeeHistoryRewards the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function viewChooseEmployee()
	{
		return isset($this->employee) ? $this->employee->getFullnameWithDept() : '';
	}
}
