<?php
session_start();
if(!isset($_SESSION['Nama'])){
    header("location:login.php");
}else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>Buku</title>
	<link rel="stylesheet" type="text/css" href="bukudesain.css">
</head>
<body>
<div class="wrapper">
	<div class="header">
	<div class="gambar1"><img src="gambar/Sistem_Informasi_Perpustakaan_Online.png" width="150" height="150"></div>
	<div class="perpus"><font size="70">PERPUSTAKAAN</font><br>
    <font size="30">Sistem Informasi Perpustakaan Sekolah SMA/SMK</font></div>
	</div>
    <div class="cari">
<form method="post" action="">
	<input type="text" name="nl" placeholder="Judul Buku" class="tet">
	<input type="submit" name="cari" value="cari" class="btn"><br>
</form>
</div>
<div class="menu">
	<ul>
		<li><a href="home1.php">Home</a></li>
		<li><a href="buku1.php">Buku</a></li>
		<li><a href="pinjam1.php">Pinjam</a></li>
		<li><a href="user.php">Profil</a></li>
		<li><a href="keluar.php">Logout</a></li>
		<div class="nama"><?php echo $_SESSION['Nama']?></div>
		<div class="fho"></div>
	</ul>
	</ul>
	</div>
	<div class="content"> <h3>Daftar Buku </h3> <br>
	<?php
include "koneksi.php";
if (isset($_POST['kirim'])) {
	# code...
	$kod=$_POST['kd'];
	$jub=$_POST['jb'];
	$jumb=$_POST['jub'];
	$kop=$_POST['kp'];
	$sob=$_POST['sb'];

	$input=mysql_query("INSERT INTO buku(Kdbuku,Jdlbuku,Jmlbuku,Kdpenerbit,stokbuku) VALUES ('$kod','$jub','$jumb','$kop','$sob')");
	if($input){
		echo "<script>alert('Data berhasil disimpan');</script>";
	}
	else{
		echo "<script>alert('Gagal disimpan');</script>";
	}
}
?>
<center><font size="30">Tabel Buku</font></center>
<?php
include "koneksi.php";
if(isset($_POST['cari'])){
	$nl=$_POST['nl'];
	$buku=mysql_query("SELECT*FROM buku WHERE Jdlbuku='$nl'");
}
else{
    $buku=mysql_query("SELECT*FROM buku ORDER BY Jdlbuku asc");
}
	# code...
	echo"<center><div class='a'><table border=1 bgcolor=white width=900></center>";
	echo"
	<tr>
	<thead>
	<tr>
	<th><font color=><center>Kode Buku<center></font></th>
	<th><font color=><center>Judul Buku<center></font></th>
	<th><font color=><center>Jumlah Buku<center></font></th>
	<th><font color=><center>Kode Penerbit<center></font></th>
	<th><font color=><center>Stok Buku<center></font></th>
	<th><font color=><center>Pinjam<center></font></th>
	</tr>
	</thead>
	</tr>
	<tr>";
	while ($data=mysql_fetch_array($buku)) {
		echo"<td>".$data['Kdbuku']."</td>";
		echo"<td>".$data['Jdlbuku']."</td>";
		echo"<td>".$data['Jmlbuku']."</td>";
		echo"<td>".$data['Kdpenerbit']."</td>";
		echo"<td>".$data['stokbuku']."</td>";
		echo"<td> <a href='pinjamanggota.php?kode=".$data['Kdbuku']."'>Pinjam</td>";
	echo"</tr> </div>";
}


?>

	 </div>

	 </div>
	 </body>
</html>
<?php } ?>