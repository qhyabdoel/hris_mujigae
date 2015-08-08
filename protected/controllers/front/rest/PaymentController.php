<?php

class PaymentController extends Controller
{
	private $token = '9ad892dfda604d69849a3cb30f717e3f';

	public function actionIndex() {
		if(isset($_GET['token'])) { 
			if($_GET['token']==$this->token) {
				$deptId = isset($_GET['dept']) ? $_GET['dept'] : '';
				$outId = isset($_GET['out']) ? $_GET['out'] : '';
				
				$c = new CDbCriteria();
				if ($deptId <> '')
					$c->condition = "department_id = ".$deptId;
				if ($outId <> '')
					$c->condition .= " AND outlet_id = ".$outId;
				$model = MastersEmployees::model()->findAll($c);
				
				$payment = array();
				foreach($model as $pay) {
					$payment[] = array('id' => $pay->id, 'code' => $pay->code, 'fullName' => $pay->getFullname(), 'gender' => $pay->getGender(), 
									   'type' => 'Workholder', 'department' => $pay->department->name, 'currentPosition' => 'tes',//$pay->position->name, 
									   'hiredate' => $pay->hiredate, 'yearOfService' => '0 Thn 11 Bln 29 Hr');
				}

				echo json_encode($payment);
			}
		}
	}

	public function actionPeriode()
	{
		if(isset($_GET['token'])){ 
			if($_GET['token']==$this->token){
				$data['periode'] = PayrollHelper::getCurrentPayPeriode();
				$data['status'] = 'data ditemukan';

				echo json_encode($data);
			}
		}
	}
}