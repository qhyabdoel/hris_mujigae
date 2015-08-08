<?php
/**
 * Login form model class
 */
class KadeptLogin extends CFormModel
{
	/**
	 * @var string - password
	 */
	public $password;
	
	/**
	 * @var string - nik
	 */
	public $nik;

	/**
	 * @var string - captcha
	 */
	public $verifyCode;
	
	/**
	 * @var boolean - remember me
	 */
	public $rememberme = false;
	
	/**
	 * @var object
	 */
	public $identity;
	
	/**
	 * table data rules
	 *
	 * @return array
	 */
	public function rules()
	{
		return array(
			array('nik, password', 'required'),
			array('nik', 'checkNik'),
			array('password', 'length', 'min' => 3, 'max' => 32),
			array('nik', 'length', 'min' => 3, 'max' => 10),
			array('rememberme', 'boolean'),
			array('password', 'authenticate'),
			array('verifyCode', 'captcha'),
			array('nik','is_manager'),
		);
	}
	
	/**
	 * Check account existence and permission assigned
	 *
	 */
	public function checkNik() {
		// We lookup the db for this nik and make sure that record exists
		// then make sure the record has the op_acp_access permissions granted
		$user = User::model()->find('code=:code', array(':code' => $this->nik));

		if(!$user) {
			$this->addError('nik', at('Sorry, That Employee does not exists.'));
			return false;
		}
	}

	public function is_manager()
	{		
		$employee 	= MastersEmployees::model()->findByAttributes(array('code'=>$this->nik));
		// $department	= $employee->department_i_lead;
		// $outlet 	= $employee->outlet_i_lead;
		// $area 		= $employee->area_i_lead;

		if(!isset($employee->department_i_lead) and !isset($employee->outlet_i_lead) and !isset($employee->area_i_lead)) 
			$this->addError('nik', at('Sorry, That Employee is not manager name.'));

	}
	
	/**
	 * @return null on success error on failure
	 */
	public function authenticate() {
		$user = User::model()->find('code=:code', array(':code' => $this->nik));
		if(!$user) {
			$this->addError('nik', at('Sorry, That Employee does not exists.'));
		} else {
			$this->identity = new UserIdentity($user->email, $this->password);
			if($this->identity->authenticate()) {
				// Member authenticated
				return true;
			} else {
				$this->addError('password', $this->identity->errorMessage);
			}
		}
	}
	
	/**
	 * Attribute values
	 *
	 * @return array
	 */
	public function attributeLabels()
	{
		return array(
			'nik' 			=> at('Nik'),
			'password' 		=> at('Password'),
			'verifyCode' 	=> at('Security Code'),
		);
	}
	
}