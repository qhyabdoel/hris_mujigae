<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" class="body-full-height">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title><?php echo implode(' | ', $this->title); ?></title>
	
	<!-- Global styles -->
	<link rel="stylesheet" type="text/css" href="<?php echo themeUrl('css/theme-default.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo themeUrl('css/employee.css'); ?>" />

	<?php cs()->registerCoreScript('jquery'); ?>
	<script type="text/javascript" src="<?php echo themeUrl('plugins/validator/js/languages/jquery.validationEngine-en.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo themeUrl('plugins/validator/js/jquery.validationEngine.js'); ?>"></script>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("form").validationEngine('attach', {promptPosition : "bottomRight", autoPositionUpdate : true});
	});
	</script>
</head>
<body>
	<div class="login-container">
		<div class="login-box animated fadeInDown">
			<div class="login-logo"></div>
			<div class="login-body">
				<div class="login-title"><strong><?php echo at('Welcome to Manager App') ?></strong>, <?php echo at('Please login') ?></div>
				
				<?php if(user()->hasFlash('error')): ?>
					<div class="small_alert error"><?php echo user()->getFlash('error'); ?></div>
				<?php endif; ?>
				
				<?php echo $content; ?>
			</div>
			<div class="login-footer">
				<div class="pull-left">
					&copy; 2015 HRIS
				</div>
				<div class="pull-right">
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>
