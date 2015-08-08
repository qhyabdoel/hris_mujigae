<?php

/**
 * This is the model class for table "reference_geo_states".
 *
 * The followings are the available columns in table 'reference_geo_states':
 * @property integer $id
 * @property integer $country_id
 * @property string $short
 * @property string $name
 * @property double $sort_order
 *
 * The followings are the available model relations:
 * @property ReferenceGeoCities[] $referenceGeoCities
 * @property ReferenceGeoCountries $country
 */
class ReferenceGeoStates extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reference_geo_states';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country_id, short, name', 'required'),
			array('country_id', 'numerical', 'integerOnly'=>true),
			array('sort_order', 'numerical'),
			array('short, name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, country_id, short, name, sort_order', 'safe', 'on'=>'search'),
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
			'referenceGeoCities' => array(self::HAS_MANY, 'ReferenceGeoCities', 'state_id'),
			'country' => array(self::BELONGS_TO, 'ReferenceGeoCountries', 'country_id'),
			'mastersEmployeeAddresses' => array(self::HAS_MANY, 'MastersEmployeeAddresses', 'state_id'),
			'employeeFamilys' => array(self::HAS_MANY, 'MastersEmployeeFamilys', 'birthplace_state_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'country_id' => 'Country',
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
		$criteria->compare('country_id',$this->country_id);
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
	 * @return ReferenceGeoStates the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function scopes()
	{
		return array(
			'byOrder' => array(
				'order' => 'sort_order ASC'
			),
		);
	}
	
	public function byCountry($countryId)
	{
		$this->getDbCriteria()->mergeWith(array(
            'condition'=>'country_id = '.($countryId == '' ? 0 : $countryId),
        ));
		return $this;
	}
}
