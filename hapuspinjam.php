
<!DOCTYPE html>
<html>
<head>
	<title>Hapus Pinjam</title>
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
	<input type="text" name="nl" placeholder="Nama Pemijam" class="tet">
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
$hapus=mysql_query("DELETE FROM pinjam WHERE Kdpinjam='$kode'");
if($hapus){
	echo "Data Terhapus <a href='pinjam.php'> Kembali</a>";
}else{
	echo"Data gagal Terhapus <a href='pinjam.php'>Kembali</a>";
}

?>
<center><font size="30">Tabel Penerbit</font></center>
<?php
include "koneksi.php";
if(isset($_POST['cari'])){
	$nl=$_POST['nl'];
	$pinjam=mysql_query("SELECT*FROM pinjam WHERE Nmpinjam='$nl'");
}
else{
    $pinjam=mysql_query("SELECT*FROM pinjam ORDER BY Nmpinjam asc");
}
	# code...
	echo"<center><table border=1 bgcolor=white width=900></center>";
	echo"
	<tr bgcolor=black>
	<td><font color=white><center>Kode Pinjam<center></font></td>
	<td><font color=white><center>Tanggal Pinjam<center></font></td>
	<td><font color=white><center>Tanggal Kembali<center></font></td>
	<td><font color=white><center>Nama Peminjam<center></font></td>
	<td><font color=white><center>Hapus<center></font></td>
	</tr>
	<tr>";
	while ($data=mysql_fetch_array($pinjam)) {
		echo"<td>".$data['Kdpinjam']."</td>";
		echo"<td>".$data['Tglpinjam']."</td>";
		echo"<td>".$data['Tglkembali']."</td>";
		echo"<td>".$data['Nmpinjam']."</td>";
		echo "<td><a href='hapus.php?kd=".$data['Kdpinjam']."'>Hapus data</a></td>";
	echo"</tr>";
}


?>
	 </div>

	 </div>
	 </body>
</html>