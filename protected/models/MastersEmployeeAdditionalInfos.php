<?php

/**
 * This is the model class for table "masters_employee_additional_infos".
 *
 * The followings are the available columns in table 'masters_employee_additional_infos':
 * @property integer $id
 * @property integer $employee_id
 * @property integer $length_of_work
 * @property integer $leave_quota
 * @property integer $total_leave_request
 * @property integer $leave_total_in_month
 */
class MastersEmployeeAdditionalInfos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'masters_employee_additional_infos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id', 'required'),
			array('employee_id, length_of_work, leave_quota, total_leave_request, leave_total_in_month', 'numerical', 'integerOnly'=>true),
			array('length_of_work, leave_quota, total_leave_request, leave_total_in_month', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, length_of_work, leave_quota, total_leave_request, leave_total_in_month', 'safe', 'on'=>'search'),
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
			'length_of_work' => 'Length Of Work',
			'leave_quota' => 'Leave Quota',
			'total_leave_request' => 'Total Leave Request',
			'leave_total_in_month' => 'Leave Total In Month',
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
		$criteria->compare('length_of_work',$this->length_of_work);
		$criteria->compare('leave_quota',$this->leave_quota);
		$criteria->compare('total_leave_request',$this->total_leave_request);
		$criteria->compare('leave_total_in_month',$this->leave_total_in_month);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MastersEmployeeAdditionalInfos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
