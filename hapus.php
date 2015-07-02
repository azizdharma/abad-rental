<?php
	session_start();
	$connect=mysql_connect("localhost","root");
	mysql_select_db("rental");
	if(isset($_SESSION['username'])){
	unset($_SESSION['blmlg']);
	}else{
	$_SESSION['blmlg'] = "Anda blm login";
	header('location:index2.php');}
    
    $kode_mobil = $_GET['kode_mobil'];
    
    $sql = "DELETE FROM mobil WHERE kode_mobil='$kode_mobil'";
    mysql_query($sql);
    
    $_SESSION['notif'] = "Berhasil Menghapus Data Buku";
    header('Location:index.php');
?>