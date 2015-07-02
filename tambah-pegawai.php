<?php
    session_start();
    $connect=mysql_connect("localhost","root");
    mysql_select_db("rental");
    if(isset($_SESSION['username'])){
    unset($_SESSION['blmlg']);
    }else{
    $_SESSION['blmlg'] = "Anda blm login";
    header('location:index2.php');}

    
    $nama = $_POST['nmPegawai'];
    $alamat = $_POST['almtPegawai'];
    $telp = $_POST['tlpPegawai'];
    $pw = $_POST['pwPegawai'];

    $hitung = 0;
    $hitung = $hitung + 1;
    $kdPegawai = "";


    $count = mysql_query("Select * from karyawan");
    while($data = mysql_fetch_array($count)){
        $hitung = $hitung + 1;
    }

    if($hitung < 10){
        $kdPegawai = "K0" . $hitung;
    }else if($hitung<100){
        $kdPegawai = "K".$hitung;
    }



    $sql_insertpegawai = "insert into karyawan set kode_karyawan = '$kdPegawai', nama='$nama', alamat = '$alamat', Telepon = '$telp', password='$pw'";
    echo $hitung;
    echo $sql_insertpegawai;
    mysql_query($sql_insertpegawai);
    
    
    header('Location:index.php#Pegawai');
?>