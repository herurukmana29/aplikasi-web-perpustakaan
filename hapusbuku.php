rr
<!DOCTYPE html>
<html>
<head>
	<title>Hapus Buku</title>
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
	<div class="content">
	<?php
include "koneksi.php";
$kode=$_GET["kd"];
$hapus=mysql_query("DELETE FROM buku WHERE Kdbuku='$kode'");
if($hapus){
	echo "<font color='red'><h2>Data berhasil di hapus</h2></font> <a href='buku.php'><h2>kembali<h2></a>";
}else{
	echo"<font color='red'><h2>Data gagal di hapus</h2></font> <a href='buku.php'><h2>kembali</h2></a>";
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
	echo"<center><table border=1 bgcolor=white width=900></center>";
	echo"
	<tr bgcolor=black>
	<td><font color=white><center>Kode Buku<center></font></td>
	<td><font color=white><center>Judul Buku<center></font></td>
	<td><font color=white><center>Jumlah Buku<center></font></td>
	<td><font color=white><center>Kode Penerbit<center></font></td>
	<td><font color=white><center>Stok Buku<center></font></td>
	<td><font color=white><center>Hapus<center></font></td>
	</tr>
	<tr>";
	while ($data=mysql_fetch_array($buku)) {
		echo"<td>".$data['Kdbuku']."</td>";
		echo"<td>".$data['Jdlbuku']."</td>";
		echo"<td>".$data['Jmlbuku']."</td>";
		echo"<td>".$data['Kdpenerbit']."</td>";
		echo"<td>".$data['stokbuku']."</td>";
		echo "<td><a href='hapusbuku.php?kd=".$data['Kdbuku']."'>Hapus data</a></td>";
	echo"</tr>";
}


?>
	 </div>

	 </div>
	 </body>
</html>