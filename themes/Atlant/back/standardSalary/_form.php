<?php $label_class = 'col-md-3 col-xs-12 control-label'; ?>

<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			</div>
			
			<?php if($model->isNewRecord == 'new') { ?>
				<?php $this->renderPartial('form/standard', array('model'=>$model, 'label_class'=>$label_class)); ?>
			<?php } else { ?>
				<div class="panel-default tabs">
					<ul role="tablist" class="nav nav-tabs" id="myTab">
						<li class="active" role="presentation">
							<a aria-expanded="true" aria-controls="standard" data-toggle="tab" role="tab" id="standard-tab" href="#standard">Standard Salary</a>
						</li>
						<li role="presentation" class=""><a aria-controls="allowance" data-toggle="tab" id="allowance-tab" role="tab" href="#allowance" aria-expanded="false">Allowances</a></li>
					</ul>
					<div class="panel-body tab-content" id="myTabContent">
						<div aria-labelledby="standard-tab" id="standard" class="tab-pane fade active in" role="tabpanel">
							<?php $this->renderPartial('form/standard', array('model'=>$model, 'label_class'=>$label_class)); ?>
						</div>
						<div aria-labelledby="allowance-tab" id="allowance" class="tab-pane fade" role="tabpanel">
							<?php $this->renderPartial('form/allowance', array('model'=>$model, 'label_class'=>$label_class)); ?>
						</div>
					</div>
				</div>
			<?php } ?>
			
			<div class="panel-footer">
				<?php /*echo CHtml::button('Clear Form', array('class'=>'btn btn-default'));*/ ?>
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary pull-right')); ?>
			</div>
		</div>
	</div>
</div>
<?php echo CHtml::endForm(); ?>

<script type="text/javascript">
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

var dialogInstance;
$("#new-allowance").on('click', function(){
	if(!dialogInstance)
	{
		var dialogInstance = new BootstrapDialog({
            title: 'New Standard Allowance',
			message: function(dialog) {
				var $message = $('<div></div>');
				var pageToLoad = dialog.getData('section');
				$message.load(pageToLoad);

				return $message;
			},
			draggable: true,
			data: {
				'department': 'http://localhost/hris/backend.php?r=ajax/departments/update/',
				'section': 'http://localhost/hris/backend.php?r=ajax/sections/update/'
			},
			buttons: [
				{
					label: 'Cancel',
					action: function(dialogItself){
						dialogItself.close();
					}
				}, {
					label: 'Submit',
					action: function(dialog) {
						//dialog.setMessage('Message 2');
						execAjax();
					}

				}
			]
        });
	} else {
		
	}
	
	dialogInstance.open();
});
</script>