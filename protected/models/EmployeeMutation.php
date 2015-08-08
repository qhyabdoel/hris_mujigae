<?php 
	
	/**
	* 
	*/
	class EmployeeMutation

	{
		
		public function attributeLabels()
		{
			return array(
				'from' => 'From Outlet',
				'to' => 'Destination Outlet',
				'name' => 'Name',
			);
		}

		public function migrations(){
			
		}


		public static function model($className=__CLASS__){
			
			return parent::model($className);
		
		}


		
	}

 ?> 