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
		<li><a href="home1.php">Home</a></li>
		<li><a href="buku1.php">Buku</a></li>
		<li><a href="pinjam1.php">Pinjam</a></li>
		<li><a href="user.php">Profil</a></li>
		<li><a href="keluar.php">Logout</a></li>
		<div class="nama"><?php echo $_SESSION['Nama']?></div>
		<div class="fho"></div>
	</ul>
	</div>
	<div class="content"> <h3>Daftar Pinjam </h3> <br>
	
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
<center><font size="30">Tabel Pinjam</font></center>
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
	echo"<div class='a'><center><table border=1 bgcolor=white width=900></center>";
	echo"
	<thead>
	<tr>
	<th><font ><center>Kode Pinjam<center></font></th>
	<th><font color=><center>Tanggal Pinjam<center></font></th>
	<th><font color=><center>Tanggal Kembali<center></font></th>
	<th><font color=><center>Nama Peminjam<center></font></th>
	<th><font color=><center>Detail Pinjam<center></font></th>
	<th><font color=><center>Kembalian<center></font></th>
	<th><font color=><center>Denda<center></font></th>

	</tr>
	</thead>
	<tr>";
	while ($data=mysql_fetch_array($pinjam)) {
		echo"<td>".$data['Kdpinjam']."</td>";
		echo"<td>".$data['Tglpinjam']."</td>";
		echo"<td>".$data['Tglkembali']."</td>";
		echo"<td>".$data['Nmpinjam']."</td>";
		echo "<td><a href='detail1.php'>Detail</a></td>";
		echo "<td><a href='kembalian1.php'>Detail</a></td>";
		echo "<td><a href='denda1.php'>Detail</a></td>";
	echo"</tr> </div>";
}


?>

	 </div>

	 </div>
	 </body>
</html>
<?php } ?>