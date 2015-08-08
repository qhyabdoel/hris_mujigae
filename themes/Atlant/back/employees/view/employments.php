<?php $template = '{view}'; if($isform) { ?>
	<div class="row">		
		<a href="#employment_id#create#0" class="btn btn-primary"><?php echo at('Add Employment'); ?></a>
	</div>
	<?php $template .= '{update}{delete}'; ?>
<?php } ?>

<?php $this->widget('DTGridView', array(
	'id'=>'masters-employee-employments-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider'=>MastersEmployeeHistoryEmployments::model()->searchByEmployee($model->id),
	'enableSorting'=>false,
	'columns'=>array(
		array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
		array('name'=>'company_name', 'header'=>at('Company')),
		array('name'=>'position', 'header'=>at('Position')),
		array('name'=>'last_position', 'header'=>at('Last Position')),
		array('name'=>'resign_reason', 'header'=>at('Reason')),
		array(
			'class' 		=> 'CButtonColumn',
			'htmlOptions' 	=> array('style'=>'width: 80px'),
			'template' 		=> $template,
			'buttons' 		=> array(
				'view' 	 => array('url'=>'"#employment_id#view#".$data->id'),
				'update' => array('url'=>'"#employment_id#update#".$data->id'),				
				'delete' => array('url'=>'createUrl("employee/employments/delete", array("id"=>$data->id))'),
			),
		),
	),
)); ?>

<!-- Modal -->
<div class="modal fade" id="employmentsModal" tabindex="-1" role="dialog" aria-labelledby="employmentsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="employmentsModalLabel">Education</h4>
      </div>
      <div class="modal-body" id="employmentsModalBody">
      <!-- tampilan dari ajax -->
      </div>
    </div>
  </div>
</div>

<script>
	$(window).bind('hashchange', function() {
		var href 	= window.location.href;
		var href 	= href.split('#');
		
		if(href[1]=='employment_id'){
			var id 			= href[3];
			var action 		= href[2];
			var employee_id = $('#inputHiddenEmployee_id').val();
			
			$.post('<?php echo Yii::app()->createUrl("employee/employments/ajaxgetdata "); ?>',
			 {
			 	id:id,employee_id:employee_id,action:action
			 },
			 function(data) {
			 	$('#employmentsModalBody').html(data);			 				 	
			 	$('#employmentsModal').modal();
			 });
			
			window.location.href = '#counter';
		}
	});
</script>