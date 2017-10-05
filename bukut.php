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
	<form method="post" action="">
	<table>
	<tr>
		<td>Kode Buku</td>  <td><input type="text" name="kd" class="ip"><br></td></tr>
        <tr><td>Judul Buku</td> <td><input type="text" name="jb" class="ip"><br></td></tr>
		<tr><td>Jumlah Buku</td> <td><input type="text" name="jub" class="ip"><br></td></tr>
		<tr><td>Kode Penerbit</td> <td><input type="text" name="kp" class="ip"><br></td></tr>
		<tr><td>Stok Buku</td> <td><input type="text" name="sb" class="ip"><br></td></tr>
		<tr><td><input type="submit" name="kirim" value="simpan" style="width: 70px; height: 30px;"><br></td>
		<td><a href="buku.php"><input type="button" name="" value="Kembali" style="width: 70px; height: 30px;"></a></td></tr>
	</table>
	</form>
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
	 </div>

	 </div>
	 </body>
</html>
<?php } ?>