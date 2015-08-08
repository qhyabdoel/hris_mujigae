<?php

/**
 * This is the model class for table "reference_attendance_shifts".
 *
 * The followings are the available columns in table 'reference_attendance_shifts':
 * @property integer $id
 * @property string $short
 * @property string $name
 * @property string $description
 * @property string $time_check_in
 * @property string $time_check_out
 * @property string $time_break_out
 * @property string $time_break_in
 * @property string $max_time_check_out
 */
class ReferenceAttendanceShifts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reference_attendance_shifts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('short, name, time_check_in, time_check_out, time_break_out, time_break_in, max_time_check_out', 'required'),
			array('short', 'length', 'max'=>50),
			array('name', 'length', 'max'=>100),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, short, name, description, time_check_in, time_check_out, time_break_out, time_break_in, max_time_check_out', 'safe', 'on'=>'search'),
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
			'attendanceRecap' => array(self::HAS_MANY, 'AttendancePresencesRecap', 'shift_id'),			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' 					=> 'ID',
			'short' 				=> 'Short',
			'name' 					=> 'Name',
			'description' 			=> 'Description',
			'time_check_in' 		=> 'Time Check In',
			'time_check_out' 		=> 'Time Check Out',
			'time_break_out' 		=> 'Time Break Out',
			'time_break_in' 		=> 'Time Break In',
			'max_time_check_out' 	=> 'Max Time Check Out',
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
		$criteria->compare('short',$this->short,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('time_check_in',$this->time_check_in,true);
		$criteria->compare('time_check_out',$this->time_check_out,true);
		$criteria->compare('time_break_out',$this->time_break_out,true);
		$criteria->compare('time_break_in',$this->time_break_in,true);
		$criteria->compare('max_time_check_out',$this->max_time_check_out,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReferenceAttendanceShifts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
