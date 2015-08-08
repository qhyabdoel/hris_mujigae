<?php

/**
 * This is the model class for table "masters_outlets".
 *
 * The followings are the available columns in table 'masters_outlets':
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property integer $area_city_id
 * @property string $street1
 * @property string $street2
 * @property integer $country_id
 * @property integer $state_id
 * @property integer $city_id
 * @property integer $district_id
 * @property string $poscode
 * @property string $phone
 * @property string $fax
 * @property string $mobile
 * @property integer $employee_needed
 * @property integer $rm_id
 * @property integer $is_active
 *
 * The followings are the available model relations:
 * @property MastersEmployees $rm
 * @property PayrollCities $areaCity
 * @property ReferenceGeoCountries $country
 * @property ReferenceGeoStates $state
 * @property ReferenceGeoCities $city
 * @property ReferenceGeoDistricts $district
 */
class MastersOutlets extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'masters_outlets';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, name, area_city_id, street1, country_id, state_id, city_id, district_id, phone, employee_needed, rm_id, is_active', 'required'),
			array('area_city_id, country_id, state_id, city_id, district_id, employee_needed, rm_id, is_active', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>10),
			array('name', 'length', 'max'=>255),
			array('street1, street2', 'length', 'max'=>100),
			array('poscode', 'length', 'max'=>5),
			array('phone, fax, mobile', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, name, area_city_id, street1, street2, country_id, state_id, city_id, district_id, poscode, phone, fax, mobile, employee_needed, rm_id, is_active', 'safe', 'on'=>'search'),
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
			'rm' 			=> array(self::BELONGS_TO, 'MastersEmployees', 'rm_id'),
			'areaCity' 		=> array(self::BELONGS_TO, 'PayrollCities', 'area_city_id'),
			'country' 		=> array(self::BELONGS_TO, 'ReferenceGeoCountries', 'country_id'),
			'state' 		=> array(self::BELONGS_TO, 'ReferenceGeoStates', 'state_id'),
			'city' 			=> array(self::BELONGS_TO, 'ReferenceGeoCities', 'city_id'),
			'district' 		=> array(self::BELONGS_TO, 'ReferenceGeoDistricts', 'district_id'),
			'employee' 		=> array(self::HAS_MANY, 'MastersEmployees', 'outlet_id'),
			'employeeCount' => array(self::STAT, 'MastersEmployees', 'outlet_id', 'select' => 'count(outlet_id)'),
			'shift_format' 	=> array(self::BELONGS_TO, 'ReferenceAttendanceShiftFormats', 'shift_format_id'),
			'outlet_area' 	=> array(self::BELONGS_TO, 'MastersOutletAreas', 'outlet_area_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' 			=> 'ID',
			'code' 			=> 'Code',
			'name' 			=> 'Name',
			'area_city_id' 	=> 'Area City',
			'street1' 		=> 'Street1',
			'street2' 		=> 'Street2',
			'country_id' 	=> 'Country',
			'state_id' 		=> 'State',
			'city_id' 		=> 'City',
			'district_id' 	=> 'District',
			'poscode' 		=> 'Poscode',
			'phone' 		=> 'Phone',
			'fax' 			=> 'Fax',
			'mobile' 		=> 'Mobile',
			'employee_needed' 	=> 'Employee Needed',
			'rm_id' 			=> 'Rm',
			'is_active' 		=> 'Is Active',
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('area_city_id',$this->area_city_id);
		$criteria->compare('street1',$this->street1,true);
		$criteria->compare('street2',$this->street2,true);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('poscode',$this->poscode,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('employee_needed',$this->employee_needed);
		$criteria->compare('rm_id',$this->rm_id);
		$criteria->compare('is_active',$this->is_active);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MastersOutlets the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function searchByOutlet($outlet){
		$criteria=new CDbCriteria;
		$criteria->compare('employee',$outlet);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function viewAddress($wrap=true)
	{
		$address = $this->street1;
		if(!in_array($this->street2, array('a', NULL)))
		{
			$address .= ' '.$this->street2;
		}
		$address .= $wrap ? '<br/>' : ', ';
		//$address .= $this->district->name.', '.$this->city->name.($wrap ? '<br/>' : ', ');
		//$address .= $this->state->name.', '.$this->country->name;
		$address .= $this->city->name.', '.$this->state->name.', '.$this->country->name;
		if(!in_array($this->poscode, array('', null, 0)))
		{
			$address .= ($wrap ? '<br/>' : ', ').$this->poscode;
		}
		return $address;
	}
	
	public function viewRmName()
	{
		if(in_array($this->rm, array('', NULL)))
			return at('-');
		else return $this->rm->getFullname();
	}
}
