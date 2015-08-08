<?php
class ImportForm extends CFormModel
{
	public $file;

	public function rules()
	{
		return array(  
			array('file', 'file', 
				'types' => 'csv',
				'maxSize' => 1024 * 1024 * 10, // 10MB
				'tooLarge' => at('The file was larger than 10MB. Please upload a smaller file.'),
				'allowEmpty' => false
			),
		);
	}

	public function attributeLabels()
	{
		return array(
			'file' => at('Select file'),
		);
	}
}