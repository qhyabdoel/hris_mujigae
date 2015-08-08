<?php

/**
 * This is the model class for table "masters_employee_languages".
 *
 * The followings are the available columns in table 'masters_employee_languages':
 * @property integer $id
 * @property integer $employee_id
 * @property integer $language_id
 * @property string $level
 */
class MastersEmployeeLanguages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'masters_employee_languages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, language_id', 'required'),
			array('employee_id, language_id', 'numerical', 'integerOnly'=>true),
			array('level', 'length', 'max'=>25),
			array('language_id', 'checkLang'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, language_id, level', 'safe', 'on'=>'search'),
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
			'employee' => array(self::BELONGS_TO, 'MastersEmployees', 'employee_id'),
			'language' => array(self::BELONGS_TO, 'ReferenceLanguages', 'language_id'),
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
			'language_id' => 'Language',
			'level' => 'Level',
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
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('level',$this->level,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchByEmployee($id=null)
	{
		//$this->employee_id = is_null($id) ? getUser()->id : $id;
		$this->employee_id = is_null($id) ? 0 : $id;
		return $this->search();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MastersEmployeeLanguages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function checkLang()
	{
		if($this->isNewRecord) {
			$c = new CDbCriteria();
			$c->compare('employee_id', $this->employee_id);
			$c->compare('language_id', $this->language_id);
			
			$model = MastersEmployeeLanguages::model()->findAll($c);
			if(count($model) > 0)
				$this->addError('language_id', at('Sorry, You have added this language.'));
		}
	}
	
	public function viewChooseEmployee()
	{
		return isset($this->employee) ? $this->employee->getFullnameWithDept() : '';
	}
}
