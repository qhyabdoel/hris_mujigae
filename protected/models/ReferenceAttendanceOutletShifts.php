<?php

/**
 * This is the model class for table "reference_attendance_outlet_shifts".
 *
 * The followings are the available columns in table 'reference_attendance_outlet_shifts':
 * @property integer $id
 * @property integer $format_id
 * @property integer $shift_id
 * @property string $description
 * @property string $time_check_in
 * @property string $time_check_out
 * @property string $time_break_out
 * @property string $time_break_in
 * @property string $max_time_check_out
 *
 * The followings are the available model relations:
 * @property ReferenceAttendanceShiftFormats $format
 * @property ReferenceAttendanceShifts $shift
 */
class ReferenceAttendanceOutletShifts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reference_attendance_outlet_shifts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('format_id, shift_id', 'required'),
			array('format_id, shift_id', 'numerical', 'integerOnly'=>true),
			array('description, time_check_in, time_check_out, time_break_out, time_break_in, max_time_check_out', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, format_id, shift_id, description, time_check_in, time_check_out, time_break_out, time_break_in, max_time_check_out', 'safe', 'on'=>'search'),
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
			'format' 	=> array(self::BELONGS_TO, 'ReferenceAttendanceShiftFormats', 'format_id'),
			'shift' 	=> array(self::BELONGS_TO, 'ReferenceAttendanceShifts', 'shift_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'format_id' => 'Format',
			'shift_id' => 'Shift',
			'description' => 'Description',
			'time_check_in' => 'Time Check In',
			'time_check_out' => 'Time Check Out',
			'time_break_out' => 'Time Break Out',
			'time_break_in' => 'Time Break In',
			'max_time_check_out' => 'Max Time Check Out',
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
		$criteria->compare('format_id',$this->format_id);
		$criteria->compare('shift_id',$this->shift_id);
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
	 * @return ReferenceAttendanceOutletShifts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
