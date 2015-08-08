<?php

/**
 * This is the model class for table "mutations_request".
 *
 * The followings are the available columns in table 'mutations_request':
 * @property integer $city_area_id
 * @property integer $department_id
 * @property integer $section_id
 * @property integer $position_id
 * @property integer $level_id
 * @property integer $grade_id
 * @property integer $employee_id
 * @property string $created_at
 * @property string $status
 * @property string $approved_by_bm
 * @property string $approved_by_bm_time
 * @property string $approved_by_dm
 * @property string $approved_by_dm_time
 * @property string $approved_by_hr
 * @property string $approved_by_hr_time
 * @property string $created_by
 * @property integer $id
 */
class MutationsRequest extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mutations_request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_area_id, department_id, level_id, grade_id, employee_id, created_at, created_by, active_date', 'required'),
			array('city_area_id, department_id, section_id, position_id, level_id, grade_id, employee_id', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>20),
			array('created_by, approved_by, canceled_by', 'length', 'max'=>10),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('city_area_id, department_id, section_id, position_id, level_id, grade_id, employee_id, created_at, status, approved_by_bm, approved_by_bm_time, approved_by_dm, approved_by_dm_time, approved_by_hr, approved_by_hr_time, created_by, id', 'safe', 'on'=>'search'),
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
			'employee' 		=> array(self::BELONGS_TO, 'MastersEmployees', 'employee_id'),
			'area' 			=> array(self::BELONGS_TO, 'PayrollCities', 'city_area_id'),
			'department' 	=> array(self::BELONGS_TO, 'MastersDepartments', 'department_id'),
			'section' 		=> array(self::BELONGS_TO, 'MastersSections', 'section_id'),
			'position' 		=> array(self::BELONGS_TO, 'MastersPositions', 'position_id'),
			'level' 		=> array(self::BELONGS_TO, 'ReferenceLevels', 'level_id'),
			'grade' 		=> array(self::BELONGS_TO, 'ReferenceGrades', 'grade_id'),
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
			'city_area_id' 			=> 'City Area',
			'department_id' 		=> 'Department',
			'section_id' 			=> 'Section',
			'position_id' 			=> 'Position',
			'level_id' 				=> 'Level',
			'grade_id' 				=> 'Grade',
			'active_date' 			=> 'Active Date',
			'status' 				=> 'Status',
			'created_by' 			=> 'Created By',
			'created_at' 			=> 'Created At',
			'approved_by'	 		=> 'Approved By',
			'approved_at' 			=> 'Approved At',
			'canceled_by'	 		=> 'Canceled By',
			'canceled_at'	 		=> 'Canceled At',			
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
		$criteria->compare('city_area_id',$this->city_area_id);
		$criteria->compare('department_id',$this->department_id);
		$criteria->compare('section_id',$this->section_id);
		$criteria->compare('position_id',$this->position_id);
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('grade_id',$this->grade_id);
		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('approved_by',$this->approved_by,true);
		$criteria->compare('approved_at',$this->approved_at,true);
		$criteria->compare('canceled_by',$this->canceled_by,true);
		$criteria->compare('canceled_at',$this->canceled_at,true);		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MutationsRequest the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function fill($id)
	{
		$employee 				= MastersEmployees::model()->findByPk($id);
		$this->employee_id 		= $employee->id;
		$this->city_area_id 	= $employee->city_area_id;
		$this->department_id 	= $employee->department_id;
		$this->section_id 		= $employee->section_id;
		$this->position_id 		= $employee->position_id;
		$this->level_id 		= $employee->level_id;
		$this->grade_id 		= $employee->grade_id;
		$this->created_at 		= date('Y-m-d h:i:s');
		$this->created_by 		= getUser()->role;
	}

	public function viewChooseEmployee()
	{
		return isset($this->employee) ? $this->employee->getFullnameWithDept() : '';
	}

	public function getCreator()
	{
		if($this->created_by=='admin') return 'hr';
		elseif($this->created_by=='kadept') return 'dm';
		else return $this->created_by;
	}

	public function getApprover()
	{
		if($this->approved_by=='admin') return 'hr';
		elseif($this->approved_by=='kadept') return 'dm';
		else return $this->approved_by;
	}

	public function getCancelor()
	{
		if($this->canceled_by=='admin') return 'hr';
		elseif($this->canceled_by=='kadept') return 'dm';
		else return $this->canceled_by;
	}

	public function is_rotation()
	{
		$this->type = 'rotation';
	}

	public function getApprover_level(){
		$approver = 'bm';

		if($this->created_by=='bm' or $this->created_by=='kadept'){
			$approver = 'qa';

			if($this->type=='rotation') $approver = 'admin';
		}

		if($this->approved_by=='bm' or $this->approved_by=='kadept'){
			$approver = 'qa';

			if($this->type=='rotation') $approver = 'admin';	
		}

		if($this->approved_by=='qa') $approver = 'admin';

		if($this->created_by=='admin') $approver = '';

		return $approver;
	}

	public function afterSave(){
		$url = Yii::app()->createUrl('employees/'.$this->type.'&id='.$this->employee_id);		
		if($_SERVER['HTTP_HOST']=='localhost') $url = 'http://localhost/'.$url;	

		$admin 		= User::model()->findByAttributes(array('role'=>'admin'))->employee;	
		$employee 	= $this->employee;
		$manager 	= new MastersEmployees;

		if($this->employee->outlet_id=='') $manager = $this->employee->department->head;
		else $manager = $this->employee->outlet->rm;

		if($this->type=='rotation')
		{
			if($this->created_by=='bm')
			{ 
				if($this->approved_by=='hr')
				{										
					$this->sendEmail($manager,'approve');
				}
				elseif($this->canceled_by=='hr') 
				{						
					$this->sendEmail($manager,'cancel');					
				}
				else
				{
					$message = '
						this is rotation request for <b>'.$this->employee->fullname.'</b>. go to this <a href="'.$url.'">link<a> to approve.
					';
					
					$email = User::model()->findByAttributes(array('role'=>'admin'))->email;

					$this->sendEmail($admin,'create');

					$message = 'bm make rotation request for <b>'.$this->employee->fullname.'</b> for your employee.';
					$message .= ' go to this <a href="'.$url.'">link<a> to view.';

					$email = $this->employee->outlet->rm->email;			

					$this->sendEmail($email,$message);					
				}
			}

			if($this->created_by=='kadept')
			{ 
				if($this->approved_by=='hr')
				{
					$message 	= 'the rotation request for <b>'.$this->employee->fullname.'</b> already approved by hr.';
					$email 		= $this->employee->department->head->email;					

					$this->sendEmail($email,$message);
				}
				elseif($this->canceled_by=='hr') 
				{
					$message 	= 'the rotation request for <b>'.$this->employee->fullname.'</b> canceled by hr.';
					$email 		= $this->employee->department->head->email;					

					$this->sendEmail($email,$message);
				}
				else
				{
					$message = '
						this is rotation request for <b>'.$this->employee->fullname.'</b>. go to this <a href="'.$url.'">link<a> to approve.
					';
					
					$email = User::model()->findByAttributes(array('role'=>'admin'))->email;

					$this->sendEmail($email,$message);
				}
			}
		}

		if($this->type=='mutation')
		{
			if($this->created_by=='rm')
			{
				if($this->approved_by=='bm')
				{
					$message = '
						this is mutation request for <b>'.$this->employee->fullname.'</b>. go to this <a href="'.$url.'">link<a> to approve.
					';
					
					$email = User::model()->findByAttributes(array('role'=>'qa'))->email;

					$this->sendEmail($email,$message);
				} 
				elseif($this->canceled_by=='bm')
				{
					$message 	= 'the mutation request canceled by bm.';
					$email 		= $this->employee->outlet->rm->email;					

					$this->sendEmail($email,$message);					
				} 
				elseif($this->approved_by=='qa')
				{
					$message 	= 'the mutation request for <b>'.$this->employee->fullname.'</b> already approved by qa.';
					$email 		= $this->employee->outlet->outlet_area->bm->email;					

					$this->sendEmail($email,$message);					
					
					$email = $this->employee->outlet->rm->email;					

					$this->sendEmail($email,$message);	

					$message = '
						this is mutation request for <b>'.$this->employee->fullname.'</b>. go to this <a href="'.$url.'">link<a> to approve.
					';
					
					$email = User::model()->findByAttributes(array('role'=>'admin'))->email;

					$this->sendEmail($email,$message);					
				} 
				elseif($this->canceled_by=='qa')
				{
					$message 	= 'the mutation request for <b>'.$this->employee->fullname.'</b> canceled by qa.';
					$email 		= $this->employee->outlet->outlet_area->bm->email;					

					$this->sendEmail($email,$message);					

					$email 		= $this->employee->outlet->rm->email;					

					$this->sendEmail($email,$message);					
				}
				elseif($this->canceled_by=='hr')
				{
					$message 	= 'the mutation request for <b>'.$this->employee->fullname.'</b> canceled by hr.';
					$email 		= $this->employee->outlet->outlet_area->bm->email;					

					$this->sendEmail($email,$message);					

					$email = $this->employee->outlet->rm->email;					

					$this->sendEmail($email,$message);					
				}
				else{
					$message = '
						this is mutation request for <b>'.$this->employee->fullname.'</b>. go to this <a href="'.$url.'">link<a> to approve.
					';
					
					$email	= $this->employee->outlet->outlet_area->bm->email;					

					$this->sendEmail($email,$message);					
				}
			} 
			
			if($this->created_by=='bm')
			{ 
				if($this->approved_by=='qa')
				{
					$message = 'the mutation request for <b>'.$this->employee->fullname.'</b> already approved by qa.';
					$message .= ' go to this <a href="'.$url.'">link<a> to view.';
					
					$email = $this->employee->outlet->rm->email;					

					$this->sendEmail($email,$message);				

					$message 	= 'the mutation request for <b>'.$this->employee->fullname.'</b> already approved by qa.';					
					$email 		= $this->employee->outlet->outlet_area->bm->email;					

					$this->sendEmail($email,$message);						

					$message = '
						this is mutation request for <b>'.$this->employee->fullname.'</b>. go to this <a href="'.$url.'">link<a> to approve.
					';
					
					$email = User::model()->findByAttributes(array('role'=>'admin'))->email;

					$this->sendEmail($email,$message);					
				}
				elseif($this->canceled_by=='qa')
				{
					$message 	= 'the mutation request for <b>'.$this->employee->fullname.'</b> canceled by qa.';					
					$email 		= $this->employee->outlet->outlet_area->bm->email;					

					$this->sendEmail($email,$message);							
				}
				elseif($this->canceled_by=='hr')
				{
					$message 	= 'the mutation request for <b>'.$this->employee->fullname.'</b> canceled by hr.';					
					$email 		= $this->employee->outlet->outlet_area->bm->email;					

					$this->sendEmail($email,$message);
				}
				else{
					$message = '
						this is mutation request for <b>'.$this->employee->fullname.'</b>. go to this <a href="'.$url.'">link<a> to approve.
					';
					
					$email = User::model()->findByAttributes(array('role'=>'qa'))->email;

					$this->sendEmail($email,$message);
				}
			}

			if($this->created_by=='kadept')
			{ 
				if($this->approved_by=='qa')
				{
					$message 	= 'the mutation for <b>'.$this->employee->fullname.'</b> request already approved by qa.';					
					$email 		= $this->employee->department->head->email;	

					$this->sendEmail($email,$message);						

					$message = '
						this is mutation request. go to this <a href="'.$url.'">link<a> to approve.
					';
					
					$email = User::model()->findByAttributes(array('role'=>'admin'))->email;

					$this->sendEmail($email,$message);										
				}
				elseif($this->canceled_by=='qa')
				{
					$message 	= 'the mutation request for <b>'.$this->employee->fullname.'</b> canceled by qa.';					
					$email 		= $this->employee->department->head->email;	

					$this->sendEmail($email,$message);						
				}
				elseif($this->canceled_by=='hr')
				{
					$message 	= 'the mutation request for <b>'.$this->employee->fullname.'</b> canceled by hr.';					
					$email 		= $this->employee->department->head->email;	

					$this->sendEmail($email,$message);					
				}
				else{								
					$message = '
						this is mutation request for <b>'.$this->employee->fullname.'</b>. go to this <a href="'.$url.'">link<a> to approve.
					';
					
					$email = User::model()->findByAttributes(array('role'=>'qa'))->email;

					$this->sendEmail($email,$message);					
				}
			}
		}
	}

	public function getInfo(){
		$url 	= Yii::app()->createUrl('employees/mutation&id='.$this->employee_id);		
		$info 	= '';

		$info = $this->creator.' make '.$this->type.' request for your employee.';
			
		if(getUser()->role=='employee') 
			$info = $this->creator.' make '.$this->type.' request for you.';
		
		if($this->approved_by!=''){
			$info = $this->approver.' approve '.$this->type.' request for your employee.';

			if(getUser()->role=='employee') 
				$info = $this->approver.' approve '.$this->type.' request for you.';
		}

		if($this->canceled_by!=''){
			$info = $this->cancelor.' cancel '.$this->type.' request for your employee.';

			if(getUser()->role=='employee') 
				$info = $this->cancelor.' cancel '.$this->type.' request for you.';
		}

		if(getUser()->role!='employee') $info .= ' go to this <a href="'.$url.'">link</a> to view.';

		return $info;		
	}

	public function sendEmail($email,$message)
	{		
		//----- not used ------------		
		// The message
		// $message = "Line 1\r\nLine 2\r\nLine 3";
		// $message = '
		// 	<html>
		// 	<head>
		// 		<title></title>
		// 	</head>
		// 	<body>
		// 		'.$message.'
		// 	</body>
		// 	</html>
		// ';

		// To send HTML mail, the Content-type header must be set
		// $headers  = 'MIME-Version: 1.0' . "\r\n";
		// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// In case any of our lines are larger than 70 characters, we should use wordwrap()
		// $message = wordwrap($message, 70, "\r\n");

		// Send
		// mail($email, 'Mutation or Rotation', $message, $headers);
		//--------------------------

		$emailbodydetail 	= array('emailbodydetail' => $message);
		$mail 				= new YiiMailer();
		//$mail->setLayout('mail');
		$mail->setView('template');
		$mail->setFrom('6309234@gmail.com', 'hris');
		$mail->setTo($email);
		$mail->setData($emailbodydetail);
		$mail->setSubject('Mutation Rotation');
		$mail->send();
	}
}
