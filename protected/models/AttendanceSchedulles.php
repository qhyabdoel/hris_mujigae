<?php

/**
 * This is the model class for table "attendance_schedulles".
 *
 * The followings are the available columns in table 'attendance_schedulles':
 * @property integer $id
 * @property integer $employee_id
 * @property integer $year
 * @property integer $month
 * @property integer $date_01
 * @property integer $date_02
 * @property integer $date_03
 * @property integer $date_04
 * @property integer $date_05
 * @property integer $date_06
 * @property integer $date_07
 * @property integer $date_08
 * @property integer $date_09
 * @property integer $date_10
 * @property integer $date_11
 * @property integer $date_12
 * @property integer $date_13
 * @property integer $date_14
 * @property integer $date_15
 * @property integer $date_16
 * @property integer $date_17
 * @property integer $date_18
 * @property integer $date_19
 * @property integer $date_20
 * @property integer $date_21
 * @property integer $date_22
 * @property integer $date_23
 * @property integer $date_24
 * @property integer $date_25
 * @property integer $date_26
 * @property integer $date_27
 * @property integer $date_28
 * @property integer $date_29
 * @property integer $date_30
 * @property integer $date_31
 */
class AttendanceSchedulles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'attendance_schedulles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, department_id, year, month', 'required'),
			array('employee_id, department_id, year, month, date_01, date_02, date_03, date_04, date_05, date_06, date_07, date_08, date_09, date_10, date_11, date_12, date_13, date_14, date_15, date_16, date_17, date_18, date_19, date_20, date_21, date_22, date_23, date_24, date_25, date_26, date_27, date_28, date_29, date_30, date_31', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, department_id, year, month, date_01, date_02, date_03, date_04, date_05, date_06, date_07, date_08, date_09, date_10, date_11, date_12, date_13, date_14, date_15, date_16, date_17, date_18, date_19, date_20, date_21, date_22, date_23, date_24, date_25, date_26, date_27, date_28, date_29, date_30, date_31', 'safe', 'on'=>'search'),
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
			'id' 			=> 'ID',
			'employee_id' 	=> 'Employee',
			'department_id' => 'Department',
			'year' 			=> 'Year',
			'month' 		=> 'Month',
			'date_01' => 'Date 01',
			'date_02' => 'Date 02',
			'date_03' => 'Date 03',
			'date_04' => 'Date 04',
			'date_05' => 'Date 05',
			'date_06' => 'Date 06',
			'date_07' => 'Date 07',
			'date_08' => 'Date 08',
			'date_09' => 'Date 09',
			'date_10' => 'Date 10',
			'date_11' => 'Date 11',
			'date_12' => 'Date 12',
			'date_13' => 'Date 13',
			'date_14' => 'Date 14',
			'date_15' => 'Date 15',
			'date_16' => 'Date 16',
			'date_17' => 'Date 17',
			'date_18' => 'Date 18',
			'date_19' => 'Date 19',
			'date_20' => 'Date 20',
			'date_21' => 'Date 21',
			'date_22' => 'Date 22',
			'date_23' => 'Date 23',
			'date_24' => 'Date 24',
			'date_25' => 'Date 25',
			'date_26' => 'Date 26',
			'date_27' => 'Date 27',
			'date_28' => 'Date 28',
			'date_29' => 'Date 29',
			'date_30' => 'Date 30',
			'date_31' => 'Date 31',
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
		$criteria->compare('department_id',$this->department_id);
		$criteria->compare('year',$this->year);
		$criteria->compare('month',$this->month);
		$criteria->compare('date_01',$this->date_01);
		$criteria->compare('date_02',$this->date_02);
		$criteria->compare('date_03',$this->date_03);
		$criteria->compare('date_04',$this->date_04);
		$criteria->compare('date_05',$this->date_05);
		$criteria->compare('date_06',$this->date_06);
		$criteria->compare('date_07',$this->date_07);
		$criteria->compare('date_08',$this->date_08);
		$criteria->compare('date_09',$this->date_09);
		$criteria->compare('date_10',$this->date_10);
		$criteria->compare('date_11',$this->date_11);
		$criteria->compare('date_12',$this->date_12);
		$criteria->compare('date_13',$this->date_13);
		$criteria->compare('date_14',$this->date_14);
		$criteria->compare('date_15',$this->date_15);
		$criteria->compare('date_16',$this->date_16);
		$criteria->compare('date_17',$this->date_17);
		$criteria->compare('date_18',$this->date_18);
		$criteria->compare('date_19',$this->date_19);
		$criteria->compare('date_20',$this->date_20);
		$criteria->compare('date_21',$this->date_21);
		$criteria->compare('date_22',$this->date_22);
		$criteria->compare('date_23',$this->date_23);
		$criteria->compare('date_24',$this->date_24);
		$criteria->compare('date_25',$this->date_25);
		$criteria->compare('date_26',$this->date_26);
		$criteria->compare('date_27',$this->date_27);
		$criteria->compare('date_28',$this->date_28);
		$criteria->compare('date_29',$this->date_29);
		$criteria->compare('date_30',$this->date_30);
		$criteria->compare('date_31',$this->date_31);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function afterSave(){			
		for ($i=1; $i <= 31; $i++) { 
			if(strlen($i)==1) $date = 'date_0'.$i;
			else $date = 'date_'.$i;

			$AttendanceSchedullesLog = AttendanceSchedullesLog::model()->findByAttributes(array(
				'department_id' => $this->department_id,
				'employee_id' 	=> $this->employee_id,
				'year' 			=> $this->year,
				'month' 		=> $this->month,
				'date' 			=> $i,
			),array('order'=>'id desc'));

			if(!isset($AttendanceSchedullesLog)){
				if($this->$date!=''){
					$AttendanceSchedullesLog 				= new AttendanceSchedullesLog;
					$AttendanceSchedullesLog->department_id = $this->department_id;
					$AttendanceSchedullesLog->employee_id 	= $this->employee_id;
					$AttendanceSchedullesLog->year 			= $this->year;
					$AttendanceSchedullesLog->month 		= $this->month;
					$AttendanceSchedullesLog->date  		= $i;
					$AttendanceSchedullesLog->after 		= $this->$date;
					$AttendanceSchedullesLog->created_at 	= date('Y-m-d H:i:s');
					$AttendanceSchedullesLog->save();			
				}				
			}
			else{
				if($AttendanceSchedullesLog->after!=$this->$date){
					$AttendanceSchedullesLog2 					= new AttendanceSchedullesLog;
					$AttendanceSchedullesLog2->department_id 	= $this->department_id;
					$AttendanceSchedullesLog2->employee_id 		= $this->employee_id;
					$AttendanceSchedullesLog2->year 			= $this->year;
					$AttendanceSchedullesLog2->month 			= $this->month;
					$AttendanceSchedullesLog2->date 	  		= $i;
					$AttendanceSchedullesLog2->before 			= $AttendanceSchedullesLog->after;
					$AttendanceSchedullesLog2->after 			= $this->$date;
					$AttendanceSchedullesLog2->created_at 	 	= date('Y-m-d H:i:s');
					$AttendanceSchedullesLog2->save();				
				}					
			}										
		}
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AttendanceSchedulles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
