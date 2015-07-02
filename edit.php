<html>
<head>
  <meta charset="utf-8">
  <title>ABAD RENTAL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/normal.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="css/animation.css">
  <link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css">
  <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
  <link id="base-style" href="css/style.css" rel="stylesheet">
  <link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
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
    header('location:index2.php');}?>



  <div class="Tambah-parlex" id="edit">
    <?php
    $kode_mobil = $_GET['kode_mobil'];
    $sql = "SELECT * FROM `daftar_mobil` WHERE `kode mobil`='$kode_mobil'";
    $result = mysql_query($sql);
    $data2 = mysql_fetch_array($result);

if (isset($_POST['simpan'])) {
    // $kode_mobil = $_POST['kode_mobil'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis_mobil'];
    $Harga = $_POST['harga'];
    $penyetor = $_POST['penyetor'];
    $merk = $_POST['merk'];
    
    $sql = "UPDATE `mobil` SET `kode_jenis`='$jenis',
                                  `kode_merk`='$merk',
                                  `kode_penyetor`='$penyetor',
                                  `nama`='$nama',
                                  `harga`='$Harga'
                                  WHERE `kode_mobil`=$kode_mobil";
    $result = mysql_query($sql);
   echo $sql;
    $_SESSION['notif'] = "Berhasil Mengubah Data Buku";
    header('Location:index.php');
}?>
    <div class="parlex8-back">
      <div class="w-container">
        <div class="wrap">
          <div class="mainmen">
            <h1 class="mainmen-heading">Edit Mobil</h1>
            <div class="sepreater"></div>
          </div>
          <div class="w-form">
      <div class="w-col w-col-6 exp-col1">
            <form action="" method="POST">
      <?php
      $sql = "SELECT * FROM `merk`";
      $result = mysql_query($sql);

      ?>
      <div class="control-group">
                <label class="control-label" for="selectError3"><h3>Merk Mobil</h3></label>
                <div class="controls">
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
                </div><font color=red><h3><?php echo $data2['merk']?></h3></font><div class="control-group">
        <label class="control-label" for="nama"><h3>Nama</h3></label>
          <div class="controls">
            <input type="text" id="nama" name="nama" data-provide="typeahead" data-items="4" value="<?php echo $data2['nama mobil']?>">
        </div>
      </div>
      <?php
      $sql = "SELECT * FROM `penyetor`";
      $result = mysql_query($sql);

      ?>
      <div class="control-group">
                <label class="control-label" for="selectError3"><h3>Penyetor</h3></label>
                <div class="controls">
                  <select id="Penyetor" name="penyetor">
                  <?php
                  while($row=mysql_fetch_array($result)) {
                  ?>
                  <option value="<?php echo $row['kode_penyetor'] ?>"><?php echo $row['nama'] ?></option>
                  <?php
                  }
                  ?>
                  </select>
                </div>
                </div><font color=red><h3><?php 
                $result = mysql_query("Select p.nama from penyetor p, mobil where p.kode_penyetor = mobil.kode_penyetor and mobil.kode_mobil=$kode_mobil");
                $hasil = mysql_fetch_array($result);
                echo $hasil['nama']?></h3></font>
      <div class="control-group">
        <label class="control-label" for="harga"><h3>Harga</h3></label>
          <div class="controls">
            <input type="text" id="harga" name="harga" data-provide="typeahead" data-items="4" data-source='["City Car"]' value="<?php echo $data2['harga']?>">
        </div>
      </div>
      <?php
      $sql = "SELECT * FROM `jenis_mobil`";
      $result = mysql_query($sql);

      ?>
      <div class="control-group">
                <label class="control-label" for="selectError3"><h3>Tipe Mobil</h3></label>
                <div class="controls">
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
                </div><font color=red><h3><?php 
                $result = mysql_query("Select j.jenis from jenis_mobil j, mobil where j.kode_jenis = mobil.kode_jenis and mobil.kode_mobil=$kode_mobil");
                $hasil = mysql_fetch_array($result);
                echo $hasil['jenis']?></h3></font>
      
             <br>
           <input class="w-button" type="submit" value="simpan" name="simpan">
           <a href="index.php" class="w-button">Batal</a>
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
  </div>

<!--///////////////////////////////////////////////////////
       // End edit mobil section 
       //////////////////////////////////////////////////////////-->
</body>
</html>