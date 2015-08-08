<?php

/**
 * This is the model class for table "payroll_standard_allowances".
 *
 * The followings are the available columns in table 'payroll_standard_allowances':
 * @property integer $id
 * @property integer $standard_id
 * @property integer $allowance_id
 * @property string $calc_type
 * @property string $formula
 * @property string $values
 */
class PayrollBasedAllowances extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payroll_based_allowances';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('standard_id, allowance_id, calc_type', 'required'),
			array('standard_id, allowance_id', 'numerical', 'integerOnly'=>true),
			array('calc_type', 'length', 'max'=>50),
			array('formula', 'length', 'max'=>255),
			array('values', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, standard_id, allowance_id, calc_type, formula, values', 'safe', 'on'=>'search'),
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
			'standard' 	=> array(self::BELONGS_TO, 'PayrollBasedSalaries', 'standard_id'),
			'allowance' => array(self::BELONGS_TO, 'PayrollAllowances', 'allowance_id'),

			'PayrollEmployeeAllowances'	=> array(self::HAS_MANY, 'PayrollEmployeeAllowances', 'allowance_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' 			=> 'ID',
			'standard_id' 	=> 'Standard',
			'allowance_id' 	=> 'Allowance',
			'calc_type' 	=> 'Calc Type',
			'formula' 		=> 'Formula',
			'values' 		=> 'Values',
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
		$criteria->compare('standard_id',$this->standard_id);
		$criteria->compare('allowance_id',$this->allowance_id);
		$criteria->compare('calc_type',$this->calc_type,true);
		$criteria->compare('formula',$this->formula,true);
		$criteria->compare('values',$this->values,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
		
	public function searchAllowances($standardId)
	{
		$this->standard_id = $standardId;
		return $this->search();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PayrollBasedAllowances the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
