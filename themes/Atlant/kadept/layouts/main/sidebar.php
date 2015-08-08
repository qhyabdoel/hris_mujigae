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
		<li>
			<?php echo CHtml::link('<span class="fa fa-files-o"></span> <span class="xn-text">'.at('Employees').'</span>', array('/employees')); ?>
		</li>
		
		<li class="xn-title"><?php echo at('Attendance'); ?></li>
		<?php if(getUser()->role=='rm'){
			?>
			<li class="xn-openable">
				<a href="#"><span class="fa fa-cogs"></span> <span class="xn-text"> <?php echo at('Attendance') ?></span></a>
				<ul>
					<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Attendance'), array('/attendances')); ?></li>
					<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Attendance Off'), array('attendance/off')); ?></li>
					<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Berita Acara'), array('/attendances/beritaacara_index')); ?></li>
				</ul>
			</li>
			<?php
		}else{
			?>
			<li class="xn-openable">
				<a href="#"><span class="fa fa-cogs"></span> <span class="xn-text"> <?php echo at('Attendance') ?></span></a>
				<ul>
					<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Attendance'), array('/attendances')); ?></li>
					<li><?php echo CHtml::link('<span class="fa fa-heart"></span>'.at('Berita Acara'), array('/attendances/beritaacara_index')); ?></li>
				</ul>
			</li>
			<?php
		} ?>		
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