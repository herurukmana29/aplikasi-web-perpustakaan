<?php
session_start();
if(!isset($_SESSION['Nama'])){
    header("location:login.php");
}else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>anggota</title>
	<link rel="stylesheet" type="text/css" href="anggotadesain.css">
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
		<li><a href="home1.php">Home</a></li>
		<li><a href="buku1.php">Buku</a></li>
		<li><a href="penerbit1.php">Penerbit</a></li>
		<li><a href="pinjam1.php">Pinjam</a></li>
		<li><a href="kembalian1.php">Kembalian</a></li>
		<li><a href="denda1.php">Denda</a></li>
		<li><a href="keluar.php">Logout</a></li>
		<div class="nama"><?php echo $_SESSION['Nama']?></div>
		<div class="fho"></div>
	</ul>
	</div>
	<div class="content"> <h3>Daftar Anggota </h3> <br>
	<form method="post" action="">
</form>
<?php
include "koneksi.php";
if (isset($_POST['kirim'])) {
	# code...
	$kd=$_POST['na'];
	$nm=$_POST['nama'];
	$jk=$_POST['jenis'];
	$al=$_POST['alamat'];
	$no=$_POST['no'];
	$em=$_POST['email'];

	$input=mysql_query("INSERT INTO anggota(NA,Nama,jk,Alamat,Nohp,Email) VALUES ('$kd','$nm','$jk','$al','$no','$em')");
	if($input){
		echo "<script>alert('data berhasil disimpan');</script>";
	}
	else{
		echo "<script>alert('gagal disimpan');</script>";
	}
}
?>
<center><font size="30">Tabel Anggota</font></center>
<?php
include "koneksi.php";
if(isset($_POST['cari'])){
	$nl=$_POST['nl'];
	$anggota=mysql_query("SELECT*FROM anggota WHERE nama='$nl'");
}
else{
    $anggota=mysql_query("SELECT*FROM anggota ORDER BY nama asc");
}
	# code...
	echo"<div class='a'><center><table name='table1'></center>";
	echo"
	<thead>
	<tr>
	<th><font ><center>No Anggota<center></font></th>
	<th><font color=><center>Nama anggota<center></font></th>
	<th><font color=><center>Jenis Kelamin anggota<center></font></th>
	<th><font color=><center>Alamat anggota<center></font></th>
	<th><font color=><center>No Hp anggota<center></font></th>
	<th><font color=><center>Email anggota<center></font></th>
	</tr>
	</thead>
	
	<tr>";
	while ($data=mysql_fetch_array($anggota)) {
		echo"<td>".$data['NA']."</td>";
		echo"<td>".$data['Nama']."</td>";
		echo"<td>".$data['jk']."</td>";
		echo"<td>".$data['Alamat']."</td>";
		echo"<td>".$data['Nohp']."</td>";
		echo"<td>".$data['Email']."</td>";
	echo"</tr></div>";
}


?>
	 </div>

	 </div>
	 </body>
</html>
<?php } ?>