<?php
    session_start();
    $connect=mysql_connect("localhost","root");
    mysql_select_db("rental");
    if(isset($_SESSION['username'])){
    unset($_SESSION['blmlg']);
    }else{
    $_SESSION['blmlg'] = "Anda blm login";
    header('location:index2.php');}

    
    $merk=$_POST['merk'];
    $nama=$_POST['nama'];
    $penyetor=$_POST['penyetor'];
    $Harga=$_POST['harga'];
    $jenis=$_POST['jenis_mobil'];



    $sql_insertmobil = "insert into mobil set kode_jenis = '$jenis', kode_merk = '$merk',kode_penyetor =  '$penyetor', nama = '$nama', harga = $Harga, stok = 1";
    echo $sql_insertmobil;
    mysql_query($sql_insertmobil);
    
    
    header('Location:index.php');
?>