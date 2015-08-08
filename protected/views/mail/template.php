<!DOCTYPE html>

<?php 

$word 		= 'membuat';
$sentence 	= '';
$sentence2 	= 'melihat';

if($action=='approve')
{
	$word 		= 'menyetujui';	
	$sentence 	= ' yang dibuat oleh <b>'.$creator_name.'</b> selaku '.$creator_role;

	if($actor_role=='Department Manager' or $actor_role=='Restaurant Manager'){
		if($target_role=='Human Resource Manager') 
			$sentence2 = 'melakukan approval atau persetujuan untuk';
	}
} 
elseif ($action=='reject') 
{
	$word = 'menolak';
}

if($action=='create')
{
	$sentence2 = 'melakukan approval atau persetujuan untuk';	
	if($target_role=='Employee') $sentence2 = 'melihat';
} 

?>

<html>
<head>
	<title></title>
</head>
<body>
	<p>Kepada saudara <b><?php echo $target_name; ?></b> di Tempat.</p>

	<br>

	<p>
		Kami ingin memeberitahukan kepada anda bahwa saudara <b><?php echo $actor_name; ?></b> 
		selaku <?php echo $actor_role; ?> telah <?php echo $word; ?> berita acara<?php echo $sentence; ?>. 
		Berita acara tersebut yaitu perbaikan data absensi berikut:
	</p>		

	<br>

	<table>
		<tr><td>Karyawan</td><td>: <?php echo $employee; ?></td></tr>
		<tr><td>Tanggal</td><td>: <?php echo $date; ?></td></tr>
		<tr><td>Lokasi</td><td>: <?php echo $location; ?></td></tr>
		<tr><td>Check In</td><td>: <?php echo $check_in; ?></td></tr>
		<tr><td>Check Out</td><td>: <?php echo $check_out; ?></td></tr>
		<tr><td>Break Out</td><td>: <?php echo $break_out; ?></td></tr>
		<tr><td>Break In</td><td>: <?php echo $break_in; ?></td></tr>
	</table>

	<br>

	<p>
		Anda dapat <?php echo $sentence2; ?> berita acara ini selaku <?php echo $target_role; ?> 
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