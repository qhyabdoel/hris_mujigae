<?php

class EmployeesController extends Controller
{
	public $token = '9ad892dfda604d69849a3cb30f717e3f';

	public function actionIndex() {
		$models = MastersEmployees::model()->findAll();
		$rows 	= array();
        
        foreach($models as $model) $rows[] = $model->attributes;
                
		if(isset($_GET['token'])) if($_GET['token']==$this->token) echo json_encode($rows);
	}

	public function actionView($id)
	{		
		$model = MastersEmployees::model()->findByAttributes(array('code'=>$id));
		
		if(count($model)!=0){
			if(isset($_GET['token'])){ 
				if($_GET['token']==$this->token){				
					$employee_array['id'] 		= $model->id;
					$employee_array['nik'] 		= $model->code;
					$employee_array['fullname'] = $model->fullname;
					$employee_array['finger_1'] = $model->finger_1;
					$employee_array['finger_2'] = $model->finger_2;

					if($model->outlet_id!=null) $employee_array['group'] = 'OTL';
					else $employee_array['group'] = 'BO';

					$employee_array['status'] 	= 200;
					$employee_json 				= json_encode($employee_array);			

					echo $employee_json;
				}
			}
		}
		else{
			if(isset($_GET['token'])){ 
				if($_GET['token']==$this->token){									
					$employee_array['status'] 	= 500;
					$employee_json 				= json_encode($employee_array);			

					echo $employee_json;
				}
			}	
		}					
	}

	public function actionCreate(){
		if(isset($_POST)) echo json_encode($_POST);
	}

	public function loadModel($id)
	{
		$model = MastersEmployees::model()->findByPk($id);
		
		if($model===null) throw new CHttpException(404,'The requested page does not exist.');
		if($model->is_active==0) throw new CHttpException(404,'The requested page does not exist.');	
		
		return $model;
	}
}