<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Generate Recapitulation'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<?php $label_class = 'col-md-3 col-xs-12 control-label'; ?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="form-inline">
					<?php //echo CHtml::activeLabelEx($model, 'start_date', array('class' => $label_class)); ?>
					<?php echo at('Payment Periode'); ?> : &nbsp; &nbsp; 
					<div class="input-group">
						<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
						<?php echo CHtml::activeTextField($model, 'start_date', array('class' => 'form-control datepicker')); ?>
					</div>
				
					<?php //echo CHtml::activeLabelEx($model, 'end_date', array('class' => $label_class)); ?>
					&nbsp; &nbsp; To: &nbsp; &nbsp; 
					<div class="input-group">
						<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
						<?php echo CHtml::activeTextField($model, 'end_date', array('class' => 'form-control datepicker')); ?>
					</div>
				</div>
			</div>

			<div class="panel-body">
				<div class="block">
					<div class="wizard">
						<ul>
						<li><a href="#step-1">
								<span class="stepNumber">1</span>
								<span class="stepDesc">Step 1<br /><small>Initial Step</small></span>
							</a>
						</li>
						<li><a href="#step-2">
								<span class="stepNumber">2</span>
								<span class="stepDesc">Step 2<br /><small>Generate Presence Recap</small></span>
							</a>
						</li>
						<li><a href="#step-3">
								<span class="stepNumber">3</span>
								<span class="stepDesc">Step 3<br /><small>Generate Payment</small></span>                   
							</a>
						</li>
						<li><a href="#step-4">
								<span class="stepNumber">4</span>
								<span class="stepDesc">Step 4<br /><small>Finish</small></span>                   
							</a>
						</li>
						</ul>
						<div id="step-1">   
							<?php $this->renderPartial('generate/step1', array('model'=>$model, 'label_class'=>$label_class)); ?>
						</div>
						<div id="step-2">
							<?php $this->renderPartial('generate/step2', array('model'=>$model, 'label_class'=>$label_class)); ?>
						</div>                      
						<div id="step-3">
							<?php $this->renderPartial('generate/step3', array('model'=>$model, 'label_class'=>$label_class)); ?>
						</div>
						<div id="step-4">
							<?php $this->renderPartial('generate/step4', array('model'=>$model, 'label_class'=>$label_class)); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<?php $this->renderPartial('/ajax/sm-choose-dialog'); ?>

<script type="text/javascript">
$(function(){
	var cur_from = '<?php echo $currentPeriode['from'] ?>';
	var cur_to = '<?php echo $currentPeriode['to'] ?>';
	
	$("select[id$=periode_type]").on('change', function(){
		if($(this).val() == 'current')
		{
			$("input[id$=start_date]").val(cur_from);
			$("input[id$=end_date]").val(cur_to);
		} else {
			$("input[id$=start_date]").val('');
			$("input[id$=end_date]").val('');
		}
	});
})
</script>