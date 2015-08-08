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
				<!-- <div class="profile-controls">
					<a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
					<a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
				</div> -->
			</div>                                                                        
		</li>
		<li class="xn-title">Human Resource</li>
		<li class="active">
			<?php echo CHtml::link('<span class="fa fa-desktop"></span> <span class="xn-text">'.at('Dashboards').'</span>', array('/')); ?>
		</li>
		<li>
			<?php echo CHtml::link('<span class="fa fa-files-o"></span> <span class="xn-text">'.at('Employees').'</span>', array('/employees')); ?>
		</li>
		<!-- <li class="xn-openable">
			<a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Employees</span></a>
			<ul> -->
				<!-- <li><?php /*echo CHtml::link('<span class="fa fa-user"></span>'.at('Profile'), array('/employees'));*/ ?></li> -->
				<!-- 
				<li><?php /*echo CHtml::link('<span class="fa fa-user"></span>'.at('Addresses'), array('/employee/addresses'));*/ ?></li>
				<li><?php /*echo CHtml::link('<span class="fa fa-user"></span>'.at('Familys'), array('/employee/familys'));*/ ?></li>
				<li><?php /*echo CHtml::link('<span class="fa fa-user"></span>'.at('History Educations'), array('/employee/educations'));*/ ?></li>
				<li><?php /*echo CHtml::link('<span class="fa fa-user"></span>'.at('History Employment'), array('/employee/employments'));*/ ?></li>
				<li><?php /*echo CHtml::link('<span class="fa fa-user"></span>'.at('History Rewards'), array('/employee/rewards'));*/ ?></li>
				<li><?php /*echo CHtml::link('<span class="fa fa-user"></span>'.at('Languages'), array('/employee/languages'));*/ ?></li>
				<li><?php /*echo CHtml::link('<span class="fa fa-user"></span>'.at('Salary'), array('/salary/slip'));*/ ?></li> 
				-->
			<!-- </ul>
		</li> -->
		
		<li class="xn-title"><?php echo at('Attendance'); ?></li>
		<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Attendance'), array('/attendances')); ?></li>
		<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Schedulle'), array('/attendance/schedulle')); ?></li>
		<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Leaves'), array('/leaves')); ?></li>
		
		<li class="xn-title">Settings</li>
		<li class="xn-openable">
			<a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Logs</span></a>                        
			<ul>
				<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Logs'), array('/log')); ?></li>
				<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Login History'), array('/log/loginhistory')); ?></li>
			</ul>
		</li>
	</ul>
	<!-- END X-NAVIGATION -->
</div>