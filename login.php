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
<td> Username </td>
<td> Password </td>
</tr>
<tr>
<td><input type="text" name="user"></td>
<td><input type="password" name="pass"></td>
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
	$login=mysql_query("SELECT*FROM Login WHERE Username='$user' AND Password='$pass'");
	$hasil = mysql_fetch_array($login);
	$nama_user = $hasil['Nama'];

	if (mysql_num_rows($login)>0) {
		# code...
		session_start();
		$_SESSION['Nama'] = $nama_user;
		header("location:home.php");
	}
	else{
		echo "<script>alert('login gagal')</script>";
	}
}
?>
<?php }?>