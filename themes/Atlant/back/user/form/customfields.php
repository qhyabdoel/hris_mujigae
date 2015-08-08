<?php $customFields = UserCustomField::model()->getFieldsForAdmin(); ?>
<?php if(count($customFields)): ?>
	<?php foreach($customFields as $customField): ?>
		<div class="grid-3-12"><?php echo CHtml::label($customField->getTitle(), $customField->getKey()); ?></div>
		<div class="grid-9-12">
			<?php echo $customField->getFormField($model->id); ?>
		</div>
		<div class="clear"></div>
		<hr />
	<?php endforeach; ?>
<?php else: ?>
	<b><?php echo at('There are no custom fields to display.'); ?></b>
<?php endif; ?>