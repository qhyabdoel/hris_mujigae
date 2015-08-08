<?php $label_class = 'col-md-3 col-xs-12 control-label'; ?>
<?php
$monthName = getMonthName();
$years = array();
for($i=$model->year+1; $i>=$model->year-5; $i--) { $years[$i] = $i; }
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
					<?php echo CHtml::activeLabelEx($model, 'department_id', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'department_id', CHtml::listData(MastersDepartments::model()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'data-live-search' => 'true', 'class' => 'validate[required] form-control select')); ?>						
						<?php echo CHtml::error($model, 'department_id'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'month', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'month', $monthName, array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'month'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'year', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'year', $years, array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
						<?php echo CHtml::error($model, 'year'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-md-6 col-xs-12">
						<?php echo Chtml::ajaxSubmitButton(at('Generate'),Yii::app()->createUrl('attendance/schedulle/smcalendar'), array('update'=>'#smcalendar')); ?>
					</div>
				</div>
				
			</div>

			<div id="smcalendar">
				<?php $this->renderPartial('smcalendar', array('model'=>$model,'employees'=>$employees,'daysValue'=>$daysValue,'holidays'=>$holidays)) ?>
			</div>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>
				<?php echo CHtml::submitButton('Save', array('class'=>'btn btn-primary pull-right','id'=>'btnSubmit')); ?>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<script>
	$('#btnSubmit').click(function (argument) {
		alert('ok');
	});
</script>