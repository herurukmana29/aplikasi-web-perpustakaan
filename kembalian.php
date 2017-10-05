<?php
session_start();
if(!isset($_SESSION['Nama'])){
    header("location:login.php");
}else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>Kembalian</title>
	<link rel="stylesheet" type="text/css" href="bukudesain.css">
</head>
<body>
<div class="wrapper">
	<div class="header">
	<div class="gambar1"><img src="gambar/Sistem_Informasi_Perpustakaan_Online.png" width="150" height="150"></div>
	<font size="70">PERPUSTAKAAN</font><br>
    <font size="30">Sistem Informasi Perpustakaan Sekolah SMA/SMK</font>
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
	<div class="content"> <h3>Daftar Kembalian </h3> <br>
	<div><a href="kembaliant.php"><input type="button" value="Tambah Kembalian" name="" style="width: 120px; height: 30px; margin-left: 30px;"></a></div>
	<div><form method="post" action="" style="margin-left: 700px; margin-top: -42px;">
	<input type="text" name="nl" placeholder="Kode Kembali" class="tet" style="height: 30px; width: 200px;">
	<input type="submit" name="cari" value="cari" class="btn" style="height: 30px; width: 70px;"><br>
</form><br></div>
	

<?php
include "koneksi.php";
if(isset($_POST['cari'])){
	$nl=$_POST['nl'];
	$kembali=mysql_query("SELECT*FROM Kembalian WHERE Kdkembali='$nl'");
}
else{
    $kembali=mysql_query("SELECT*FROM Kembalian ORDER BY Kdkembali asc");
}
	# code...
	echo"<div class='a'><center><table border=1 bgcolor=white width=900></center>";
	echo"
	<tr>
	<thead>
	<tr>
	<th><font color=><center>Kode Kembali<center></font></th>
	<th><font color=><center>Kode Pinjam<center></font></th>
	<th><font color=><center>Denda<center></font></th>
	<th><font color=><center>Edit<center></font></th>
	<th><font color=><center>Hapus<center></font></th>
	</tr>
	</thead>
	</tr>
	<tr>";
	while ($data=mysql_fetch_array($kembali)) {
		echo"<td>".$data['Kdkembali']."</td>";
		echo"<td>".$data['Kdpinjam']."</td>";
		echo"<td>".$data['Denda']."</td>";
		echo "<td><a href='editkembalian.php?kd=".$data['Kdkembali']."'>Edit</a></td>";
		echo "<td><a href='hapuskembalian.php?kd=".$data['Kdkembali']."'>Hapus data</a></td>";
	echo"</tr> </div>";
}


?>

	 </div>

	 </div>
	 </body>
</html>
<?php } ?>