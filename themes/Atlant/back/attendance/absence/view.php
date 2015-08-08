<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-group"></span> <?php echo at('View Absence Permission'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">

				<div class="panel-body form-group-separated">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id'=>$model->id)); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('employee_id')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->employee->getFullName()); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('type')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->type); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('start_date')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->start_date); ?></div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('end_date')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->end_date); ?></div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('reason')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->reason); ?></div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('number_of_hours')); ?></label>
							<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->number_of_hours); ?></div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label">Doctor's note</label>
							<div class="col-md-6 col-xs-12">
							 	<a href="#" id="letter"><?php echo CHtml::image($model->getLetter(), 'letter', array('height'=>'50px')); ?></a>
							 </div>
						</div>

					</div>
		
				</div>
			</div>
		</div>
	</div>
</div>

<script>
var image = '<img src="<?php echo $model->getLetter(); ?>" width="800px">';

$('#letter').click(function(){
	BootstrapDialog.show({
		title: "Doctor's Note",
        message: image
    });
});

</script>