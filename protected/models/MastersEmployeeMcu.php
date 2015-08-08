<?php

/**
 * This is the model class for table "masters_employee_mcu".
 *
 * The followings are the available columns in table 'masters_employee_mcu':
 * @property integer $id
 * @property integer $employee_id
 * @property string $mcu_date
 * @property string $mcu_place
 * @property string $mcu_status
 * @property string $mcu_notes
 * @property string $deases
 * @property string $alergy
 * @property string $created_at
 * @property integer $created_by
 */
class MastersEmployeeMcu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'masters_employee_mcu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, mcu_date, mcu_place, mcu_status', 'required'),
			array('employee_id, created_by', 'numerical', 'integerOnly'=>true),
			array('mcu_place', 'length', 'max'=>100),
			array('mcu_status', 'length', 'max'=>15),
			
			array('mcu_notes, deases, alergy, created_at, created_by', 'safe'),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, mcu_date, mcu_place, mcu_status, mcu_notes, deases, alergy, created_at, created_by', 'safe', 'on'=>'search'),
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
			'mcu_date' => 'Mcu Date',
			'mcu_place' => 'Mcu Place',
			'mcu_status' => 'Mcu Status',
			'mcu_notes' => 'Mcu Notes',
			'deases' => 'Deases',
			'alergy' => 'Alergy',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
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
		$criteria->compare('mcu_date',$this->mcu_date,true);
		$criteria->compare('mcu_place',$this->mcu_place,true);
		$criteria->compare('mcu_status',$this->mcu_status,true);
		$criteria->compare('mcu_notes',$this->mcu_notes,true);
		$criteria->compare('deases',$this->deases,true);
		$criteria->compare('alergy',$this->alergy,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MastersEmployeeMcu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
	/* ADDITIONAL FUNCTIONS */
	public function viewChooseEmployee()
	{
		return isset($this->employee) ? $this->employee->getFullnameWithDept() : '';
	}
	
	public function getStatuses()
	{
		return array('Passed' => at('Passed'), 'Failed' => at('Failed'));
	}
}
