<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo themeUrl('css/revolution-slider/extralayers.css'); ?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo themeUrl('css/revolution-slider/settings.css'); ?>" media="screen" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo themeUrl('css/styles.css'); ?>" media="screen" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<script type="text/javascript" src="<?php echo themeUrl('js/plugins/jquery/jquery.min.js'); ?>"></script>
</head>

<body>

<div class="page-container">

	<div class="page-header">
		<!-- page header holder -->
		<div class="page-header-holder">
			
			<!-- page logo -->
			<div class="logo">
				<a href="index.html">Mujigae Resto</a>
			</div>
			<!-- ./page logo -->

			<!-- nav mobile bars -->
			<div class="navigation-toggle">
				<div class="navigation-toggle-button"><span class="fa fa-bars"></span></div>
			</div>
			<!-- ./nav mobile bars -->
			
			<!-- navigation -->
			<ul class="navigation">
				<li><?php echo CHtml::link(at('Home'), array()) ?></li>
				<li><?php echo CHtml::link(at('About Us'), array('aboutus')) ?></li>
				<li><?php echo CHtml::link(at('Contacts'), array('contact')) ?></li>
				<li><?php echo CHtml::link(at('Admin Web'), 'backend.php') ?></li>
				<li><?php echo CHtml::link(at('Qa Web'), 'qa.php') ?></li>
				<li><?php echo CHtml::link(at('Manager Web'), 'kadept.php') ?></li>
				<li><?php echo CHtml::link(at('Employee Web'), 'employee.php') ?></li>
			</ul>
			<!-- ./navigation -->
		</div>
		<!-- ./page header holder -->
	</div>
	
	<div class="page-content">
		<?php echo $content; ?>
	</div>
	
	<div class="page-footer">
		<!-- page footer wrap -->
		<div class="page-footer-wrap bg-dark-gray">
			<!-- page footer holder -->
			<div class="page-footer-holder page-footer-holder-main">
										
				<div class="row">
					
					<!-- about -->
					<div class="col-md-3">
						<h3>About Mujigae</h3>
						<p>Mujigae resto merupakan restauran indonesia yang menyajikan menu korea. Lorem ipsum dolor natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.</p>
					</div>
					<!-- ./about -->
					
					<!-- quick links -->
					<div class="col-md-3">
						<h3>Quick links</h3>
						
						<div class="list-links">
							<a href="#">Home</a>                                    
							<a href="#">About Us</a>
							<a href="#">Contact Us</a>
						</div>                                
					</div>
					<!-- ./quick links -->
					
					<!-- recent tweets -->
					<div class="col-md-3">
						<h3>Recent Tweets</h3>
						
						<?php
$this->widget('ext.new-tweet.Tweets', array(
    'id' => 'twitter-feed',
    'csrfToken' => true,
    'proxyController' => $this->createUrl('bookmark/get_tweets'),
    'username' => array('google', 'facebook', 'twitter'),
    'cssFile' => false,
    //'cssFile'=>Yii::app()->theme->baseUrl.'/css/tweet-master.css', // customize your twitter css file
    'options' => array(
        'avatar_size' => 32,
        'template' => '{user} {text} - {time} - {reply_action} - {retweet_action} - {favorite_action}',
        'count' => 6
    )
));
						?>
						
						<div class="list-with-icon small">
							<div class="item">
								<div class="icon">
									<span class="fa fa-twitter"></span>
								</div>
								<div class="text">
									<a href="#">@MujigaeResto</a> anyeonghaseo :D"@kurniatydewi: Finally,, ke @MujigaeResto,, ramyun pancinya top, sambil nntn Running Man dan request lagu,, kamsahamnida,,
								</div>
							</div>
							<div class="item">
								<div class="icon">
									<span class="fa fa-twitter"></span>
								</div>
								<div class="text">
									<a href="#">@keshyavalerie</a> Yesterday's meal : @MujigaeResto 's Cheese Kimchi Fried Rice + Matcha Drink! 💕👌✨😻 
								</div>
							</div>
							<div class="item">
								<div class="icon">
									<span class="fa fa-twitter"></span>
								</div>
								<div class="text">
									<a href="#">@MKGLaPiazza</a> Nggak perlu jauh2 ke Korea untuk cobain menu makanan bibimbap yang enak ! Ke @MujigaeResto Gourmet Walk MKG aja.. 
								</div>
							</div>
						</div>
						
					</div>
					<!-- ./recent tweets -->
					
					<!-- contacts -->
					<div class="col-md-3">
						<h3>Contacts</h3>
						
						<div class="footer-contacts">
							<div class="fc-row">
								<span class="fa fa-home"></span>
								PT. KWARTO RAJAWALI<br/>
								Jl. Joe No 35 Lenteng Agung,<br/> 
								Jakarta Selatan
							</div>
							<div class="fc-row">
								<span class="fa fa-phone"></span>
								021-788 47200
							</div>
							<div class="fc-row">
								<span class="fa fa-envelope"></span>
								<strong>Sales Marketing</strong><br>
								<a href="mailto:#">sales@kwartorajawali.co.id</a>
							</div>                                    
						</div>
						
						<h3>Subscribe</h3>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Your email"/>
							<div class="input-group-btn">
								<button class="btn btn-primary"><span class="fa fa-paper-plane"></span></button>
							</div>
						</div>
						
					</div>
					<!-- ./contacts -->
					
				</div>
				
			</div>
			<!-- ./page footer holder -->
		</div>
		<!-- ./page footer wrap -->
		
		<!-- page footer wrap -->
		<div class="page-footer-wrap bg-darken-gray">
			<!-- page footer holder -->
			<div class="page-footer-holder">
				
				<!-- copyright -->
				<div class="copyright">
					&copy; 2014 PT. Kwarto Rajawali - All Rights Reserved                            
				</div>
				<!-- ./copyright -->
				
				<!-- social links -->
				<div class="social-links">
					<a href="https://www.facebook.com/mujigaeresto"><span class="fa fa-facebook"></span></a>
					<a href="https://twitter.com/MujigaeResto"><span class="fa fa-twitter"></span></a>
					<a href="#"><span class="fa fa-google-plus"></span></a>
					<a href="#"><span class="fa fa-linkedin"></span></a>
					<a href="#"><span class="fa fa-vimeo-square"></span></a>
					<a href="#"><span class="fa fa-dribbble"></span></a>
				</div>                        
				<!-- ./social links -->
				
			</div>
			<!-- ./page footer holder -->
		</div>
		<!-- ./page footer wrap -->
	</div>

</div><!-- page -->


<script type="text/javascript" src="<?php echo themeUrl('js/plugins/bootstrap/bootstrap.min.js'); ?>"></script>

<script type='text/javascript' src="<?php echo themeUrl('js/plugins/mixitup/jquery.mixitup.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/plugins/appear/jquery.appear.js'); ?>"></script>
        
<script type="text/javascript" src="<?php echo themeUrl('js/plugins/revolution-slider/jquery.themepunch.tools.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/plugins/revolution-slider/jquery.themepunch.revolution.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo themeUrl('js/fe-actions.js'); ?>"></script>
<script type="text/javascript" src="<?php echo themeUrl('js/slider.js'); ?>"></script>

</body>
</html>
