<?php $label_class = 'col-md-3 col-xs-12 control-label'; ?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
	<div class="panel-body">
		<div class="form-group">
			<?php echo CHtml::activeLabelEx($model, 'dept_id', array('class' => $label_class)); ?>
			<div class="col-md-6 col-xs-12">                                                                                                                                           
				<?php echo CHtml::activeDropDownList($model, 'dept_id', CHtml::listData(MastersDepartments::model()->byOrder()->findAll(), 'id', 'name'), array('data-placeholder' => at('Please select one...'), 'prompt' => '', 'class' => 'validate[required] form-control select')); ?>
				<?php echo CHtml::error($model, 'dept_id'); ?>
			</div>
		</div>
		
		<div class="form-group">
			<?php echo CHtml::activeLabelEx($model, 'short', array('class' => $label_class)); ?>
			<div class="col-md-6 col-xs-12">                                                                                                                                           
				<?php echo CHtml::activeTextField($model, 'short', array('size'=>15,'maxlength'=>15,'class' => 'validate[required] form-control')); ?>
				<?php echo CHtml::error($model, 'short'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo CHtml::activeLabelEx($model, 'name', array('class' => $label_class)); ?>
			<div class="col-md-6 col-xs-12">                                                                                                                                           
				<?php echo CHtml::activeTextField($model, 'name', array('size'=>60,'maxlength'=>100,'class' => 'validate[required] form-control')); ?>
				<?php echo CHtml::error($model, 'name'); ?>
			</div>
		</div>
	</div>
<?php echo CHtml::endForm(); ?>

<script type="text/javascript>">
	//Bootstrap select
	//var feSelect = function(){
		if($(".select").length > 0){
			$(".select").selectpicker();
			
			$(".select").on("change", function(){
				if($(this).val() == "" || null === $(this).val()){
					if(!$(this).attr("multiple"))
						$(this).val("").find("option").removeAttr("selected").prop("selected",false);
				}else{
					$(this).find("option[value="+$(this).val()+"]").attr("selected",true);
				}
			});
		}
	//}//END Bootstrap select
</script>