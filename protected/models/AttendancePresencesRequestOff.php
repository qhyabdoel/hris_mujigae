<?php

/**
 * This is the model class for table "attendance_presences_request_off".
 *
 * The followings are the available columns in table 'attendance_presences_request_off':
 * @property string $id
 * @property integer $employee_id
 * @property integer $shift_id
 * @property string $date
 * @property string $created_at
 * @property integer $location_id
 * @property string $status
 * @property string $created_by
 * @property string $approved_by
 */
class AttendancePresencesRequestOff extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'attendance_presences_request_off';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, date, created_at, created_by', 'required'),
			array('employee_id, shift_id, location_id', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>11),
			array('status, created_by, approved_by', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, shift_id, date, created_at, location_id, status, created_by, approved_by', 'safe', 'on'=>'search'),
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
			'shift' 	=> array(self::BELONGS_TO, 'ReferenceAttendanceShifts', 'shift_id'),
			'employee' 	=> array(self::BELONGS_TO, 'MastersEmployees', 'employee_id'),
			'location' 	=> array(self::BELONGS_TO, 'MastersLocation', 'location_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' 			=> 'ID',
			'employee_id' 	=> 'Employee',
			'shift_id' 		=> 'Shift',
			'date' 			=> 'Date',
			'created_at' 	=> 'Created At',
			'location_id' 	=> 'Location',
			'status' 		=> 'Status',
			'created_by' 	=> 'Created By',
			'approved_by' 	=> 'Approved By',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('shift_id',$this->shift_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('approved_by',$this->approved_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AttendancePresencesRequestOff the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function viewChooseEmployee()
	{
		return isset($this->employee) ? $this->employee->getFullnameWithDept() : '';
	}

	public function afterSave()
	{
		if($this->status=='approved')
		{
			$recap 				= new AttendancePresencesRecap;
			$recap->employee_id = $this->employee_id;
			$recap->shift_id 	= $this->shift_id;
			$recap->date 		= $this->date;
			$recap->location_id = $this->location_id;
			$recap->type 		= 'OFF';	

			if(!$recap->save()){
				print_r($recap->errors);
				die();
			}

			$this->sendMail('template_attendance_off_approve');
		}
		elseif ($this->status=='saved') 
		{
			$this->sendMail('template_attendance_off_request');		
		}
		elseif ($this->status=='rejected') 
		{
			$this->sendMail('template_attendance_off_reject');		
		}
	}

	public function sendMail($template)
	{
		$url = Yii::app()->createUrl('attendances/off/view&id='.$this->id);		
		if($_SERVER['HTTP_HOST']=='localhost') $url = 'http://localhost/'.$url;	

		$rm 	= $this->employee->outlet->rm;
		$admin 	= User::model()->findByAttributes(array('role'=>'admin'))->employee;
		$email 	= $rm->email;

		if($template=='template_attendance_off_request') $email = $admin->email;

		$mail 	= new YiiMailer();		
		
		$emailbodydetail = array(
			'rm' 				=> $rm, 
			'admin' 			=> $admin,
			'attendance_off' 	=> $this,
			'url' 				=> $url,
			'employee' 			=> $this->employee,			
		);
		
		//$mail->setLayout('mail');

		if($email!=''){
			$mail->setView($template);
			$mail->setFrom('6309234@gmail.com', 'hris');
			$mail->setTo($email);
			$mail->setData($emailbodydetail);
			$mail->setSubject('Kehadiran Off');
			$mail->send();
		}						
	}
}
