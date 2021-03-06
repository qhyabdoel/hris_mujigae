<div class="form-group">
	<?php echo CHtml::label(at('Additional Roles'), 'roles', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">   
		<?php echo CHtml::listBox('roles', isset($_POST['roles']) ? $_POST['roles'] : isset($items_selected[ CAuthItem::TYPE_ROLE ]) ? $items_selected[ CAuthItem::TYPE_ROLE ] : '', $items[ CAuthItem::TYPE_ROLE ], array( 'size' => 20, 'multiple' => 'multiple', 'class'=>'form-control' )); ?>
	</div>
</div>

<div class="form-group">
	<?php echo CHtml::label(at('Additional Tasks'), 'tasks', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">   
		<?php echo CHtml::listBox('tasks', isset($_POST['tasks']) ? $_POST['tasks'] : isset($items_selected[ CAuthItem::TYPE_TASK ]) ? $items_selected[ CAuthItem::TYPE_TASK ] : '', $items[ CAuthItem::TYPE_TASK ], array( 'size' => 20, 'multiple' => 'multiple', 'class'=>'form-control')); ?>
	</div>
</div>

<div class="form-group">
	<?php echo CHtml::label(at('Additional Operations'), 'operations', array('class' => $label_class)); ?>
	<div class="col-md-6 col-xs-12">   
		<?php echo CHtml::listBox('operations', isset($_POST['operations']) ? $_POST['operations'] : isset($items_selected[ CAuthItem::TYPE_OPERATION ]) ? $items_selected[ CAuthItem::TYPE_OPERATION ] : '', $items[ CAuthItem::TYPE_OPERATION ], array( 'size' => 20, 'multiple' => 'multiple', 'class'=>'form-control' )); ?>
	</div>
</div>