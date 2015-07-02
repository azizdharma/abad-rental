<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ABAD RENTAL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/normal.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="css/animation.css">
  <link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css">
  <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
  <link id="base-style" href="css/style.css" rel="stylesheet">
  <link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
  <script>
    if (/mobile/i.test(navigator.userAgent)) document.documentElement.className += ' w-mobile';
  </script>
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script><![endif]-->
</head>
<body>
<?php
session_start();
$connect=mysql_connect("localhost","root");
mysql_select_db("rental");
if(isset($_SESSION['username'])){
unset($_SESSION['blmlg']);
}else{
$_SESSION['blmlg'] = "Anda blm login";
header('location:index2.php');}
?>
  <div class="fix-header" id="">
    <div class="w-container">
      <div class="w-nav" data-collapse="medium" data-animation="default" data-duration="400"></div>
    </div>
  </div>
  <div class="fixed-header">
    <div class="w-container container">
      <div class="w-row">

       <!--///////////////////////////////////////////////////////
       // Logo section 
       //////////////////////////////////////////////////////////-->


        <div class="w-col w-col-3 logo">
         <center> </center>
        </div>

        <!--///////////////////////////////////////////////////////
       // End Logo section 
       //////////////////////////////////////////////////////////-->

        <div class="w-col w-col-9">

       <!--///////////////////////////////////////////////////////
       // Menu section 
       //////////////////////////////////////////////////////////-->


          <div class="w-nav navbar" data-collapse="medium" data-animation="default" data-duration="400" data-contain="1">
            <div class="w-container nav">
              <nav class="w-nav-menu nav-menu" role="navigation">
        <a href="#mainmen"><img class="logo" src="images/logos.png" alt="Elegance"></a>
                <a class="w-nav-link menu-li" href="#Kembali">PENGEMBALIAN</a>
                <a class="w-nav-link menu-li" href="#Peminjam">DATA PENYEWA</a>
                <a class="w-nav-link menu-li" href="#Penyetor">PENYETOR</a>
                <a class="w-nav-link menu-li" href="#Pegawai">PEGAWAI</a>
                <?php
                if($_SESSION['jabatan'] == "admin"){
        echo "<a class='w-nav-link menu-li' href='#rekap'>REKAP</a>";}?>
        <?php
        if(isset($_SESSION['username'])){
                echo "<font color=red><a class='w-nav-link menu-li' href='proseslogout.php'>LOGOUT (".$_SESSION['username'].") </a></font>";}
        ?>
              </nav>
              <div class="w-nav-button">
                <div class="w-icon-nav-menu"></div>
              </div>
            </div>
          </div>


          <!--///////////////////////////////////////////////////////
       // End Menu section 
       //////////////////////////////////////////////////////////-->


        </div>
      </div>
    </div>
  </div>

<!-- ///////////Tambah Mobil/////////////////////// -->
  <div class="modal fade" id="tambah-mobil" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content" style="background-color:#4a148c">
  <form class="form-horizontal" action="tambah.php" method="POST">
  <div class="modal-header">
  <h4>Tambah Mobil</h4>
  </div>
  <div class="modal-body">
    <?php
      $sql = "SELECT * FROM `jenis_mobil`";
      $result = mysql_query($sql);

      ?>
  <div class="form-group">
  <label for="contact-name" class="col-lg-2 control-label"><h3>Tipe Mobil</h3></label>
    <div class="col-lg-10"><br>
     <select id="jenis_mobil" name="jenis_mobil">
                  <?php
                  while($row=mysql_fetch_array($result)) {
                  ?>
                  <option value="<?php echo $row['kode_jenis'] ?>"><?php echo $row['jenis'] ?></option>
                  <?php
                  }
                  ?>
                  </select>
    </div>
  </div>
  <br>
  <div class="form-group">
    <?php
      $sql = "SELECT * FROM `merk`";
      $result = mysql_query($sql);

      ?>
  <label for="contact-name" class="col-lg-2 control-label"><h3>Merk</h3></label>
    <div class="col-lg-10"><br>
     <select id="merk" name="merk">
                  <?php
                  while($row=mysql_fetch_array($result)) {
                  ?>
                  <option value="<?php echo $row['kode_merk'] ?>"><?php echo $row['nama'] ?></option>
                  <?php
                  }
                  ?>
                  </select>
    </div>
  </div>
  <br>
  <div class="form-group">
    <?php
      $sql = "SELECT * FROM `penyetor`";
      $result = mysql_query($sql);

      ?>
  <label for="contact-name" class="col-lg-2 control-label"><h3>Penyetor</h3></label>
    <div class="col-lg-10"><br>
     <select  name="penyetor">
                  <?php
                  while($row=mysql_fetch_array($result)) {
                  ?>
                  <option value="<?php echo $row['kode_penyetor'] ?>"><?php echo $row['nama'] ?></option>
                  <?php
                  }
                  ?>
                  </select>
    </div>
  </div>
  <br>
 <div class="form-group">
  <label for="contact-name" class="col-lg-2 control-label"><h3>Nama</h3></label>
    <div class="col-lg-10"><br>
     <input type="text" id="nama" name="nama" data-provide="typeahead" data-items="4" style="max-width:42%" required='required..'>
    </div>
  </div>
  <br>
  <div class="form-group">
  <label for="contact-name" class="col-lg-2 control-label"><h3>Harga</h3></label>
    <div class="col-lg-10"><br>
     <input type="text" id="nama" name="harga" data-provide="typeahead" data-items="4" style="max-width:42%" required='required'>
    </div>
  </div>
  </div>
 
  <div class="modal-footer">
   <h5 class="pull-left">Developed by : <a href="http://www.carikode.com">CariKode.Com</a></h5>
   <input type="submit" class="btn btn-primary" value="Tambah">Tambah</a>
  </div>
  </form>
  </div>
  </div>
  </div>
  <!-- ////////// end tambah mobil section /////////////////////-->
  

  
  <!--///////////////////////////////////////////////////////
       // mainmen section 
       //////////////////////////////////////////////////////////-->

  <div class="mainmen-parlex" id="mainmen">
    <div class="mainmen-back">
      <div class="w-container">
        <div class="wrap">
          <div class="mainmen-div">
      <br><br>
            <h1 class="mainmen-heading">Data Mobil</h1><br>
            <div class="sepreater"></div>
            <a href="#tambah-mobil" style="align:center"class="btn btn-primary" data-toggle="modal" value="Tambah">Tambah</a>
          </div>
          <br>
      <center>
      <div class="row-fluid sortable">    
        <div class="box span12">
          
          <div class="box-content">
            
            <table class="table table-striped table-bordered bootstrap-datatable datatable" style="background-color: #16a085">
              <thead>
                <tr  style="background-color: #2c3e5f">
                  <th>Kode Mobil</th>
                  <th>Nama Mobil</th>
                  <th>Tipe</th>
                  <th>Merk</th>
                  <th>Harga</th>
                  <th>Status</th>
                  <th>Kembali</th>
                  <th width="160px">Actions</th>
                </tr>
              </thead>   
              <tbody>
              <?php
              $query = "Select * from daftar_mobil";
              $hasil = mysql_query($query);
              while($data = mysql_fetch_array($hasil)){
              ?>
              <tr>
                <td><?php echo $data['kode mobil']?></td>
                <td class="center"><?php echo $data['nama mobil']?></td>
                <td class="center"><?php echo $data['tipe']?></td>
                <td class="center"><?php echo $data['merk']?></td>
                <td class="center">Rp. <?php echo $data['harga']?></td>
                <td class="center">
                  <span class="
                  <?php
                  $status = $data['status'];
                  if($status=="Kosong"){
                  echo "label label-important";
                  }else{
                  echo "label label-success";
                  }
                  ?>
                  "><?php echo $data['status']?></span>
                </td>
                <td><?php
                  if($status == "Kosong"){
                  $kode = $data['kode mobil'];
                  $data_tanggal = mysql_query("SELECT * from detail_sewa where kode_mobil = '$kode'");
                  $data_kembali = mysql_fetch_array($data_tanggal);
                  echo $data_kembali['tgl_kembali'];}
                  else{echo "---";};?></td>
                <td class="center">
                  <center><a class="btn btn-warning" href="<?php echo "pinjam.php?kode_mobil=" . $data['kode mobil'] ?>" title="Pilih mobil">
                    <i class="fa fa-check"></i>  
                  </a>
                  <a class="btn btn-info" href="<?php echo "edit.php?kode_mobil=" . $data['kode mobil']?>" title="edit">
                    <i class="fa fa-edit"></i>  
                  </a>
                  <a class="btn btn-danger" href="<?php echo "hapus.php?kode_mobil=" . $data['kode mobil']?>" onclick="return confirm('Yakin Hapus ?')" title="hapus">
                    <i class="fa fa-trash"></i> 
                  </a></center>
                </td>
              </tr>
              <?php
              }
              ?>
              
              </tbody>

            </table>

              <br><br>  <br><br><br><br><br><br>  <br><br><br><br><br>
          </div>
        </div><!--/span-->
      </center>
      
        </div>

      </div>
      </div>
    </div>
    

  </div>

<!--///////////////////////////////////////////////////////
       // End mainmen section 
       //////////////////////////////////////////////////////////-->
  
 <!-- ///////////Tambah Pegawai/////////////////////// -->
  <div class="modal fade" id="tambah-pegawai" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content" style="background-color:#4a148c">
  <form class="form-horizontal" action="tambah-pegawai.php" method="POST">
  <div class="modal-header">
  <h4>Tambah Pegawai</h4>
  </div>
  <div class="modal-body">
 <div class="form-group">
  <label for="contact-name" class="col-lg-2 control-label"><h3>Nama</h3></label>
    <div class="col-lg-10"><br>
     <input type="text" id="nama" name="nmPegawai" data-provide="typeahead" data-items="4" style="max-width:42%" required='required'>
    </div>
  </div>
  <br>
  <div class="form-group">
  <label for="contact-name" class="col-lg-2 control-label"><h3>Password</h3></label>
    <div class="col-lg-10"><br>
     <input type="Password" id="nama" name="pwPegawai" data-provide="typeahead" data-items="4" style="max-width:42%" required='required'>
    </div>
  </div>
  <br>
  <div class="form-group">
  <label for="contact-name" class="col-lg-2 control-label"><h3>Alamat</h3></label>
    <div class="col-lg-10"><br>
     <textarea type="text" id="nama" name="almtPegawai" data-provide="typeahead" data-items="4" style="max-width:42%" required='required'></textarea>
    </div>
  </div>
  <br>
  <div class="form-group">
  <label for="contact-name" class="col-lg-2 control-label" required='required'><h3>No. Telepon</h3></label>
    <div class="col-lg-10"><br>
     <input type="text" id="nama" name="tlpPegawai" data-provide="typeahead" data-items="4" style="max-width:42%">
    </div>
  </div>
  </div>
 
  <div class="modal-footer">
   <h5 class="pull-left">Developed by : <a href="http://www.carikode.com">CariKode.Com</a></h5>
   <input type="submit" class="btn btn-primary" value="Tambah">Tambah</a>
  </div>
  </form>
  </div>
  </div>
  </div>
  <!-- ////////// end tambah pegawai section /////////////////////-->
 
  
<!--///////////////////////////////////////////////////////
       // Data Peminjam section 
       //////////////////////////////////////////////////////////-->

  <div class="mainmen-parlex" id="Peminjam">
    <div class="kembali-back">
      <div class="w-container">
        <div class="wrap">
          <div class="mainmen-div">
      <br><br>
            <h1 class="mainmen-heading">Data Peminjam</h1>
            <div class="sepreater"></div>
          </div>
          </div>
      <center>
      <div class="row-fluid sortable">    
        <div class="box span12">
          
          <div class="box-content">
            
            <table class="table table-striped table-bordered bootstrap-datatable datatable" style="background-color: #16a085">
              <thead>
                <tr  style="background-color: #2c3e5f">
                  <th>Kode Sewa</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>SIM</th>
                  <th>STNK</th>
                  <th>Tanggal Transaksi</th>
                  <th width="160px">Actions</th>
                </tr>
              </thead>   
              <tbody>
              <?php
              $query = "Select * from penyewa";
              $hasil = mysql_query($query);
              while($data_penyewa = mysql_fetch_array($hasil)){
              ?>
              <tr>
                <td><?php echo $data_penyewa['Kode_sewa']?></td>
                <td class="center"><?php echo $data_penyewa['nama']?></td>
                <td class="center"><?php echo $data_penyewa['alamat']?></td>
                <td class="center"><?php echo $data_penyewa['telepon']?></td>
                <td class="center"><?php echo $data_penyewa['SIM']?></td>
                <td class="center"><?php echo $data_penyewa['STNK']?></td>
                <td class="center"><?php echo $data_penyewa['tgl_transaksi']?></td>
                <td class="center">
                  <center>
                  
                  <a class="btn btn-danger" href="hapus-peminjam.php?kode_sewa=<?php echo $data_penyewa['Kode_sewa']?>" onclick="return confirm('Yakin Hapus ?')" title="hapus">
                    <i class="fa fa-trash"></i> 
                  </a></center>
                </td>
              </tr>
              <?php
              }
              ?>
              
              </tbody>
            </table>  
              <br><br>  <br><br><br><br><br><br>  <br><br><br><br><br>
          </div>
        </div><!--/span-->
      </center>
      
        </div>

      </div>
      </div>
    </div>
    

  </div>

<!--///////////////////////////////////////////////////////
       // End Data Peminjam section 
       //////////////////////////////////////////////////////////-->

<!-- ///////////Tambah Penyetor/////////////////////// -->
  <div class="modal fade" id="tambah-penyetor" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content" style="background-color:#4a148c">
  <form class="form-horizontal" action="tambah-penyetor.php" method="POST">
  <div class="modal-header">
  <h4>Tambah Penyetor</h4>
  </div>
  <div class="modal-body">
 <div class="form-group">
  <label for="contact-name" class="col-lg-2 control-label"><h3>Nama</h3></label>
    <div class="col-lg-10"><br>
     <input type="text" id="nama" name="nmPenyetor" data-provide="typeahead" data-items="4" style="max-width:42%" required='required'>
    </div>
  </div>
  <br>
  <div class="form-group">
  <label for="contact-name" class="col-lg-2 control-label"><h3>Alamat</h3></label>
    <div class="col-lg-10"><br>
     <textarea type="text" id="nama" name="almtPenyetor" data-provide="typeahead" data-items="4" style="max-width:42%" required='required'></textarea>
    </div>
  </div>
  <br>
  <div class="form-group">
  <label for="contact-name" class="col-lg-2 control-label"><h3>No. Telepon</h3></label>
    <div class="col-lg-10"><br>
     <input type="text" id="nama" name="tlpPenyetor" data-provide="typeahead" data-items="4" style="max-width:42%" required='required'>
    </div>
  </div>
  </div>
 
  <div class="modal-footer">
   <h5 class="pull-left">Developed by : <a href="http://www.carikode.com">CariKode.Com</a></h5>
   <input type="submit" class="btn btn-primary" value="Tambah">Tambah</a>
  </div>
  </form>
  </div>
  </div>
  </div>
  <!-- ////////// end tambah penyetor section /////////////////////-->

<!-- ///////////info Penyetor/////////////////////// -->
  <div class="modal fade" id="info-penyetor" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content" style="background-color:#4a148c">
  <div class="modal-header">
  <h4>info Penyetor</h4>
  </div>
  
    <div id="info">

  
 
  </div>
 
  
  </div>
  </div>
  </div>
  </div>
  <!-- ////////// end info penyetor section /////////////////////-->




<!--///////////////////////////////////////////////////////
       // Data Penyetor section 
       //////////////////////////////////////////////////////////-->

  <div class="mainmen-parlex" id="Penyetor">
    <div class="penyetor-back">
      <div class="w-container">
        <div class="wrap">
          <div class="mainmen-div">
      <br><br>
            <h1 class="mainmen-heading">Data Penyetor</h1>
            <div class="sepreater"></div>
            <?php
            if($_SESSION['jabatan'] == 'admin'){
            echo "<a href='#tambah-penyetor' style='align:center'class='btn btn-primary' data-toggle='modal' value='Tambah'>Tambah</a>";}
            ?>
          </div>
          </div>
      <center>
      <div class="row-fluid sortable">    
        <div class="box span12">
          
          <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable" style="background-color: #16a085">
              <thead>
                <tr  style="background-color: #2c3e5f">
                  <th>Kode Pegawai</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th width='160px'>Actions</th>
                </tr>
              </thead>   
              <tbody>
              <?php
              $query = "Select * from penyetor";
              $hasil = mysql_query($query);
              while($data_pegawai = mysql_fetch_array($hasil)){
              ?>
              <tr>
                <td><?php echo $data_pegawai['kode_penyetor']?></td>
                <td class="center"><?php echo $data_pegawai['nama']?></td>
                <td class="center"><?php echo $data_pegawai['alamat']?></td>
                <td class="center"><?php echo $data_pegawai['No_telp']?></td>

                <td class="center">
                  <center>
                    <a class="btn btn-info" href="#info-penyetor" data-toggle="modal" onclick="dataPenyetor('<?php echo $data_pegawai['kode_penyetor'] ?>')" title="info">
                    <i class="fa fa-search"></i> 
                  </a>
                  <a class="btn btn-warning" href="<?php 
                  if($_SESSION['jabatan']=='admin'){
                  echo "edit-penyetor.php?kode_penyetor=" . $data_pegawai['kode_penyetor'];}else{
                    echo "#Penyetor";
                  }
                  ?>" title="edit">
                    <i class="fa fa-edit"></i>  
                  </a>
                  <a class="btn btn-danger" href="<?php 
                  if($_SESSION['jabatan']=='admin'){
                  echo "hapus-penyetor.php?kode_penyetor=" . $data_pegawai['kode_penyetor'];}else{echo "#Penyetor";}?>" onclick="
                  <?php if($_SESSION=='admin'){
                  echo "return confirm('Yakin Hapus ?')";}else{
                    "";
                  }?>" title="hapus">
                    <i class="fa fa-trash"></i> 
                  </a></center>
                </td>
              </tr>
              <?php
              }
              ?>
              </tbody>
            </table> 
             
            
              <br><br>  <br><br><br><br><br><br>  <br><br><br><br><br>
          </div>
        </div><!--/span-->
      </center>
      
        </div>

      </div>
      </div>
    </div>
    

<!--///////////////////////////////////////////////////////
       // End Data Penyetor section 
       //////////////////////////////////////////////////////////-->


<!--///////////////////////////////////////////////////////
       // Data Pegawai section 
       //////////////////////////////////////////////////////////-->

  <div class="mainmen-parlex" id="Pegawai">
    <div class="pegawai-back">
      <div class="w-container">
        <div class="wrap">
          <div class="mainmen-div">
      <br><br>
            <h1 class="mainmen-heading">Data Pegawai</h1>
            <div class="sepreater"></div>
            <?php
            if($_SESSION['jabatan'] == 'admin'){
            echo "<a href='#tambah-pegawai' style='align:center' class='btn btn-primary' data-toggle='modal' value='Tambah'>Tambah</a>";}
            ?>

          </div>
          </div>
      <center>
      <div class="row-fluid sortable">    
        <div class="box span12">
          
          <div class="box-content">
            
            <table class="table table-striped table-bordered bootstrap-datatable datatable" style="background-color: #16a085">
              <thead>
                <tr  style="background-color: #2c3e5f">
                  <th>Kode Pegawai</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th width='160px'>Actions</th>
                </tr>
              </thead>   
              <tbody>
              <?php
              $query = "Select * from karyawan";
              $hasil = mysql_query($query);
              while($data_pegawai = mysql_fetch_array($hasil)){
              ?>
              <tr>
                <td><?php echo $data_pegawai['kode_karyawan']?></td>
                <td class="center"><?php echo $data_pegawai['nama']?></td>
                <td class="center"><?php echo $data_pegawai['alamat']?></td>
                <td class="center"><?php echo $data_pegawai['Telepon']?></td>

                <td class="center">
                  <center>
                  <a class="btn btn-info" href="<?php 
                  if($_SESSION['jabatan']=='admin'){
                  echo "edit-pegawai.php?kode_karyawan=" . $data_pegawai['kode_karyawan'];}else{
                    echo "#Pegawai";
                  }
                  ?>" title="edit">
                    <i class="fa fa-edit"></i>  
                  </a>
                  <a class="btn btn-danger" href="<?php 
                  if($_SESSION['jabatan']=='admin'){
                  echo "hapus-karyawan.php?kode_karyawan=" . $data_pegawai['kode_karyawan'];}else{echo "#Pegawai";}?>" onclick="
                  return confirm('Yakin Hapus ?')" title="hapus">
                    <i class="fa fa-trash"></i> 
                  </a></center>
                </td>
              </tr>
              <?php
              }
              ?>
              </tbody>
            </table>  
            
              <br><br>  <br><br><br><br><br><br>  <br><br><br><br><br>
          </div>
        </div><!--/span-->
      </center>
      
        </div>

      </div>
      </div>
    </div>
    

  </div>

<!--///////////////////////////////////////////////////////
       // End Data Pegawai section 
       //////////////////////////////////////////////////////////-->


  <!--///////////////////////////////////////////////////////
       // Kembali section 
       //////////////////////////////////////////////////////////-->

  <div class="kembali-parlex" id="Kembali">
    <div class="kembali-back">
      <div class="w-container">
        <div class="wrap">
          <div class="mainmen">
            <h1 class="mainmen-heading">Pengembalian</h1>
            <div class="sepreater"></div>
          </div>
          <div class="w-form">
      <div class="w-col w-col-6 exp-col1">
            <form action="prosesKembali.php" method="post">
            <div class="control-group">
        <label class="control-label" for="transaksi"><h3>No Transaksi</h3></label>
          <div class="controls">
            <input type="text" id="transaksi" name="kode_sewa" data-provide="typeahead" data-items="4" data-source='["Suzuki","Daihatsu","Toyota","Honda"]'>
        </div>
      </div>

      <div class="control-group">
                <label class="control-label" for="date01"><h3>Tanggal Kembali</h3></label>
                <div class="controls">
                <input type="text" class="input-xlarge datepicker" id="kembali_pada" name="kembali_pada" value="<?php echo date("Y-m-d");?>">
                </div>
              </div>
      <div class="control-group">
        <label class="control-label"><h3>Denda</h3></label>
          <div class="controls">
                  <span class="input-xlarge uneditable-input"><?php if(isset($_SESSION['denda'])){echo $_SESSION['denda'];unset($_SESSION['denda']);}else{echo "--";};?></span>
          </div>
        </div>
             <br>
           <input class="w-button" type="submit" value="Kembali"><a href="#mainmen"><input class="w-button" type="submit" value="Selesai" style="margin-left:10px; background-color:darkblue"></a>
         </form>
     <br><br>
     </div>
     <div class="w-col w-col-6 exp-col2">
              <div class="col2-div">
                <img src="images/who-we-are.png">
              </div>
            </div>
          <div class="w-form-done">
              <p>Thank you! Your submission has been received!</p>
            </div>
            <div class="w-form-fail">
              <p>Oops! Something went wrong while submitting the form :(</p>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          </div>
        </div>
      </div>
      
      </div>
    </div>
  </div>

<!--///////////////////////////////////////////////////////
       // End kembali section 
       //////////////////////////////////////////////////////////-->



 

<!--///////////////////////////////////////////////////////
       // Data rekap section 
       //////////////////////////////////////////////////////////-->

  <div class="mainmen-parlex" id="rekap">
    <div class="pegawai-back">
      <div class="w-container">
        <div class="wrap">
          <div class="mainmen-div">
      <br><br>
            <h1 class="mainmen-heading">Rekap Peminjaman</h1>
            <div class="sepreater"></div>
            <a href="hasil.php" class="btn btn-primary" value="Penghasilan">Penghasilan</a>
          </div>
          </div>
      <center>
      <div class="row-fluid sortable">    
        <div class="box span12">
          
          <div class="box-content">
            
            <table class="table table-striped table-bordered bootstrap-datatable datatable" style="background-color: #16a085"> 
              <thead>
                <tr  style="background-color: #2c3e5f">
                  <th>Kode karyawan</th>
                  <th>kode sewa</th>
                  <th>kode mobil</th>
                  <th>tgl keluar</th>
                  <th>tgl kembali</th>
                  <th>kembali pada</th>
                  <th>denda</th>
                  <th>harga</th>
                </tr>
              </thead>   
              <tbody>
              <?php
              $query = "Select * from detail_sewa";
              $hasil = mysql_query($query);
              while($data_pegawai = mysql_fetch_array($hasil)){
              ?>
              <tr>
                <td><?php echo $data_pegawai['kode_karyawan']?></td>
                <td class="center"><?php echo $data_pegawai['kode_sewa']?></td>
                <td class="center"><?php echo $data_pegawai['kode_mobil']?></td>
                <td class="center"><?php echo $data_pegawai['tgl_keluar']?></td>
                <td class="center"><?php echo $data_pegawai['tgl_kembali']?></td>
                <td class="center"><?php echo $data_pegawai['kembali_pada']?></td>
                <td class="center"><?php echo $data_pegawai['denda']?></td>
                <td class="center"><?php echo $data_pegawai['Harga']?></td>
                
                  
              </tr>
              <?php
              }
              ?>
              </tbody>
            </table>  
              <br><br>  <br><br><br><br><br><br>  <br><br><br><br><br>
          </div>
        </div><!--/span-->
      </center>
      
        </div>

      </div>
      </div>
    </div>
    

  </div>

<!--///////////////////////////////////////////////////////
       // End rekap section 
       //////////////////////////////////////////////////////////-->


   

       <!--///////////////////////////////////////////////////////
       // Tambah Merk section 
       //////////////////////////////////////////////////////////-->

<!--  <div class="Tambah-parlex" id="Tambah">
    <div class="tbhmerk-back">
      <div class="w-container">
        <div class="wrap">
          <div class="mainmen">
            <h1 class="mainmen-heading">Tambah Merk</h1>
            <div class="sepreater"></div>
          </div>
          <div class="w-form">
      <div class="w-col w-col-6 exp-col1">
            <form action="tambah-merk.php" method="POST">
      <div class="control-group">
        <label class="control-label" for="nmMerk"><h3>Merk</h3></label>
          <div class="controls">
            <input type="text" id="nmMerk" name="nmMerk" data-provide="typeahead" data-items="4" data-source='["Suzuki","Daihatsu","Toyota","Honda"]'>
        </div>
      </div>
             <br>
           <input class="w-button" type="submit" value="Tambah">
         </form>
     <br><br>
     </div>
     <div class="w-col w-col-6 exp-col2">
              <div class="col2-div">
                <img src="images/who-we-are.png">
              </div>
            </div>
          <div class="w-form-done">
              <p>Thank you! Your submission has been received!</p>
            </div>
            <div class="w-form-fail">
              <p>Oops! Something went wrong while submitting the form :(</p>
            </div>
          </div>
        </div>
      </div>
      
      </div>
    </div>
  </div>-->

<!--///////////////////////////////////////////////////////
       // End tambah merksection 
       //////////////////////////////////////////////////////////-->

       
 <!--///////////////////////////////////////////////////////
       // Service section 
       //////////////////////////////////////////////////////////-->


 

       <!--///////////////////////////////////////////////////////
       // End Footer section 
       //////////////////////////////////////////////////////////-->

  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/normal.js"></script>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/carousels.js"></script>
  <script type="text/javascript" src="js/slider-modernizr.js"></script>
  <script src="js/classie.js"></script>
  <script src="js/portfolio-effects.js"></script>
  <script src="js/toucheffects.js"></script>
  <script src="js/modernizr.js"></script>
  <script src="js/animation.js"></script>
  <script src="js/jquery-1.9.1.min.js"></script>
  <script src="js/jquery-migrate-1.0.0.min.js"></script>
  
    <script src="js/jquery-ui-1.10.0.custom.min.js"></script>
  
    <script src="js/jquery.ui.touch-punch.js"></script>
  
    <script src="js/modernizr.js"></script>
  
    <script src="js/bootstrap.min.js"></script>
  
    <script src="js/jquery.cookie.js"></script>
  
    <script src='js/fullcalendar.min.js'></script>
  
    <script src='js/jquery.dataTables.min.js'></script>

    <script src="js/excanvas.js"></script>
  <script src="js/jquery.flot.js"></script>
  <script src="js/jquery.flot.pie.js"></script>
  <script src="js/jquery.flot.stack.js"></script>
  <script src="js/jquery.flot.resize.min.js"></script>
  
    <script src="js/jquery.chosen.min.js"></script>
  
    <script src="js/jquery.uniform.min.js"></script>
    
    <script src="js/jquery.cleditor.min.js"></script>
  
    <script src="js/jquery.noty.js"></script>
  
    <script src="js/jquery.elfinder.min.js"></script>
  
    <script src="js/jquery.raty.min.js"></script>
  
    <script src="js/jquery.iphone.toggle.js"></script>
  
    <script src="js/jquery.uploadify-3.1.min.js"></script>
  
    <script src="js/jquery.gritter.min.js"></script>
  
    <script src="js/jquery.imagesloaded.js"></script>
  
    <script src="js/jquery.masonry.min.js"></script>
  
    <script src="js/jquery.knob.modified.js"></script>
  
    <script src="js/jquery.sparkline.min.js"></script>
  
    <script src="js/counter.js"></script>
  
    <script src="js/retina.js"></script>

    <script src="js/custom.js"></script>

    <script type="text/javascript">
      function dataPenyetor(kode){
        
        document.getElementById('info').innerHTML="";
        $.ajax({
          url: "data-penyetor.php?kode_penyetor=" + kode,
          success: function(msg){
            
            $('#info').html(msg);
          },
          dataType: "html"
        });
        
      }

    </script>

</body>
</html>