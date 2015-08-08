<?php
$label_class = 'col-md-3 col-xs-12 control-label';
$form_name = 'MastersEmployeeFamilys';
?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal','id'=>'language_form')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($language, 'employee_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<div class="input-group">
							<?php echo CHtml::textField('employee_name', $language->viewChooseEmployee(), array('readonly'=>true,'class' => 'validate[required] form-control disabled')); ?>
							<?php echo CHtml::activeHiddenField($language, 'employee_id', array('class' => 'validate[required] form-control')); ?>
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" id="choose_employee">Choose</button>
							</span>
						</div>
						<div id="error_employee_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($language, 'language_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($language, 'language_id', CHtml::listData(ReferenceLanguages::model()->byOrder()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>
						<div id="error_language_id" class="errorMessage"></div>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($language, 'level', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">                                                                                                                                           
						<?php echo CHtml::activeRadioButtonList($language, 'level', MyHelper::getLangAbility(), array('separator'=>' &nbsp; &nbsp; &nbsp; &nbsp; ')); ?>
						<div id="error_level" class="errorMessage"></div>
					</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>				
				<a href="#" class="btn btn-primary pull-right" id="btnSubmitLanguages"><?php echo $language->isNewRecord ? 'Create' : 'Save'; ?></a>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<?php $this->renderPartial('/ajax/sm-choose-dialog'); ?>

<script>

$('#MastersEmployeeLanguages_language_id').selectpicker();

$('#btnSubmitLanguages').click(function () {
	var id 			= '<?php echo $language->id ?>';
	var language_id	= $('#MastersEmployeeLanguages_language_id').val();
	var level 		= $('input[type="radio"]:checked', '#language_form').val();

	$.post(
		'<?php echo Yii::app()->createUrl("employee/languages/ajaxcreate&id="); ?>'+id,
		{
			employee_id : '<?php echo $language->employee_id; ?>',
			language_id : language_id,
			level 		: level,
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
		
				window.location.href = href+'&tab=6';
			}
			else{
				$('#error_employee_id').text(data.error_employee_id);
				$('#error_language_id').text(data.error_language_id);
				$('#error_level').text(data.error_level);				
			}
		}
	);
});

</script>