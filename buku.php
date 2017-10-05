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

<div class="menu">
	<ul>
		<li><a href="home.php">Home</a></li>
		<li><a href="anggota.php">Anggota</a></li>
		<li><a href="buku.php">Buku</a></li>
		<li><a href="penerbit.php">Penerbit</a></li>
		<li><a href="pinjam.php">Pinjam</a></li>
		<li><a href="detail.php">Detail Pinjam</a></li>
		<li><a href="kembalian.php">Kembalian</a></li>
		<li><a href="denda.php">Denda</a></li>
		<li><a href="keluar.php">Logout</a></li>
		<div class="nama"><?php echo $_SESSION['Nama']?></div>
		<div class="fho"></div>
	</ul>
	</div>
	<div class="content"> <h3>Daftar Buku </h3> <br>
	<div><a href="bukut.php"><input type="button" value="Tambah Buku" name="" style="width: 120px; height: 30px; margin-left: 30px;"></a></div>
	<div><form method="post" action="" style="margin-left: 700px; margin-top: -42px;">
	<input type="text" name="nl" placeholder="Nama buku" class="tet" style="height: 30px; width: 200px;">
	<input type="submit" name="cari" value="cari" class="btn" style="height: 30px; width: 70px;"><br>
</form><br></div>
	
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
	<th><font color=><center>Edit<center></font></th>
	<th><font color=><center>Hapus<center></font></th>
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
		echo "<td><a href='editbuku.php?kd=".$data['Kdbuku']."'>Edit</a></td>";
		echo "<td><a href='hapusbuku.php?kd=".$data['Kdbuku']."'>Hapus data</a></td>";
	echo"</tr> </div>";
}


?>

	 </div>

	 </div>
	 </body>
</html>
<?php } ?>