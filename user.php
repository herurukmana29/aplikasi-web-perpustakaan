<?php
session_start();
if(!isset($_SESSION['Nama'])){
    header("location:login.php");
}else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="homedesain.css">
</head>
<div class="luar">
<body>
<div class="wrapper">
	<div class="header">
	<div class="gambar1"><img src="gambar/Sistem_Informasi_Perpustakaan_Online.png" width="150" height="150"></div>
	<div class="perpus"><font size="70">PERPUSTAKAAN</font><br>
    <font size="30">Sistem Informasi Perpustakaan Sekolah SMA/SMK</font></div>
	</div>
    <div class="cari">
    <div class="buka"><marquee><font size="30" color="white">Selamat datang <?php echo $_SESSION['Nama']?> di perpustakaan online </font></marquee></div>
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
	<div class="content"> <h3><center> Profil </center></h3> <br><br><br>
	<center><table width="">
	<tr><td><font size="+2"> Nomor Anggota : </td><td><?php echo $_SESSION['NA']?></font><br></td></tr>
	<tr><td><font size="+2">Nama : </td><td><?php echo $_SESSION['Nama']?></font><br></td></tr>
	<tr><td><font size="+2">Jenis Kelamin : </td><td><?php echo $_SESSION['jk']?></font><br></td></tr>
	<tr><td><font size="+2">Alamat : </td><td><?php echo $_SESSION['Alamat']?></font><br></td></tr>
	<tr><td><font size="+2">No Hp : </td><td><?php echo $_SESSION['Nohp']?></font><br></td></tr>
	<tr><td><font size="+2">Email : </td><td><?php echo $_SESSION['Email']?></font><br></td></tr>
	</table></center>
	 </div>

	 </div>
	 </body>
	 </div>
</html>
<?php } ?>