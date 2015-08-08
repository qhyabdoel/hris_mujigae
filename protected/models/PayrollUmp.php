<?php

/**
 * This is the model class for table "payroll_ump".
 *
 * The followings are the available columns in table 'payroll_ump':
 * @property integer $id
 * @property integer $year
 * @property integer $city_id
 * @property string $values
 */
class PayrollUmp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payroll_ump';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('year, city_id, values', 'required'),
			array('year, city_id', 'numerical', 'integerOnly'=>true),
			array('values', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, year, city_id, values', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'city' => array(self::BELONGS_TO, 'PayrollCities', 'city_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'year' => 'Year',
			'city_id' => 'City',
			'values' => 'Values',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('year',$this->year);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('values',$this->values,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PayrollUmp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getPeriode()
	{
		return $this->city->name." ".$this->year;
	}
	
	public function getUMPBefore()
	{
		$c = new CDbCriteria();
		$c->compare('year', $this->year - 1);
		$c->compare('city_id', $this->city_id);
		return PayrollUmp::model()->find($c);
	}
	
	public function getStandardSalaryBefore()
	{
		$c = new CDbCriteria();
		$c->compare('year', $this->year - 1);
		$c->compare('city_id', $this->city_id);
		return PayrollBasedSalaries::model()->findAll($c);
	}
	
	public function checkStandardSalaryNow()
	{
		$c = new CDbCriteria();
		$c->compare('year', $this->year);
		$c->compare('city_id', $this->city_id);
		$count = count(PayrollBasedSalaries::model()->findAll($c));
		return $count == 0 ? true : false;
	}
	
	public function generateNewStandardSalaries()
	{
		if(!$this->checkStandardSalaryNow())
			return at('Salary standard has been generated');
		
		$year_bef = $this->year - 1;
		$ump_bef = $this->getUMPBefore();
		if(count($ump_bef) == 0)
		{
			return at('Can not generate salary standard, because of UMP before not found.');
		} else {
			$salaries = $this->getStandardSalaryBefore();
			if(count($salaries) == 0)
			{
				return at('Can not generate salary standard, because of salary standard before not found.');
			} else {
				$inc = ($this->values - $ump_bef->values) / $ump_bef->values;
				foreach($salaries as $salary)
				{
					$model = new PayrollBasedSalaries;
					$model->year = $this->year;
					$model->city_id = $this->city_id;
					$model->department_id = $salary->department_id;
					$model->section_id = $salary->section_id;
					$model->position_id = $salary->position_id;
					$model->years_of_service_start = $salary->years_of_service_start;
					$model->years_of_service_end = $salary->years_of_service_end;
					$model->level_id = $salary->level_id;
					$model->grade_id = $salary->grade_id;
					$model->basic_salary_from = round((1+$inc) * $salary->basic_salary_from, 0);
					$model->basic_salary_to = round((1+$inc) * $salary->basic_salary_to, 0);
					$model->basic_salary_inc_amount = $model->basic_salary_from - $salary->basic_salary_inc_amount;
					$model->basic_salary_inc_percentage = round($inc*100, 2);
					$model->save();
					
					$allowances = $salary->payrollBasedAllowances;
					foreach($allowances as $allowance)
					{
						$childmodel = new payrollBasedAllowances;
						$childmodel->standard_id = $model->id;
						$childmodel->allowance_id = $allowance->allowance_id;
						$childmodel->calc_type = $allowance->calc_type;
						$childmodel->formula = $allowance->formula;
						$childmodel->values = $allowance->values;
						$childmodel->save();
					}
				}
			}
		}
		
		return '';
	}
}
