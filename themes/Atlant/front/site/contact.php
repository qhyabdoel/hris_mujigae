<!-- page content wrapper -->
<div class="page-content-wrap bg-light">
	<!-- page content holder -->
	<div class="page-content-holder no-padding">
		<!-- page title -->
		<div class="page-title">                            
			<h1>Contacts Us</h1>
			<!-- breadcrumbs -->
			<ul class="breadcrumb">
				<li><a href="index.html">Home</a></li>
				<li><a href="#">Pages</a></li>
				<li class="active">Contacts</li>
			</ul>               
			<!-- ./breadcrumbs -->
		</div>
		<!-- ./page title -->
	</div>
	<!-- ./page content holder -->
</div>
<!-- ./page content wrapper -->

			   
<!-- page content wrapper -->
<div class="page-content-wrap">                    
	
	<div id="google-map" style="width: 100%; height: 300px;"></div>
	
</div>
<!-- ./page content wrapper -->

<!-- page content wrapper -->
<div class="page-content-wrap">                    
	
	<div class="divider"><div class="box"><span class="fa fa-angle-down"></span></div></div>                    
	
	<!-- page content holder -->
	<div class="page-content-holder">
	
		<div class="row">
			<div class="col-md-7 this-animate" data-animate="fadeInLeft">
				
				<div class="text-column">
					<h4>Contact Us</h4>
					<div class="text-column-info">
						Proin luctus nulla fringilla massa euismod commodo. Donec sit amet elementum libero. Curabitur ut lorem id tellus malesuada tincidunt et eget purus. 
					</div>
				</div>
				
				<?php if(Yii::app()->user->hasFlash('contact')): ?>
				<div class="flash-success">
					<?php echo Yii::app()->user->getFlash('contact'); ?>
				</div>
				<?php endif; ?>
				
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'contact-form',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
				)); ?>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php echo $form->labelEx($model,'name'); ?>
							<?php echo $form->textField($model,'name', array('class'=>'form-control')); ?>
							<?php echo $form->error($model,'name'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<?php echo $form->labelEx($model,'email'); ?>
							<?php echo $form->textField($model,'email', array('class'=>'form-control')); ?>
							<?php echo $form->error($model,'email'); ?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<?php echo $form->labelEx($model,'subject'); ?>
							<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'subject'); ?>
						</div>
						<div class="form-group">
							<?php echo $form->labelEx($model,'body'); ?>
							<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'body'); ?>
						</div>
						<?php echo CHtml::submitButton('Send Message', array('class'=>'btn btn-primary btn-lg pull-right')); ?>
					</div>
				</div>
				
				<?php $this->endWidget(); ?>
				
			</div>
			<div class="col-md-5 this-animate" data-animate="fadeInRight">
				
				<div class="text-column text-column-centralized">
					<div class="text-column-icon">
						<span class="fa fa-home"></span>
					</div>                                    
					<h4>Our Office</h4>
					<div class="text-column-info">
						<p><strong><span class="fa fa-map-marker"></span> Address: </strong> Jl. Joe No 35 Lenteng Agung, Jakarta Selatan</p>
						<p><strong><span class="fa fa-phone"></span> Phone: </strong> 021-788 47200</p>
						<p><strong><span class="fa fa-envelope"></span> E-mail: </strong> <a href="#">sales@kwartorajawali.co.id</a></p>
					</div>
				</div>
				
				<div class="text-column text-column-centralized">
					<div class="text-column-icon">
						<span class="fa fa-clock-o"></span>
					</div>
					<h4>Bussines Hours</h4>
					<div class="text-column-info">
						<p><strong>Monday &mdash; Friday</strong>: 08:00 - 17:00</p>
						<p><strong>Saturday &mdash; Sunday</strong>: 08:00am - 14:00</p>
					</div>
				</div>
				
			</div>
		</div>
		
	</div>
	<!-- ./page content holder -->
</div>
<!-- ./page content wrapper -->


<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
        
<script type="text/javascript">
	
	var mapCords = new google.maps.LatLng(-6.893873, 107.605182);
	var mapOptions = {zoom: 14,center: mapCords, mapTypeId: google.maps.MapTypeId.ROADMAP}    
	var map = new google.maps.Map(document.getElementById("google-map"), mapOptions);

	var cords = new google.maps.LatLng(-6.893873, 107.605182);
	var marker = new google.maps.Marker({position: cords, 
										 map: map, 
										 title: "Marker 1",
										 }
									   );
							   
</script>


<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
/*
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; */?>