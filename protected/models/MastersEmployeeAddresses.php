<?php

/**
 * This is the model class for table "masters_employee_addresses".
 *
 * The followings are the available columns in table 'masters_employee_addresses':
 * @property integer $id
 * @property integer $employee_id
 * @property string $label
 * @property string $street1
 * @property string $street2
 * @property integer $country_id
 * @property integer $state_id
 * @property integer $city_id
 * @property integer $district_id
 * @property string $poscode
 * @property string $phone
 */
class MastersEmployeeAddresses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'masters_employee_addresses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, label, street1, country_id, state_id, city_id', 'required'),
			array('employee_id, country_id, state_id, city_id, district_id', 'numerical', 'integerOnly'=>true),
			array('label', 'length', 'max'=>255),
			array('street1, street2', 'length', 'max'=>100),
			array('poscode', 'length', 'max'=>5),
			array('phone', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, label, street1, street2, country_id, state_id, city_id, district_id, poscode, phone', 'safe', 'on'=>'search'),
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
			'country' => array(self::BELONGS_TO, 'ReferenceGeoCountries', 'country_id'),
			'state' => array(self::BELONGS_TO, 'ReferenceGeoStates', 'state_id'),
			'city' => array(self::BELONGS_TO, 'ReferenceGeoCities', 'city_id'),
			'district' => array(self::BELONGS_TO, 'ReferenceGeoDistricts', 'district_id'),
			'employeeFamilys' => array(self::HAS_MANY, 'MastersEmployeeFamilys', 'address_id'),
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
			'label' => 'Label',
			'street1' => 'Street1',
			'street2' => 'Street2',
			'country_id' => 'Country',
			'state_id' => 'State',
			'city_id' => 'City',
			'district_id' => 'District',
			'poscode' => 'Poscode',
			'phone' => 'Phone',
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
		$criteria->compare('label',$this->label,true);
		$criteria->compare('street1',$this->street1,true);
		$criteria->compare('street2',$this->street2,true);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('poscode',$this->poscode,true);
		$criteria->compare('phone',$this->phone,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchByEmployee($id=null)
	{
		$this->employee_id = is_null($id) ? getUser()->id : $id;
		return $this->search();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MastersEmployeeAddresses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getGeography()
	{
		$district = '';
		if(isset($this->district)) $district = $this->district->name;

		return $district.', '.$this->city->name.'. '.$this->state->name.', '.$this->country->name;
	}
	
	public function viewAddress($wrap=true)
	{
		$address = $this->street1;
		if(!in_array($this->street2, array('', null, 0)))
		{
			$address .= ' '.$this->street2;
		}
		$address .= $wrap ? '<br/>' : ', ';
		$address .= $this->district->name.', '.$this->city->name.($wrap ? '<br/>' : ', ');
		$address .= $this->state->name.', '.$this->country->name;
		if(!in_array($this->poscode, array('', null, 0)))
		{
			$address .= ($wrap ? '<br/>' : ', ').$this->poscode;
		}
		return $address;
	}
	
	public function viewChooseEmployee()
	{
		return isset($this->employee) ? $this->employee->getFullnameWithDept() : '';
	}
}
