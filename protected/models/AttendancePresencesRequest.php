<?php

/**
 * This is the model class for table "attendance_presences_request".
 *
 * The followings are the available columns in table 'attendance_presences_request':
 * @property string $id
 * @property integer $employee_id
 * @property integer $shift_id
 * @property string $date
 * @property string $type
 * @property string $check_in
 * @property string $check_out
 * @property string $break_out
 * @property string $break_in
 * @property string $leave
 * @property string $permit
 * @property string $sick
 * @property string $sickwithoutmail
 * @property string $alpha
 * @property string $time_check_in
 * @property string $total_hours
 * @property integer $is_late
 * @property string $late_time
 * @property string $created_at
 * @property integer $location_id
 * @property integer $position_track_id
 * @property integer $attendance_id
 */
class AttendancePresencesRequest extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'attendance_presences_request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, date', 'required'),
			array('employee_id, shift_id, is_late, location_id, position_track_id, attendance_id', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>11),
			array('type', 'length', 'max'=>10),
			array('check_in, check_out, break_out, break_in, leave, permit, sick, sickwithoutmail, alpha, time_check_in, total_hours, late_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, shift_id, date, type, check_in, check_out, break_out, break_in, leave, permit, sick, sickwithoutmail, alpha, time_check_in, total_hours, is_late, late_time, created_at, location_id, position_track_id, attendance_id', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'employee_id' => 'Employee',
			'shift_id' => 'Shift',
			'date' => 'Date',
			'type' => 'Type',
			'check_in' => 'Check In',
			'check_out' => 'Check Out',
			'break_out' => 'Break Out',
			'break_in' => 'Break In',
			'leave' => 'Leave',
			'permit' => 'Permit',
			'sick' => 'Sick',
			'sickwithoutmail' => 'Sickwithoutmail',
			'alpha' => 'Alpha',
			'time_check_in' => 'Time Check In',
			'total_hours' => 'Total Hours',
			'is_late' => 'Is Late',
			'late_time' => 'Late Time',
			'created_at' => 'Created At',
			'location_id' => 'Location',
			'position_track_id' => 'Position Track',
			'attendance_id' => 'Attendance',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('check_in',$this->check_in,true);
		$criteria->compare('check_out',$this->check_out,true);
		$criteria->compare('break_out',$this->break_out,true);
		$criteria->compare('break_in',$this->break_in,true);
		$criteria->compare('leave',$this->leave,true);
		$criteria->compare('permit',$this->permit,true);
		$criteria->compare('sick',$this->sick,true);
		$criteria->compare('sickwithoutmail',$this->sickwithoutmail,true);
		$criteria->compare('alpha',$this->alpha,true);
		$criteria->compare('time_check_in',$this->time_check_in,true);
		$criteria->compare('total_hours',$this->total_hours,true);
		$criteria->compare('is_late',$this->is_late);
		$criteria->compare('late_time',$this->late_time,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('position_track_id',$this->position_track_id);
		$criteria->compare('attendance_id',$this->attendance_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AttendancePresencesRequest the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function viewChooseEmployee()
	{
		$name = '';

		if($this->employee_id!=null)
			$name = MastersEmployees::model()->findByPk($this->employee_id)->getFullnameWithDept();

		return $name;
	}

	public function getShift_name()
	{
		$name = '';

		if($this->shift_id!=null)
			$name = ReferenceAttendanceShifts::model()->findByPk($this->shift_id)->name;

		return $name;
	}

	public function afterSave()
	{
		$this->spreadMail();
	}

	public function spreadMail()
	{
		$employee  	= $this->employee;
		$manager 	= new MastersEmployees;
		$admin 		= User::model()->findByAttributes(array('role'=>'admin'))->employee;						

		if($this->employee->outlet_id=='') $manager = $this->employee->department->head;
		else $manager = $this->employee->outlet->rm;

		if($this->status=='saved')
		{			
			if($this->created_by=='employee')
			{
				if ($this->approved_by=='') 
				{
					$this->sendEmail($manager,'create');
				}
				elseif ($this->approved_by=='rm' or $this->approved_by=='kadept') 
				{
					$this->sendEmail($admin,'approve');					
					$this->sendEmail($employee,'approve');
				}					
			}
			else
			{
				$this->sendEmail($admin,'create');					
				$this->sendEmail($employee,'create');
			}
		}
		elseif ($this->status=='rejected') 
		{
			$this->sendEmail($employee,'reject');		
		}
		elseif ($this->status=='approved') 
		{
			$this->sendEmail($manager,'approve');					
			$this->sendEmail($employee,'approve');
		}
	}

	public function sendEmail($target,$action)
	{				
		$actor				= getUser()->employee;				
		$mail 				= new YiiMailer();
		$creator 			= new MastersEmployees;
		$attendance_date 	= $this->date;
		$attendance_date 	= strtotime($this->date);
		$attendance_date 	= date('j',$attendance_date).' '.getMonthName()[date('n',$attendance_date)-1].' '.date('Y',$attendance_date);

		if($this->created_by=='employee'){
			$creator = $this->employee;	
		} 
		else{
			if($this->employee->outlet_id=='') $creator = $this->employee->department->head;
			else $creator = $this->employee->outlet->rm;
		}

		$url = Yii::app()->createUrl('attendances/beritaacara_approve&id='.$this->id);		
		if($_SERVER['HTTP_HOST']=='localhost') $url = 'http://localhost/'.$url;	
		
		$emailbodydetail = array(
			'target_name' 		=> $target->fullname,
			'target_role' 		=> $target->rolename,
			'actor_name' 		=> $actor->fullname,	
			'actor_role' 		=> $actor->rolename,		
			'creator_name' 		=> $creator->fullname,
			'creator_role' 		=> $creator->rolename,
			'employee'			=> $this->employee->fullname,			
			'location' 			=> $this->location->name,
			'action' 			=> $action,
			'url' 				=> $url,
			'date' 				=> $attendance_date,
			'check_in' 			=> $this->check_in,
			'check_out' 		=> $this->check_out,
			'break_out' 		=> $this->break_out,
			'break_in' 			=> $this->break_in
		);

		if($target->email!=''){
			$mail->setView('template');
			$mail->setFrom('6309234@gmail.com', 'hris');
			$mail->setTo($target->email);
			$mail->setData($emailbodydetail);
			$mail->setSubject('Berita Acara Request');
			$mail->send();		
		}			
	}
}
