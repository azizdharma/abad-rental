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
    header('location:index2.php');}

    $bulan = "";
    $tahun = "";


    if (isset($_POST['Lihat'])) {
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    
    

    $tes = mysql_query("select sum(harga)+sum(denda) 'hasil' from detail_sewa, penyewa p where month(p.tgl_transaksi)=$bulan and year(p.tgl_transaksi) = $tahun");
    $data = mysql_fetch_array($tes);}
    ?>



  <div class="Tambah-parlex" id="edit">
    <div class="parlex8-back">
      <div class="w-container">
        <div class="wrap">
          <div class="mainmen">
            <h1 class="mainmen-heading">Lihat Hasil</h1>
            <div class="sepreater"></div>
          </div>
          <div class="w-form">
      <div class="w-col w-col-6 exp-col1">
            <form action="" method="POST">
        <div class="control-group">
        <label class="control-label" for="harga"><h3>Bulan</h3></label>
          <div class="controls">
            <input type="text" id="harga" name="bulan" data-provide="typeahead" data-items="4" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="harga"><h3>Tahun</h3></label>
          <div class="controls">
            <input type="text" id="harga" name="tahun" data-provide="typeahead" data-items="4" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><h3>Hasil</h3></label>
          <div class="controls">
                  <input class="input-xlarge uneditable-input"
                  value="<?php if(isset($_POST['Lihat'])){echo $data['hasil'];}?>"
                  name="kode_mobil"
                  >
          </div>
        </div>
             <br>
           <input class="w-button" type="submit" value="Lihat" name="Lihat">
           <a href="index.php#rekap" class="w-button" >Kembali</a>
         </form>
         
     <br><br><br><br><br><br>
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