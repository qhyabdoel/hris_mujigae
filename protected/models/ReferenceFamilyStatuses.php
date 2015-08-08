<?php

/**
 * This is the model class for table "reference_family_statuses".
 *
 * The followings are the available columns in table 'reference_family_statuses':
 * @property integer $id
 * @property integer $family_group_id
 * @property string $name
 */
class ReferenceFamilyStatuses extends CActiveRecord
{
	const FAMILY_STATUS_PARENTS_FATHER = 1;
	const FAMILY_STATUS_PARENTS_MOTHER = 2;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reference_family_statuses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('family_group_id, name', 'required'),
			array('family_group_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, family_group_id, name', 'safe', 'on'=>'search'),
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
			'mastersEmployeeFamilys' => array(self::HAS_MANY, 'MastersEmployeeFamilys', 'status_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'family_group_id' => 'Family Group',
			'name' => 'Name',
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
		$criteria->compare('family_group_id',$this->family_group_id);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReferenceFamilyStatuses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function byGroup($gid)
	{
		$this->getDbCriteria()->mergeWith(array(
            'condition'=>'family_group_id=:gid',
            'params'=>array(':gid'=>$gid),
        ));
        return $this;
	}
}
