<?php
$label_class = 'col-md-3 col-xs-12 control-label';
$form_name = 'MastersEmployeeHistoryRewards';
?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($reward, 'employee_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<div class="input-group">
							<?php echo CHtml::textField('employee_name', $reward->viewChooseEmployee(), array('size'=>60,'readonly'=>true,'class' => 'validate[required] form-control disabled')); ?>
							<?php echo CHtml::activeHiddenField($reward, 'employee_id', array('class' => 'validate[required] form-control')); ?>
						
						</div>
						<div id="error_employee_id" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($reward, 'reward_type', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($reward, 'reward_type', array('size'=>60,'maxlength'=>50,'class' => 'validate[required] form-control')); ?>
						<div id="error_type" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($reward, 'name', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($reward, 'name', array('size'=>60,'maxlength'=>255,'class' => 'validate[required] form-control')); ?>
						<div id="error_name" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($reward, 'certificate_no', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeTextField($reward, 'certificate_no', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
						<div id="error_certificate_no" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($reward, 'certificate_date', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo CHtml::activeTextField($reward, 'certificate_date', array('class' => 'validate[required] form-control datepicker','style'=>'z-index:1151 !important;')); ?>
						</div>
						<div id="error_certificate_date" class="errorMessage"></div>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($reward, 'instantion', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($reward, 'instantion', array('maxlength'=>255,'class' => 'form-control')); ?>
						<div id="error_instantion" class="errorMessage"></div>
					</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>				
				<a href="#" class="btn btn-primary pull-right" id="btnSubmitRewards"><?php echo $reward->isNewRecord ? 'Create' : 'Save'; ?></a>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<?php $this->renderPartial('/ajax/sm-choose-dialog'); ?>

<script>
$('#MastersEmployeeHistoryRewards_certificate_date').datepicker({format:'yyyy-mm-dd'});

$('#btnSubmitRewards').click(function () {
	var id 					= '<?php echo $reward->id ?>';
	var type				= $('#MastersEmployeeHistoryRewards_reward_type').val();
	var name 				= $('#MastersEmployeeHistoryRewards_name').val();
	var certificate_no		= $('#MastersEmployeeHistoryRewards_certificate_no').val();
	var certificate_date 	= $('#MastersEmployeeHistoryRewards_certificate_date').val();
	var instantion			= $('#MastersEmployeeHistoryRewards_instantion').val();	

	$.post(
		'<?php echo Yii::app()->createUrl("employee/rewards/ajaxcreate&id="); ?>'+id,
		{
			employee_id 		: '<?php echo $reward->employee_id; ?>',
			type				: type,
			name 				: name,
			certificate_no 		: certificate_no,
			certificate_date 	: certificate_date,
			instantion			: instantion,			
		},
		function (data,status) {
			data = $.parseJSON(data);
			
			if(data.success==1){
				href = window.location.href;
				href = href.split('#');	
				href = href[0];

				if(href.indexOf('&tab') != -1){
					href = href.split('&tab');
					href = href[0];
				}			
		
				window.location.href = href+'&tab=4';
			}
			else{
				$('#error_employee_id').text(data.error_employee_id);
				$('#error_type').text(data.error_type);
				$('#error_name').text(data.error_name);
				$('#error_certificate_no').text(data.error_certificate_no);
				$('#error_certificate_date').text(data.error_certificate_date);
				$('#error_instantion').text(data.error_instantion);				
			}
		}
	);
});

</script>