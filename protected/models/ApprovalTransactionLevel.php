<?php

/**
 * This is the model class for table "approval_transaction_level".
 *
 * The followings are the available columns in table 'approval_transaction_level':
 * @property integer $id
 * @property integer $approval_transaction_id
 * @property integer $approval_role_id
 * @property integer $level
 * @property string $approval_date
 * @property string $created_at
 */
class ApprovalTransactionLevel extends CActiveRecord
{
	public $maxLevel = 0;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'approval_transaction_level';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('approval_transaction_id, approval_role_id, level', 'required'),
			array('approval_transaction_id, approval_role_id, level', 'numerical', 'integerOnly'=>true),
			array('approval_date, created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, approval_transaction_id, approval_role_id, level, approval_date, created_at', 'safe', 'on'=>'search'),
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
			'transaction' => array(self::BELONGS_TO, 'ApprovalTransaction', 'approval_transaction_id'),
			'role' => array(self::BELONGS_TO, 'ApprovalRoles', 'approval_role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'approval_transaction_id' => 'Approval Transaction',
			'approval_role_id' => 'Approval Role',
			'level' => 'Level',
			'approval_date' => 'Approval Date',
			'created_at' => 'Created At',
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
		$criteria->compare('approval_transaction_id',$this->approval_transaction_id);
		$criteria->compare('approval_role_id',$this->approval_role_id);
		$criteria->compare('level',$this->level);
		$criteria->compare('approval_date',$this->approval_date,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ApprovalTransactionLevel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
