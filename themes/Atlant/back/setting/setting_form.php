<?php $label_class = 'col-md-3 col-xs-12 control-label'; ?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'title', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'title', array('class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'title'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'description', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'description', array('class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'description'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'settingkey', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'settingkey', array('class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'settingkey'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'category', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'category', Setting::model()->getGroups(), array( 'prompt' => at('-- Choose Value --'), 'class' => 'validate[required] form-control select' )); ?>
						<?php echo CHtml::error($model, 'category'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'type', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeDropDownList($model, 'type', Setting::model()->getTypes(), array( 'prompt' => at('-- Choose Value --'), 'class' => 'validate[required] form-control select' )); ?>
						<?php echo CHtml::error($model, 'type'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'default_value', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextArea($model, 'default_value', array('class'=>'form-control')); ?>
						<?php echo CHtml::error($model, 'default_value'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'value', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextArea($model, 'value', array('class'=>'form-control')); ?>
						<?php echo CHtml::error($model, 'value'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'extra', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextArea($model, 'extra', array('class'=>'form-control')); ?>
						<br /><span class="subtip"><?php echo at("Enter extra data that will be used to create the dropdown list or multi select list. One option per line key=value.<br />Example:<br />m=Male<br />f=Female<br />u=Unknown") ?></span>
						<?php echo CHtml::error($model, 'extra'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'php', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextArea($model, 'php', array('class'=>'form-control')); ?>
						<br /><span class="subtip"><?php echo at('Enter PHP code that will be executed when the setting is shown, saved or stored to the database.<br />Info:<br /> <b>$show</b> - When the setting is being displayed.<br /><b>$save</b> - When the setting is edited through the setting form.<br /><b>$store</b> - When the setting value is being stored to the database through the group view page.') ?></span>
						<?php echo CHtml::error($model, 'php'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'is_protected', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeCheckBox($model, 'is_protected', array('class'=>'form-control icheckbox')); ?>
						<br /><span class="subtip"><?php echo at('By checking this option you will not be able to delete the setting through the admin panel.') ?></span>
						<?php echo CHtml::error($model, 'is_protected'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'group_title', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'group_title', array('class'=>'form-control')); ?>
						<br /><span class="subtip"><?php echo at("Enter a title to group this settings and the next ones after it in a group of settings until you close it by checking the close opened group checkbox.") ?></span>
						<?php echo CHtml::error($model, 'group_title'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'group_close', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeCheckBox($model, 'group_close', array('class'=>'form-control icheckbox')); ?>
						<br /><span class="subtip"><?php echo at("If you've entered a group title for a setting you may close that opened group by checking this checkbox to close it.") ?></span>
						<?php echo CHtml::error($model, 'group_close'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'sort_ord', array('class' => $label_class)); ?>
					<div class="col-md-6 col-xs-12">
						<?php echo CHtml::activeTextField($model, 'sort_ord', array('class' => 'validate[custom[number]] form-control')); ?>
						<?php echo CHtml::error($model, 'sort_ord'); ?>
					</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary pull-right')); ?>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>