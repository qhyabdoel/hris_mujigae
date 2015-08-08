<?php

class OutletsController extends Controller
{
	public $token = '9ad892dfda604d69849a3cb30f717e3f';

	public function actionIndex() {
		
	}

	public function actionView($id)
	{
		
	}

	public function actionCreate(){
		
	}

	public function actionEmployees($id){
		$model 			= $this->loadModel($id);		
		$rows 			= array();		
		$rows['status'] = 500;
		$i 				= 0;
        
        if (count($model)!=0) {
        	$models = $model->employee;

        	foreach($models as $employee) {
	        	if($employee->is_active==1){
	        		
	        		// $rows[$i.'[id]'] 		= $employee->id;
		        	// $rows[$i.'[nik]'] 		= $employee->code;
		        	// $rows[$i.'[fullname]'] 	= $employee->fullname;
		        	// $rows[$i.'[birthdate]']	= $employee->birthdate;
		        	// $rows[$i.'[gender]'] 	= $employee->gender;
		        	// $rows[$i.'[finger_1]'] 	= $employee->finger_1;
		        	// $rows[$i.'[finger_2]'] 	= $employee->finger_2;

		        	$rows[$i]['id'] 		= $employee->id;
		        	$rows[$i]['nik'] 		= $employee->code;
		        	$rows[$i]['fullname'] 	= $employee->fullname;
		        	$rows[$i]['birthdate']	= $employee->birthdate;
		        	$rows[$i]['gender'] 	= $employee->gender;
		        	$rows[$i]['finger_1'] 	= $employee->finger_1;
		        	$rows[$i]['finger_2'] 	= $employee->finger_2;

		        	if($employee->outlet_id!=null) $rows[$i]['group'] = 'OTL';
					else $rows[$i]['group'] = 'BO';

		        	$rows['status'] = 200;

		        	$i++;  	
	        	}	        	
	    	}	
        }	        

		if(isset($_GET['token'])) if($_GET['token']==$this->token){
						
			echo json_encode($rows);			
		} 
	}

	public function actionShifts(){
		$model 			= $this->loadModel(1);
		$shifts 		= $model->shift_format->shifts;			
		$shifts_array 	= array();

		foreach ($shifts as $shift) {
			$shifts_array[] = $shift->attributes;
		}

		if(isset($_GET['token'])) if($_GET['token']==$this->token) echo json_encode($shifts_array);
	}

	public function loadModel($id)
	{
		$model = MastersOutlets::model()->findByPk($id);		
		// if($model===null) throw new CHttpException(404,'The requested page does not exist.');		
		return $model;
	}
}