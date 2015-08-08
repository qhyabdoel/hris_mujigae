<?php

/**
 * This is the model class for table "transaction_mutation".
 *
 * The followings are the available columns in table 'transaction_mutation':
 * @property integer $id
 * @property integer $employee_id
 * @property integer $outlet_from_id
 * @property integer $outlet_dest_id
 * @property integer $am_id
 * @property string $status_appr
 * @property string $appr_date
 * @property string $create_at
 * @property integer $is_active
 */
class TransactionMutation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transaction_mutation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user i nputs.
		return array(
			array('id, employee_id, outlet_from_id, outlet_dest_id, am_id, status_appr, appr_date, create_at, is_active', 'required'),
			array('id, employee_id, outlet_from_id, outlet_dest_id, am_id, is_active', 'numerical', 'integerOnly'=>true),
			array('status_appr', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_id, outlet_from_id, outlet_dest_id, am_id, status_appr, appr_date, create_at, is_active', 'safe', 'on'=>'search'),
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
			'outlet_from_id' => 'Outlet From',
			'outlet_dest_id' => 'Outlet Dest',
			'am_id' => 'Am',
			'status_appr' => 'Status Appr',
			'appr_date' => 'Appr Date',
			'create_at' => 'Create At',
			'is_active' => 'Is Active',
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
		$criteria->compare('outlet_from_id',$this->outlet_from_id);
		$criteria->compare('outlet_dest_id',$this->outlet_dest_id);
		$criteria->compare('am_id',$this->am_id);
		$criteria->compare('status_appr',$this->status_appr,true);
		$criteria->compare('appr_date',$this->appr_date,true);
		$criteria->compare('create_at',$this->create_at,true);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TransactionMutation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
