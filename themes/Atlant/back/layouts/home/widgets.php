<div class="col-md-3">
	
	<!-- START WIDGET SLIDER -->
	<div class="widget widget-default widget-carousel">
		<div class="owl-carousel" id="owl-example">
			<div>                                    
				<div class="widget-title"><?php echo at('New Employee'); ?></div>
				<div class="widget-subtitle"><?php echo date('M, Y'); ?></div>
				<div class="widget-int"><?php echo count(MastersEmployees::model()->withNewHire()->findAll()) ?></div>
			</div>
			<div>                                    
				<div class="widget-title"><?php echo at('Resigned'); ?></div>                                                                        
				<div class="widget-subtitle"><?php echo date('M, Y'); ?></div>
				<div class="widget-int"><?php echo count(MastersEmployees::model()->withNewResign()->findAll()) ?></div>
			</div>
		</div>                            
		<div class="widget-controls">                                
			<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
		</div>                             
	</div>         
	<!-- END WIDGET SLIDER -->
	
</div>

<div class="col-md-3">
	
	<!-- START WIDGET MESSAGES -->
	<div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
		<div class="widget-item-left">
			<span class="fa fa-envelope custom-widget"></span>
		</div>                             
		<div class="widget-data">
			<div class="widget-int num-count">48</div>
			<div class="widget-title">New messages</div>
			<div class="widget-subtitle">In your mailbox</div>
		</div>      
		<div class="widget-controls">                                
			<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
		</div>
	</div>                            
	<!-- END WIDGET MESSAGES -->
	
</div>
<div class="col-md-3">
	
	<!-- START WIDGET REGISTRED -->
	<div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
		<div class="widget-item-left">
			<span class="fa fa-user custom-widget"></span>
		</div>
		<div class="widget-data">
			<div class="widget-int num-count"><?php echo count(MastersEmployees::model()->withActive()->findAll()) ?></div>
			<div class="widget-title"><?php echo at('Total Employee'); ?></div>
			<div class="widget-subtitle"><?php echo at('Active Employee'); ?></div>
		</div>
		<div class="widget-controls">                                
			<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
		</div>                            
	</div>                            
	<!-- END WIDGET REGISTRED -->
	
</div>
<div class="col-md-3">
	
	<!-- START WIDGET CLOCK -->
	<div class="widget widget-danger widget-padding-sm">
		<div class="widget-big-int plugin-clock">00:00</div>                            
		<div class="widget-subtitle plugin-date">Loading...</div>
		<div class="widget-controls">                                
			<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
		</div>                            
		<div class="widget-buttons widget-c3">
			<div class="col">
				<a href="#"><span class="fa fa-clock-o"></span></a>
			</div>
			<div class="col">
				<a href="#"><span class="fa fa-bell"></span></a>
			</div>
			<div class="col">
				<a href="#"><span class="fa fa-calendar"></span></a>
			</div>
		</div>                            
	</div>                        
	<!-- END WIDGET CLOCK -->
</div>