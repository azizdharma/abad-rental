<?php
	session_start();
	$connect=mysql_connect("localhost","root");
	mysql_select_db("rental");
	if(isset($_SESSION['username'])){
	unset($_SESSION['blmlg']);
	}else{
	$_SESSION['blmlg'] = "Anda blm login";
	header('location:index2.php');}
    
    $kode_penyetor = $_GET['kode_penyetor'];
    
    $sql = "DELETE FROM penyetor WHERE kode_penyetor='$kode_penyetor'";
    mysql_query($sql);
    
    $_SESSION['notif'] = "Berhasil Menghapus Data Buku";
    header('Location:index.php');
?>