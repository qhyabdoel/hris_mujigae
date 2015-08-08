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
			'area_city'		=> array(self::BELONGS_TO, 'PayrollCities', 'city_area_id'),
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

	public function getCreator_role()
	{
		if($this->created_by=='admin') return 'Human Resource Manager';
		elseif($this->created_by=='kadept') return 'Department Manager';
		elseif($this->created_by=='bm') return 'Branch Manager';
		elseif($this->created_by=='rm') return 'Restaurant Manager';
		elseif($this->created_by=='qa') return 'Quality Assurance';
		else return 'Employee';
	}

	public function getCreator_employee()
	{
		if($this->created_by=='admin'){
			return User::model()->findByAttributes(array('role'=>'admin'))->employee;
		} 
		elseif($this->created_by=='kadept'){
			return $this->employee->department->head;
		} 
		elseif($this->created_by=='bm'){
			return $this->employee->outlet->outlet_area->bm;	
		} 
		elseif($this->created_by=='rm') {
			return $this->employee->outlet->rm;	
		}
		elseif($this->created_by=='qa'){
			return User::model()->findByAttributes(array('role'=>'qa'))->employee;
		} 
		else return $this->employee;
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

	public function getApprover_level()
	{
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

	public function delete_canceled()
	{
		$mutation = MutationsRequest::model()->findByAttributes(array(
			'employee_id' 	=> $this->employee_id,
			'status' 		=> 'rejected'
		));

		if($this->status!='rejected'){
			if(count($mutation)!=0) $mutation->delete();
		}
	}

	public function afterSave()
	{
		$this->delete_canceled();

		$url = Yii::app()->createUrl('employees/'.$this->type.'&id='.$this->employee_id);		
		if($_SERVER['HTTP_HOST']=='localhost') $url = 'http://localhost/'.$url;	

		$admin 		= User::model()->findByAttributes(array('role'=>'admin'))->employee;	
		$qa 		= User::model()->findByAttributes(array('role'=>'qa'))->employee;			
		$manager 	= new MastersEmployees;
		$rm 		= new MastersEmployees;

		if($this->employee->outlet_id=='') {
			$manager = $this->employee->department->head;
		}
		else{
			$manager 	= $this->employee->outlet->outlet_area->bm;	
			$rm 		= $this->employee->outlet->rm;
		} 

		if($this->type=='rotation')
		{
			if($this->status=='request'){
				$this->sendEmail($admin,$manager,'template_rotation_request');				
			}
			elseif($this->status=='rejected'){
				$this->sendEmail($manager,$admin,'template_rotation_cancel');
			}
			elseif($this->status=='approved'){
				$this->sendEmail($manager,$admin,'template_rotation_approve');
				
				if($this->employee->outlet_id!='') 
					$this->sendEmail($rm,$admin,'template_rotation_approve');
			}
		}		

		if($this->type=='mutation')
		{
			if($this->status=='request')
			{
				if ($this->created_by=='rm') 
				{
					if($this->approved_by=='') 
					{
						$this->sendEmail($manager,$rm,'template_mutation_request');
					}
					elseif ($this->approved_by=='bm') 
					{
						$this->sendEmail($qa,$manager,'template_mutation_approve_qa');
					}					
				}
				elseif ($this->created_by=='bm' or $this->created_by=='kadept') 
				{
					if($this->approved_by=='') 
						$this->sendEmail($qa,$manager,'template_mutation_request');														
				}	

				if($this->approved_by=='qa')
				{					
					$this->sendEmail($manager,$qa,'template_mutation_approve');
					$this->sendEmail($admin,$qa,'template_mutation_approve_qa');
					
					if($this->employee->outlet_id!='') 
						$this->sendEmail($rm,$qa,'template_mutation_approve');
				}			
			}

			elseif($this->status=='rejected')
			{
				if ($this->created_by=='rm') 
				{
					if($this->canceled_by=='bm')					
						$this->sendEmail($rm,$manager,'template_mutation_cancel');	

					if($this->canceled_by=='qa')					
						$this->sendEmail($rm,$qa,'template_mutation_cancel');
				}
				elseif ($this->created_by=='bm' or $this->created_by=='kadept') 
				{	
					$this->sendEmail($manager,$qa,'template_mutation_cancel');
				}				
			}			
		}
	}

	public function getInfo()
	{
		$url 	= Yii::app()->createUrl('employees/mutation&id='.$this->employee_id);		
		$info 	= '';

		if($this->status=='rejected') $url = Yii::app()->createUrl('employees/mutation_view&id='.$this->id);

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

	public function sendEmail($target,$actor,$template)
	{		
		$url = Yii::app()->createUrl('attendances/beritaacara_approve&id='.$this->id);		
		if($_SERVER['HTTP_HOST']=='localhost') $url = 'http://localhost/'.$url;	

		$mail = new YiiMailer();		
		
		$emailbodydetail = array(
			'target' 		=> $target, 
			'actor' 		=> $actor,
			'mutation' 		=> $this,
			'url' 			=> $url,
			'creator_role' 	=> $this->creator_role,
			'creator_name' 	=> $this->creator_employee->fullname,
		);
		
		//$mail->setLayout('mail');

		if($email!=''){
			$mail->setView($template);
			$mail->setFrom('6309234@gmail.com', 'hris');
			$mail->setTo($target->email);
			$mail->setData($emailbodydetail);
			$mail->setSubject('Mutation Rotation');
			$mail->send();
		}			
	}
}
