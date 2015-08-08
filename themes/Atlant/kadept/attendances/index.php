<?php 

$years 		= array();
$year 	 	= date('Y');

for ($i=$year-5; $i <= $year+5 ; $i++) { 
	$years[$i] = $i;
}

$url_post = Yii::app()->createUrl('attendances');
$label_class = 'col-md-3 col-xs-12 control-label';
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
				<p class="note"><h3>Periode</h3></p>
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>                                
			</div>
			<div class="panel-body">					
				<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
					
					<div class="form-group">
						<?php echo CHtml::label('Tahun','tahun', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::dropDownList('period_year', $year_val, $years, array('class'=>'select')); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo CHtml::label('Bulan','Bulan', array('class' => $label_class)); ?>
						<div class="col-md-6 col-xs-12">
							<?php echo CHtml::dropDownList('period_month', $month, getMonthName(), array('class'=>'select')); ?>
						</div>
					</div>
			</div>			
			<div class="panel-footer">
				<?php /*echo CHtml::button(at('Clear Form'), array('class'=>'btn btn-default'));*/ ?>
				<?php echo CHtml::submitButton(at('Generate'), array('class'=>'btn btn-primary pull-right')); ?>
			</div>					
			
		</div>

		<?php echo CHtml::endForm(); ?>		
				
				<?php 
				
				if(count($model)!=0){
					$this->widget('CGridView', array(
						'id' 			=>'reference-geo-countries-grid',
						'itemsCssClass' => 'table',
						'dataProvider' 	=> $model,
						// 'pagination'	=> 0,
						'columns' 		=> array(
							array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
							array('name'=>'name', 'header'=>at('Name'), 'value'=>'$data->employee->fullname;'),
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
		<!-- END DEFAULT DATATABLE -->
	</div>
</div>

<div class="clear"></div>
