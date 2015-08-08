<div class="row" id="listemployee">
	<div class="panel-body panel-body-table" id="listemployee1">
		<?php $this->widget('CGridView', array(
			'id'=>'masters-employees-grid',
			'itemsCssClass' => 'table',
			'dataProvider'=>$model->search(true),
			'filter'=>$model,
			'columns'=>array(
				array('name'=>'code', 'header'=>at('NIK'), 'htmlOptions' => array( 'style' => 'width:10%;')),
				array('name'=>'firstname', 'header'=>at('Full Name'), 'value'=>'$data->getFullname()'),
				array(
					'name'=>'department_id',
					'header'=>at("Department"),
					'value'=>'$data->department->name',
					'htmlOptions' => array( 'style' => 'width:20%;'),
				),
				array(
					'name'=>'gender',
					'header'=>at("Gender"),
					'value'=>'MyHelper::viewGender($data->gender)',
					'htmlOptions' => array( 'style' => 'width:10%;'),
				),
				array(
					'name'=>'is_active',
					'header'=>at("Is Active"),
					'value'=>'$data->is_active == 1 ? at("Active") : at("Not Active")',
					'htmlOptions' => array( 'style' => 'width:10%;'),
				),
				array(
					'class'=>'ButtonColumn',
					'template'=>'{choose}',
					'evaluateID'=>true,
					'buttons'=>array(
						'choose'=>array(
							'title'=>at('Choose'),
							'label'=>'<i class="fa fa-check">'.at('Choose').'</i>',
							'options'=>array(
								'id'=>'$data->id',
								'class'=>'choose',
							),
							'url'=>'"javascript: void(0)"',
						),
					),
				),
			),
		)); ?>
	</div>
</div>

<?php /*<script type="text/javascript">
	$(".class").on('click', function(){ dialogInstance.close(); });
</script>*/?>