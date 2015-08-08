<?php

/**
 * This is the model class for table "masters_employee_familys".
 *
 * The followings are the available columns in table 'masters_employee_familys':
 * @property integer $id
 * @property integer $employee_id
 * @property integer $group_id
 * @property integer $status_id
 * @property integer $family_no
 * @property string $name
 * @property string $gender
 * @property integer $address_id
 * @property integer $birthplace_country_id
 * @property integer $birthplace_state_id
 * @property integer $birthplace_city_id
 * @property integer $birthplace_district_id
 * @property string $poscode
 * @property string $birthdate
 * @property integer $age
 * @property string $mobile
 * @property string $phone
 * @property string $education_level
 * @property string $job
 * @property string $job_position
 */
class MastersEmployeeFamilys extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'masters_employee_familys';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, group_id, name, gender, birthplace_country_id, birthplace_state_id, birthplace_city_id, birthplace_district_id, birthdate, age', 'required'),
			array('employee_id, group_id, status_id, family_no, address_id, birthplace_country_id, birthplace_state_id, birthplace_city_id, birthplace_district_id, age', 'numerical', 'integerOnly'=>true),
			array('name, education_level, job, job_position', 'length', 'max'=>100),
			array('gender', 'length', 'max'=>1),
			array('poscode', 'length', 'max'=>5),
			array('mobile, phone', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, group_id, status_id, family_no, name, gender, address_id, birthplace_country_id, birthplace_state_id, birthplace_city_id, birthplace_district_id, poscode, birthdate, age, mobile, phone, education_level, job, job_position', 'safe', 'on'=>'search'),
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
			'group' => array(self::BELONGS_TO, 'ReferenceFamilyGroups', 'group_id'),
			'status' => array(self::BELONGS_TO, 'ReferenceFamilyStatuses', 'status_id'),
			'address' => array(self::BELONGS_TO, 'MastersEmployeeAddresses', 'address_id'),
			'country' => array(self::BELONGS_TO, 'ReferenceGeoCountries', 'birthplace_country_id'),
			'state' => array(self::BELONGS_TO, 'ReferenceGeoStates', 'birthplace_state_id'),
			'city' => array(self::BELONGS_TO, 'ReferenceGeoCities', 'birthplace_city_id'),
			'district' => array(self::BELONGS_TO, 'ReferenceGeoDistricts', 'birthplace_district_id'),
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
			'group_id' => 'Group',
			'status_id' => 'Status',
			'family_no' => 'Family No',
			'name' => 'Family Name',
			'gender' => 'Gender',
			'address_id' => 'Address',
			'birthplace_country_id' => 'Birthplace Country',
			'birthplace_state_id' => 'Birthplace State',
			'birthplace_city_id' => 'Birthplace City',
			'birthplace_district_id' => 'Birthplace District',
			'poscode' => 'Poscode',
			'birthdate' => 'Birthdate',
			'age' => 'Age',
			'mobile' => 'Mobile',
			'phone' => 'Phone',
			'education_level' => 'Education Level',
			'job' => 'Job',
			'job_position' => 'Job Position',
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
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('family_no',$this->family_no);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('address_id',$this->address_id);
		$criteria->compare('birthplace_country_id',$this->birthplace_country_id);
		$criteria->compare('birthplace_state_id',$this->birthplace_state_id);
		$criteria->compare('birthplace_city_id',$this->birthplace_city_id);
		$criteria->compare('birthplace_district_id',$this->birthplace_district_id);
		$criteria->compare('poscode',$this->poscode,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('education_level',$this->education_level,true);
		$criteria->compare('job',$this->job,true);
		$criteria->compare('job_position',$this->job_position,true);

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
	 * @return MastersEmployeeFamilys the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function scopes()
	{
		return array(
			'parents' => array(
				'condition' => 'group_id = '.ReferenceFamilyGroups::FAMILY_GROUP_PARENTS,
				'order' => 'group_id ASC',
			),
			'brotherssisters' => array(
				'condition' => 'group_id = '.ReferenceFamilyGroups::FAMILY_GROUP_BROTHERS_SISTERS,
				'order' => 'family_no ASC',
			),
			'husbandwife' => array(
				'condition' => 'group_id = '.ReferenceFamilyGroups::FAMILY_GROUP_HUSBAND_WIFE,
				'order' => 'group_id ASC',
			),
			'childs' => array(
				'condition' => 'group_id = '.ReferenceFamilyGroups::FAMILY_GROUP_CHILDS,
				'order' => 'group_id ASC',
			),
		);
	}

	public function viewAddress()
	{
		return ($this->address ? $this->address->viewAddress() : '');
	}
	
	public function viewStatus()
	{
		$name = $this->group->name;
		if(!in_array($this->status_id, array('', null, 0)))
		{
			$name .= ' '.$this->status->name;
		}
		if(!in_array($this->family_no, array('', null, 0)))
		{
			$name .= ' no. '.$this->family_no;
		}
		return $name;
	}
	
	public function viewJob()
	{
		$job = $this->job_position;
		if(!in_array($this->job, array('', null)))
		{
			$job .= ($job <> '' ? ' ' : '').$this->job;
		}
		return $job;
	}
	
	public function viewBirthday()
	{
		$birthday = $this->birthdate.'<br/>';
		$birthday .= $this->district->name.', '.$this->city->name.'<br/>';
		$birthday .= $this->state->name.', '.$this->country->name;
		return $birthday;
	}
	
	public function viewChooseEmployee()
	{
		return isset($this->employee) ? $this->employee->getFullnameWithDept() : '';
	}
}
