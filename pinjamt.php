<?php
session_start();
if(!isset($_SESSION['Nama'])){
    header("location:login.php");
}else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>Pinjam</title>
	<link rel="stylesheet" type="text/css" href="pinjamdesain.css">
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
	<input type="text" name="nl" placeholder="Nama Peminjam" class="tet">
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
	<div class="content"> <h3>Daftar Pinjam </h3> <br>
	<form method="post" action="">
	<table>
	<tr>
		<td>Kode Pinjam</td>  <td><input type="text" name="a" class="ip"><br></td></tr>
        <tr><td>Tanggal Pinjam</td> <td><input type="text" name="b" class="ip" placeholder="YYYY/MM/DD"><br></td></tr>
		<tr><td>Tanggal Kembali</td> <td><input type="text" name="c" class="ip" placeholder="YYYY/MM/DD"><br></td></tr>
		<tr><td>Nama Peminjam</td> <td><input type="text" name="d" class="ip"><br></td></tr>
		<tr><td><input type="submit" name="kirim" value="simpan" style="width: 70px; height: 30px;"><br></td>
		<td><a href="pinjam.php"><input type="button" name="" value="Kembali" style="width: 70px; height: 30px;"></a></td></tr>
	</table>
	</form>
	<?php
include "koneksi.php";
if (isset($_POST['kirim'])) {
	# code...
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];
	$d=$_POST['d'];

	$input=mysql_query("INSERT INTO pinjam(Kdpinjam,Tglpinjam,Tglkembali,Nmpinjam) VALUES ('$a','$b','$c','$d')");
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