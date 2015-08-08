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
	</ul>
	<!-- END X-NAVIGATION -->
</div>