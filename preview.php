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
$kd_sewa = $_GET['kode_sewa'];
$select_detil = "SELECT * from preview where kode_sewa = '$kd_sewa'";
$sql_detil = mysql_query("$select_detil");
$data = mysql_fetch_array($sql_detil);
echo "$kd_sewa";
?>
	<table width="90%" style="border-collapse:collapse;" align="center">
    	<tr>
    		<td width="180px"><h3><font color="black">No.Transaksi :<font></h3></td>
    		<td><h3><font color="black"><?php echo $data['kode_sewa']?></font></h3></td>		
    	</tr>
    	<tr>
    		<td width="180px"><h3><font color="black">Nama :<font></h3></td>
    		<td><h3><font color="black"><?php echo $data['nama']?></font></h3></td>		
    	</tr>
    	<tr>
    		<td width="180px"><h3><font color="black">tanggal pinjam :<font></h3></td>
    		<td><h3><font color="black"><?php echo $data['pinjam']?></font></h3></td>		
    	</tr>
    	<tr>
    		<td width="180px"><h3><font color="black">tanggal kembali :<font></h3></td>
    		<td><h3><font color="black"><?php echo $data['kembali']?></font></h3></td>		
    	</tr><tr>
    		<td width="180px"><h3><font color="black">mobil :<font></h3></td>
    		<td><h3><font color="black"><?php echo $data['nama_mobil']?></font></h3></td>		
    	</tr>
    </table>
    <br />
    <button style="margin-left:5%" onclick="print_d()">Print Document</button>
    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>





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