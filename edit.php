<!DOCTYPE html>
<html>
<head>
	<title>Edit Anggota</title>
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
	<div class="content"> <h3>Edit Anggota </h3> <br>
	<form method="post" action="">
	<?php
include "koneksi.php";
$kode=$_GET['kd'];
$edit=mysql_query("SELECT*FROM anggota WHERE NA='$kode'");
$data=mysql_fetch_array($edit);
	echo"<table>
	<tr>
		<td>Nomor Anggota</td>  <td><input type='text' name='na' class='ip' value='".$data['NA']. "'><br></td></tr>
        <tr><td>Nama</td> <td><input type='text' name='nama' class='ip' value='".$data['Nama']. "'><br></td></tr>
		<tr><td>Jenis Kelamin</td> <td><input type='text' name='jenis' class='ip' value='".$data['jk']. "'><br></td></tr>
		<tr><td>Alamat</td> <td><textarea cols='30' rows='5' name='alamat' values='".$data['Alamat']. "'></textarea><br></td></tr>
		<tr><td>No Hp</td> <td><input type='text' name='no' class='ip' value='".$data['Nohp']. "'><br></td></tr>
		<tr><td>Email</td> <td><input type='text' name='email' class='ip' value='".$data['Email']. "'><br></td></tr>
		<tr><td colspan='2'><center><input type='submit' name='update' value='Ubah' class='kr'></center><br></td></tr>
	</table>"?>
</form>
<?php
if(isset($_POST['update'])){
	$kd=$_POST['na'];
	$nm=$_POST['nama'];
	$jk=$_POST['jenis'];
	$al=$_POST['alamat'];
	$no=$_POST['no'];
	$em=$_POST['email'];

	$update=mysql_query("UPDATE anggota SET NA='$kd',Nama='$nm',jk='$jk',Alamat='$al',Nohp='$no',Email='$em' WHERE NA='$kd'");
if($update){
	echo "<font color='red'><h2>Data berhasil di rubah</h2></font> <a href='anggota.php'><h2>kembali<h2></a>";
}else{
	echo "Data Gagal Di Rubah <a href='anggota.php'>kembali</a>";
}
}
	?>
	 </div>

	 </div>
	 </body>
</html>
