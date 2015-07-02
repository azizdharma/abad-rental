<?php
  session_start();
  $connect=mysql_connect("localhost","root");
  mysql_select_db("rental");
  if(isset($_SESSION['username'])){
  unset($_SESSION['blmlg']);
  }else{
  $_SESSION['blmlg'] = "Anda blm login";
  header('location:index2.php');}
    
    $kode_mobil = $_GET['kode_mobil'];

    $mobil = "select * from mobil where kode_mobil='$kode_mobil'";
    $hasil = mysql_query($mobil);

    $data = mysql_fetch_array($hasil);

    if($data['stok'] == 0){
      $_SESSION['mobil_kosong'];
      header('location:index.php');
    }else{
      unset($_SESSION['mobil_kosong']);
    }
?>

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
<!--///////////////////////////////////////////////////////
       // Pinjam section 
       //////////////////////////////////////////////////////////-->


  <div class="kembali-parlex" id="Pinjam">
    <div class="kembali-back">
      <div class="w-container">
        <div class="wrap">
          <div class="mainmen">
            <h1 class="mainmen-heading">Data Peminjam</h1>
            <div class="sepreater"></div>
          </div>
          <div class="w-form">
      <div class="w-col w-col-6 exp-col1">
            <form action="<?php echo "prosesPinjam.php?kd_mobil=" . $data['kode_mobil']  ?>" method="post">
              <div class="control-group">
        <label class="control-label"><h3>Mobil</h3></label>
          <div class="controls">
                  <input class="input-xlarge uneditable-input"
                  value="<?php echo $data['nama']?>"
                  name="kode_mobil" required='required..'
                  >
          </div>
        </div>
            <div class="control-group">
        <label class="control-label" for="nmPenyewa"><h3>Nama</h3></label>
          <div class="controls">
            <input type="text" id="nmPenyewa"  data-provide="typeahead" data-items="4" data-source='[]' name="nmPenyewa" required='required..'>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="tlpPenyewa"><h3>No Telepon</h3></label>
          <div class="controls">
            <input type="text" id="tlpPenyewa"  data-provide="typeahead" data-items="4" data-source='[]' name="tlpPenyewa" required='required..'>
        </div>
      </div>
      <div class="control-group">
                <label class="control-label"><h3>Kelengkapan</h3></label>
                <div class="controls">
                  <label class="checkbox inline">
                  <input type="checkbox" id="inlineCheckbox1" value="Y" name="STNK" required='required..'>STNK
                  </label>
                  <label class="checkbox inline">
                  <input type="checkbox" id="inlineCheckbox2" value="Y" name="SIM" required='required..'>SIM
                  </label>
                </div>
                </div>
      <div class="control-group">
        <label class="control-label" for="almtPenyewa"><h3>Alamat</h3></label>
          <div class="controls">
            <textarea class="w-input message" name="almtPenyewa" required='required..'></textarea>
        </div>
      </div>
      <div class="control-group">
                <label class="control-label" for="date01"><h3>Tanggal Sewa</h3></label>
                <div class="controls">
                <input type="text" class="input-xlarge datepicker" id="tgl_sewa" name="tgl_sewa" value="<?php echo date("d-m-Y");?>" required='required..'>
                </div>
              </div>
      <div class="control-group">
                <label class="control-label" for="date01"><h3>Tanggal Kembali</h3></label>
                <div class="controls">
                <input type="text" class="input-xlarge datepicker" id="tgl_kembali" name="tgl_kembali" value="<?php echo date("d-m-Y");?>" required='required..'>
                </div>
              </div>
             <br>
           <input class="w-button" type="submit" value="OK">
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
            <br><br>  <br><br><br><br><br><br>  <br><br><br><br><br><br>  <br><br><br><br><br><br>  <br><br><br><br><br><br>  <br><br>
          </div>
        </div>
      </div>
      
      </div>
    </div>
  </div>

<!--///////////////////////////////////////////////////////
       // End pinjam section 
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

</body>
</html>