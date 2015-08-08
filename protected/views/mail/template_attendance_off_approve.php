<!DOCTYPE html>

<html>
<head>
	<title></title>
</head>
<body>
	<p>Kepada saudara <b><?php echo $rm->fullname; ?></b> di Tempat.</p>

	<br>

	<p>
		Kami ingin memeberitahukan kepada anda bahwa saudara <b><?php echo $admin->fullname; ?></b> 
		selaku <?php echo $admin->rolename; ?> menyetujui permintaan untuk penginputan data kehadiran yang off yang anda buat. 
		Berikut data kehadiran tersebut:
	</p>		

	<br>

	<table>
		<tr><td>Karyawan</td><td>: <?php echo $employee->fullname; ?></td></tr>
		<tr><td>Shift</td><td>: <?php echo $attendance_off->shift->name; ?></td></tr>
		<tr><td>Tanggal</td><td>: <?php echo $attendance_off->date; ?></td></tr>
		<tr><td>Lokasi</td><td>: <?php echo $attendance_off->location->name; ?></td></tr>		
	</table>

	<br>

	<p>
		Anda dapat melihat data pengajuan dengan mengunjungi aplikasi HRIS Mujigae melalui link di bawah ini.
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