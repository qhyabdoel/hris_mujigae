<?php

/**
 * This is the model class for table "reference_employee_status".
 *
 * The followings are the available columns in table 'reference_employee_status':
 * @property integer $id
 * @property string $groups
 * @property string $name
 * @property string $label
 * @property integer $sort_order
 *
 * The followings are the available model relations:
 * @property MastersEmployees[] $mastersEmployees
 */
class ReferenceEmployeeStatuses extends CActiveRecord
{
	const GROUP_ATTENDANCE = 'attendance';
	const GROUP_MARITAL_STATUS = 'marital_status';
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reference_employee_statuses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('groups, name, label', 'required'),
			array('sort_order', 'numerical', 'integerOnly'=>true),
			array('groups, name', 'length', 'max'=>50),
			array('label', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, groups, name, label, sort_order', 'safe', 'on'=>'search'),
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
			'mastersEmployees' => array(self::HAS_MANY, 'MastersEmployees', 'status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'groups' => 'Groups',
			'name' => 'Name',
			'label' => 'Label',
			'sort_order' => 'Sort Order',
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
		$criteria->compare('groups',$this->groups,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('sort_order',$this->sort_order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReferenceEmployeeStatus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function scopes() {
		return array(
			'attendanceStatus' => array(
				'condition' => "groups = '".$this::GROUP_ATTENDANCE."'",
				'order' => 'sort_order ASC'
			),
			'maritalStatus' => array(
				'condition' => "groups = '".$this::GROUP_MARITAL_STATUS."'",
				'order' => 'sort_order ASC'
			),
		);
	}
	
	public function getGender()
	{
		return array('F' => at('Female'), 'M' => at('Male'));
	}
	
	public function getIsActive()
	{
		return array(1 => at('Active'), 0 => at('Not Active'));
	}
}
