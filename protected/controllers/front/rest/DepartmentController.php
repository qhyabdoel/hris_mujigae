<?php

class DepartmentController extends Controller
{
	private $token = '9ad892dfda604d69849a3cb30f717e3f';

	public function actionIndex()
	{
		if(isset($_GET['token'])){ 
			if($_GET['token']==$this->token){
				$model = MastersDepartments::model()->findAll();
				$department	= array();

				foreach ($model as $dept) {
					$department[] = array('id' => $dept->id, 'code' => $dept->short, 'name' => $dept->name, 'outlet' => $this->getOutlet($dept->short));
				}
				echo CJSON::encode($department);
			}
		}
	}
	
	private function getOutlet($short)
	{
		$outlet = array();
		if ($short == 'OPR') {
			$c = new CDbCriteria();
			$c->condition = "is_active = 1";
			$model = MastersOutlets::model()->findAll($c);
			
			foreach ($model as $out) {
				$outlet[] = array('id' => $out->id, 'name' => $out->name);
			}
		}
		return $outlet;
	}
}