<?php

class PresencesController extends Controller
{
	public $token = '9ad892dfda604d69849a3cb30f717e3f';

	public function actionIndex() {	
		
	}

	public function actionView($id)
	{
		
	}

	public function actionCreate(){
		$status = 200;
		$data 	= json_decode(file_get_contents('php://input'));

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// die();

		$count_data 	= count($data);
		$transaction 	= Yii::app()->db->beginTransaction();

		try {
			foreach ($data as $key => $value) {
				$employee 		= MastersEmployees::model()->findByAttributes(array('code'=>$value->nik));
				$employee_id 	= $employee->id;
				$date 			= $value->tgl;
				$shift_id 		= $employee->getShift($date);		
				$presence_time	= $value->presence_time;
				$presence_photo = $value->presence_photo;
				$location_id 	= $value->location_id;
				$presence_type 	= $value->presence_type;
				
				$presence = new AttendancePresences;			

				$presence->employee_id 		= $employee_id;
				$presence->shift_id 		= $shift_id;
				$presence->date 	 		= $date;						
				$presence->type 			= $presence_type;
				$presence->location_id	 	= $location_id;
				$presence->presence_date 	= $presence_time;
				$presence->photo 		 	= $presence_photo;
				
				if(!$presence->save()){
					$status = 500;					
				} 
				else{
					$count_data--;		
					$status = 500;
				} 
			}

			// $transaction->commit();	

			if($count_data==0) $transaction->commit();	
			else $transaction->rollback();
		} 
		catch (Exception $e) {
			$transaction->rollback();
			$status = 500;
		}			

		echo json_encode(array('status'=>$status));
	}

	public function loadModel($id)
	{
		$model = MastersEmployees::model()->findByPk($id);
		
		if($model===null) throw new CHttpException(404,'The requested page does not exist.');
		if($model->is_active==0) throw new CHttpException(404,'The requested page does not exist.');	
		
		return $model;
	}
}