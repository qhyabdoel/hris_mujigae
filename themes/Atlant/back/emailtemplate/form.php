<?php if( isset( $_POST['preview'] ) ): ?>
<section class="grid_12">
	<div class="box">
		<div class="title"><?php echo at('Preview Template'); ?> - <?php //echo CHtml::encode(Yii::app()->formtags->replaceTags($model->title, array('user' => $model->user))); ?></div>
		<div class='inside'>
			<div class="in">
				<div class="grid_12">
					<?php //echo sh(Yii::app()->formtags->replaceTags($model->content)); ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>		
</section>	
<?php endif; ?>

<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo $model->isNewRecord ? at('Create Template') : at('Update Template'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<?php $label_class = 'col-md-3 control-label'; ?>
<?php echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'title', array('class' => $label_class)); ?>
					<div class="col-md-6">
						<?php echo CHtml::activeTextField($model, 'title', array('class' => 'validate[required] form-control')); ?>
						<?php echo CHtml::error($model, 'title'); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'email_key', array('class' => $label_class)); ?>
					<div class="col-md-6">
						<?php echo CHtml::activeTextField($model, 'email_key', array('class' => 'validate[required] form-control')); ?>
						<br /><span class="subtip"><?php echo at('you can only user alphanumeric characters, underscores and dashes. No Spaces.'); ?></span>
						<?php echo CHtml::error($model, 'email_key'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'user', array('class' => $label_class)); ?>
					<div class="col-md-6">
						<?php
						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
						    'model'=>$model,
							'attribute' => 'user',
						    'sourceUrl'=>$this->createUrl('user/GetUserNames'),
						    // additional javascript options for the autocomplete plugin
						    'options'=>array(
						        'minLength'=>3
						    ),
							'htmlOptions'=>array(
								'class'=>'form-control',
							),
						));
						?>
						<br /><span class="subtip"><?php echo at('Start typing in a user name you would like to preview the template with. By default it will use your information'); ?></span>
						<?php echo CHtml::error($model, 'user'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<?php echo CHtml::activeLabelEx($model, 'content', array('class' => $label_class)); ?>
					<div class="col-md-8">
						<?php
						$this->widget('ext.editMe.widgets.ExtEditMe', array(
							'id' => 'EmailTemplate_content',
							'name'  => 'EmailTemplate[content]',
							'value' => $model->content,
							)
						);
						?>
						
						<?php echo CHtml::error($model, 'content'); ?>
						<?php //Yii::app()->customEditor->getEditor(array('model' => $model, 'attribute' => 'content', 'editorOptions' => array('css' => 'docstyle.css', 'autoresize' => true, 'fixed' => true), 'htmlOptions' => array('style' => 'height: 800px;'))); ?>
					</div>
				</div>
			</div>
			
			<!--Form footer begin-->
			<div class="panel-footer">
				<a href='<?php echo $this->createUrl('index'); ?>' class='right button'><?php echo at('Cancel'); ?></a>
				<input type="submit" class="btn btn-default pull-right" name='preview' value="<?php echo at('Preview'); ?>" />
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class'=>'btn btn-primary pull-right', 'name'=>'submit')); ?>
			</div>
			<!--Form footer end-->
			
		
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<div class="clear"></div>