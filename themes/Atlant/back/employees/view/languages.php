<?php $template = '{view}'; if($isform) { ?>
	<div class="row">
		<a href="#language_id#create#0" class="btn btn-primary"><?php echo at('Add Language'); ?></a>
	</div>
	<?php $template .= '{update}{delete}'; ?>
<?php } ?>

<?php $this->widget('DTGridView', array(
	'id'=>'masters-employee-languages-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider'=>MastersEmployeeLanguages::model()->searchByEmployee($model->id),
	'columns'=>array(
		array('name'=>'id','header'=>'#','htmlOptions'=>array( 'style' => 'width:50px;')),
		array('name'=>'language_id','header'=>at('Language'),'value'=>'$data->language->short'),
		array('name'=>'level','header'=>at('Level')),
		array(
			'class' 		=> 'CButtonColumn',
			'htmlOptions' 	=> array('style'=>'width: 70px'),
			'buttons' 		=> array(
				'view' 	 => array('url'=>'"#language_id#view#".$data->id'),
				'update' => array('url'=>'"#language_id#update#".$data->id'),	
				'delete' => array('url'=>'createUrl("employee/languages/delete", array("id"=>$data->id))'),
			),
		),
	),
)); ?>

<!-- Modal -->
<div class="modal fade" id="languagesModal" tabindex="-1" role="dialog" aria-labelledby="languagesModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="languagesModalLabel">Training</h4>
      </div>
      <div class="modal-body" id="languagesModalBody">
      <!-- tampilan dari ajax -->
      </div>
    </div>
  </div>
</div>

<script>
	$(window).bind('hashchange', function() {
		var href 	= window.location.href;
		var href 	= href.split('#');
		
		if(href[1]=='language_id'){
			var id 			= href[3];
			var action 		= href[2];
			var employee_id = $('#inputHiddenEmployee_id').val();
			
			$.post('<?php echo Yii::app()->createUrl("employee/languages/ajaxgetdata "); ?>',
			 {
			 	id:id,employee_id:employee_id,action:action
			 },
			 function(data) {
			 	$('#languagesModalBody').html(data);			 				 					
			 	$('#languagesModal').modal();
			 });
			
			window.location.href = '#counter';
		}		
	});
</script>