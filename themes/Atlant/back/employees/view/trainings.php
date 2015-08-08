<?php if($isform) { ?>
<div class="row">
	<a href="#training_id#create#0" class="btn btn-primary"><?php echo at('Add Training'); ?></a>
</div>
<?php } ?>

<?php $this->widget('DTGridView', array(
	'id' 			=>'masters-employee-trainings-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider' 	=>MastersEmployeeHistoryTrainings::model()->searchByEmployee($model->id),
	'columns' 		=>array(
		array('name'=>'id','header'=>'#','htmlOptions'=>array('style'=>'width:50px;')),
		array('name'=>'topic','header'=>at('Topic')),
		array('name'=>'certificate_date','header'=>at('Cert Date')),
		array(
			'class' 		=> 'CButtonColumn',
			'htmlOptions' 	=> array('style'=>'width: 80px'),
			'buttons' 		=> array(
				'view' 	 => array('url'=>'"#training_id#view#".$data->id'),
				'update' => array('url'=>'"#training_id#update#".$data->id'),	
				'delete' => array('url'=>'createUrl("employee/trainings/delete", array("id"=>$data->id))'),
			),
		),
	),
)); ?>

<!-- Modal -->
<div class="modal fade" id="trainingsModal" tabindex="-1" role="dialog" aria-labelledby="trainingsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="trainingsModalLabel">Training</h4>
      </div>
      <div class="modal-body" id="trainingsModalBody">
      <!-- tampilan dari ajax -->
      </div>
    </div>
  </div>
</div>

<script>
	$(window).bind('hashchange', function() {
		var href 	= window.location.href;
		var href 	= href.split('#');
		
		if(href[1]=='training_id'){
			var id 			= href[3];
			var action 		= href[2];
			var employee_id = $('#inputHiddenEmployee_id').val();
			
			$.post('<?php echo Yii::app()->createUrl("employee/trainings/ajaxgetdata "); ?>',
			 {
			 	id:id,employee_id:employee_id,action:action
			 },
			 function(data) {
			 	$('#trainingsModalBody').html(data);			 				 	
			 	$('#trainingsModal').modal();
			 });		
			
			window.location.href = '#counter';
		}		
	});
</script>