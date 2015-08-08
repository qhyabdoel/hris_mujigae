<?php 

if(count($model)==0){
?>

<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('No Mutation for Approval'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<?php
}
else{
?>

<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('View Mutation'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="panel-controls">
						<li><?php echo CHtml::link(at('Back'), createUrl('employees/index'), array('class'=>'btn btn-default')); ?></li>
						<?php if($model->status=='request' and getUser()->role!='rm'){
						?>
							<li>
								<?php echo CHtml::link(at('Approve'), createUrl('employees/mutation_approve', array(
									'id'=>$model->id)), array('class'=>'btn btn-primary','id'=>'Approve'
								)); ?>
							</li>
							<li>
								<?php echo CHtml::link(at('Cancel'), createUrl('employees/mutation_cancel', array(
									'id'=>$model->id)), array('class'=>'btn btn-primary','id'=>'Cancel'
								)); ?>
							</li>
						<?php
						} ?>							
					</ul>
				</div>

				<div class="panel-body form-group-separated">
					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('employee_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::link(CHtml::encode($model->employee->getFullname()), array('employees/view', 'id'=>$model->employee_id)); ?></div>
					</div>									

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('citty_area_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->area->name); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('department_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->department->name); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('section_id')); ?></label>
						<div class="col-md-6 col-xs-12">
							<?php 
							if(isset($model->section)) $section = $model->section->name;
							else $section = '';
							echo CHtml::encode($section); 
							?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('position_id')); ?></label>
						<div class="col-md-6 col-xs-12">
							<?php 
							if(isset($model->position)) $position = $model->position->name;
							else $position = '';
							echo CHtml::encode($position); 
							?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('level_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->level->level); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('grade_id')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->grade->grade); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->status); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('active_date')); ?></label>
						<div class="col-md-6 col-xs-12" id="active_date"><?php echo CHtml::encode($model->active_date); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('created_by')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->creator); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('created_at')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->created_at); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('approved_by')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->approver); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('approved_at')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->approved_at); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('canceled_by')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->cancelor); ?></div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-xs-12 control-label"><?php echo CHtml::encode($model->getAttributeLabel('canceled_at')); ?></label>
						<div class="col-md-6 col-xs-12"><?php echo CHtml::encode($model->canceled_at); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

var active_date 		= $('#active_date').text();
var active_date 		= new Date(active_date);	

var months = [
	'Januari',
	'Februari',
	'Maret',
	'April',
	'Mei',
	'Juni',
	'Juli',
	'Agustus',
	'September',
	'Oktober',
	'November',
	'Desember'
];

var active_date_date 	= active_date.getDate();
var active_date_month 	= months[active_date.getMonth()];
var active_date_year 	= active_date.getFullYear();
var active_date_string 	= active_date.toDateString();

var active_date_string_2 = active_date_date+' '+active_date_month+' '+active_date_year;

var now_date 			= new Date();	
var now_date_string		= now_date.toDateString();

$('#Approve').click(function (argument) {
	var confirmation = 'Pegawai akan aktif pada tanggal '+active_date_string_2+' Apakah anda menyutujui mutasi?';

	if(active_date_string==now_date_string){
		confirmation = 'Pegawai akan aktif per sekarang. Apakah anda menyutujui mutasi?';
	}

	return confirm(confirmation);
});

$('#Cancel').click(function (argument) {
	var confirmation = 'Pegawai akan aktif pada tanggal '+active_date_string_2+' Apakah anda membatalkan mutasi?';

	if(active_date_string==now_date_string){
		confirmation = 'Pegawai akan aktif per sekarang. Apakah anda membatalkan mutasi?';
	}

	return confirm(confirmation);
});

</script>

<?php
}

?>