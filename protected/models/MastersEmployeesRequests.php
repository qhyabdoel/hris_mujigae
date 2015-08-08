<?php

/**
 * This is the model class for table "masters_employees_requests".
 *
 * The followings are the available columns in table 'masters_employees_requests':
 * @property integer $id
 * @property integer $type_id
 * @property string $code
 * @property string $email
 * @property string $title
 * @property string $firstname
 * @property string $lastname
 * @property string $nickname
 * @property string $gender
 * @property integer $religion_id
 * @property integer $ethnic_id
 * @property integer $birthplace_country_id
 * @property integer $birthplace_state_id
 * @property integer $birthplace_city_id
 * @property integer $birthplace_district_id
 * @property string $poscode
 * @property string $birthdate
 * @property string $married_status
 * @property string $married_date
 * @property integer $child_amount
 * @property string $weight
 * @property string $height
 * @property integer $identity_type_id
 * @property string $identity_number
 * @property string $hiredate
 * @property string $resigndate
 * @property string $status
 * @property integer $is_active
 * @property integer $department_id
 * @property integer $section_id
 * @property integer $outlet_id
 * @property integer $position_id
 * @property integer $level_id
 * @property string $grade_id
 * @property string $resident_status
 * @property string $contract_periode_start
 * @property string $contract_periode_end
 * @property string $bank_name
 * @property string $bank_account_no
 * @property string $bank_account_name
 * @property string $bank_address
 * @property integer $salary_id
 * @property integer $city_area_id
 * @property integer $is_system
 * @property string $finger_1
 * @property string $finger_2
 */
class MastersEmployeesRequests extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'masters_employees_requests';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, type_id, code, firstname, lastname, nickname, gender, religion_id, birthplace_country_id, birthplace_state_id, birthplace_city_id, birthdate, married_status, identity_type_id, identity_number, hiredate, status, department_id, position_id, level_id, grade_id, resident_status, city_area_id', 'required'),
			array('id, type_id, religion_id, ethnic_id, birthplace_country_id, birthplace_state_id, birthplace_city_id, birthplace_district_id, child_amount, identity_type_id, is_active, department_id, section_id, outlet_id, position_id, level_id, salary_id, city_area_id, is_system', 'numerical', 'integerOnly'=>true),
			array('code, resident_status', 'length', 'max'=>15),
			array('email, bank_address', 'length', 'max'=>255),
			array('title', 'length', 'max'=>10),
			array('firstname, lastname, nickname, status, bank_name, bank_account_no, bank_account_name', 'length', 'max'=>50),
			array('gender', 'length', 'max'=>1),
			array('poscode, weight, height, grade_id', 'length', 'max'=>5),
			array('married_status', 'length', 'max'=>20),
			array('identity_number', 'length', 'max'=>100),
			array('finger_1, finger_2', 'length', 'max'=>3000),
			array('married_date, resigndate, contract_periode_start, contract_periode_end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type_id, code, email, title, firstname, lastname, nickname, gender, religion_id, ethnic_id, birthplace_country_id, birthplace_state_id, birthplace_city_id, birthplace_district_id, poscode, birthdate, married_status, married_date, child_amount, weight, height, identity_type_id, identity_number, hiredate, resigndate, status, is_active, department_id, section_id, outlet_id, position_id, level_id, grade_id, resident_status, contract_periode_start, contract_periode_end, bank_name, bank_account_no, bank_account_name, bank_address, salary_id, city_area_id, is_system, finger_1, finger_2', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' 		=> 'ID',
			'type_id' 	=> 'Type',
			'code' 		=> 'Code',
			'email' 	=> 'Email',
			'title' 	=> 'Title',
			'firstname' => 'Firstname',
			'lastname' 	=> 'Lastname',
			'nickname' 	=> 'Nickname',
			'gender' 		=> 'Gender',
			'religion_id' 	=> 'Religion',
			'ethnic_id' 			=> 'Ethnic',
			'birthplace_country_id' => 'Birthplace Country',
			'birthplace_state_id' 	=> 'Birthplace State',
			'birthplace_city_id' 		=> 'Birthplace City',
			'birthplace_district_id' 	=> 'Birthplace District',
			'poscode' 					=> 'Poscode',
			'birthdate' 		=> 'Birthdate',
			'married_status' 	=> 'Married Status',
			'married_date' 		=> 'Married Date',
			'child_amount' 		=> 'Child Amount',
			'weight' 			=> 'Weight',
			'height' 			=> 'Height',
			'identity_type_id' 	=> 'Identity Type',
			'identity_number' 	=> 'Identity Number',
			'hiredate' 			=> 'Hiredate',
			'resigndate' 		=> 'Resigndate',
			'status' 			=> 'Status',
			'is_active' 	=> 'Is Active',
			'department_id' => 'Department',
			'section_id' 	=> 'Section',
			'outlet_id' 	=> 'Outlet',
			'position_id' 	=> 'Position',
			'level_id' 		=> 'Level',
			'grade_id' 					=> 'Grade',
			'resident_status' 			=> 'Resident Status',
			'contract_periode_start' 	=> 'Contract Periode Start',
			'contract_periode_end' 		=> 'Contract Periode End',
			'bank_name' 				=> 'Bank Name',
			'bank_account_no' 			=> 'Bank Account No',
			'bank_account_name' 		=> 'Bank Account Name',
			'bank_address' 				=> 'Bank Address',
			'salary_id' 	=> 'Salary',
			'city_area_id' 	=> 'City Area',
			'is_system' 	=> 'Is System',
			'finger_1' 		=> 'Finger 1',
			'finger_2' 		=> 'Finger 2',
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
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('religion_id',$this->religion_id);
		$criteria->compare('ethnic_id',$this->ethnic_id);
		$criteria->compare('birthplace_country_id',$this->birthplace_country_id);
		$criteria->compare('birthplace_state_id',$this->birthplace_state_id);
		$criteria->compare('birthplace_city_id',$this->birthplace_city_id);
		$criteria->compare('birthplace_district_id',$this->birthplace_district_id);
		$criteria->compare('poscode',$this->poscode,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('married_status',$this->married_status,true);
		$criteria->compare('married_date',$this->married_date,true);
		$criteria->compare('child_amount',$this->child_amount);
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('identity_type_id',$this->identity_type_id);
		$criteria->compare('identity_number',$this->identity_number,true);
		$criteria->compare('hiredate',$this->hiredate,true);
		$criteria->compare('resigndate',$this->resigndate,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('department_id',$this->department_id);
		$criteria->compare('section_id',$this->section_id);
		$criteria->compare('outlet_id',$this->outlet_id);
		$criteria->compare('position_id',$this->position_id);
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('grade_id',$this->grade_id,true);
		$criteria->compare('resident_status',$this->resident_status,true);
		$criteria->compare('contract_periode_start',$this->contract_periode_start,true);
		$criteria->compare('contract_periode_end',$this->contract_periode_end,true);
		$criteria->compare('bank_name',$this->bank_name,true);
		$criteria->compare('bank_account_no',$this->bank_account_no,true);
		$criteria->compare('bank_account_name',$this->bank_account_name,true);
		$criteria->compare('bank_address',$this->bank_address,true);
		$criteria->compare('salary_id',$this->salary_id);
		$criteria->compare('city_area_id',$this->city_area_id);
		$criteria->compare('is_system',$this->is_system);
		$criteria->compare('finger_1',$this->finger_1,true);
		$criteria->compare('finger_2',$this->finger_2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MastersEmployeesRequests the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
