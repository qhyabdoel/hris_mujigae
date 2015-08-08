<?php
$weekdaysShort = weekdaysShort();
$monthName = getMonthName();
$dw = date("w", strtotime($model->year.'-'.($model->month+1).'-1'));
$ml = date("d", strtotime($model->year.'-'.($model->month+2).'-0'));
$options = ReferenceAttendanceShifts::model()->findAll();
?>

<?php if(($model->employee_id > 0) && ($model->employee_id <> '')) { ?>
<div class="panel-heading">
	<p class="note"><?php echo $monthName[$model->month].', '.$model->year; ?></p>
</div>

<div class="panel-body">
	<table class="table">
	<thead>
		<tr><?php for($i = 0; $i <= 6; $i++ ){ echo '<th>'.$weekdaysShort[$i].'</th>'; } ?></tr>
	</thead>
	<tbody>
	<?php
		$day = 1;
		for ($i = 0; $i < 9; $i++) {
			for ($j = 0; $j <= 6; $j++) {
				echo '<td>';
				if ($day <= $ml && ($i > 0 || $j >= $dw)) {
					echo '<span>'.$day.'</span><select id="SchedulleForm_days['.$day.']" name="SchedulleForm[days]['.$day.']" class="form-control">';
					echo '<option value=""></option>';
					foreach($options as $option)
					{
						echo '<option value="'.$option->id.'" '.(isset($model->days[$day]) && ($model->days[$day] == $option->id) ? "selected='selected'" : '').'>'.$option->name.'</option>';
					}
					echo '</select>';
					$day++;
				}
				echo '</td>';
			}
			// stop making rows if we've run out of days
			if ($day > $ml) {
				break;
			} else {
				echo '</tr><tr>';
			}
		}
	?>
	</tbody>
	</table>
</div>
<?php } ?>