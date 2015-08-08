<?php if($isform) { ?>
<div class="row">
	<a href="#salary_id#update#<?php echo $model->id; ?>" class="btn btn-primary"><?php echo at('Edit'); ?></a>
	<a href="#salary_id#upgrade#<?php echo $model->id; ?>" class="btn btn-default"><?php echo at('upgrade'); ?></a>
</div>
<?php } ?>


<div class="row">
    <div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-body form-group-separated">
					<?php if(!isset($model->salary->salary)) { echo at('Salary not set yet'); } else { $salary = $model->salary->salary; ?>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode('Salary'); ?></label>
							
							<div class="col-md-6 col-xs-12">
							<?php echo formatCurrency($salary->basic_salary_from); ?>
							&nbsp;+&nbsp;
							<?php echo formatCurrency($model->salary->basic_salary); ?>
							&nbsp;=&nbsp;
							<?php echo formatCurrency($salary->basic_salary_from+$model->salary->basic_salary); ?>
							</div>

						</div>											

						<?php 
						$allowances = $salary->allowances;
						foreach($allowances as $allowance) { ?>
							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($allowance->allowance->name); ?></label>								

								<div class="col-md-6 col-xs-12">
								<?php echo formatCurrency($allowance->basic); ?>
								&nbsp;+&nbsp;
								<?php echo formatCurrency($allowance->values); ?>
								&nbsp;=&nbsp;
								<?php echo formatCurrency($allowance->basic+$allowance->values); ?>
								</div>

							</div>
						<?php } ?>

					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="salaryModal" tabindex="-1" role="dialog" aria-labelledby="salaryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="salaryModalLabel">Salary</h4>
      </div>
      <div class="modal-body" id="salaryModalBody">
      <!-- tampilan dari ajax -->
      </div>
    </div>
  </div>
</div>

<script>
	$(window).bind('hashchange', function() {
		var href = window.location.href;
		var href = href.split('#');
		
		if(href[1]=='salary_id'){
			var id 			= href[3];
			var action 		= href[2];
			var employee_id = $('#inputHiddenEmployee_id').val();
			
			$.post('<?php echo Yii::app()->createUrl("employee/salary/ajaxgetdata "); ?>',
			 {
			 	id:id,employee_id:employee_id,action:action
			 },
			 function(data) {		
			 	$('#salaryModalBody').html(data);			 				 					
			 	$('#salaryModal').modal();
			 });
			
			window.location.href = '#counter';

			// alert('id:'+id+', action:'+action+', employee_id:'+employee_id);
		}		
	});
</script>