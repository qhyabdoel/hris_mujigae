<?php
class PayrollHelper
{
	public function getCurrentMonth()
	{
		$setting = self::getSettingVal('current-month');
		$setting = explode(',', $setting);
		return trim($setting[0]);
	}
	
	public function getCurrentYear()
	{
		$setting = self::getSettingVal('current-month');
		$setting = explode(',', $setting);
		return trim($setting[1]);
	}
	
	public function getCurrentPayPeriode()
	{
		$date 		= self::getSettingVal('salary-period');
		$month 		= self::getCurrentMonth();
		$year 		= self::getCurrentYear();		
		$date_from 	= $date + 1;
		$month_from = $month - 1;

		if($month_from < 1)
		{
			$month_from = 12;
			$year_from 	= $year - 1;
		} else {
			$year_from = $year;
		}
		
		return array('from' => $year_from.'-'.$month_from.'-'.$date_from, 'to' => $year.'-'.$month.'-'.$date);
	}
	
	public function getTotalWorkDay()
	{
		return trim(self::getSettingVal('total-workday'));
	}
	
	public function getSettingVal($key)
	{
		return Setting::model()->findByKey($key);
	}
	
	public function ImportFile($model, $table, $columns)
	{
		if($model->validate())
		{
			$csvFile = CUploadedFile::getInstance($model, 'file');
			$tempLoc = $csvFile->getTempName();
			
			$rnd = rand(0,9999);
			$fileName = importPaths("{$rnd}-{$csvFile}");
			$csvFile->saveAs($fileName);

			$sql = "LOAD DATA INFILE '".$fileName."'
				INTO TABLE `".$table."`
				FIELDS TERMINATED BY ','
				ENCLOSED BY '\"'
				LINES TERMINATED BY '\r\n'
				IGNORE 1 LINES
				($columns)
				";

			$connection=Yii::app()->db;
			$transaction=$connection->beginTransaction();
			
			try
			{
				$connection->createCommand($sql)->execute();
				$transaction->commit();
				fok(at('Data successfully imported.'));
			} catch(Exception $e) {
				ferror(at('Failed to import data. \n'. $e));
				exit;
				$transaction->rollBack();
			}
		}
	}
}