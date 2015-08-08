<?php 
$mutation_requests 	= MutationsRequest::model()->findAll();
$attendance_offs 	= AttendancePresencesRequestOff::model()->findAllByAttributes(array('status'=>'saved'));
?>

<div class="row">
	<div class="col-md-7">
		
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
	<div class="col-md-5">
		
		<!-- START PROJECTS BLOCK -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title-box">
					<h3><?php echo at('Outlets'); ?></h3>
					<span><?php echo at('Current Employee Needed'); ?></span>
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
								<th width="70%"><?php echo at('Outlet Name') ?></th>
								<th width="10%"><?php echo at('Base') ?></th>
								<th width="10%"><?php echo at('Current') ?></th>
								<th width="10%"><?php echo at('Needed') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php $outlets = MastersOutlets::model()->findAll(); ?>
							<?php foreach ($outlets as $outlet) { ?>
								<tr>
									<td><strong><?php echo $outlet->name; ?></strong></td>
									<td><?php echo $outlet->employee_needed; ?></td>
									<td><?php echo $outlet->employeeCount; ?></td>
									<td><span class="label <?php echo ($outlet->employeeCount < $outlet->employee_needed ? 'label-danger' : ($outlet->employeeCount < $outlet->employee_needed ? 'label-success' : 'label-warning')) ?>"><?php echo $outlet->employeeCount - $outlet->employee_needed ?></span></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
		<!-- END PROJECTS BLOCK -->
		
	</div>
</div>

<div class="row">

	<div class="col-md-7">
		<!-- START SALES BLOCK -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title-box">
					<h3><?php echo at('Notifikasi Berita Acara') ?></h3>					
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
								<th width="10%"><?php echo at('Check In') ?></th>
								<th width="10%"><?php echo at('Break Out') ?></th>
								<th width="10%"><?php echo at('Break In') ?></th>
								<th width="10%"><?php echo at('Check Out') ?></th>
								<th width="10%"><?php echo at('Type') ?></th>
								<?php 
								if(getUser()->role=='admin'){
								?><th width="10%"></th><?php
								}
								?>								
							</tr>
						</thead>
						<tbody>
						<?php 
						$attendances = AttendancePresencesRequest::model()->findAllByAttributes(array(
							'status'=>'saved',
						));												

						foreach ($attendances as $attendance) {
							$show = 0;

							if($attendance->created_by=='rm') $show = 1;
							if($attendance->created_by=='kadept') $show = 1;
							if($attendance->approved_by=='rm') $show = 1;
							if($attendance->approved_by=='kadept') $show = 1;

							$url = Yii::app()->createUrl('attendances/beritaacara_view&id='.$attendance->id);

							if($show == 1){
							?>
							<tr>
								<td><?php echo $attendance->id; ?></td>
								<td><?php echo $attendance->employee->code; ?></span></td>								
								<td><?php echo $attendance->employee->fullname; ?></span></td>								
								<td><?php echo $attendance->date; ?></span></td>
								<td><?php echo $attendance->shift_id; ?></span></td>
								<td><?php echo $attendance->check_in; ?></span></td>
								<td><?php echo $attendance->break_out; ?></span></td>
								<td><?php echo $attendance->break_in; ?></span></td>
								<td><?php echo $attendance->check_out; ?></span></td>
								<td><?php echo $attendance->type; ?></span></td>
								<?php 
								if(getUser()->role=='admin'){
								?><td><a href="<?php echo $url; ?>">Berita Acara</a></td><?php
								}
								?>														
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
</div>

<div class="row">
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
							foreach ($attendance_offs as $attendance_off) {
							
							$Action 	= 'Approve';
							$url_off 	= Yii::app()->createUrl('attendance/off/view&id='.$attendance_off->id);
															
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
						?>												
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
		<!-- END SALES BLOCK -->
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title-box">
					<h3><?php echo at('Employee Turn Over') ?></h3>
					<span><?php echo at('Employee Turn Over') ?></span>
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
			<div class="panel-body padding-0">
				<div class="chart-holder" id="dashboard-bar-1" style="height: 200px;"></div>
			</div>                                    
		</div>
	</div>
</div>

<!-- START DASHBOARD CHART -->
<?php /*<div class="block-full-width">
	<div id="dashboard-chart" style="height: 250px; width: 100%; float: left;"></div>
	<div class="chart-legend">
		<div id="dashboard-legend"></div>
	</div>                                                
</div>*/?>                  
<!-- END DASHBOARD CHART -->

<?php JsHelper::graphMorrisJs() ?>

<script type="text/javascript">
$(function(){        
    Morris.Bar({
        element: 'dashboard-bar-1',
        data: [
            { y: 'Jan 15', a: 75, b: 35 },
            { y: 'Feb 15', a: 64, b: 26 },
            { y: 'Mar 15', a: 78, b: 39 },
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['New', 'Resign'],
        barColors: ['#33414E', '#3FBAE4'],
        gridTextSize: '10px',
        hideHover: true,
        resize: true,
        gridLineColor: '#E5E5E5'
    });
});
</script>