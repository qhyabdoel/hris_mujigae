<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><?php print_r($model_mutation->attributeLabels()['from']) ?></h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
				<label class="control-label" for="FromOutlet_mutation">Outlet</label>
				<Br>
				<select class="form-control select" name="from_outlet" id="from">
					<option value="-">nothing select</option>
					<?php 
						foreach ($model_outlet as $l) {
							echo "<option value='".$l->id."'>".$l->name."</opiton>";
						}

					 ?>
				</select>
				<input type="hidden" id="am_from" >
				<br>
				<input type="text" class="form-control" id="filter_from" placeholder="filter">
				<br>
				<select multiple="multiple" id="employee_from" class="form-control op" name="duallistbox_demo2_helper2" style="height: 250px;">
					

				</select>

				</div>
			</div>
			<div class="panel-footer">
				<button class="btn btn-primary pull-right" id="add_data"> > </button>
			</div>
		</div>
		
	</div>

	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><?php print_r($model_mutation->attributeLabels()['to']) ?></h3>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<label class="control-label" for="DestiantionOutlet_mutation">Outlet</label>
					<Br>

					<select class="form-control select" name="from_outlet" id="destination">
						<option value="-">nothing select</option>
						<?php 
							foreach ($model_outlet as $l) {
								echo "<option value='".$l->id."'>".$l->name."</opiton>";
							}
						 ?>
					</select>
					<input type="hidden" id="am_dest" >
					<br>
					<input type="text" class="form-control" id="filter_destination" placeholder="filter">
					<br>
					<select multiple="multiple" id="employee_destination" class="form-control" name="duallistbox_demo2_helper2" style="height: 250px;">

					</select>
				</div>
					
			</div>
			<div class="panel-footer">
				<button class="btn btn-primary pull-left" id="add_data_back"> < </button>
			</div>
		</div>
		
	</div>


	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Table Mutasi</h3>
			</div>

			<div class="panel-body" style="height:340px;">
				<table class="table table-bordered" id="mutation_data">
					
				</table>
					
			</div>
			<div class="panel-footer">
				<button class="btn btn-primary pull-right " id="send_data"> simpan </button>
			</div>
		</div>
		
	</div>
	




</div>
<script type='text/javascript' src="<?php echo themeUrl('js/plugins/noty/jquery.noty.js'); ?>"></script>
<script type='text/javascript' src="<?php echo themeUrl('js/plugins/noty/layouts/topRight.js'); ?>"></script>  
 <script type='text/javascript' src="<?php echo themeUrl('js/plugins/noty/themes/default.js'); ?>"></script>
<script type="text/javascript">
var outlet_from = "";
var outlet_destination = "";
var data_mutation = [];

var arrayFrom = [];

function setArrayFrom(array){
	arrayFrom = array;
	console.log(arrayFrom.length);
}

var arrayDestination = [];

function setArrayDestination(array){
	arrayDestination = array;
	console.log(arrayDestination.length);
}

		$(function(){
			$('#from').change(function(){
				var op = $('#from').val();
				outlet_from = op;
				if (outlet_from != outlet_destination) {
					$.ajax({
			            url:"<?php echo createUrl('employee/mutation/empByOutlet') ?>&id="+op,
			            success: function(msg){
			            	var temp = [];
			            	var array = JSON.parse(msg);
			            	for (var i = array.length - 1; i >= 0; i--) {
			            		var emp = {"nama":array[i].nama, "id":array[i].id};;
			            		temp.push(emp);
			            	};
			            	setArrayFrom(temp);
			            	populateListFrom(temp);
			            }

			          });

			          $.ajax({
			            url:"<?php echo createUrl('employee/mutation/FindAreaManager') ?>&id="+op,
			            success: function(msg){
			            	$('#am_from').val(msg);
			            }
			          });

				}else{
					alert('tidak boleh sama');
					$('#from').val('-');
				};
			});

			$('#destination').change(function(){
				var op = $('#destination').val();
				outlet_destination = op;
				if (outlet_from != outlet_destination) {
					$.ajax({
			            url:"<?php echo createUrl('employee/mutation/empByOutlet') ?>&id="+op,
			            success: function(msg){
			            	var temp = [];
			            	var array = JSON.parse(msg);
			            	for (var i = array.length - 1; i >= 0; i--) {
			            		var emp = {"nama":array[i].nama, "id":array[i].id};;
			            		temp.push(emp);
			            	};
			            	setArrayDestination(temp);
			            	populateListDestination(temp);
			            }

			          });
					$.ajax({
			            url:"<?php echo createUrl('employee/mutation/FindAreaManager') ?>&id="+op,
			            success: function(msg){
			            	$('#am_dest').val(msg);
			            }
			          });

				}else{
					noty({text: 'outlet mutasi tidak boleh sama', layout: 'topRight', type: 'error'});

					$('#destination').val('-');
				};
				
			});

			$('#filter_from').keyup(function(e){
				var key = $('#filter_from').val();
				var op = $('#from').val();
				if (op !='-') {
					filterListFrom(key);	
				};
				
			});

			$('#filter_destination').keyup(function(e){
				var key = $('#filter_destination').val();
				var op = $('#destination').val();
				if (op != '-') {
					filterListDestination(key);
				};
				
			});

			$('#add_data').click(function(){
				var dest_out  = $('#destination').val();
				var from_out = $('#from').val();
				var emp 	 = $('#employee_from').val();
				if (dest_out == '-') {

				}else if (from_out == '-') {

				}else if(emp != null){
					var dest_name 	= $("#destination :selected").text();
					var from_name 	= $("#from :selected").text();
					var emp_name		= $("#employee_from :selected").text();
					var am_id = "-";
					if ($("#am_from").val() == $("#am_dest").val()) {
						am_id = $("#am_from").val();
					};
					var object = {
						"dest_name":dest_name,
						"from_name":from_name,
						"emp_name" : emp_name,
						'val_dest' : dest_out,
						'val_from' : from_out,
						'am_id' : am_id,
						'val_emp'  : emp
					}
					console.log(am_id);

					
					var bol = checkTemporaryData(emp,from_out,dest_out);

					if (bol == true) {
						data_mutation.push(object);	
					};

					populateTable();
					populateListFrom("");
					populateListDestination("");
				}else{
					noty({text: 'anda belum memilih data pegawai yang akan di mutasi', layout: 'topRight', type: 'error'});
				}; 
			});

			$('#add_data_back').click(function(){
				var dest_out  = $('#from').val();
				var from_out = $('#destination').val();
				var emp 	 = $('#employee_destination').val();
				if (dest_out == '-') {
					console.log('masuk - 1');
				}else if (from_out == '-') {
					console.log('masuk - 2');

				}else if(emp != null){
					console.log('masuk - 3');

					var dest_name 	= $("#destination :selected").text();
					var from_name 	= $("#from :selected").text();
					var emp_name		= $("#employee_destination :selected").text();
					var am_id = "-";
					if ($("#am_from").val() == $("#am_dest").val()) {
						am_id = $("#am_from").val();
					};
					var object = {
						"dest_name": from_name,
						"from_name": dest_name,
						"emp_name" : emp_name,
						'val_dest' : dest_out,
						'val_from' : from_out,
						'am_id' : am_id,
						'val_emp'  : emp
					}
					
					console.log(data_mutation.length);
					var bool = checkTemporaryData(emp,from_out,dest_out);
					if (bool ==true) {
						data_mutation.push(object);
					};
					populateTable();
					populateListFrom("");
					populateListDestination("");
				}else{
				
				}; 
				console.log('mantap');
			});

			$('#send_data').click(function(){
				if (data_mutation.length>0) {
					var data = JSON.stringify(data_mutation);
					$.ajax({
			            url:'<?php echo createUrl('employee/mutation/insertMutation') ?>',
						type: 'POST',
						data:"json="+data,
						success:function(msg){
								console.log(msg);
						}
					});
				}else{
					console.log('ga ada');
				};
			});

		});


		function populateListFrom(outletId){
			$('#employee_from').empty();
			var from_outlet = $('#from').val();
			for (var i = arrayFrom.length - 1; i >= 0; i--) {
				var obj = arrayFrom[i];
				var cek_available = true;
				$.each(data_mutation, function(x, o) {
					if (o.val_from == from_outlet && o.val_emp == obj.id ) {
						cek_available = false;
					};
				});
				if (cek_available) {
					$('#employee_from').append("<option class='opt' value='"+obj.id+"'>"+obj.nama+"</option>")
				};
 			};
	
			$.each(data_mutation, function(a, b) {
					if (from_outlet == b.val_dest) {
						$('#employee_from').append("<option value='"+b.val_emp+"'>"+b.emp_name+"</option>")
					};
			});
		}

		function populateListDestination(outletId){
			$('#employee_destination').empty();
			var from_outlet = $('#destination').val();
			for (var i = arrayDestination.length - 1; i >= 0; i--) {
				var obj = arrayDestination[i];
				 var cek_available = true;
					$.each(data_mutation, function(x, o) {
						if (o.val_from == from_outlet && o.val_emp == obj.id ) {
							cek_available = false;
						};
					});

					if (cek_available) {
						$('#employee_destination').append("<option value='"+obj.id+"'>"+obj.nama+"</option>");
					};

			};


			var dest_id = $('#destination').val();
			$.each(data_mutation, function(x, o) {
				if (dest_id == o.val_dest) {
					$('#employee_destination').append("<option value='"+o.val_emp+"'>"+o.emp_name+"</option>");
				};
			});
		}

		function filterListFrom(keyword){
			$('#employee_from').empty();
			console.log(keyword);
			var from_outlet = $('#from').val();
			$.each(arrayFrom, function(idx, obj) {
				if (obj.name.indexOf(keyword) != -1) {
					var cek_available = true;
					$.each(data_mutation, function(x, o) {
						if (o.val_from == from_outlet && o.val_emp == obj.id ) {
							cek_available = false;
						};
					});

					if (cek_available) {
						$('#employee_from').append("<option value='"+obj.id+"'>"+obj.name+"</option>")
					};
				};
				
			});
		}

		function filterListDestination(keyword){
			$('#employee_destination').empty();
			
			$.each(arrayDestination, function(idx, obj) {
				if (obj.name.indexOf(keyword) != -1) {
					$('#employee_destination').append("<option value='"+obj.id+"'>"+obj.name+"</option>");
				};
				
			});


		}

		function checkTemporaryData(id,from,destination){
			var tempData = [];
			var cek_available = true;
			$.each(data_mutation, function(idx, obj) {

				console.log(id+" - "+obj.val_emp+" | "+from+" - "+obj.val_dest+" | "+destination+" - "+obj.val_from);
				if ((obj.val_emp == id) && (obj.val_from == destination) && (obj.val_dest == from)) {
					console.log('ditemukan sama');
					cek_available = false;
				}else{

					var object = {
						"dest_name": obj.dest_name,
						"from_name": obj.from_name,
						"emp_name" : obj.emp_name,
						'val_dest' : obj.val_dest,
						'val_from' : obj.val_from,
						'val_emp'  : obj.val_emp
					}
					tempData.push(object);
				};
			});
			console.log(cek_available);
			data_mutation = tempData;
			return cek_available;
		}

		

		function populateTable(){
			$('#mutation_data').empty();
			$('#mutation_data').append("<tr><th>employee</th><th>from</th><th>to</th>tr>");
			$.each(data_mutation, function(idx, obj) {
				$('#mutation_data').append("<tr><td>"+obj.emp_name+"</td><td>"+obj.from_name+"</td><td>"+obj.dest_name+"</td>tr>")
			});
		}


</script>

<style type="text/css">
	.opt{
		margin-top: 3px;
	}
	.op select option { padding: 6px;}
</style>











