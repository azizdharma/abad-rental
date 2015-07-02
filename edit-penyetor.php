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
    $kode_penyetor = $_GET['kode_penyetor'];
    $sql = "SELECT * FROM penyetor WHERE `kode_penyetor`='$kode_penyetor'";
    $result = mysql_query($sql);
    $data2 = mysql_fetch_array($result);

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['tlp'];
    
    $sql = "UPDATE `penyetor` SET nama = '$nama', alamat = '$alamat', No_telp = '$tlp' WHERE `kode_penyetor`='$kode_penyetor'";
    $result = mysql_query($sql);
   echo $sql;
    $_SESSION['notif'] = "Berhasil Mengubah Data Buku";
    header('Location:index.php#Penyetor');
}?>
    <div class="parlex8-back">
      <div class="w-container">
        <div class="wrap">
          <div class="mainmen">
            <h1 class="mainmen-heading">Edit Penyetor</h1>
            <div class="sepreater"></div>
          </div>
          <div class="w-form">
      <div class="w-col w-col-6 exp-col1">
            <form action="" method="POST">
        <div class="control-group">
        <label class="control-label" for="harga"><h3>Nama</h3></label>
          <div class="controls">
            <input type="text" id="harga" name="nama" data-provide="typeahead" data-items="4" value="<?php echo $data2['nama']?>">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="harga"><h3>Alamat</h3></label>
          <div class="controls">
            <input type="text" id="harga" name="alamat" data-provide="typeahead" data-items="4" value="<?php echo $data2['alamat']?>">
        </div>
      </div>
                
     
      <div class="control-group">
        <label class="control-label" for="harga"><h3>No. Telepon</h3></label>
          <div class="controls">
            <input type="text" id="harga" name="tlp" data-provide="typeahead" data-items="4" value="<?php echo $data2['No_telp']?>">
        </div>
      </div>
             <br>
           <input class="w-button" type="submit" value="simpan" name="simpan">
           <a href="index.php#Penyetor" class="w-button">Batal</a>
         </form>
         <br><br><br><br><br><br><br><br><br><br>
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