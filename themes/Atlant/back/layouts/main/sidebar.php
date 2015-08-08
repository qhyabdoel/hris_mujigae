<?php
$mainmenu = array(
	
);

$employee = getUser()->getEmployee();
?>
<div class="page-sidebar">
	<!-- START X-NAVIGATION -->
	<ul class="x-navigation">
		<li class="xn-logo">
			<a href="index.html">HRIS - Mujigae</a>
			<a href="#" class="x-navigation-control"></a>
		</li>
		<li class="xn-profile">
			<a href="#" class="profile-mini">
				<img src="<?php echo $employee->getPhoto() ?>" alt="<?php echo getUser()->name; ?>"/>
			</a>
			<div class="profile">
				<div class="profile-image">
					<img src="<?php echo $employee->getPhoto() ?>" alt="<?php echo getUser()->name; ?>"/>
				</div>
				<div class="profile-data">
					<div class="profile-data-name"><?php echo $employee->code; ?></div>
					<div class="profile-data-title"><?php echo $employee->getFullname(); ?></div>
				</div>				
			</div>                                                                        
		</li>
		<li class="xn-title">Human Resource</li>
		<li class="active">
			<?php echo CHtml::link('<span class="fa fa-desktop"></span> <span class="xn-text">'.at('Dashboards').'</span>', array('/')); ?>
		</li>
		<li class="xn-openable">
			<a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Employees</span></a>
			<ul>
				<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('Employees'), array('/employees')); ?></li>
				<li class="xn-openable">
					<a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">History</span></a>
					<ul>
						<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('Addresses'), array('/employee/addresses')); ?></li>
						<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('Familys'), array('/employee/familys')); ?></li>
						<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('History Educations'), array('/employee/educations')); ?></li>
						<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('History Employment'), array('/employee/employments')); ?></li>
						<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('History Rewards'), array('/employee/rewards')); ?></li>
						<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('History Trainings'), array('/employee/trainings')); ?></li>
						<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('Languages'), array('/employee/languages')); ?></li>
					</ul>
				</li>
				<li class="xn-openable">
					<a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Employment</span></a>
					<ul>
						<!--li><?php //echo CHtml::link('<span class="fa fa-user"></span>'.at('Extend Contract'), array('/employee/contract')); ?></li-->
						<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('MCU'), array('/employee/mcu')); ?></li>
						<!--li><?php //echo CHtml::link('<span class="fa fa-user"></span>'.at('Appointment'), array('/employee/appointment')); ?></li-->
						<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('Termination'), array('/employee/termination')); ?></li>
					</ul>
				</li>
			</ul>
		</li>
		<li class="xn-openable">
			<a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Masters</span></a>
			<ul>
				<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('Departments'), array('/departments')); ?></li>
				<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('Sections'), array('/sections')); ?></li>
				<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('Positions'), array('/positions')); ?></li>
				<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('Outlets'), array('/outlets')); ?></li>
			</ul>
		</li>
		<li class="xn-openable">
			<a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Reference</span></a>
			<ul>
				<li><?php echo CHtml::link(at('Religions'), array('/religions')); ?></li>
				<li><?php echo CHtml::link(at('Languages'), array('/languages')); ?></li>
				<li><?php echo CHtml::link(at('Educations'), array('/educations')); ?></li>
				<li><?php echo CHtml::link(at('Training Types'), array('/trainingtypes')); ?></li>
				<!--li><?php //echo CHtml::link(at('Ethnics'), array('/ethnics')); ?></li-->
				<li class="xn-openable">
					<a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Geography</span></a>                        
					<ul>
						<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Countries'), array('/geography/countries')); ?></li>
						<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('States'), array('/geography/states')); ?></li>
						<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Cities'), array('/geography/cities')); ?></li>
						<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Districts'), array('/geography/districts')); ?></li>
					</ul>
				</li>
			</ul>
		</li>
		
		<li class="xn-title"><?php echo at('Attendance'); ?></li>
		<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Attendance'), array('/attendances')); ?></li>
		<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Schedulle'), array('/attendance/schedulle')); ?></li>
		
		<li class="xn-openable">
			<a href="#"><span class="fa fa-cogs"></span> <span class="xn-text"> <?php echo at('Absence') ?></span></a>
			<ul>
				<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Absence Permission'), array('attendance/absence/create')); ?></li>
				<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Absences'), array('attendance/absence')); ?></li>
			</ul>
		</li>
		<li class="xn-openable">
			<a href="#"><span class="fa fa-cogs"></span> <span class="xn-text"> <?php echo at('Leaves') ?></span></a>
			<ul>
				<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Leave Request'), array('/leaves/create')); ?></li>
				<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Leaves'), array('/leaves')); ?></li>
			</ul>
		</li>
		<li class="xn-openable">
			<a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Reference</span></a>
			<ul>
				<li><?php echo CHtml::link(at('Shifts'), array('/attendance/shifts')); ?></li>
			</ul>
		</li>
		
		
		<li class="xn-title">Payroll</li>
		<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Cities'), array('/payroll/cities')); ?></li>
		<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('UMP'), array('/payroll/ump')); ?></li>
		<li class="xn-openable">
			<a href="#"><span class="fa fa-cogs"></span> <span class="xn-text"> <?php echo at('Salaries') ?></span></a>
			<ul>
				<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Standard Salary'), array('/standardsalary')); ?></li>
				<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('Employee\'s Salaries'), array('/payroll/salary')); ?></li>
				<li><?php echo CHtml::link('<span class="fa fa-user"></span>'.at('Employee\'s Payments'), array('/payroll/payments')); ?></li>
			</ul>
		</li>
		<li class="xn-openable">
			<a href="#"><span class="fa fa-cogs"></span> <span class="xn-text"> <?php echo at('Allowances') ?></span></a>
			<ul>
				<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Allowances'), array('/allowances')); ?></li>
				<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Allowance Groups'), array('/allowance/groups')); ?></li>
			</ul>
		</li>
		
		
		<li class="xn-title"><?php echo at('Reports'); ?></li>
		<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Attendance'), array('/attendances')); ?></li>
		
		<!-- <li><?php /*echo CHtml::link('<span class="fa fa-heart"></span>'.at('Import Attendance'), array('/attendances/import'));*/ ?></li> -->
	</ul>
	<!-- END X-NAVIGATION -->
</div>