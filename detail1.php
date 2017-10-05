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
    <div class="cari">
<form method="post" action="">
	<input type="text" name="nl" placeholder="kode Buku" class="tet">
	<input type="submit" name="cari" value="cari" class="btn"><br>
</form>
</div>
<div class="menu">
	<ul>
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
	</ul>
	</div>
	<div class="content"> <h3>Daftar Detail Pinjam </h3> <br>
	<?php
include "koneksi.php";
if (isset($_POST['kirim'])) {
	# code...
	$a=$_POST['a'];
	$b=$_POST['b'];

	$input=mysql_query("INSERT INTO Detail_pinjam(Id,Kdbuku) VALUES ('$a','$b')");
	if($input){
		echo "<script>alert('Data berhasil disimpan');</script>";
	}
	else{
		echo "<script>alert('Gagal disimpan');</script>";
	}
}
?>
<center><font size="30">Tabel Detail Pinjam</font></center>
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
	<th><font color=><center>Kembali<center></font></th>
	</tr>
	</thead>
	</tr>
	<tr>";
	while ($data=mysql_fetch_array($detail)) {
		echo"<td>".$data['Id']."</td>";
		echo"<td>".$data['Kdbuku']."</td>";
		echo "<td><a href='pinjam1.php'>Kembali</a></td>";
	echo"</tr></div>";
}


?>

	 </div>

	 </div>
	 </body>
</html>
<?php } ?>