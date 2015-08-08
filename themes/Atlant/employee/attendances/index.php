<?php 

$years 		= array();
$year 	 	= date('Y');

for ($i=$year-5; $i <= $year+5 ; $i++) { 
	$years[$i] = $i;
}

$url_post = Yii::app()->createUrl('attendances');

?>
<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="fa fa-group"></span> <?php echo at('Attendances Recap'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
    <div class="col-md-12">    	
		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>                                
			</div>
			<div class="panel-body">					
				<form method="post" action="<?php echo $url_post; ?>">
					
				<h3>Periode</h3>
				<br>
				<table>
					<tr>
						<td width="100px"><label class="control-label">Tahun </label></td>
						<td><?php echo CHtml::dropDownList('period_year', $year_val, $years, array('class'=>'select')); ?></td>
					</tr>
					<tr><td><br></td><td></td></tr>
					<tr>
						<td width="100px"><label class="control-label">Bulan </label></td>
						<td><?php echo CHtml::dropDownList('period_month', $month, getMonthName(), array('class'=>'select')); ?></td>
					</tr>
				</table>	
				<br>
				<button>Generate</button>

				</form>								
				
				<?php 
				
				if(count($model)!=0){
					$this->widget('CGridView', array(
						'id' 			=>'reference-geo-countries-grid',
						'itemsCssClass' => 'table',
						'dataProvider' 	=> $model,
						// 'pagination'	=> 0,
						'columns' 		=> array(
							array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
							array('name'=>'date', 'header'=>at('Date')),
							array('name'=>'shift_id', 'header'=>at('Shift'), 'value'=>'$data->viewShift()'),
							array('name'=>'check_in', 'header'=>at('Check In'), 'value'=>'MyHelper::viewTime($data->check_in)'),
							array('name'=>'break_out', 'header'=>at('Break Out'), 'value'=>'MyHelper::viewTime($data->break_out)'),
							array('name'=>'break_in', 'header'=>at('Break In'), 'value'=>'MyHelper::viewTime($data->break_in)'),
							array('name'=>'check_out', 'header'=>at('Check Out'), 'value'=>'MyHelper::viewTime($data->check_out)'),
						),
					));
				}			

				?>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->
	</div>
</div>

<div class="clear"></div>
