<?php

/**
 * This is the model class for table "leave_request".
 *
 * The followings are the available columns in table 'leave_request':
 * @property integer $id
 * @property integer $employee_id
 * @property integer $type_id
 * @property string $date_start
 * @property string $date_end
 * @property integer $long_leave
 * @property integer $limit_leave
 * @property string $reason
 * @property string $mode
 * @property string $created_at
 * @property string $created_by
 * @property string $approval_by_rm
 * @property string $approval_by_rm_time
 * @property string $approval_by_bm
 * @property string $approval_by_bm_time
 * @property string $approval_by_hr
 * @property string $approval_by_hr_time
 * @property string $status
 */
class LeaveRequest extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'leave_request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, type_id, date_start, date_end, long_leave, mode', 'required'),
			array('employee_id, type_id, long_leave', 'numerical', 'integerOnly'=>true),
			array('mode, status', 'length', 'max'=>50),
			array('long_leave', 'checkPendingLeaves'),
			array('long_leave', 'checkPeriodes'),
			array('long_leave', 'checkLimitLongLeaves'),
			array('limit_leave, reason, created_at, created_by, approval_by_rm, approval_by_rm_time, approval_by_bm, approval_by_bm_time, approval_by_hr, approval_by_hr_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, type_id, date_start, date_end, long_leave, limit_leave, reason, created_at, created_by, approval_by_rm, approval_by_rm_time, approval_by_bm, approval_by_bm_time, approval_by_hr, approval_by_hr_time, status', 'safe', 'on'=>'search'),
		);
	}
	
	public function checkPendingLeaves()
	{
		
	}
	
	public function checkPeriodes()
	{
		
	}
	
	public function checkLimitLongLeaves()
	{
		
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'employee' 	=> array(self::BELONGS_TO, 'MastersEmployees', 'employee_id'),
			'type' 		=> array(self::BELONGS_TO, 'ReferenceLeaveTypes', 'type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' 					=> 'ID',
			'employee_id' 			=> 'Employee',
			'type_id' 				=> 'Type',
			'date_start' 			=> 'Date Start',
			'date_end' 				=> 'Date End',
			'long_leave' 			=> 'Long Leave',
			'limit_leave' 			=> 'Limit Leave',
			'reason' 				=> 'Reason',
			'mode' 					=> 'Mode',
			'created_at' 			=> 'Created At',
			'created_by' 			=> 'Created By',
			'approval_by_rm' 		=> 'Approval By RM',
			'approval_by_rm_time' 	=> 'Time Approval By RM',
			'approval_by_bm' 		=> 'Approval By BM',
			'approval_by_bm_time' 	=> 'Time Approval By BM',
			'approval_by_dm' 		=> 'Approval By DM',
			'approval_by_dm_time' 	=> 'Time Approval By DM',
			'approval_by_hr' 		=> 'Approval By HRD',
			'approval_by_hr_time'	=> 'Time Approval By HRD',
			'status' 				=> 'Status',
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
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('date_start',$this->date_start,true);
		$criteria->compare('date_end',$this->date_end,true);
		$criteria->compare('long_leave',$this->long_leave);
		$criteria->compare('limit_leave',$this->limit_leave);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('mode',$this->mode,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('approval_by_rm',$this->approval_by_rm,true);
		$criteria->compare('approval_by_rm_time',$this->approval_by_rm_time,true);
		$criteria->compare('approval_by_bm',$this->approval_by_bm,true);
		$criteria->compare('approval_by_bm_time',$this->approval_by_bm_time,true);
		$criteria->compare('approval_by_hr',$this->approval_by_hr,true);
		$criteria->compare('approval_by_hr_time',$this->approval_by_hr_time,true);
		$criteria->compare('status',$this->status,true);
		$criteria->with = array('employee','employee.outlet');	

		if(getUser()->role == 'rm')
		{
			$criteria->compare('employee.outlet_id',getUser()->outlet_id,true);
		}

		if(getUser()->role == 'bm')
		{
			$criteria->compare('outlet_area_id',getUser()->employee->area_i_lead->id);
		}
		
		if(getUser()->role == 'employee' || getUser()->role == '')
		{
			$criteria->compare('employee_id',getUser()->employee_id,true);
		}

		if(getUser()->role == 'kadept')
		{
			$criteria->compare('employee.department_id',getUser()->employee->department_i_lead->id);
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LeaveRequest the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function beforeSave()
	{
		if ($this->isNewRecord)
		{
			$this->limit_leave = 0;
			$this->created_at = date('Y-m-d');
			$this->created_by = getUser()->role;
		}
		
		return parent::beforeSave();
	}
	
	public function getLimitLeaves()
	{
		
	}
	
	public function viewType()
	{
		return at("Leave").": ".$this->type->name;
	}
	
	public function viewChooseEmployee()
	{
		return isset($this->employee) ? $this->employee->getFullnameWithDept() : '';
	}

	public function getLevel_approval()
	{
		$approver = 'admin';

		if($this->created_by=='employee')
		{
			if($this->employee->outlet_id==''){
				if($this->approval_by_dm=='') $approver = 'kadept';
				else $approver = 'admin';
			}
			else{
				if($this->approval_by_rm=='') $approver = 'rm';
				else {
					if($this->approval_by_bm=='') $approver = 'bm';
					else $approver = 'admin';	
				}					
			}
		}
		elseif ($this->created_by=='rm') 
		{
			if($this->approval_by_bm=='') $approver = 'bm';
			else $approver = 'admin';
		}		

		return $approver;
	}
}
