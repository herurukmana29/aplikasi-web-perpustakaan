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
	<div class="content"> <h3>Daftar Anggota </h3> <br>
	<div><a href="anggotat.php"><input type="button" value="Tambah Anggota" name="" style="width: 120px; height: 30px; margin-left: 30px;"></a></div>
	<div><form method="post" action="" style="margin-left: 700px; margin-top: -42px;">
	<input type="text" name="nl" placeholder="Nama anggota" class="tet" style="height: 30px; width: 200px;">
	<input type="submit" name="cari" value="cari" class="btn" style="height: 30px; width: 70px;"><br>
</form><br></div>
<div>	

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
	<th><font color=><center>Edit<center></font></th>
	<th><font color=><center>Hapus<center></font></th>
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
		echo "<td><a href='edit.php?kd=".$data['NA']."'>Edit</a></td>";
		echo "<td><a href='hapus.php?kd=".$data['NA']."'>Hapus data</a></td>";
	echo"</tr></div>";
}


?>
</div>
	 </div>

	 </div>
	 </body>
</html>
<?php } ?>