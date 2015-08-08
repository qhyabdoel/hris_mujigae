<?php

/**
 * This is the model class for table "masters_positions".
 *
 * The followings are the available columns in table 'masters_positions':
 * @property integer $id
 * @property integer $type_id
 * @property string $short
 * @property string $name
 * @property integer $level_id
 *
 * The followings are the available model relations:
 * @property MastersPositionTypes $type
 */
class MastersPositions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'masters_positions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id, short, name', 'required'),
			array('type_id, level_id', 'numerical', 'integerOnly'=>true),
			array('short', 'length', 'max'=>15),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type_id, short, name, level_id', 'safe', 'on'=>'search'),
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
			'type' => array(self::BELONGS_TO, 'MastersPositionTypes', 'type_id'),
			'payrollBasedSalaries' => array(self::HAS_MANY, 'PayrollBasedSalaries', 'position_id'),
			'mastersEmployees' => array(self::HAS_MANY, 'MastersEmployees', 'position_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type_id' => 'Type',
			'short' => 'Short',
			'name' => 'Name',
			'level_id' => 'Level',
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
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('short',$this->short,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('level_id',$this->level_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>false,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MastersPositions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
