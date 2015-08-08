<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Generate Recapitulation'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<?php $label_class = 'col-md-3 col-xs-12 control-label'; ?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="form-inline">
					<?php //echo CHtml::activeLabelEx($model, 'start_date', array('class' => $label_class)); ?>
					<?php echo at('Payment Periode'); ?> : &nbsp; &nbsp; 
					<div class="input-group">
						<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
						<?php echo CHtml::activeTextField($model, 'start_date', array('class' => 'form-control datepicker')); ?>
					</div>
				
					<?php //echo CHtml::activeLabelEx($model, 'end_date', array('class' => $label_class)); ?>
					&nbsp; &nbsp; To: &nbsp; &nbsp; 
					<div class="input-group">
						<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
						<?php echo CHtml::activeTextField($model, 'end_date', array('class' => 'form-control datepicker')); ?>
					</div>
				</div>
			</div>

			<div class="panel-body">
				<?php
				$deparments = MastersDepartments::model()->findAll(array(
						 'condition' => 'parent_id IS NULL',
					));
				?>

				<div class="row" style="text-align: right">
					<button class="btn btn-primary" id="generate_recap"><?php echo at('STEP 1 :').' '.at('Generate ALL RECAP'); ?></button>
					<button class="btn btn-warning" id="generate_recap"><?php echo at('STEP 2 :').' '.at('Generate ALL PAYMENTS'); ?></button>
					<button class="btn btn-info" id="generate_recap"><?php echo at('STEP 3 :').' '.at('PAID ALL'); ?></button>
				</div><br/>

				<table class="table">
				<thead>
					<tr><th><?php echo at('Seq'); ?></th>
						<th><?php echo at('Department'); ?></th>
						<th><?php echo at('Employees'); ?></th>
						<th><?php echo at('Presence Recap'); ?></th>
						<th><?php echo at('Payments'); ?></th>
						<th><?php echo at('Action'); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php $i = 1; foreach ($deparments as $deparment) { ?>
					<tr role="row" class="<?php echo ($i%2) == 1 ? 'odd' : 'even'; ?>">
						<td><?php echo $i; ?></td>
						<td><?php echo $deparment->name; ?></td>
						<td><?php echo count($deparment->mastersEmployees); ?></td>
						<td class="field_presences"><strong>0</strong> <button class="btn btn-primary pull-right" id="gen_<?php echo $deparment->id; ?>"><?php echo at('Gen'); ?></button></td>
						<td class="field_payments"><strong>0</strong> <button class="btn btn-warning pull-right" id="genpay_<?php echo $deparment->id; ?>"><?php echo at('Gen'); ?></button></td>
						<td><i class="fa fa-list"></i>
							<i class="fa fa-download"></i>
							<i class="fa fa-print"></i>
						</td>
					</tr>
					
					<?php
					$deparment_childs = MastersDepartments::model()->findAll(array(
							 'condition' => 'parent_id = :parent_id',
							 'params' => array(':parent_id' => $deparment->id),
						));
					?>
					<?php foreach ($deparment_childs as $child) { ?>
						<tr role="row" class="<?php echo $i % 1 == 1 ? 'odd' : 'even'; ?>">
							<td><?php echo $i; ?></td>
							<td> &nbsp; <i class="fa fa-ellipsis-h"></i> &nbsp; &nbsp; <?php echo $child->name; ?></td>
							<td><?php echo count($child->mastersEmployees); ?></td>
							<td class="field_presences"><strong>0</strong> <button class="btn btn-primary pull-right" id="gen_<?php echo $child->id; ?>"><?php echo at('Gen'); ?></button></td>
							<td class="field_payments"><strong>0</strong> <button class="btn btn-warning pull-right" id="genpay_<?php echo $child->id; ?>"><?php echo at('Gen'); ?></button></td>
							<td><i class="fa fa-list"></i>
								<i class="fa fa-download"></i>
								<i class="fa fa-print"></i>
							</td>
						</tr>
					<?php $i++; } ?>
				<?php $i++; } ?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<?php $this->renderPartial('/ajax/sm-choose-dialog'); ?>

<script type="text/javascript">
$(function(){
	var cur_from = '<?php echo $currentPeriode['from'] ?>';
	var cur_to = '<?php echo $currentPeriode['to'] ?>';
	
	$("select[id$=periode_type]").on('change', function(){
		if($(this).val() == 'current')
		{
			$("input[id$=start_date]").val(cur_from);
			$("input[id$=end_date]").val(cur_to);
		} else {
			$("input[id$=start_date]").val('');
			$("input[id$=end_date]").val('');
		}
	});
})
</script>