<!DOCTYPE html>
<html>
<head>
	<title>Edit Kembalian</title>
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
	<input type="text" name="nl" placeholder="Kode Kembali" class="tet">
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
	<div class="content"> <h3>Edit Kembalian</h3> <br>
	<form method="post" action="">
	<?php
include "koneksi.php";
$kode=$_GET['kd'];
$edit=mysql_query("SELECT*FROM Kembalian WHERE Kdkembali='$kode'");
$data=mysql_fetch_array($edit);
	echo"<table>
	<tr>
		<td>Kode Kembali</td>  <td><input type='text' name='a' class='ip' value='".$data['Kdkembali']. "'><br></td></tr>
        <tr><td>Kode Pinjam</td> <td><input type='text' name='b' class='ip' value='".$data['Kdpinjam']. "'><br></td></tr>
		<tr><td>Denda</td> <td><input type='text' name='c' class='ip' value='".$data['Denda']. "'><br></td></tr>
		<tr><td colspan='2'><center><input type='submit' name='update' value='Ubah' class='kr'></center><br></td></tr>
	</table>"?>
</form>
<?php
if(isset($_POST['update'])){
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];

	$update=mysql_query("UPDATE Kembalian SET Kdkembali='$a',Kdpinjam='$b',Denda='$c' WHERE Kdkembali='$a'");
if($update){
	echo "<font color='red'><h2>Data berhasil di rubah</h2></font> <a href='kembalian.php'><h2>kembali<h2></a>";
}else{
	echo "Data Gagal Di Rubah <a href='kembalian.php'>kembali</a>";
}
}
	?>
	 </div>

	 </div>
	 </body>
</html>
