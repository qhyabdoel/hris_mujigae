<?php

/**
 * This is the model class for table "attendance_presences".
 *
 * The followings are the available columns in table 'attendance_presences':
 * @property integer $id
 * @property integer $employee_id
 * @property string $date
 * @property integer $shift_id
 * @property string $type
 * @property string $presence_date
 */
class AttendancePresences extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'attendance_presences';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, date, shift_id', 'required'),
			array('employee_id, shift_id', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>10),
			array('presence_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, date, shift_id, type, presence_date', 'safe', 'on'=>'search'),
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
			'date' => 'Date',
			'shift_id' => 'Shift',
			'type' => 'Type',
			'presence_date' => 'Presence Date',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('shift_id',$this->shift_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('presence_date',$this->presence_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AttendancePresences1 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function viewChooseEmployee()
	{
		return isset($this->employee) ? $this->employee->getFullnameWithDept() : '';
	}
	
	public function clearTemporary($table_name_temp)
	{
		$query = "DELETE FROM ".$table_name_temp;
		$command= Yii::app()->db->createCommand($query);
		$command->execute();
	}
	
	public function moveDataImport($table_name, $table_name_temp)
	{
		try
		{
			$query = "
				INSERT INTO ".$table_name." (employee_id, date, shift_id, type, presence_date) 
				SELECT * 
				FROM ".$table_name_temp."
				WHERE concat(employee_id, date, case when shift_id IS NULL then '' else shift_id end, type, case when presence_date IS NULL then '' else presence_date end) NOT IN 
					(SELECT concat(employee_id, date, case when shift_id IS NULL then '' else shift_id end, type, case when presence_date IS NULL then '' else presence_date end) 
					FROM ".$table_name.");
			";
			
			$command= Yii::app()->db->createCommand($query);
			$command->execute();
			
			fok(at('Data successfully Saved.'));
		} catch(Exception $e) {
			ferror(at('Failed to save data. \n'. $e));
			exit;
			$transaction->rollBack();
		}
	}

	public function afterSave()
	{
		$recap = AttendancePresencesRecap::model()->findByAttributes(array(
			'date' 			=> $this->date,
			'employee_id' 	=> $this->employee_id
		));

		if (!isset($recap))
		{
			$recap_new 				= new AttendancePresencesRecap;
			$recap_new->employee_id = $this->employee_id;
			$recap_new->shift_id 	= $this->shift_id;
			$recap_new->date 	 	= $this->date;
			$recap_new->location_id	= $this->location_id;
			$recap_new->type 		= 'CI';

			if($this->type=='CI') $recap_new->check_in 	= $this->presence_date;
			if($this->type=='BO') $recap_new->break_out = $this->presence_date;
			if($this->type=='BI') $recap_new->break_in 	= $this->presence_date;
			if($this->type=='CO') $recap_new->check_out = $this->presence_date;

			$recap_new->save();
		}
		else{
			if($this->type=='CI') $recap->check_in 	= $this->presence_date;
			if($this->type=='BO') $recap->break_out = $this->presence_date;
			if($this->type=='BI') $recap->break_in 	= $this->presence_date;
			if($this->type=='CO') $recap->check_out = $this->presence_date;

			$recap->save();
		}
	}
}
