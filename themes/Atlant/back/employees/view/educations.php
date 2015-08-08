<?php if($isform) { ?>
<div class="row">
	<a href="#education_id#create#0" class="btn btn-primary"><?php echo at('Add Education'); ?></a>
</div>
<?php } ?>

<?php $this->widget('CGridView', array(
	'id' 			=> 'masters-employee-educations-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider' 	=> MastersEmployeeHistoryEducations::model()->searchByEmployee($model->id),
	'columns' 		=> array(
		array('name'=>'id','header'=>'#','htmlOptions'=>array('style'=>'width:50px;')),
		array('name'=>'education_id','header'=>at('Level'),'value'=>'$data->education->short'),
		array('name'=>'school','header'=>at('School')),
		array('name'=>'department','header'=>at('Department')),
		array('name'=>'certificate_year','header'=>at('Cert Year')),
		array(
			'class' 		=> 'CButtonColumn',
			'htmlOptions' 	=> array('style'=>'width: 80px'),
			'buttons' 		=> array(
				'view' 	 => array('url'=>'"#education_id#view#".$data->id'),
				'update' => array('url'=>'"#education_id#update#".$data->id'),
				'delete' => array('url'=>'createUrl("employee/educations/delete", array("id"=>$data->id))'),
			),
		),
	),
)); ?>

<!-- Modal -->
<div class="modal fade" id="educationsModal" tabindex="-1" role="dialog" aria-labelledby="educationsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="educationsModalLabel">Education</h4>
      </div>
      <div class="modal-body" id="educationsModalBody">
      <!-- tampilan dari ajax -->
      </div>
    </div>
  </div>
</div>

<script>
	$(window).bind('hashchange', function() {
		var href 	= window.location.href;
		var href 	= href.split('#');
		
		if(href[1]=='education_id'){
			var id 			= href[3];
			var action 		= href[2];
			var employee_id = $('#inputHiddenEmployee_id').val();
			
			$.post('<?php echo Yii::app()->createUrl("employee/educations/ajaxgetdata "); ?>',
			 {
			 	id : href[3], employee_id : $('#inputHiddenEmployee_id').val(), action : action
			 },
			 function(data) {
			 	$('#educationsModalBody').html(data);			 				 			 	
			 	$('#educationsModal').modal();
			 });
			
			window.location.href = '#counter';
		}
	});
</script>