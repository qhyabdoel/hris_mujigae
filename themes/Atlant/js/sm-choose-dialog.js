var dialogTitle = 'Choose Employee';
var urlList = '';
var urlEmployee = '';

$(function() {
	$("#choose_employee").on('click', function(){
		var dialogInstance;
		if(!dialogInstance)
		{
			dialogInstance = new BootstrapDialog({
				title: dialogTitle,
				draggable: true,
				data: {
					'data': urlList,
				},
				onshown: function(dialog) {
					var $message = $('<div></div>');
					var pageToLoad = dialog.getData('data');

					var renderContent = function(){
						var renderChoose = function(){
							$message.find('.choose').click(function(event) {
								$.ajax({
									type: "GET",
									url: urlEmployee,
									data: 'id='+$(this).attr('id'),
									success: function(data){
										$("#employee_name").val(data.firstname);
										$("input[id$=employee_id]").val(data.id);
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
						label: 'Cancel',
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