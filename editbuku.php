<!DOCTYPE html>
<html>
<head>
	<title>Edit Buku</title>
	<link rel="stylesheet" type="text/css" href="desain.css">
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
	<input type="text" name="nl" placeholder="Nama anggota" class="tet">
	<input type="submit" name="cari" value="cari" class="btn"><br>
</form>
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
		<li><a href="login.php">Logout</a></li>
	</ul>
	</div>
	<div class="content"> <h3>Edit Buku </h3> <br>
	<form method="post" action="">
	<?php
include "koneksi.php";
$kode=$_GET['kd'];
$edit=mysql_query("SELECT*FROM buku WHERE Kdbuku='$kode'");
$data=mysql_fetch_array($edit);
	echo"<table>
	<tr>
		<td>Kode buku</td>  <td><input type='text' name='kb' class='ip' value='".$data['Kdbuku']. "'><br></td></tr>
        <tr><td>Judul Buku</td> <td><input type='text' name='jb' class='ip' value='".$data['Jdlbuku']. "'><br></td></tr>
		<tr><td>Jumlah Buku</td> <td><input type='text' name='jmb' class='ip' value='".$data['Jmlbuku']. "'><br></td></tr>
		<tr><td>Kode Penerbit</td> <td><input type='text' name='kp' class='ip' value='".$data['Kdpenerbit']. "'><br></td></tr>
		<tr><td>Stok Buku</td> <td><input type='text' name='sb' class='ip' value='".$data['stokbuku']. "'><br></td></tr>
		<tr><td colspan='2'><center><input type='submit' name='update' value='Ubah' class='kr'></center><br></td></tr>
	</table>"?>
</form>
<?php
if(isset($_POST['update'])){
	$kb=$_POST['kb'];
	$jb=$_POST['jb'];
	$jmb=$_POST['jmb'];
	$kp=$_POST['kp'];
	$sb=$_POST['sb'];

	$update=mysql_query("UPDATE buku SET Kdbuku='$kb',Jdlbuku='$jb',Jmlbuku='$jmb',Kdpenerbit='$kp',stokbuku='$sb' WHERE Kdbuku='$kb'");
if($update){
	echo "<font color='red'><h2>Data berhasil di rubah</h2></font> <a href='buku.php'><h2>kembali<h2></a>";
}else{
	echo "Data Gagal Di Rubah <a href='buku.php'>kembali</a>";
}
}
	?>
	 </div>

	 </div>
	 </body>
</html>
