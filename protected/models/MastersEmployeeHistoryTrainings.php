<?php

/**
 * This is the model class for table "masters_employee_history_training".
 *
 * The followings are the available columns in table 'masters_employee_history_training':
 * @property integer $id
 * @property integer $employee_id
 * @property integer $type_id
 * @property integer $is_internal
 * @property string $topic
 * @property string $trainer_name
 * @property string $organizer
 * @property string $training_date
 * @property integer $long_trained
 * @property string $certificate_date
 * @property string $certificate_no
 *
 * The followings are the available model relations:
 * @property ReferenceTrainingTypes $type
 * @property MastersEmployees $employee
 */
class MastersEmployeeHistoryTrainings extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'masters_employee_history_training';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, type_id, topic, trainer_name, organizer, training_date, long_trained, certificate_date, certificate_no', 'required'),
			array('employee_id, type_id, is_internal, long_trained', 'numerical', 'integerOnly'=>true),
			array('topic, organizer', 'length', 'max'=>255),
			array('trainer_name', 'length', 'max'=>100),
			array('certificate_no', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, type_id, is_internal, topic, trainer_name, organizer, training_date, long_trained, certificate_date, certificate_no', 'safe', 'on'=>'search'),
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
			'type' => array(self::BELONGS_TO, 'ReferenceTrainingTypes', 'type_id'),
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
			'type_id' => 'Type',
			'is_internal' => 'Is Internal',
			'topic' => 'Topic',
			'trainer_name' => 'Trainer Name',
			'organizer' => 'Organizer',
			'training_date' => 'Training Date',
			'long_trained' => 'Long Trained',
			'certificate_date' => 'Certificate Date',
			'certificate_no' => 'Certificate No',
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
		$criteria->compare('is_internal',$this->is_internal);
		$criteria->compare('topic',$this->topic,true);
		$criteria->compare('trainer_name',$this->trainer_name,true);
		$criteria->compare('organizer',$this->organizer,true);
		$criteria->compare('training_date',$this->training_date,true);
		$criteria->compare('long_trained',$this->long_trained);
		$criteria->compare('certificate_date',$this->certificate_date,true);
		$criteria->compare('certificate_no',$this->certificate_no,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchByEmployee($id=null)
	{
		$this->employee_id = is_null($id) ? 0 : $id;
		return $this->search();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MastersEmployeeHistoryTraining the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function viewChooseEmployee()
	{
		return isset($this->employee) ? $this->employee->getFullnameWithDept() : '';
	}
}
