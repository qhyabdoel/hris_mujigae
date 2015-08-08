<?php

/**
 * This is the model class for table "masters_employee_history_educations".
 *
 * The followings are the available columns in table 'masters_employee_history_educations':
 * @property integer $id
 * @property integer $employee_id
 * @property integer $education_id
 * @property string $school
 * @property string $department
 * @property string $major
 * @property integer $certificate_year
 * @property string $notes
 * @property string $address_street1
 * @property string $address_street2
 * @property integer $address_country_id
 * @property integer $address_state_id
 * @property integer $address_city_id
 * @property string $address_poscode
 *
 * The followings are the available model relations:
 * @property MastersEmployees $employee
 * @property ReferenceEducations $education
 */
class MastersEmployeeHistoryEducations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'masters_employee_history_educations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, education_id, school, certificate_year, address_street1, address_country_id, address_state_id, address_city_id', 'required'),
			array('employee_id, education_id, certificate_year, address_country_id, address_state_id, address_city_id', 'numerical', 'integerOnly'=>true),
			array('school, address_street1, address_street2', 'length', 'max'=>100),
			array('department, major', 'length', 'max'=>50),
			array('address_poscode', 'length', 'max'=>5),
			array('notes', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, education_id, school, department, major, certificate_year, notes, address_street1, address_street2, address_country_id, address_state_id, address_city_id, address_poscode', 'safe', 'on'=>'search'),
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
			'education' => array(self::BELONGS_TO, 'ReferenceEducations', 'education_id'),
			'country' => array(self::BELONGS_TO, 'ReferenceGeoCountries', 'address_country_id'),
			'state' => array(self::BELONGS_TO, 'ReferenceGeoStates', 'address_state_id'),
			'city' => array(self::BELONGS_TO, 'ReferenceGeoCities', 'address_city_id'),
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
			'education_id' => 'Education',
			'school' => 'School',
			'department' => 'Department',
			'major' => 'Major',
			'certificate_year' => 'Certificate Year',
			'notes' => 'Notes',
			'address_street1' => 'Address Street1',
			'address_street2' => 'Address Street2',
			'address_country_id' => 'Address Country',
			'address_state_id' => 'Address State',
			'address_city_id' => 'Address City',
			'address_poscode' => 'Address Poscode',
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
		$criteria->compare('education_id',$this->education_id);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('major',$this->major,true);
		$criteria->compare('certificate_year',$this->certificate_year);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('address_street1',$this->address_street1,true);
		$criteria->compare('address_street2',$this->address_street2,true);
		$criteria->compare('address_country_id',$this->address_country_id);
		$criteria->compare('address_state_id',$this->address_state_id);
		$criteria->compare('address_city_id',$this->address_city_id);
		$criteria->compare('address_poscode',$this->address_poscode,true);

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
	 * @return MastersEmployeeHistoryEducations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getCertYears()
	{
		$years = array();
		for($i=date('Y'); $i>=(date('Y')-30); $i--)
			$years[$i] = $i;
		
		return $years;
	}
	
	public function viewAddress($wrap=true)
	{
		$address = $this->address_street1;
		if(!in_array($this->address_street2, array('', null, 0)))
		{
			$address .= ' '.$this->address_street2;
		}
		$address .= $wrap ? '<br/>' : ', ';
		$address .= $this->city->name.', '.$this->state->name.', '.$this->country->name;
		if(!in_array($this->address_poscode, array('', null, 0)))
		{
			$address .= ($wrap ? '<br/>' : ', ').$this->address_poscode;
		}
		return $address;
	}
	
	public function viewChooseEmployee()
	{
		return isset($this->employee) ? $this->employee->getFullnameWithDept() : '';
	}
}
