<div class="row">
	<?php $this->widget('DTGridView', array(
		'id'=>'masters-employees-grid',
		'itemsCssClass' => 'table datatable',
		'dataProvider'=>$model->search(),
		'ajaxUpdate'=>true,
		'columns'=>array(
			array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
			array('name'=>'code', 'header'=>at('NIK')),
			array('name'=>'firstname', 'header'=>at('First Name')),
			array('name'=>'lastname', 'header'=>at('Last Name')),
			array(
				'name'=>'gender',
				'header'=>at("Gender"),
				'value'=>'MyHelper::viewGender($data->gender)',
				'filter'=>CHtml::dropDownList('Products[status]', $model->status,  
					array(
						''=>'',
						'F'=>at('Female'),
						'M'=>at('Male'),
					)
				),
			),
			array(
				'name'=>'status',
				'header'=>at("Status"),
				'value'=>'$data->viewStatus()',
			),
			array(
				'name'=>'is_active',
				'header'=>at("Is Active"),
				'value'=>'$data->is_active == 1 ? at("Active") : at("Not Active")',
				'filter'=>CHtml::dropDownList('Products[is_active]', $model->is_active,  
					array(
						''=>'',
						'1'=>at('Active'),
						'0'=>at('Not Active'),
					)
				),
			),
			array(
				'class'=>'CButtonColumn',
				'htmlOptions'=>array('style'=>'width: 70px'),
				'template'=>'{choose}',
				'buttons'=>array(
					'choose'=>array(
						'title'=>'Choose',
						//'url'=>'createUrl("employees/promotion", array("id"=>"$data->id"))',
						//'url'=>'echo "#"',
						'click' => "$.ajax({
							url: '" . createUrl("employees/chooseaa") . "',
							success: function() { $('#MastersEmployeeHistoryTrainings_employee_id').value = '123'; },
							error: function() { alert('Ajax button failed'); }})",
						/*'click'=>"function() {
							$.fn.yiiGridView.update('user-grid', {
								type:'POST',
								url:$(this).attr('href'),
								success:function(text,status) {
									$.fn.yiiGridView.update('user-grid');
								}
							});
							return false;
						}",*/
					),
				),
			),
		),
	)); ?>
</div>