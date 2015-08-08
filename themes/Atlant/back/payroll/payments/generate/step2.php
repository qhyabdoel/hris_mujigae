<?php
$deparments = MastersDepartments::model()->findAll(array(
		 'condition' => 'parent_id IS NULL',
	));
?>

<div class="row"><button class="btn btn-primary pull-right" id="generate_recap"><?php echo at('Generate All Recap'); ?></button></div><br/>

<table class="table">
<thead>
	<tr><th><?php echo at('Seq'); ?></th>
		<th><?php echo at('Department'); ?></th>
		<th><?php echo at('Total Presence Recap'); ?></th>
		<th width="23%"><?php echo at('Action'); ?></th>
	</tr>
</thead>
<tbody>
<?php $i = 1; foreach ($deparments as $deparment) { ?>
	<tr role="row" class="<?php echo ($i%2) == 1 ? 'odd' : 'even'; ?>">
		<td><?php echo $i; ?></td>
		<td><?php echo $deparment->name; ?></td>
		<td><strong>0</strong> / <?php echo count($deparment->mastersEmployees); ?> <?php echo at('employees'); ?></td>
		<td><button class="btn btn-primary" id="gen_<?php echo $deparment->id; ?>"><?php echo at('Generate Recap'); ?></button>
			<button class="btn btn-info" id="view_<?php echo $deparment->id; ?>"><?php echo at('View Recap'); ?></button>
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
			<td><strong>0</strong> / <?php echo count($child->mastersEmployees); ?> <?php echo at('employees'); ?></td>
			<td><button class="btn btn-primary" id="gen_<?php echo $child->id; ?>"><?php echo at('Generate Recap'); ?></button>
				<button class="btn btn-info" id="view_<?php echo $child->id; ?>"><?php echo at('View Recap'); ?></button>
			</td>
		</tr>
	<?php $i++; } ?>
<?php $i++; } ?>
</tbody>
</table>