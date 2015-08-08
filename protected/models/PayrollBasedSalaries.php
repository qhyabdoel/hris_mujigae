<?php

/**
 * This is the model class for table "payroll_based_salaries".
 *
 * The followings are the available columns in table 'payroll_based_salaries':
 * @property integer $id
 * @property integer $year
 * @property integer $city_id
 * @property integer $department_id
 * @property integer $section_id
 * @property integer $position_id
 * @property integer $years_of_service_start
 * @property integer $years_of_service_end
 * @property integer $level_id
 * @property integer $grade_id
 * @property string $basic_salary_from
 * @property string $basic_salary_to
 * @property string $total_full_salary
 * @property string $basic_salary_inc_amount
 * @property double $basic_salary_inc_percentage
 */
class PayrollBasedSalaries extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payroll_based_salaries';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('year, city_id, department_id, section_id, position_id, years_of_service_start, years_of_service_end, level_id, grade_id, basic_salary_from, basic_salary_to, total_full_salary, basic_salary_inc_amount, basic_salary_inc_percentage', 'required'),
			array('year, city_id, department_id, section_id, position_id, years_of_service_start, years_of_service_end, level_id, grade_id', 'numerical', 'integerOnly'=>true),
			array('basic_salary_inc_percentage', 'numerical'),
			array('basic_salary_from, basic_salary_to, total_full_salary, basic_salary_inc_amount', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, year, city_id, department_id, section_id, position_id, years_of_service_start, years_of_service_end, level_id, grade_id, basic_salary_from, basic_salary_to, total_full_salary, basic_salary_inc_amount, basic_salary_inc_percentage', 'safe', 'on'=>'search'),
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
			'allowances' => array(self::HAS_MANY, 'PayrollEmployeeAllowances', 'salary_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' 							=> 'ID',
			'year' 							=> 'Year',
			'city_id' 						=> 'City',
			'department_id' 				=> 'Department',
			'section_id' 					=> 'Section',
			'position_id' 					=> 'Position',
			'years_of_service_start' 		=> 'Years Of Service Start',
			'years_of_service_end' 			=> 'Years Of Service End',
			'level_id' 						=> 'Level',
			'grade_id' 						=> 'Grade',
			'basic_salary_from' 			=> 'Basic Salary From',
			'basic_salary_to' 				=> 'Basic Salary To',
			'total_full_salary' 			=> 'Total Full Salary',
			'basic_salary_inc_amount' 		=> 'Basic Salary Inc Amount',
			'basic_salary_inc_percentage' 	=> 'Basic Salary Inc Percentage',
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
		$criteria->compare('department_id',$this->department_id);
		$criteria->compare('section_id',$this->section_id);
		$criteria->compare('position_id',$this->position_id);
		$criteria->compare('years_of_service_start',$this->years_of_service_start);
		$criteria->compare('years_of_service_end',$this->years_of_service_end);
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('grade_id',$this->grade_id);
		$criteria->compare('basic_salary_from',$this->basic_salary_from,true);
		$criteria->compare('basic_salary_to',$this->basic_salary_to,true);
		$criteria->compare('total_full_salary',$this->total_full_salary,true);
		$criteria->compare('basic_salary_inc_amount',$this->basic_salary_inc_amount,true);
		$criteria->compare('basic_salary_inc_percentage',$this->basic_salary_inc_percentage);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PayrollBasedSalaries the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
