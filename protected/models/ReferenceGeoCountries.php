<?php

/**
 * This is the model class for table "reference_geo_countries".
 *
 * The followings are the available columns in table 'reference_geo_countries':
 * @property integer $id
 * @property string $short
 * @property string $name
 * @property integer $sort_order
 *
 * The followings are the available model relations:
 * @property ReferenceGeoStates[] $referenceGeoStates
 */
class ReferenceGeoCountries extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reference_geo_countries';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('short, name', 'required'),
			array('sort_order', 'numerical', 'integerOnly'=>true),
			array('short, name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, short, name, sort_order', 'safe', 'on'=>'search'),
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
			'referenceGeoStates' => array(self::HAS_MANY, 'ReferenceGeoStates', 'country_id'),
			'mastersEmployeeAddresses' => array(self::HAS_MANY, 'MastersEmployeeAddresses', 'country_id'),
			'employeeFamilys' => array(self::HAS_MANY, 'MastersEmployeeFamilys', 'birthplace_country_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'short' => 'Short',
			'name' => 'Name',
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
		$criteria->compare('short',$this->short,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sort_order',$this->sort_order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>false,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReferenceGeoCountries the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function scopes() {
		return array(
			'byOrder' => array(
				'order' => 'sort_order ASC'
			),
		);
	}
	
	
}
