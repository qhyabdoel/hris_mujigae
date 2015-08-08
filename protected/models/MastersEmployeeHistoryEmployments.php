<?php

/**
 * This is the model class for table "masters_employee_history_employments".
 *
 * The followings are the available columns in table 'masters_employee_history_employments':
 * @property integer $id
 * @property integer $employee_id
 * @property string $company_name
 * @property string $company_address_street1
 * @property string $company_address_street2
 * @property integer $company_address_country_id
 * @property integer $company_address_state_id
 * @property integer $company_address_city_id
 * @property string $company_address_poscode
 * @property string $position
 * @property string $last_position
 * @property string $work_date
 * @property string $resign_date
 * @property string $resign_reason
 */
class MastersEmployeeHistoryEmployments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'masters_employee_history_employments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, company_name, company_address_street1, company_address_country_id, company_address_state_id, company_address_city_id, position, last_position, work_date, resign_date, resign_reason', 'required'),
			array('employee_id, company_address_country_id, company_address_state_id, company_address_city_id', 'numerical', 'integerOnly'=>true),
			array('company_name, company_address_street1, company_address_street2, position, last_position', 'length', 'max'=>100),
			array('company_address_poscode', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, company_name, company_address_street1, company_address_street2, company_address_country_id, company_address_state_id, company_address_city_id, company_address_poscode, position, last_position, work_date, resign_date, resign_reason', 'safe', 'on'=>'search'),
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
			'country' => array(self::BELONGS_TO, 'ReferenceGeoCountries', 'company_address_country_id'),
			'state' => array(self::BELONGS_TO, 'ReferenceGeoStates', 'company_address_state_id'),
			'city' => array(self::BELONGS_TO, 'ReferenceGeoCities', 'company_address_city_id'),
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
			'company_name' => 'Company Name',
			'company_address_street1' => 'Company Address Street1',
			'company_address_street2' => 'Company Address Street2',
			'company_address_country_id' => 'Company Address Country',
			'company_address_state_id' => 'Company Address State',
			'company_address_city_id' => 'Company Address City',
			'company_address_poscode' => 'Company Address Poscode',
			'position' => 'Position',
			'last_position' => 'Last Position',
			'work_date' => 'Work Date',
			'resign_date' => 'Resign Date',
			'resign_reason' => 'Resign Reason',
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
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('company_address_street1',$this->company_address_street1,true);
		$criteria->compare('company_address_street2',$this->company_address_street2,true);
		$criteria->compare('company_address_country_id',$this->company_address_country_id);
		$criteria->compare('company_address_state_id',$this->company_address_state_id);
		$criteria->compare('company_address_city_id',$this->company_address_city_id);
		$criteria->compare('company_address_poscode',$this->company_address_poscode,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('last_position',$this->last_position,true);
		$criteria->compare('work_date',$this->work_date,true);
		$criteria->compare('resign_date',$this->resign_date,true);
		$criteria->compare('resign_reason',$this->resign_reason,true);

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
	 * @return MastersEmployeeHistoryEmployments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function viewAddress($wrap=true)
	{
		$address = $this->company_address_street1;
		if(!in_array($this->company_address_street2, array('', null, 0)))
		{
			$address .= ' '.$this->company_address_street2;
		}
		$address .= $wrap ? '<br/>' : ', ';
		$address .= $this->city->name.', '.$this->state->name.', '.$this->country->name;
		if(!in_array($this->company_address_poscode, array('', null, 0)))
		{
			$address .= ($wrap ? '<br/>' : ', ').$this->company_address_poscode;
		}
		return $address;
	}
	
	public function viewChooseEmployee()
	{
		return isset($this->employee) ? $this->employee->getFullnameWithDept() : '';
	}
}
