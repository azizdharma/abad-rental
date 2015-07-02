<?php
	session_start();
	$connect=mysql_connect("localhost","root");
	mysql_select_db("rental");
	if(isset($_SESSION['username'])){
	unset($_SESSION['blmlg']);
	}else{
	$_SESSION['blmlg'] = "Anda blm login";
	header('location:index2.php');}
    
    $kode_sewa = $_GET['kode_sewa'];
    
    $sql = "DELETE FROM penyewa WHERE Kode_sewa='$kode_sewa'";
    mysql_query($sql);
    
    echo $sql;
    $_SESSION['notif'] = "Berhasil Menghapus Data Buku";
    header('Location:index.php#Peminjam');
?>