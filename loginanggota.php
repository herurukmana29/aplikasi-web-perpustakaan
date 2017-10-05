<?php
session_start();
if(isset($_SESSION['Nama'])){
    echo "Anda Belum <a href='home.php'>Keluar</a>";
}else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="desainlogin.css">
</head>
<body>
<div class="header">
	<div class="judul">Perpustakaan Online</div>
	<div class="tabel">
		<table>
<form method="post" action="">
<tr>
<td> No anggota </td>
<td> Nama anggota </td>
</tr>
<tr>
<td><input type="text" name="user"></td>
<td><input type="text" name="pass"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" value="Masuk" name="login"></td>
</tr>
</form>
</table>
	</div>
</div>
<div class="isi">
<div class="slogan">Perpustakaan Online membantu untuk<br> membaca
kapanpun dan<br> dimanapun anda berada. </div>
	<div class="daftar">
	<font size="+4"><b>Daftar Anggota</b></font><br>
	Gratis,sampai kapan pun.
		<form method="post" action="">
	<table>
	    <tr><td>Nomor Anggota</td>  <td><input type="text" name="na" class="ip"><br></td></tr>
        <tr><td>Nama</td> <td><input type="text" name="nama" class="ip"><br></td></tr>
		<tr><td>Jenis Kelamin</td> <td><input type="text" name="jenis" class="ip"><br></td></tr>
		<tr><td>Alamat</td> <td><textarea cols="30" rows="5" name="alamat"></textarea><br></td></tr>
		<tr><td>No Hp</td> <td><input type="text" name="no" class="ip"><br></td></tr>
		<tr><td>Email</td> <td><input type="text" name="email" class="ip"><br></td></tr>
		<tr><td colspan="2>"><center><input type="submit" name="kirim" value="Daftar" class="kr"></center><br></td></tr>
	
	</table>
	</form>
	</div>

	
	</div>
</div>
<div class="bawah">
	<p>
<u>Bahasa  indonesia  English(US)  Espanol  portugues(Brasil ) Francais(France)  Deutsch Italiano</u><br />
<p>
<font color="#999999">Heru Rukmana &copy; 2017'</font> Bahasa indonesia Seluler 'Cari Anggota'Buku' Penerbit' Tentang' Buat Iklan' Buat Halaman' Pengembang' Karier' Privasi 
</p>
</div>

</body>
</html>
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
		echo "<script>alert('Selamat anda berhasil mendaftar coba untuk login di form login anggota');</script>";
	}
	else{
		echo "<script>alert('gagal disimpan');</script>";
	}
}
?>
<?php
include "koneksi.php";
if (isset($_POST['kirim'])) {
	# code...
	
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];
	$d=$_POST['d'];
	$e=$_POST['e'];

	$input=mysql_query("INSERT INTO Login(Id,Username,Nama,Password,Level) VALUES ('$a','$b','$c','$d','$e')");
	if($input){
		echo "<script>alert('Selamat anda berhasil mendaftar');</script>";
	}
	else{
		echo "<script>alert('Anda gagal mendaftar');</script>";
	}
}
?>
<?php
include "koneksi.php";
if (isset($_POST['login'])) {
	# code...
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$login=mysql_query("SELECT*FROM anggota WHERE Na='$user' AND Nama='$pass'");
	$hasil = mysql_fetch_array($login);
	$na = $hasil['NA'];
	$nama_user = $hasil['Nama'];
	$j = $hasil['jk'];
	$al = $hasil['Alamat'];
	$no = $hasil['Nohp'];
	$e = $hasil['Email'];

	if (mysql_num_rows($login)>0) {
		# code...
		session_start();
		$_SESSION['NA'] = $na;
		$_SESSION['Nama'] = $nama_user;
		$_SESSION['jk'] = $j;
		$_SESSION['Alamat'] = $al;
		$_SESSION['Nohp'] = $no;
		$_SESSION['Email'] = $e;
		header("location:home1.php");
	}
	else{
		echo "<script>alert('login gagal')</script>";
	}
}
?>
<?php }?>