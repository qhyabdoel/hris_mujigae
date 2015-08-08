<?php
CSSFile(themeUrl('js/plugins/bootstrap/bootstrap-duallistbox.css'));
JSFile(themeUrl('js/plugins/bootstrap/bootstrap-duallistbox.js'));

$outletA = array(1=>'dewi', 2=>'novi', 3=>'vita', 4=>'sari', 5=>'gabe');
$outletB = array(11=>'diah', 12=>'nada', 13=>'andi', 14=>'parto', 15=>'akri', 15=>'dono', 15=>'kasino');
?>
<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal', 'id'=>'demoform')); ?>
<div class="row">
<div class="col-md-7">
  <select multiple="multiple" size="10" name="duallistbox_outlets[]" class="demo2">
    <?php
	foreach ($outletA as $key => $outlet)
	{
		echo '<option value="'.$key.'">'.$outlet.'</option>';
	}
	foreach ($outletB as $key => $outlet)
	{
		echo '<option value="'.$key.'" selected="selected">'.$outlet.'</option>';
	}
	?>
  </select>
</div>
</div>
<?php echo CHtml::submitButton('Submit', array('class'=>'btn btn-primary pull-right')); ?>
<?php echo CHtml::endForm(); ?>

<script type="text/javascript">
$(function(){
	var demo2 = $('select[name="duallistbox_outlets[]"]').bootstrapDualListbox({
	  nonSelectedListLabel: 'Outlet A',
	  selectedListLabel: 'Outlet B',
	  //preserveSelectionOnMove: 'moved',
	  moveOnSelect: false,
	  //nonSelectedFilter: ''
	});
	
	$("#demoform").submit(function() {
      alert($('[name="duallistbox_outlets[]"]').val());
      return true;
    });
})
</script>