<?php
$weekdaysShort 	= weekdaysShort();
$monthName 		= getMonthName();
$indonesianDays = indonesianDays();
$dw  			= date("w", strtotime($model->year.'-'.($model->month+1).'-1'));
$ml  			= date("d", strtotime($model->year.'-'.($model->month+2).'-0'));
$options  		= ReferenceAttendanceShifts::model()->findAll();
?>

<?php if(($model->department_id > 0) && ($model->department_id <> '')) { ?>

<div class="panel-heading">
	<p class="note"><?php echo $monthName[$model->month].', '.$model->year; ?></p>
</div>

<div class="panel-body over">
	<table class="table">
	<thead>
		<tr>
		<?php 

		$day = 1;
		echo "<th>No.</th>";
		echo "<th>Nik</th>";
		echo "<th>Name</th>";
		for($i = 0; $i <= $ml-1; $i++ )
		{ 
			$dateSring 	= $model->year.'-'.$model->month.'-'.$day;
			$date 		= strtotime($dateSring);
			$dateSring 	= date('Y-m-d',$date+2678400);
			$dayN 		= date('N',$date);
			if(in_array($dateSring,$holidays) or $dayN==7) echo '<th style="color:#cc0000;">'.$indonesianDays[$dayN-1].'<br>'.$day.'</th>'; 
			else echo '<th>'.$indonesianDays[$dayN-1].'<br>'.$day.'</th>'; 
			$day++;
		} 
		
		?>
		</tr>
	</thead>
	<tbody>
	<?php
	$no = 1;
	foreach ($employees as $employee) {		
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$employee->code."</td>";
		echo "<td>".$employee->firstname." ".$employee->lastname."</td>";
		$day = 1;
		for($i = 0; $i <= $ml-1; $i++ )
		{ 
			echo '<td>';

			$dateSring 	= $model->year.'-'.$model->month.'-'.$day;
			$date 		= strtotime($dateSring);
			$dateSring 	= date('Y-m-d',$date+2678400);
			$dayN 		= date('N',$date);
			if(in_array($dateSring,$holidays) or $dayN==7) echo '<select id="SchedulleForm_days['.$day.']" name="SchedulleForm[days]['.$employee->id.']['.$day.']" class="form-control" style="width:100px;border-color:#cc0000">';
			else echo '<select id="SchedulleForm_days['.$day.']" name="SchedulleForm[days]['.$employee->id.']['.$day.']" class="form-control" style="width:100px;">'; 			
						
			echo '<option value=""></option>';
			foreach($options as $option)
			{
				if($option->id!=1) echo '<option value="'.$option->id.'" '.(isset($daysValue[$employee->id][$day]) && ($daysValue[$employee->id][$day] == $option->id) ? "selected='selected'" : '').'>'.$option->name.'</option>';
			}
			echo '</select>';
			$day++;
			
			echo "</td>";
		}			
		echo "<tr>";
		$no++;							
	}
	?>
	</tbody>
	</table>
</div>

<?php } ?>