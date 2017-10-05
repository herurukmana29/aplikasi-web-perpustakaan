<?php
session_start();
if(!isset($_SESSION['Nama'])){
    header("location:login.php");
}else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Pinjam</title>
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
	<div class="content"> <h3>Daftar Detail Pinjam </h3> <br>
	<div><a href="detailt.php"><input type="button" value="Tambah Detail" name="" style="width: 120px; height: 30px; margin-left: 30px;"></a></div>
	<div><form method="post" action="" style="margin-left: 700px; margin-top: -42px;">
	<input type="text" name="nl" placeholder="Kode buku" class="tet" style="height: 30px; width: 200px;">
	<input type="submit" name="cari" value="cari" class="btn" style="height: 30px; width: 70px;"><br>
</form><br></div>
	

<?php
include "koneksi.php";
if(isset($_POST['cari'])){
	$nl=$_POST['nl'];
	$detail=mysql_query("SELECT*FROM Detail_pinjam WHERE Kdbuku='$nl'");
}
else{
    $detail=mysql_query("SELECT*FROM Detail_pinjam ORDER BY Id asc");
}
	# code...
	echo"<div class='a'><center><table border=1 bgcolor=white width=900></center>";
	echo"
	<tr>
	<thead>
	<tr>
	<th><font color=><center>Id<center></font></th>
	<th><font color=><center>Kode Buku<center></font></th>
	<th><font color=><center>Edit<center></font></th>
	<th><font color=><center>Hapus<center></font></th>
	</tr>
	</thead>
	</tr>
	<tr>";
	while ($data=mysql_fetch_array($detail)) {
		echo"<td>".$data['Id']."</td>";
		echo"<td>".$data['Kdbuku']."</td>";
		echo "<td><a href='editdetail.php?kd=".$data['Id']."'>Edit</a></td>";
		echo "<td><a href='hapusdetail.php?kd=".$data['Id']."'>Hapus data</a></td>";
	echo"</tr>";
}


?>

	 </div>

	 </div>
	 </body>
</html>
<?php } ?>