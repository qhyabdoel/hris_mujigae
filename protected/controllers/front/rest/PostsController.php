<?php

class PostsController extends Controller
{
	public $token = '9ad892dfda604d69849a3cb30f717e3f';	

	public function actionCreate(){
		$status = 'semua data tersimpan';

		foreach ($_POST as $key => $value) {
			$Post 		= new Post;
			$Post->body = $value;
			if(!$Post->save()) $status = 'ada data yang tidak tersimpan';
		}

		echo $status;
	}

	public function loadModel($id)
	{
		$model = Post::model()->findByPk($id);
		if($model===null) throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}