<?php

/**
 * This is the model class for table "payroll_allowances".
 *
 * The followings are the available columns in table 'payroll_allowances':
 * @property integer $id
 * @property integer $group_id
 * @property string $name
 * @property string $calc_type
 * @property string $formula
 *
 * The followings are the available model relations:
 * @property PayrollAllowanceGroups $group
 */
class PayrollAllowances extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payroll_allowances';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id, name, calc_type', 'required'),
			array('group_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('calc_type', 'length', 'max'=>50),
			array('formula', 'length', 'max'=>255),
			array('formula', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, group_id, name, calc_type, formula', 'safe', 'on'=>'search'),
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
			'group' => array(self::BELONGS_TO, 'PayrollAllowanceGroups', 'group_id'),
			'payrollBasedAllowances' => array(self::HAS_MANY, 'PayrollBasedAllowances', 'allowance_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'group_id' => 'Group',
			'name' => 'Name',
			'calc_type' => 'Calc Type',
			'formula' => 'Formula',
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
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('calc_type',$this->calc_type,true);
		$criteria->compare('formula',$this->formula,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PayrollAllowances the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getAllowanceType()
	{
		return array('daily' => 'daily', 'formula' => 'formula', 'fixed' => 'fixed');
	}
}
