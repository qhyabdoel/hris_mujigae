<?php $row = $this->parseSetting($row); ?>
<div class="form-group">
	<div class="col-md-1 col-xs-12">	
		<?php echo CHtml::textField('settingorder['.$row->id.']', $row->sort_ord, array('class'=>'form-control')); ?>
	</div>

	<?php if($row->type == 'editor'): ?>
		<div class="col-md-9 col-xs-12">
			<b><?php echo CHtml::encode($row->title); ?></b>
			<?php if( $row->value !== null && $row->default_value != $row->value ): ?>
				<span class='errorMessage'><?php echo at(' (Changed)'); ?></span>
			<?php endif; ?>
			<?php if($row->description): ?>
				<br /><span class="subtip"><?php echo CHtml::encode($row->description); ?></span>
			<?php endif; ?>
			<br />
			<?php $this->getSettingForm( $row ); ?>
		</div>
	<?php else: ?>	
		<div class="col-md-4 col-xs-12">
			<b><?php echo CHtml::encode($row->title); ?></b>
			<?php if( $row->value !== null && $row->default_value != $row->value ): ?>
				<span class='errorMessage'><?php echo at(' (Changed)'); ?></span>
			<?php endif; ?>
			<?php if($row->description): ?>
				<br /><span class="subtip"><?php echo $row->description; ?></span>
			<?php endif; ?>
		</div>

		<div class="col-md-5 col-xs-12">
			<?php $this->getSettingForm( $row ); ?>
		</div>
	<?php endif; ?>	
		
	<div class="col-md-2 col-xs-12">
		<table>
			<tr>
			<?php if( $row->value !== null && $row->default_value != $row->value ): ?>
				<td><a href="<?php echo $this->createUrl('setting/revertsetting', array( 'id' => $row->id )); ?>" title="<?php echo at('Revert setting value to the default value.'); ?>" rel='tooltip' data-original-title='<?php echo at('Revert'); ?>'><i class="fa fa-refresh"></i></a></td>
			<?php endif; ?>
			
			<?php if(YII_DEBUG || !$row->is_protected): ?>
				<td><a href="<?php echo $this->createUrl('setting/editsetting', array( 'id' => $row->id )); ?>" title="<?php echo at('Edit this setting'); ?>" rel='tooltip' data-original-title='<?php echo at('Edit'); ?>'><i class="fa fa-edit"></i></a></td>
				<td><a href="<?php echo $this->createUrl('setting/deletesetting', array( 'id' => $row->id )); ?>" title="<?php echo at('Delete this setting!'); ?>" rel='tooltip' data-original-title='<?php echo at('Delete'); ?>'><i class="fa fa-trash-o"></i></a></td>
			<?php endif; ?>
			</tr>
		</table>
	</div>
</div>
<hr/>