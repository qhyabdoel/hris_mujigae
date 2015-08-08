<?php

/**
 * This is the model class for table "approval_transaction".
 *
 * The followings are the available columns in table 'approval_transaction':
 * @property integer $id
 * @property integer $process_id
 * @property integer $transaction_id
 * @property integer $user_id
 * @property integer $request_role_id
 * @property integer $approval_request_id
 * @property integer $last_approval_level_id
 * @property string $created_at
 * @property string $modified_at
 */
class ApprovalTransaction extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'approval_transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('process_id, transaction_id, user_id, request_role_id, approval_request_id', 'required'),
			array('process_id, transaction_id, user_id, request_role_id, approval_request_id', 'numerical', 'integerOnly'=>true),
			array('created_at, last_approval_level_id, modified_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, process_id, transaction_id, user_id, request_role_id, approval_request_id, last_approval_level_id, created_at, modified_at', 'safe', 'on'=>'search'),
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
			'role' => array(self::BELONGS_TO, 'ApprovalRoles', 'request_role_id'),
			'request' => array(self::BELONGS_TO, 'ApprovalRequest', 'approval_request_id'),
			'transactionLevel' => array(self::HAS_MANY, 'ApprovalTransactionLevel', 'approval_transaction_id'),
			'lastApprovedLevel' => array(self::BELONGS_TO, 'ApprovalTransactionLevel', 'last_approval_level_id'),
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
			'transaction_id' => 'Transaction',
			'user_id' => 'User',
			'request_role_id' => 'Request Role',
			'approval_request_id' => 'Approval Request',
			'last_approval_level_id' => 'Last Level Approval',
			'created_at' => 'Created At',
			'modified_at' => 'Modified At',
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
		$criteria->compare('transaction_id',$this->transaction_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('request_role_id',$this->request_role_id);
		$criteria->compare('approval_request_id',$this->approval_request_id);
		$criteria->compare('last_approval_level_id',$this->last_approval_level_id);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('modified_at',$this->modified_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ApprovalTransaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
	/* ADDITIONAL FUNCTION */
	public function createNewTransaction($process_id, $transaction_id, $user_id, $role_id)
	{
		$request = ApprovalRequest::model()->findByForeign($process_id, $role_id);
		
		if (count($request) > 0)
		{
			try {
				$model = new ApprovalTransaction();
				$model->process_id = $process_id;
				$model->transaction_id = $transaction_id;
				$model->user_id = $user_id;
				$model->request_role_id = $role_id;
				$model->approval_request_id = $request->id;
				
				//$transaction = $model->dbConnection->beginTransaction();
				$model->save();
				$this->createNewTransactionLevel($model);
				
				return $model;
			} catch(Exception $e) {
				//$transaction->rollback();
				throw $e;
			}
		} else
			return NULL;
	}
	
	public function createNewTransactionLevel($transaction)
	{
		$c = new CDbCriteria();
		$c->condition = 'request_id = '.$transaction->approval_request_id;
		$requestLevel = ApprovalRequestLevel::model()->findAll($c);
		
		foreach($requestLevel AS $request)
		{
			$model = new ApprovalTransactionLevel();
			$model->approval_transaction_id = $transaction->id;
			$model->approval_role_id = $request->role_id;
			$model->level = $request->level;
			$model->save();
		}
	}
	
	public function findByForeign($process_id, $transaction_id)
	{
		return ApprovalTransaction::model()->find(array(
					'condition'=>'process_id=:process_id AND transaction_id >= :transaction_id',
					'params'=>array(':process_id'=>$process_id, ':transaction_id'=>$transaction_id),
				));
	}
	
	public function getLastApprovalLevel()
	{
		return $this->last_approval_level_id == NULL ? 0 : $this->lastApprovedLevel->level;
	}
	
	public function getModelTransaction()
	{
		$model = $this->process->model;
		return $model::model()->findById($this->transaction_id);
	}
	
	public function getApprovalStatus()
	{
		if($this->last_approval_level_id == NULL)
			return 'New Request';
		else if($this->lastApprovedLevel->level == $this->getMaxLevel())
			return 'Approved';
		else
			return 'Approved by '.$this->role->name;
	}
	
	public function getMaxLevel()
	{
		$criteria = new CDbCriteria;
		$criteria->select = 'max(level) AS maxLevel';
		$criteria->condition = 'approval_transaction_id = '.$this->id;
		$row = ApprovalTransactionLevel::model()->find($criteria);
		
		return $row->maxLevel;
	}
	
	public function isVisibleApproval($role_id)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'approval_transaction_id = '.$this->id.' AND approval_role_id = '.$role_id;
		$row = ApprovalTransactionLevel::model()->find($criteria);
		
		if(count($row) > 0)
			return true;
		else
			return false;
	}
	
	public function isActiveApproval($role_id)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'approval_transaction_id = '.$this->id.' AND approval_role_id = '.$role_id;
		$row = ApprovalTransactionLevel::model()->find($criteria);
		
		if(count($row) > 0)
		{
			if(($row->level <> $this->getMaxLevel()) && ($row->level - $this->getLastApprovalLevel() == 1))
				return true;
			else return false;
		} else
			return false;
	}
	
	public function isHasApproved($role_id)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'approval_transaction_id = '.$this->id.' AND approval_role_id = '.$role_id;
		$row = ApprovalTransactionLevel::model()->find($criteria);
		
		if(count($row) > 0)
		{
			if($row->approval_date == NULL)
				return false;
			else return true;
		} else
			return false;
	}
	
	public function updateApprovalLevel($role_id)
	{
		if($this->isActiveApproval($role_id))
		{
			$criteria = new CDbCriteria;
			$criteria->condition = 'approval_transaction_id = '.$this->id.' AND approval_role_id = '.$role_id;
			$model = ApprovalTransactionLevel::model()->find($criteria);
			$model->approval_date = date('Y-m-d H:i:s');
			$model->save();
			
			return $model;
		} else
			return NULL;
	}
}
