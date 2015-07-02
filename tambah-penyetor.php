<?php
    session_start();
    $connect=mysql_connect("localhost","root");
    mysql_select_db("rental");
    if(isset($_SESSION['username'])){
    unset($_SESSION['blmlg']);
    }else{
    $_SESSION['blmlg'] = "Anda blm login";
    header('location:index2.php');}

    
    $nama = $_POST['nmPenyetor'];
    $alamat = $_POST['almtPenyetor'];
    $telp = $_POST['tlpPenyetor'];

    $hitung = 0;
    $hitung = $hitung + 1;
    $kdPenyetor = "";




    $sql_insertpenyetor = "insert into penyetor set nama='$nama', alamat = '$alamat', No_telp = '$telp'";
    echo $hitung;
    echo $sql_insertpenyetor;
    mysql_query($sql_insertpenyetor);
    
    
    header('Location:index.php#Penyetor');
?>