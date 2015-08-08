<?php

/**
 * This is the model class for table "masters_employees".
 *
 * The followings are the available columns in table 'masters_employees':
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
 * @property string $identity_type
 * @property string $identity_number
 * @property string $hiredate
 * @property string $resigndate
 * @property string $status
 * @property integer $is_active
 * @property integer $department_id
 * @property integer $section_id
 * @property integer $position_id
 * @property integer $outlet_id
 * @property integer $level_id
 * @property integer $grade_id
 * @property integer $city_area_id
 * @property integer $resident_status
 * @property string $contract_periode_start
 * @property string $contract_periode_end
 * @property string $bank_name
 * @property string $bank_account_no
 * @property string $bank_account_name
 * @property string $bank_address
 * @property string $finger_1
 * @property string $finger_2
 * @property integer $salary_id
 * @property integer $current_track_id
 *
 * The followings are the available model relations:
 * @property MastersEmployeeHistoryEducations[] $mastersEmployeeHistoryEducations
 */
class MastersEmployees extends CActiveRecord
{
	public $last_number;
	
	const STATUS_ACTIVE = 1;
	const STATUS_NOTACTIVE = 2;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'masters_employees';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(
				'type_id, firstname, lastname, nickname, gender, religion_id, ethnic_id, birthplace_country_id, birthplace_state_id, 
				birthplace_city_id, birthdate, married_status, identity_type_id, identity_number, hiredate, department_id, position_id, 
				level_id, grade_id, city_area_id, is_active', 'required'
			),
			
			array(
				'type_id, religion_id, ethnic_id, birthplace_country_id, birthplace_state_id, birthplace_city_id, 
				birthplace_district_id, child_amount, is_active, department_id, section_id, position_id', 
				'numerical', 'integerOnly'=>true
			),
			
			array('code', 'length', 'max'=>15),
			array('email', 'length', 'max'=>255),
			array('title, level_id', 'length', 'max'=>10),
			array('firstname, lastname, nickname', 'length', 'max'=>50),
			array('gender, grade_id', 'length', 'max'=>1),
			array('poscode, weight, height', 'length', 'max'=>6),
			array('identity_type_id, married_status', 'length', 'max'=>20),
			array('identity_number', 'length', 'max'=>100),
			array('code, title, birthplace_district_id, section_id, outlet_id, married_date, status, contract_periode_start, contract_periode_end, bank_name, bank_account_no, bank_account_name, bank_address, finger_1, finger_2, salary_id, current_track_id', 'safe'),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			
			array(
				'id, type_id, code, email, title, firstname, lastname, nickname, gender, 
				religion_id, ethnic_id, birthplace_country_id, birthplace_state_id, 
				birthplace_city_id, birthplace_district_id, poscode, birthdate, 
				married_status, married_date, child_amount, weight, height, 
				identity_type_id, identity_number, hiredate, status, is_active, 
				department_id, section_id, position_id, level_id, grade_id, city_area_id', 
				'safe', 'on'=>'search'
			),
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
			'mastersEmployeeAdditionalInfos' => array(self::HAS_ONE, 'MastersEmployeeAdditionalInfos', 'employee_id'),
			'mastersEmployeeAddresses' 		 => array(self::HAS_MANY, 'MastersEmployeeAddresses', 'employee_id'),
			
			'parents' => array(self::HAS_MANY, 'MastersEmployeeFamilys', 'employee_id', 'scopes'=>array('parents')),
			
			'brothersSisters' => array(self::HAS_MANY, 'MastersEmployeeFamilys', 'employee_id', 'scopes'=>array('brotherssisters')),
			
			'husbandWife' => array(self::HAS_MANY, 'MastersEmployeeFamilys', 'employee_id', 'scopes'=>array('husbandwife')),
			
			'childs' => array(self::HAS_MANY, 'MastersEmployeeFamilys', 'employee_id', 'scopes'=>array('childs')),
			
			'mastersEmployeeHistoryEducations' 	=> array(self::HAS_MANY, 'MastersEmployeeHistoryEducations', 'employee_id'),
			'mastersEmployeeHistoryEmployments' => array(self::HAS_MANY, 'MastersEmployeeHistoryEmployments', 'employee_id'),
			'mastersEmployeeUser' 				=> array(self::HAS_MANY, 'User', 'employee_id'),
			'payrollEmployeeSalary' 			=> array(self::HAS_MANY, 'PayrollEmployeeSalary', 'employee_id'),
			'employeeSalary' 					=> array(self::BELONGS_TO, 'PayrollBasedSalaries', 'salary_id'),
			
			'employeestatuses' => array(self::BELONGS_TO, 'ReferenceEmployeeStatuses', 'status', 'scopes'=>array('attendance')),
			
			'grade' 			=> array(self::BELONGS_TO, 'ReferenceGrades', 'grade_id'),
			'level' 			=> array(self::BELONGS_TO, 'ReferenceLevels', 'level_id'),
			'identityType' 		=> array(self::BELONGS_TO, 'ReferenceIdentityTypes', 'identity_type_id'),
			'religion' 			=> array(self::BELONGS_TO, 'ReferenceReligions', 'religion_id'),
			'department' 		=> array(self::BELONGS_TO, 'MastersDepartments', 'department_id'),
			'department_i_lead' => array(self::HAS_ONE, 'MastersDepartments', 'head_id'),
			'section' 			=> array(self::BELONGS_TO, 'MastersSections', 'section_id'),
			'position' 			=> array(self::BELONGS_TO, 'MastersPositions', 'position_id'),
			'ethnic' 			=> array(self::BELONGS_TO, 'ReferenceEthnics', 'ethnic_id'),
			'cityarea' 			=> array(self::BELONGS_TO, 'PayrollCities', 'city_area_id'),
			'area_i_lead' 		=> array(self::HAS_ONE, 'MastersOutletAreas', 'bm_id'),
			'outlet' 			=> array(self::BELONGS_TO, 'MastersOutlets', 'outlet_id'),
			'outlet_i_lead' 	=> array(self::HAS_ONE, 'MastersOutlets', 'rm_id'),
			'attendances' 		=> array(self::HAS_MANY, 'AttendancePresencesRecap', 'employee_id'),
			'attendance_offs'	=> array(self::HAS_MANY, 'AttendancePresencesRequestOff', 'employee_id'),
			'attendance_req' 	=> array(self::HAS_MANY, 'AttendancePresencesRequest', 'employee_id'),
			'absences' 			=> array(self::HAS_MANY, 'AttendanceAbsences', 'employee_id'),
			'type' 				=> array(self::BELONGS_TO, 'ReferenceEmployeeTypes', 'type_id'),
			'track'				=> array(self::BELONGS_TO, 'MastersEmployeePositionTrack', 'current_track_id'),
			
			'mcu' => array(self::HAS_ONE, 'MastersEmployeeMcu', 'employee_id'),
			'terminate' => array(self::HAS_ONE, 'EmployeeTermination', 'employee_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' 						=> 'ID',
			'type_id' 					=> 'Employee Type',
			'code' 						=> 'Code',
			'email' 					=> 'Email',
			'title' 					=> 'Title',
			'firstname' 				=> 'Firstname',
			'lastname' 					=> 'Lastname',
			'nickname' 					=> 'Nickname',
			'gender' 					=> 'Gender',
			'religion_id' 				=> 'Religion',
			'ethnic_id' 				=> 'Ethnic',
			'birthplace_country_id' 	=> 'Birthplace Country',
			'birthplace_state_id' 		=> 'Birthplace State',
			'birthplace_city_id' 		=> 'Birthplace City',
			'birthplace_district_id' 	=> 'Birthplace District',
			'poscode' 					=> 'Poscode',
			'birthdate' 				=> 'Birthdate',
			'married_status' 			=> 'Marital Status',
			'married_date' 				=> 'Married Date',
			'child_amount' 				=> 'Child Amount',
			'weight' 					=> 'Weight',
			'height' 					=> 'Height',
			'identity_type_id' 			=> 'Identity Type',
			'identity_number' 			=> 'Identity Number',
			'hiredate' 					=> 'Hire Date',
			'resigndate' 				=> 'Resign Date',
			'status' 					=> 'Status',
			'is_active' 				=> 'Is Active',
			'department_id' 			=> 'Department',
			'section_id' 				=> 'Section',
			'position_id' 				=> 'Position',
			'level_id' 					=> 'Level',
			'grade_id' 					=> 'Grade',
			'city_area_id' 				=> at('City Area'),
			'contract_periode_start'	=> at('Contract Start'),
			'contract_periode_end'		=> at('Contract End'),
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
	public function search($viewPage=false)
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
		$criteria->compare('married_status',$this->married_status);
		$criteria->compare('married_date',$this->married_date,true);
		$criteria->compare('child_amount',$this->child_amount);
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('identity_type_id',$this->identity_type_id,true);
		$criteria->compare('identity_number',$this->identity_number,true);
		$criteria->compare('hiredate',$this->hiredate,true);
		$criteria->compare('resigndate',$this->resigndate,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('department_id',$this->department_id);
		$criteria->compare('section_id',$this->section_id);
		$criteria->compare('position_id',$this->position_id);
		$criteria->compare('outlet_id',$this->outlet_id);
		$criteria->compare('level_id',$this->level,true);
		$criteria->compare('grade_id',$this->grade,true);
		$criteria->compare('city_area_id',$this->city_area_id,true);
		$criteria->compare('contract_periode_start',$this->contract_periode_start,true);
		$criteria->compare('contract_periode_end',$this->contract_periode_end,true);
		$criteria->with = 'outlet';

		if(getUser()->role == 'rm')
		{
			$criteria->compare('outlet_id',getUser()->outlet_id,true);
		}
		elseif(getUser()->role == 'kadept') 
		{
			$criteria->compare('department_id',getUser()->employee->department_i_lead->id);			
		}
		elseif (getUser()->role == 'bm') 
		{
			$criteria->compare('outlet.outlet_area_id',getUser()->employee->area_i_lead->id);	
		}
		
		$params = array('criteria'=>$criteria);
		if(!$viewPage) $params['pagination'] = $viewPage;
		
		return new CActiveDataProvider($this, $params);
	}

	public function searchByOutlet($id=null)
	{
		$this->outlet_id = is_null($id) ? getUser()->outlet_id : $id;
		return $this->search();
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MastersEmployees the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function scopes() {
		return array(
			'withActive' => array(
				'condition' => 'is_active = 1',
				'order' => 'firstname ASC'
			),
			'withNewHire' => array(
				'condition' => 'DATE_FORMAT(hiredate, "%Y%m") = "'.date('Ym').'"',
				'order' => 'firstname ASC'
			),
			'withNewResign' => array(
				'condition' => 'status = "resign" AND is_active = 0 AND DATE_FORMAT(resigndate, "%Y%m") = "'.date('Ym').'"',
				'order' => 'firstname ASC'
			),
			'getRM' => array(
				'condition' => 'position_id IN ('.MyHelper::getSettingVal('outlet-leader-pos').')',
				'order' => 'firstname ASC'
			),
		);
	}
	
	public function beforeSave()
	{
		$this->hiredate 	= MyHelper::renderDate($this->hiredate);
		$this->married_date = MyHelper::renderDate($this->married_date);
		$this->birthdate 	= MyHelper::renderDate($this->birthdate);
		
		if ($this->isNewRecord) {
			$this->code = $this->generateEmployeeId();
			$this->status = $this->is_active == 1 ? 'Active' : 'Not Active';
		}
		
		return parent::beforeSave();
	}
	
	public function afterSave()
	{
		if ($this->isNewRecord)
			$this->saveOnNewRecord();

		return parent::afterSave();
	}
	
	public function saveOnNewRecord()
	{
		//Save additional info, position_tracking<salary_id>
		$sql = "CALL sp_employee_new_record (".$this->id.", ".PayrollHelper::getCurrentYear().", ".getUser()->id.")";
		$command = Yii::app()->db->createCommand($sql);
		return $command->execute();
	}
	
	public function getPhoto()
	{
		if (file_exists(profilePaths().$this->code.'.jpg'))
			return profileUrl().$this->code.'.jpg';
		else 
			return profileUrl().'default.png';
	}
	
	public function getFullname()
	{
		return trim($this->firstname).' '.trim($this->lastname);
	}
	
	public function getFullnameWithDept()
	{
		return $this->getFullname().' :: '.$this->department->name;
	}
	
	public function getGender()
	{
		return $this->gender == 'F' ? at('Female') : at('Male');
	}
	
	public function viewGrade()
	{
		return $this->level->level.$this->grade->grade;
	}
	
	public function viewStatus()
	{
		$criteria = new CDbCriteria();
		$criteria->params = array('name=' => $this->status);
		$status = ReferenceEmployeeStatuses::model()->attendanceStatus()->find();
		return isset($status->label) ? $status->label : '';
	}
	
	public function generateEmployeeId()
	{
		$hiredate 		= strtotime($this->hiredate);
		$code 			= date('ym', $hiredate);
		$c 				= new CDbCriteria();
		$c->condition 	= 'code like :code';
		$c->params 		= array(':code' => "$code%");
		$c->select 		= 'MAX(CONVERT(RIGHT(code,3),UNSIGNED INTEGER)) AS last_number';
		
		$model = MastersEmployees::model()->find($c);
		$last_number = count($model) > 0 ? $model->last_number + 1 : 1;
		
		return $code.MyHelper::numberString($last_number, 3, '0');
	}
	
	public function getArrayAddress()
	{
		$addresses 	= $this->mastersEmployeeAddresses;
		$array 		= array();

		foreach($addresses as $address)
		{
			$array[$address->id] = $address->viewAddress(false);
		}
		
		return $array;
	}

	public function getShift($date){		
		$date 	= strtotime($date);
		$year 	= date('Y', $date);
		$month 	= date('m', $date);
		$month 	= (int)$month - 1;
		$day 	= date('d', $date);
		$day 	= 'date_'.$day;		
		$shift 	= 4;

		$schedulle = AttendanceSchedulles::model()->findByAttributes(array(
			'employee_id' 	=> $this->id,
			'year' 			=> $year,
			'month' 		=> $month
		));

		if(count($schedulle)!=0) if($schedulle->$day!=null) $shift = $schedulle->$day;

		return $shift;
	}

	public function getSubordinates(){
		$subordinates = array();

		if(count($this->department_i_lead)==1){
			$subordinates = $this->department_i_lead->mastersEmployees;
		}

		return $subordinates;
	}

	public function getOutlet_area_id(){
		isset($this->outlet) ? $this->outlet->outlet_area_id : '';
	}

	public function getArea_id()
	{
		return $this->outlet->outlet_area_id;
	}
	
	public function getSalary(){
		$salary = PayrollEmployeeSalary::model()->findByAttributes(array('employee_id'=>$this->id),array('order'=>'id desc'));

		return $salary;
	}

	public function getLeave_quota()
	{
		$leave_quota = 3;

		if(isset($this->mastersEmployeeAdditionalInfos))
			$leave_quota = $this->mastersEmployeeAdditionalInfos->leave_quota;

		return $leave_quota;
	}

	public function getSalaryincrease(){
		$increase = 0;
		if(isset($this->payrollEmployeeSalary)) $increase = $this->salary->basic_salary;
		return $increase;
	}

	public function getTotalsalary(){
		
	}
	
	public function getBasedSalary(){
		if($this->current_track_id == NULL)
			return NULL;
		else return $this->track->getBasedSalary();
	}
	
	public function getSalaryId(){
		if($this->current_track_id == NULL)
			return 0;
		else return $this->track->getSalaryId();
	}

	public function getRolename(){
		$role = 'Employee';

		if(isset($this->outlet_i_lead)) $role = 'Restaurant Manager';
		if(isset($this->area_i_lead)) $role = 'Branch Manager';
		if(isset($this->department_i_lead)) $role = 'Department Manager';

		$is_admin = count(User::model()->findByAttributes(array('employee_id'=>$this->id,'role'=>'admin')));
		$is_qa = count(User::model()->findByAttributes(array('employee_id'=>$this->id,'role'=>'qa')));		

		if($is_admin==1) $role = 'Human Resource Manager';
		if($is_qa==1) $role = 'Quality Assurance';

		return $role;
	}
}
