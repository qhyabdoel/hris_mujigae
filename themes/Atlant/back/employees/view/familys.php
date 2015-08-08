<?php $urlCreate = Yii::app()->createUrl('employee/familys/create'); ?>

<?php if($isform) { ?>
<div class="row">
	<a href="#family_id#create#0" class="btn btn-primary"><?php echo at('Add Family'); ?></a>
</div>
<?php } ?>

<?php $this->widget('DTGridView', array(
	'id'=>'masters-employee-familys-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider'=>MastersEmployeeFamilys::model()->searchByEmployee($model->id),
	'columns'=>array(
		array('name'=>'id','header'=>'#','htmlOptions'=>array('style'=>'width:50px;') ),
		array('name'=>'status_id','header'=>at('Status'),'value'=>'$data->viewStatus()'),
		array('name'=>'name','header'=>at('Name')),
		array('name'=>'gender','header'=>at('Gender'),'value'=>'MyHelper::viewGender($data->gender)',),
		array('name'=>'education_level','header'=>at('Education')),
		array('name'=>'job_position','header'=>at('Job')),
		array(
			'class' 		=> 'CButtonColumn',
			'htmlOptions' 	=> array('style'=>'width: 80px'),
			'buttons' 		=> array(
				'view' 	 => array('url'=>'"#family_id#view#".$data->id'),
				'update' => array('url'=>'"#family_id#update#".$data->id'),
				'delete' => array('url'=>'createUrl("employee/familys/delete", array("id"=>$data->id))'),
			),
		),
	),
)); ?>

<!-- Modal -->
<div class="modal fade" id="familysModal" tabindex="-1" role="dialog" aria-labelledby="familysModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="familysModalLabel">Family</h4>
      </div>
      <div class="modal-body" id="familysModalBody">
      <!-- tampilan dari ajax -->
      </div>
    </div>
  </div>
</div>

<script>
	$(window).bind('hashchange', function() {
		var href 	= window.location.href;
		var href 	= href.split('#');
		
		if(href[1]=='family_id'){
			var id 		= href[3];
			var action 	= href[2];
			
			$.post('<?php echo Yii::app()->createUrl("employee/familys/ajaxgetdata "); ?>',
			 {
			 	id : href[3], employee_id : $('#inputHiddenEmployee_id').val(), action : action
			 },
			 function(data) {
			 	$('#familysModalBody').html(data);			 		 				 	
				$('#MastersEmployeeFamilys_group_id').selectpicker();
				$('#MastersEmployeeFamilys_status_id').selectpicker();	
				$('#MastersEmployeeFamilys_address_id').selectpicker();
				$('#MastersEmployeeFamilys_gender').selectpicker();
				$('#MastersEmployeeFamilys_birthplace_country_id').selectpicker();
				$('#MastersEmployeeFamilys_birthplace_state_id').selectpicker();
				$('#MastersEmployeeFamilys_birthplace_city_id').selectpicker();
				$('#MastersEmployeeFamilys_birthplace_district_id').selectpicker();
			 	$('#familysModal').modal();
			 });
			
			window.location.href = '#counter';
		}
	});
</script>