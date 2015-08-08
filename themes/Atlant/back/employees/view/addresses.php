<?php 

$isform = isset($isform) ? $isform : false; 
$url 	= Yii::app()->createUrl('employee/addresses/create'.'&id='.$model->id);

?>

<?php if($isform) { ?>
<div class="row">
	<a href="#address_id#create#0" class="btn btn-primary"><?php echo at('Add Address'); ?></a>	
</div>
<?php } ?>

<?php $this->widget('DTGridView', array(
	'id' 			=>'masters-employee-addresses-grid',
	'itemsCssClass' => 'table datatable',
	'dataProvider' 	=> MastersEmployeeAddresses::model()->searchByEmployee($model->id),
	
	'columns' => array(
		array('name'=>'id','header'=>'#','htmlOptions'=>array('style'=>'width:50px;') ),
		array('name'=>'label','header'=> at('Label')),
		array('name'=>'street1','header'=> at('Street1')),
		array('name'=>'street2','header'=> at('Street2')),
		array('name'=>'geography','header'=> at('Geography'), 'value'=>'$data->getGeography()'),
		array('name'=>'poscode','header'=> at('Poscode')),
		array('name'=>'phone','header'=> at('Phone')),
		array(
			'class' 		=> 'CButtonColumn',
			'htmlOptions' 	=> array('style'=>'width: 80px'),
			'buttons' 		=> array(
				'view' 	 => array('url'=>'"#address_id#view#".$data->id'),
				'update' => array('url'=>'"#address_id#update#".$data->id'),
				'delete' => array('url'=>'createUrl("employee/addresses/delete", array("id"=>$data->id))'),
			),
		),
	),
)); ?>

<input value="<?php echo $model->id; ?>" id="inputHiddenEmployee_id" hidden>

<!-- Modal -->
<div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addressModalLabel">Address</h4>
      </div>
      <div class="modal-body" id="addressModalBody">
      <!-- tampilan dari ajax -->
      </div>
    </div>
  </div>
</div>

<script>
	$(window).bind('hashchange', function() {
		var href 	= window.location.href;
		var href 	= href.split('#');		
		
		if(href[1]=='address_id'){
			var id 			= href[3];
			var action 		= href[2];
			var employee_id = $('#inputHiddenEmployee_id').val();

			$.post('<?php echo Yii::app()->createUrl("employee/addresses/ajaxgetdata "); ?>',
			 {
			 	id : id, employee_id : employee_id, action : action
			 },
			 function(data) {
			 	$('#addressModalBody').html(data);
			 	$('#MastersEmployeeAddresses_country_id').selectpicker();
			 	$('#MastersEmployeeAddresses_state_id').selectpicker();
			 	$('#MastersEmployeeAddresses_city_id').selectpicker();
			 	$('#MastersEmployeeAddresses_district_id').selectpicker();
			 	$('#addressModal').modal();
			 });

			// alert('id:'+id+', employee_id:'+employee_id+', action:'+action);
			
			window.location.href = '#counter';
		}
	});
</script>