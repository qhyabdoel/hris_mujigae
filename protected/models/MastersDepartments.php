<?php

/**
 * This is the model class for table "masters_departments".
 *
 * The followings are the available columns in table 'masters_departments':
 * @property integer $id
 * @property string $short
 * @property string $name
 * @property integer $head_id
 * @property integer $parent_id
 * @property integer $outlet_id
 * @property integer $shift_format_id
 *
 * The followings are the available model relations:
 * @property MastersSections[] $mastersSections
 */

class MastersDepartments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'masters_departments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('short, name, shift_format_id', 'required'),
			array('short', 'length', 'max'=>15),
			array('name', 'length', 'max'=>100),
			array('head_id, parent_id, outlet_id', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, short, name', 'safe', 'on'=>'search'),
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
			'mastersSections' 		=> array(self::HAS_MANY, 'MastersSections', 'dept_id'),
			'payrollBasedSalaries' 	=> array(self::HAS_MANY, 'PayrollBasedSalaries', 'department_id'),
			'mastersEmployees' 		=> array(self::HAS_MANY, 'MastersEmployees', 'department_id'),
			'head' 					=> array(self::BELONGS_TO, 'MastersEmployees', 'head_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' 				=> 'ID',
			'short' 			=> 'Short',
			'name' 				=> 'Name',
			'head_id' 			=> 'Department Head',
			'parent_id' 		=> 'Parent',
			'outlet_id' 		=> 'Outlet',
			'shift_format_id' 	=> 'Shift Format',
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
		$criteria->compare('head_id',$this->head_id,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('outlet_id',$this->outlet_id,true);
		$criteria->compare('shift_format_id',$this->shift_format_id,true);

		return new CActiveDataProvider($this, array(
			'criteria' 		=> $criteria,
			'pagination' 	=> false,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MastersDepartments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function scopes() {
		return array(
			'byOrder' => array(
				'order' => 'name ASC'
			),
		);
	}

	public function viewChooseEmployee()
	{
		return isset($this->head) ? $this->head->fullname : '';
	}
}
