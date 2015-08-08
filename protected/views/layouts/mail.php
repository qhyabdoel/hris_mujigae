<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body style="font:10pt Georgia,'Times New Roman',Times,serif; color:#555;">
  <div style="float:left;min-width:300px; width:50%;">
    <?php
      echo CHtml::image(Yii::app()->baseUrl.'/images/mail/logo.png', 'logo',
                        array('width' => 300, 'height' => 90, 'style' => 'margin:0 70px 5px 0px;'));
    ?>    
  </div>
  <div style="float:left; text-align: right; padding-top:60px; width:50%;">
    <?php echo date("j F Y"); ?>
  </div>

<div style="clear:both; border-top:1px solid #E5E5E5; padding: 10px 0;">
<?php
  echo $content;
  echo "<br>";
?>
</div>

<div class="footer" style="border-top:1px solid #E5E5E5; padding: 5px 0;">
  <div style="float:left; width:50%;">
      <div style="color:red"><?php echo Yii::t('general', 'Sales Information'); ?></div>
      <div> 
        <?php echo Yii::t('general', 'Email'); ?> :
        <?php echo CHtml::link(yiiparam('salesemail'), 'mailto:'.yiiparam('salesemail'), array()); ?>
      </div>          
  </div>
  <div style="float:left; width:50%;">
      <div class="span4" style="color:red"><?php echo Yii::t('general', 'Support Information'); ?></div>
      <div class="span4"> <?php echo Yii::t('general', 'Phone').' : '.yiiparam('contact_phone'); ?></div>      
      <div class="span4"> 
        <?php echo Yii::t('general', 'Email'); ?> :
        <?php echo CHtml::link(yiiparam('supportemail'), 'mailto:'.yiiparam('supportemail'), array()); ?>
      </div>          
  </div>
</div>

<div class="row-fluid">
  <div class="span12 footer" >
    <div class="row-fluid">
    </div>
    <div class="row-fluid">
    </div>
  </div>
</div>
</body>
</html>
