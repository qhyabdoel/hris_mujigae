<?php

/**
 * This is the model class for table "approval_request".
 *
 * The followings are the available columns in table 'approval_request':
 * @property integer $id
 * @property integer $process_id
 * @property integer $role_id
 * @property string $email_template
 */
class ApprovalRequest extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'approval_request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('process_id, role_id, email_template', 'required'),
			array('process_id, role_id', 'numerical', 'integerOnly'=>true),
			array('email_template', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, process_id, role_id, email_template', 'safe', 'on'=>'search'),
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
			'process' => array(self::BELONGS_TO, 'ApprovalProcess', 'process_id'),
			'role' => array(self::BELONGS_TO, 'ApprovalRoles', 'role_id'),
			'requestLevel' => array(self::HAS_MANY, 'ApprovalRequestLevel', 'request_id'),
			'transaction' => array(self::HAS_MANY, 'ApprovalTransaction', 'approval_transaction_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'process_id' => 'Process',
			'role_id' => 'Role',
			'email_template' => 'Email Template',
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
		$criteria->compare('process_id',$this->process_id);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('email_template',$this->email_template,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ApprovalRequest the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
	/* ADDITIONAL FUNCTION */
	public function findByForeign($process_id, $role_id)
	{
		return ApprovalRequest::model()->find(array(
					'condition'=>'process_id=:process_id AND role_id = :role_id',
					'params'=>array(':process_id'=>$process_id, ':role_id'=>$role_id),
				));
	}
}
