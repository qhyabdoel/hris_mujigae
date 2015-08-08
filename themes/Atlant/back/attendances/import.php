<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Import Attendance'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<?php $label_class = 'col-md-3 col-xs-12 control-label'; ?>

<?php if(user()->hasFlash('ok')): ?>
<div class='row'>
	<div class="col-md-12">
		<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<i class="fa fa-check" style="font-size: 20px"></i> &nbsp; <?php echo user()->getFlash('ok'); ?>
		</div>
	</div>
</div>
<?php endif; ?>

<?php if(user()->hasFlash('error')): ?>
<div class='row'>
	<div class="col-md-12">
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<i class="fa fa-times" style="font-size: 20px"></i> &nbsp; <?php echo user()->getFlash('error'); ?>
		</div>
	</div>
</div>
<?php endif; ?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal', 'enctype' => 'multipart/form-data')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="note">
				Import data absensi dengan format file <strong style="color: red">.csv</strong><br>
				Baris pertama harus berisi judul kolom dengan format <strong style="color: blue">employee_id, date, shift_id, type, presence_date</strong>
				</p>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'file', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeFileField($model, 'file', array('class' => 'validate[required] btn btn-success')); ?>
						<?php echo CHtml::error($model, 'file'); ?>
					</div>
				</div>
			</div>

			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>
				<?php echo CHtml::submitButton('Save', array('class'=>'btn btn-primary pull-right')); ?>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>