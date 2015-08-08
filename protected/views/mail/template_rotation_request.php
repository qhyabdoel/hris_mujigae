<!DOCTYPE html>

<?php 
	$employee 		= $mutation->employee->fullname;
	$area_city 		= '';
	$department 	= '';
	$section 		= '';
	$position 		= '';
	$level 			= '';
	$grade 			= '';
	$active_date 	= $mutation->active_date;

	if(isset($mutation->area_city)) $area_city = $mutation->area_city->name;
	if(isset($mutation->department)) $department = $mutation->department->name;
	if(isset($mutation->section)) $section = $mutation->section->name;
	if(isset($mutation->position)) $position = $mutation->position->name;
	if(isset($mutation->level)) $level = $mutation->level->level;
	if(isset($mutation->grade)) $grade = $mutation->grade->grade;
?>

<html>
<head>
	<title></title>
</head>
<body>
	<p>Kepada saudara <b><?php echo $target->fullname; ?></b> di Tempat.</p>

	<br>

	<p>
		Kami ingin memeberitahukan kepada anda bahwa saudara <b><?php echo $actor->fullname; ?></b> 
		selaku <?php echo $actor->rolename; ?> telah membuat permintaan rotasi. 
		Berikut data rotasi yang dibuat:
	</p>		

	<br>

	<table>
		<tr><td>Karyawan</td><td>: <?php echo $employee; ?></td></tr>
		<tr><td>Area City</td><td>: <?php echo $area_city; ?></td></tr>
		<tr><td>Department</td><td>: <?php echo $department; ?></td></tr>
		<tr><td>Section</td><td>: <?php echo $section; ?></td></tr>
		<tr><td>Position</td><td>: <?php echo $position; ?></td></tr>
		<tr><td>Level</td><td>: <?php echo $level; ?></td></tr>
		<tr><td>Grade</td><td>: <?php echo $grade; ?></td></tr>
		<tr><td>Active Date</td><td>: <?php echo $active_date; ?></td></tr>
	</table>

	<br>

	<p>
		Anda dapat melakukan persetujuan untuk rotasi ini selaku <?php echo $target->rolename; ?> 
		dengan mengunjungi aplikasi HRIS Mujigae melalui link di bawah ini.
	</p>

	<br>

	<p><a href="<?php echo $url; ?>"><?php echo $url; ?></a></p>

	<p>Demikian kami sampaikan, untuk menjadi perhatian.</p>

	<br>

	<p>Bandung, <?php echo date('j').' '.getMonthName()[date('n')-1].' '.date('Y'); ?></p>

	<br>

	<p>Aplikasi HRIS Mujigae</p>
</body>
</html>