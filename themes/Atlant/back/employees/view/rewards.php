<?php $template = '{view}'; if($isform) { ?>
	<div class="row">		
		<a href="#reward_id#create#0" class="btn btn-primary"><?php echo at('Add Reward'); ?></a>
	</div>
	<?php $template .= '{update}{delete}'; ?>
<?php } ?>

<?php $this->widget('DTGridView', array(
	'id' 			=> 'masters-employee-rewards-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider' 	=> MastersEmployeeHistoryRewards::model()->searchByEmployee($model->id),
	'columns' 		=> array(
		array('name'=>'id','header'=>'#','htmlOptions'=>array('style'=>'width:50px;') ),
		array('name'=>'reward_type','header'=>at('Type')),
		array('name'=>'name','header'=>at('Name')),
		array('name'=>'instantion','header'=>at('Instantion')),
		array('name'=>'certificate_date','header'=>at('Cert Date')),
		array(
			'class' 		=> 'CButtonColumn',
			'htmlOptions' 	=> array('style'=>'width: 80px'),
			'template' 		=> $template,
			'buttons' 		=> array(
				'view' 	 => array('url'=>'"#reward_id#view#".$data->id'),
				'update' => array('url'=>'"#reward_id#update#".$data->id'),								
				'delete' => array('url'=>'createUrl("employee/rewards/delete", array("id"=>$data->id))'),
			),
		),
	),
)); ?>

<!-- Modal -->
<div class="modal fade" id="rewardsModal" tabindex="-1" role="dialog" aria-labelledby="rewardsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="rewardsModalLabel">Reward</h4>
      </div>
      <div class="modal-body" id="rewardsModalBody">
      <!-- tampilan dari ajax -->
      </div>
    </div>
  </div>
</div>

<script>
	$(window).bind('hashchange', function() {
		var href 	= window.location.href;
		var href 	= href.split('#');
		
		if(href[1]=='reward_id'){
			var id 			= href[3];
			var action 		= href[2];
			var employee_id = $('#inputHiddenEmployee_id').val();
			
			$.post('<?php echo Yii::app()->createUrl("employee/rewards/ajaxgetdata "); ?>',
			 {
			 	id:id,employee_id:employee_id,action:action
			 },
			 function(data) {
			 	$('#rewardsModalBody').html(data);			 				 	
			 	$('#rewardsModal').modal();
			 });
			
			window.location.href = '#counter';
		}		
	});
</script>