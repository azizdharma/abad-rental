<?php
    session_start();
    $connect=mysql_connect("localhost","root");
    mysql_select_db("rental");
    if(isset($_SESSION['username'])){
    unset($_SESSION['blmlg']);
    }else{
    $_SESSION['blmlg'] = "Anda blm login";
    header('location:index2.php');}

    
    $no_transaksi = $_POST['kode_sewa'];
    $kembali_pd = $_POST['kembali_pada'];
    $kmbl_pada = date_create($kembali_pd);
    $kembali_pada = date_format($kmbl_pada,'Y-m-d');

    $UpdateKembali = "UPDATE detail_sewa set kembali_pada='$kembali_pada' where kode_sewa='$no_transaksi'";
    mysql_query("$UpdateKembali");
    
    echo $kembali_pada;


    $denda = mysql_query("CALL hitung_dnd5($no_transaksi)");
    
    $data_denda = "SELECT * from detail_sewa where kode_sewa='$no_transaksi'";
    $dt_dnd = mysql_query("$data_denda");
    $dt_denda = mysql_fetch_array($dt_dnd);    
    $dnd = $dt_denda['denda'];
    $_SESSION['denda'] = $dnd * 10000;

    $kode_mobil = $dt_denda['kode_mobil'];

    $kode_mbl = "UPDATE mobil set stok = 1 where kode_mobil = '$kode_mobil'";
    mysql_query("$kode_mbl");



    
    echo "<br>".$dnd;

    header('Location:index.php#Kembali');
?>