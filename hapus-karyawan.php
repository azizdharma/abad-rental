<?php
	session_start();
	$connect=mysql_connect("localhost","root");
	mysql_select_db("rental");
	if(isset($_SESSION['username'])){
	unset($_SESSION['blmlg']);
	}else{
	$_SESSION['blmlg'] = "Anda blm login";
	header('location:index2.php');}
    
    $kode_karyawan = $_GET['kode_karyawan'];
    
    $sql = "DELETE FROM karyawan WHERE kode_karyawan='$kode_karyawan'";
    mysql_query($sql);
    
    $_SESSION['notif'] = "Berhasil Menghapus Data Buku";
    header('Location:index.php#Pegawai');
?>