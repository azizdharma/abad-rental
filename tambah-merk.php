<?php
    session_start();
    $connect=mysql_connect("localhost","root");
    mysql_select_db("rental");
    if(isset($_SESSION['username'])){
    unset($_SESSION['blmlg']);
    }else{
    $_SESSION['blmlg'] = "Anda blm login";
    header('location:index2.php');}

    
    $nama = $_POST['nmMerk'];


    $hitung = 0;
    $hitung = $hitung + 1;
    $kdMerk = "";


    $count = mysql_query("Select kode_merk from merk");
    while($data = mysql_fetch_array($count)){
        $hitung = $hitung + 1;
    }

    if($hitung < 10){
        $kdMerk = "r0" . $hitung;
    }else if($hitung<100){
        $kdMerk = "r".$hitung;
    }



    $sql_insertMerk = "insert into merk set kode_merk = '$kdMerk', nama='$nama'";
    echo $hitung;
    echo $sql_insertMerk;
    mysql_query($sql_insertMerk);
    
    
    header('Location:index.php');
?>