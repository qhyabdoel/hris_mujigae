<?php

/**
 * This is the model class for table "reference_geo_districts".
 *
 * The followings are the available columns in table 'reference_geo_districts':
 * @property integer $id
 * @property integer $city_id
 * @property string $name
 * @property double $sort_order
 */
class ReferenceGeoDistricts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reference_geo_districts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id, name', 'required'),
			array('city_id', 'numerical', 'integerOnly'=>true),
			array('sort_order', 'numerical'),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, city_id, name, sort_order', 'safe', 'on'=>'search'),
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
			'mastersEmployeeAddresses' => array(self::HAS_MANY, 'MastersEmployeeAddresses', 'district_id'),
			'city' => array(self::BELONGS_TO, 'ReferenceGeoCities', 'city_id'),
			'employeeFamilys' => array(self::HAS_MANY, 'MastersEmployeeFamilys', 'birthplace_district_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'city_id' => 'City',
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
		$criteria->compare('city_id',$this->city_id);
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
	 * @return ReferenceGeoDistricts the static model class
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
	
	public function byCity($cityId)
	{
		$this->getDbCriteria()->mergeWith(array(
            'condition'=>'city_id = '.($cityId == '' ? 0 : $cityId),
        ));
		return $this;
	}
}