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
	<div class="content"> <h3><center> Selamat Datang Perpustakaan Online </center></h3> <br><br><br>
	<p>
	<b><font size="5">     Perpustakaan Sekolah Online</b> merupakan semua perpustakaan yang ada atau di selenggarakan secara online baik itu sekolah dasar, sekolah menengah pertama,sekolah menengah atas sampai sekolah lanjutan seperti perguruan tinggi.Perpustakaan Sekolah Online berguna untuk menjunjang proses belajar mengajar secara online oleh tingkat sekolah dasar,menengah maupun lanjutan. 
	</p>
	<p>
		Buku perpustakaan terdiri dari berbagai macam buku yang berbeda.Tujuan adanya perpustakaan online yaitu untuk meningkatkan minat dan kebiasaan membaca.<br>
		<h2><b>Peran Perpustakaan</b></h2><br>
		Perpustakaan merupakan upaya untuk memelihara dan meningkatkan efisiensi dan efektifitas proses belajar mengajar. Perpustakaan yang terorganisasi secara baik dan sistematis, secara langsung atau pun tidak langsung dapat memberikan kemudahan bagi proses belajar mengajar di sekolah tempat perpustakaan tersebut berada.hal ini, terkait dengan kemajuan bidang pendidikan dan dengan adanya perbaikan metode belajar-mengajar yang dirasakan tidak bisa dipisahkan dari masalah penyedian fasilitas dan sarana pendidikan.<br>
		Perpustakaan merupakan jantungnya dunia pendidikan karena berbagai macam informasi bisa kita dapatkan di perpustakaan.
	</p></font>

	
	 </div>

	 </div>
	 </body>
	 </div>
</html>
<?php } ?>