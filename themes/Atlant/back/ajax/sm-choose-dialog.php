<?php 

$id = 'rm_id';

if(!isset($with_department)){
	$with_department 	= 1;	
	$id 				= 'employee_id';
} 

?>

<script type="text/javascript">
$(function() {
	$("#choose_employee").on('click', function(){
		var dialogInstance;
		if(!dialogInstance)
		{
			dialogInstance = new BootstrapDialog({
				title: '<?php echo at('Choose Employee') ?>',
				draggable: true,
				data: {
					'data': '<?php echo createUrl('ajax/employees/list', array('st'=>1)); ?>',
				},
				onshown: function(dialog) {
					var $message = $('<div></div>');
					var pageToLoad = dialog.getData('data');

					var renderContent = function(){
						var renderChoose = function(){
							$message.find('.choose').click(function(event) {
								$.ajax({
									type: "GET",
									url: '<?php echo createUrl("ajax/employees/getemployee&with_department=".$with_department); ?>',
									data: 'id='+$(this).attr('id'),
									success: function(data){
										$("#employee_name").val(data.name);
										$("input[id$=<?php echo $id; ?>]").val(data.id);
										$("input[id$=<?php echo $id; ?>]").change();
										dialog.close();
									},
									error: function(){
										alert("failure");
									}
								});
							});
						}
						
						renderChoose();
						$message.find('#listemployee1').bind('DOMNodeInserted', function(event) {
							renderChoose();
						});
					};
					
					$message.load(pageToLoad, renderContent);
					dialog.setMessage($message);
				},
				buttons: [
					{
						label: '<?php echo at('Cancel'); ?>',
						action: function(dialogItself){
							dialogItself.close();
						}
					}
				]
			});
		}
		dialogInstance.open();
	});
})
</script>