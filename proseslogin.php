<?php
session_start();
$connect=mysql_connect("localhost","root");
mysql_select_db("rental");
$username = $_POST['user'];
$pass = $_POST['pw'];
$cekuser = mysql_query("SELECT * FROM karyawan WHERE nama = '$username'");
$jumlah = mysql_num_rows($cekuser);
$hasil = mysql_fetch_array($cekuser);
if($jumlah == 0) {
unset($_SESSION['pwslh']);
$_SESSION['blmdftr']="Anda Belum Mendaftar";
header('location:index2.php');
} else {
if($pass <> $hasil['password']) {
unset($_SESSION['blmdftr']);
$_SESSION['pwslh']="Password anda salah";
header('location:index2.php');
} else {
unset($_SESSION['pwslh']);
unset($_SESSION['blmdftr']);
$_SESSION['username'] = $hasil['nama'];
header('location:index.php');
	if($hasil['Jabatan'] == "admin"){
		$_SESSION['jabatan'] = "admin";
	}else{
		$_SESSION['jabatan'] = "operator";
	}
}
}
?>

