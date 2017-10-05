<?php
session_start();
if(!isset($_SESSION['Nama'])){
    header("location:login.php");
}else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>Penerbit</title>
	<link rel="stylesheet" type="text/css" href="bukudesain.css">
</head>
<body>
<div class="wrapper">
	<div class="header">
	<div class="gambar1"><img src="gambar/Sistem_Informasi_Perpustakaan_Online.png" width="150" height="150"></div>
	<font size="70">PERPUSTAKAAN</font><br>
    <font size="30">Sistem Informasi Perpustakaan Sekolah SMA/SMK</font>
	</div>
    <div class="cari">
<form method="post" action="">
	<input type="text" name="nl" placeholder="Nama Penerbit" class="tet">
	<input type="submit" name="cari" value="cari" class="btn"><br>
</form>
</div>
<div class="menu">
	<ul>
		<li><a href="home1.php">Home</a></li>
		<li><a href="buku1.php">Buku</a></li>
		<li><a href="penerbit1.php">Penerbit</a></li>
		<li><a href="pinjam1.php">Pinjam</a></li>
		<li><a href="kembalian1.php">Kembalian</a></li>
		<li><a href="keluar.php">Logout</a></li>
		<div class="nama"><?php echo $_SESSION['Nama']?></div>
		<div class="fho"></div>
	</ul>
	</div>
	<div class="content"> <h3>Daftar Penerbit </h3> <br>
	<form method="post" action="">

	</form>
	<?php
include "koneksi.php";
if (isset($_POST['kirim'])) {
	# code...
	$kp=$_POST['kp'];
	$np=$_POST['np'];
	$al=$_POST['alamat'];
	$no=$_POST['no'];

	$input=mysql_query("INSERT INTO penerbit(Kdpenerbit,Nmpenerbit,Alamat,nohp) VALUES ('$kp','$np','$al','$no')");
	if($input){
		echo "<script>alert('Data berhasil disimpan');</script>";
	}
	else{
		echo "<script>alert('Gagal disimpan');</script>";
	}
}
?>
<center><font size="30">Tabel Penerbit</font></center>
<?php
include "koneksi.php";
if(isset($_POST['cari'])){
	$nl=$_POST['nl'];
	$penerbit=mysql_query("SELECT*FROM penerbit WHERE Nmpenerbit='$nl'");
}
else{
    $penerbit=mysql_query("SELECT*FROM penerbit ORDER BY Nmpenerbit asc");
}
	# code...
	echo"<div class='a'><center><table border=1 bgcolor=white width=900></center>";
	echo"
	<tr>
	<thead>
	<tr>
	<th><font color=><center>Kode Penerbit<center></font></th>
	<th><font color=><center>Nama penerbit<center></font></th>
	<th><font color=><center>Alamat<center></font></th>
	<th><font color=><center>No hp<center></font></th>
	</tr>
	</thead>
	</tr>
	<tr>";
	while ($data=mysql_fetch_array($penerbit)) {
		echo"<td>".$data['Kdpenerbit']."</td>";
		echo"<td>".$data['Nmpenerbit']."</td>";
		echo"<td>".$data['Alamat']."</td>";
		echo"<td>".$data['nohp']."</td>";
	echo"</tr> </div>";
}


?>

	 </div>

	 </div>
	 </body>
</html>
<?php } ?>