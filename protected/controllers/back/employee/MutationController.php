<?php /**
* 
*/
class MutationController extends BackEndController
{
	public $icon_class = 'glyphicon glyphicon-user';

	public function init() {
		parent::init();
		
		// Check Access
		checkAccessThrowException('op_employee_mutation');
		
		// Add Breadcrumb
		$this->addBreadCrumb(at('Employee Mutation'));
		$this->title[] = at('Employee Mutation');
	}

	public function actionIndex()
	{
		$modelOutlet   = MastersOutlets::model()->findAll();
		$modelMutation = new EmployeeMutation();
		$this->render('index',array('model_outlet' =>$modelOutlet,'model_mutation'=>$modelMutation));	
	}


	public function actionEmpByOutlet($id){
		$model = MastersOutlets::model()->findByPk($id);
		$arrayName = array();
		foreach ($model->employee as $row) {
			$arrayName[] = array('id' =>$row->id,'nama'=>$row->getFullName());
		}
		//header('Content-type: application/json');
		echo CJSON::encode($arrayName);

	}

	public function actionFindAreaManager($id){
		$model = MastersOutlets::model()->findByPk($id);
		echo $model->am_id;
	}

	public function actionInsertMutation(){
		$json = $_POST['json'];
		$arr_php = json_decode($json);
		for ($i=0; $i <sizeof($arr_php) ; $i++) { 
			$id = $arr_php[$i]->dest_name;
			
		}
	}


}