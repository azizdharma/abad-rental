<?php
    session_start();
    $connect=mysql_connect("localhost","root");
    mysql_select_db("rental");
    if(isset($_SESSION['username'])){
    unset($_SESSION['blmlg']);
    }else{
    $_SESSION['blmlg'] = "Anda blm login";
    header('location:index2.php');}


    
    $mobil = $_POST['kode_mobil'];
    $kd_mobil = $_GET['kd_mobil'];

    $kode = 7;
    $kode = $kd_mobil;

    echo $kode;
    
    $nama_penyewa = $_POST['nmPenyewa'];
    $telp = $_POST['tlpPenyewa'];
    $SIM = $_POST['SIM'];
    $STNK = $_POST['STNK'];
    $alamat = $_POST['almtPenyewa'];
    $tgl_keluar = date("Y-m-d");
    
    $datekmbl = $_POST['tgl_kembali'];
    $tglkmbl = date_create($datekmbl);
    $tgl_kembali = date_format($tglkmbl, 'Y-m-d'); 
    

    $datesw = $_POST['tgl_sewa'];
    $tglsw = date_create($datesw);
    $tgl_sewa = date_format($tglsw, 'Y-m-d'); 

    $tgl_transaksi = date('Y-m-d');
    




    $sql_insertPenyewa = "INSERT into penyewa set nama='$nama_penyewa', alamat='$alamat', telepon='$telp', SIM='$SIM', STNK='$STNK', tgl_transaksi='$tgl_transaksi'";
    mysql_query($sql_insertPenyewa);
    echo $sql_insertPenyewa;
    echo "<br>". $tgl_keluar;

    $namaKaryawan = $_SESSION['username'];
    $krywn = mysql_query("SELECT * from karyawan where nama = '$namaKaryawan'");
    $karyawan = mysql_fetch_array($krywn);
    $kode_krywn = $karyawan['kode_karyawan'];

    $transaksi = mysql_query("SELECT * from penyewa where tgl_transaksi='$tgl_transaksi' and telepon = '$telp'");
    $kd_sewa = mysql_fetch_array($transaksi);
    $kode_sewa = $kd_sewa['Kode_sewa'];

    $kdmbl = mysql_query("select * from mobil where nama='$mobil'");
    $kd_mobil = mysql_fetch_array($kdmbl);
    $kode_mobil = $kd_mobil['kode_mobil'];

    $tgl1fix1 = "$tgl_sewa";
    $tgl2fix2 = "$tgl_kembali";

    $hrg = mysql_query("SELECT * from mobil where kode_mobil=$kode");
    $hr = mysql_fetch_array($hrg);
    $hargambl = $hr['harga'];


    $selisih = strtotime($tgl2fix2) - strtotime($tgl1fix1);
    $hargamobil = $selisih/(60*60*24);
    $harga = $hargamobil * $hargambl;
    



    $sql_insertDetil = "INSERT into detail_sewa set kode_sewa='$kode_sewa',kode_karyawan='$kode_krywn', kode_mobil='$kode_mobil', tgl_keluar='$tgl_sewa', tgl_kembali='$tgl_kembali', harga = $harga";
    mysql_query($sql_insertDetil);
    echo "<br>".$sql_insertDetil."<br>";
    echo $hargamobil;
    
   

   


    $sql_statusMobil = "UPDATE mobil set stok=0 where kode_mobil='$kode'";
    mysql_query($sql_statusMobil);
    
    
    
    header('Location:print.php?kode_sewa='.$kode_sewa);
?>