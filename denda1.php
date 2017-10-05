<?php
session_start();
if(!isset($_SESSION['Nama'])){
    header("location:login.php");
}else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>Denda</title>
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
	<input type="text" name="nl" placeholder="Kode Denda" class="tet">
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
	<div class="content"> <h3>Daftar Denda </h3> <br>
	
	<?php
include "koneksi.php";
if (isset($_POST['kirim'])) {
	# code...
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];

	$input=mysql_query("INSERT INTO Denda(Kddenda,Jns_denda,Denda) VALUES ('$a','$b','$c')");
	if($input){
		echo "<script>alert('Data berhasil disimpan');</script>";
	}
	else{
		echo "<script>alert('Gagal disimpan');</script>";
	}
}
?>
<center><font size="30">Tabel Denda</font></center>
<?php
include "koneksi.php";
if(isset($_POST['cari'])){
	$nl=$_POST['nl'];
	$denda=mysql_query("SELECT*FROM Denda WHERE Kddenda='$nl'");
}
else{
    $denda=mysql_query("SELECT*FROM Denda ORDER BY Kddenda asc");
}
	# code...
	echo"<div class='a'><center><table border=1 bgcolor=white width=900></center>";
	echo"
	<tr>
	<thead>
	<tr>
	<th><font color=><center>Kode Denda<center></font></th>
	<th><font color=><center>Kode Pinjam<center></font></th>
	<th><font color=><center>Denda<center></font></th>
	<th><font color=><center>Kembali<center></font></th>
	</tr>
	</thead>
	</tr>
	<tr>";
	while ($data=mysql_fetch_array($denda)) {
		echo"<td>".$data['Kddenda']."</td>";
		echo"<td>".$data['Jns_denda']."</td>";
		echo"<td>".$data['Denda']."</td>";
		echo "<td><a href='pinjam1.php'>Kembali</a></td>";
	echo"</tr> </div>";
}
?>
	 </div>

	 </div>
	 </body>
</html>
<?php } ?>