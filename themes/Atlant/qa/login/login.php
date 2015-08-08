<?php 
// print_r($form);die();
echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal')); ?>

<div class="form-group">
	<div class="col-md-12">
		<?php echo CHtml::activeTextField($form, 'nik', array('class' => 'validate[required] form-control', 'placeholder' => at('NIK'))); ?>
		<?php echo CHtml::error($form, 'nik'); ?>
	</div>
</div>

<div class="form-group">
	<div class="col-md-12">
		<?php echo CHtml::activePasswordField($form, 'password', array('class' => 'validate[required,custom[passwordLogin]] form-control', 'placeholder' => at('Password'))); ?>
		<?php echo CHtml::error($form, 'password'); ?>
	</div>
</div>

<div class="form-group">
	<div class="col-md-6">
		<?php echo CHtml::activeTextField($form, 'verifyCode', array('class' => 'validate[required] form-control', 'placeholder' => at('Captcha Verification'))); ?>
		<?php echo CHtml::error($form, 'verifyCode'); ?>
	</div>

	<div class="col-md-6">
		<?php $this->widget('CCaptcha', array('imageOptions' => array('class' => 'captcha-image'), 'buttonOptions' => array('class' => 'button-refresh-link'))); ?>
	</div>
</div>

<!--Form footer begin-->
<div class="form-group">
	<div class="col-md-6">
		<a href="#" class="btn btn-link btn-block">Forgot your password?</a>
	</div>
	<div class="col-md-6">
		<input type="submit" value="Login" class="btn btn-info btn-block" />
	</div>
</div>
<!--Form footer end-->
	
<?php echo CHtml::endForm(); ?>