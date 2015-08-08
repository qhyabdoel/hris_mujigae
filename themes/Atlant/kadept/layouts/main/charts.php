<?php 
$employees = array();

if(getUser()->role=='kadept'){
	$employees = getUser()->employee->department_i_lead->mastersEmployees;	
} 
elseif (getUser()->role=='rm') {
	$outlet_i_lead 	= getUser()->employee->outlet_i_lead;

	if(isset($outlet_i_lead)) $employees = $outlet_i_lead->employee;
	else $employees[] = getUser()->employee;
}
elseif (getUser()->role=='bm') {
	$area_i_lead = getUser()->employee->area_i_lead;

	if(isset($area_i_lead)){
		$outlets = $area_i_lead->outlets;
		
		foreach ($outlets as $outlet) {
			foreach ($outlet->employee as $employee) {
				$employees[] = $employee;
			}
		}
	} 
	else $employees[] = getUser()->employee;
}

$attendancess 		= array();
$absencess 			= array();
$attendance_offss 	= array();
$attendance_reqs 	= array();

foreach ($employees as $employee) {
	$attendancess[]	 = $employee->attendances;	
}

foreach ($employees as $employee) {
	$absencess[] = $employee->absences;	
}

foreach ($employees as $employee) {
	$attendance_offss[] = $employee->attendance_offs;	
}

foreach ($employees as $employee) {
	$attendance_reqs[] = $employee->attendance_req;	
}

$condition = 'created_by = "rm"';

if(getUser()->role=='bm') $condition = 'created_by = "rm" or created_by = "bm" or approved_by = "bm"';

if(getUser()->role=='kadept') $condition = 'created_by = "kadept"';

$mutation_requests = MutationsRequest::model()->findAll(
	array('condition'=>$condition)
);


?>

<div class="row">
	<div class="col-md-7">
		
		<!-- START SALES BLOCK -->
		<div class="panel panel-default">
			<div style="height:500px;overflow:scroll;">

			
			<div class="panel-heading">
				<div class="panel-title-box">
					<h3><?php echo at('Attendance Incomplete') ?></h3>					
				</div>
			</div>
			<div class="panel-body panel-body-table">				
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="10%"><?php echo at('Id') ?></th>
								<th width="10%"><?php echo at('NIK') ?></th>
								<th width="10%"><?php echo at('Name') ?></th>
								<?php 
								if(getUser()->role=='rm' or getUser()->role=='kadept'){
								?><th width="10%"></th><?php
								}
								?>
								<th width="10%"><?php echo at('Date') ?></th>
								<th width="10%"><?php echo at('Shift') ?></th>
								<th width="10%"><?php echo at('Check In') ?></th>
								<th width="10%"><?php echo at('Break Out') ?></th>
								<th width="10%"><?php echo at('Break In') ?></th>
								<th width="10%"><?php echo at('Check Out') ?></th>
								<th width="10%"><?php echo at('Type') ?></th>
							</tr>
						</thead>
						<tbody>
						<?php 
						foreach ($attendancess as $attendances) {
							foreach ($attendances as $attendance) {

							$show = 0;

							if($attendance->shift_id==1){
								if($attendance->break_out==null or $break_in==null) $show = 1;
							}

							if($attendance->shift_id>3){
								if($attendance->check_in==null or $attendance->check_out==null or $attendance->break_out==null or $attendance->break_in==null) 
									$show = 1;
							}

							if($show==1){
							$url = Yii::app()->createUrl('attendances/beritaacara&id='.$attendance->id);
							?>
							<tr>
								<td><?php echo $attendance->id; ?></td>
								<td><?php echo $attendance->employee->code; ?></span></td>								
								<td><?php echo $attendance->employee->fullname; ?></span></td>								
								<?php 
								if(getUser()->role=='rm' or getUser()->role=='kadept'){
								?><td><a href="<?php echo $url; ?>">Berita Acara</a></td><?php
								}
								?>	
								<td><?php echo $attendance->date; ?></span></td>
								<td><?php echo $attendance->shift_id; ?></span></td>
								<td><?php echo $attendance->check_in; ?></span></td>
								<td><?php echo $attendance->break_out; ?></span></td>
								<td><?php echo $attendance->break_in; ?></span></td>
								<td><?php echo $attendance->check_out; ?></span></td>
								<td><?php echo $attendance->type; ?></span></td>													
							</tr>
							<?php
							}							

							}							
						}
						?>												
						</tbody>
					</table>
				</div>
			</div>
			</div>
		</div>
		<!-- END SALES BLOCK -->
		
	</div>
	<div class="col-md-5">
		
		<!-- START PROJECTS BLOCK -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title-box">
					<h3><?php echo at('Absence Permission'); ?></h3>
					<!-- <span>Current Employee Needed</span> -->
				</div>                                    
				<ul class="panel-controls" style="margin-top: 2px;">
					<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
						<ul class="dropdown-menu">
							<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
							<li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
						</ul>                                        
					</li>                                        
				</ul>
			</div>
			<div class="panel-body panel-body-table">
				
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="70%"><?php echo at('Start Date') ?></th>
								<th width="10%"><?php echo at('End Date') ?></th>
								<th width="10%"><?php echo at('Type') ?></th>
								<th width="10%"><?php echo at('Reason') ?></th>
								<th width="10%"><?php echo at('Status') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php $absences = AttendanceAbsences::model()->findAllByAttributes(array('employee_id'=>Yii::app()->user->id)); ?>
							<?php foreach ($absences as $absence) { ?>
								<tr>
									<td><?php echo $absence->start_date; ?></td>
									<td><?php echo $absence->end_date; ?></td>
									<td><?php echo $absence->type; ?></td>
									<td><?php echo $absence->reason; ?></td>
									<td><?php echo $absence->status; ?></td>									
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
		<!-- END PROJECTS BLOCK -->				
	</div>

	<div class="col-md-7">
		
		<!-- START SALES BLOCK -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title-box">
					<h3><?php echo at('Attendance Off') ?></h3>					
				</div>
			</div>
			<div class="panel-body panel-body-table">				
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="10%"><?php echo at('Id') ?></th>
								<th width="10%"><?php echo at('NIK') ?></th>
								<th width="10%"><?php echo at('Name') ?></th>
								<th width="10%"><?php echo at('Date') ?></th>
								<th width="10%"><?php echo at('Shift') ?></th>
								<th width="10%"><?php echo at('Location') ?></th>																								
								<th width="10%"><?php echo at('Action') ?></th>							
							</tr>
						</thead>
						<tbody>
						<?php 
						foreach ($attendance_offss as $attendance_offs) 
						{
							foreach ($attendance_offs as $attendance_off) {
							
							$Action 	= 'View';
							$url_off 	= Yii::app()->createUrl('attendance/off/view&id='.$attendance_off->id);

							if($attendance_off->status=='draft'){
								$Action 	= 'Update';
								$url_off 	= Yii::app()->createUrl('attendance/off/update&id='.$attendance_off->id);
							}
																					
							?>
							<tr>
								<td><?php echo $attendance_off->id; ?></td>
								<td><?php echo $attendance_off->employee->code; ?></span></td>								
								<td><?php echo $attendance_off->employee->fullname; ?></span></td>								
								<td><?php echo $attendance_off->date; ?></span></td>
								<td><?php echo $attendance_off->shift->name; ?></span></td>
								<td><?php echo $attendance_off->location->name; ?></span></td>								
								<td><a href="<?php echo $url_off; ?>"><?php echo $Action; ?></a></td>														
							</tr>
							<?php
							}
						}																										
						?>												
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
		<!-- END SALES BLOCK -->
		
	</div>
	<div class="col-md-5">
		<!-- START SALES BLOCK -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title-box">
					<h3><?php echo at('Approval Notifications') ?></h3>
					<span><?php echo at('Current approval notifications') ?></span>
				</div>
			</div>
			<div class="panel-body panel-body-table">
				
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="10%"><?php echo at('Type') ?></th>
								<th width="70%"><?php echo at('Notification Information') ?></th>
								<th width="10%"><?php echo at('Status') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($mutation_requests as $request) {							
							?>
							<tr>
								<?php /*<td><span class="label <?php echo ($outlet->employeeCount < $outlet->employee_needed ? 'label-danger' : ($outlet->employeeCount < $outlet->employee_needed ? 'label-success' : 'label-warning')) ?>"></span></td>*/?>
								<td><b><?php echo $request->type; ?></b></td>
								<td><?php echo $request->info; ?></td>
								<td>
									<?php 
									if($request->status=='request') {
									?><span class="label label-warning">request</span><?php	
									}
									if($request->status=='approved') {
									?><span class="label label-success">approved</span><?php	
									}
									if($request->status=='rejected') {
									?><span class="label label-danger">rejected</span><?php	
									}
									?>
								</td>
							</tr>
							<?php	
							}
							?>
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
		<!-- END SALES BLOCK -->
	</div>

	<?php if(getUser()->role=='rm' or getUser()->role=='kadept'){ ?>

	<div class="col-md-7">
		
		<!-- START SALES BLOCK -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title-box">
					<h3><?php echo at('Berita Acara') ?></h3>					
				</div>
			</div>
			<div class="panel-body panel-body-table">				
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="10%"><?php echo at('Id') ?></th>
								<th width="10%"><?php echo at('NIK') ?></th>
								<th width="10%"><?php echo at('Name') ?></th>
								<th width="10%"></th>								
							</tr>
						</thead>
						<tbody>
						<?php 
						foreach ($attendance_reqs as $attendance_req) 
						{
							foreach ($attendance_req as $attendance_request) {
							
							$url = Yii::app()->createUrl('attendances/beritaacara&id='.$attendance_request->attendance_id);													
							
							if($attendance_request->created_by=='employee' and $attendance_request->status=='draft'){

							}
							else
							{
							?>
							<tr>
								<td><?php echo $attendance_request->id; ?></td>
								<td><?php echo $attendance_request->employee->code; ?></span></td>								
								<td><?php echo $attendance_request->employee->fullname; ?></span></td>								
								<td><a href="<?php echo $url; ?>">Berita Acara</a></td>													
							</tr>
							<?php
							}
							}							
						}																										
						?>												
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
		<!-- END SALES BLOCK -->
		
	</div>

	<?php } ?>

</div>