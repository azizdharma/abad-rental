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

?>
<html>
<head>
	<title>Print Document</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<table width="90%" style="border-collapse:collapse;" align="center">
        <tr>
            <td width="180px"><h3><font color="black">No.Transaksi <font></h3></td>
            <td><h3><font color="black">:<?php echo $data['kode_sewa']?></font></h3></td>        
        </tr>
        <tr>
            <td width="180px"><h3><font color="black">Nama  <font></h3></td>
            <td><h3><font color="black"><?php echo $data['nama']?></font></h3></td>     
        </tr>
        <tr>
            <td width="180px"><h3><font color="black">Harga <font></h3></td>
            <td><h3><font color="black">:<?php echo $data['harga']?></font></h3></td>     
        </tr>
        <tr>
            <td width="180px"><h3><font color="black">tanggal pinjam :<font></h3></td>
            <td><h3><font color="black">:<?php echo $data['pinjam']?></font></h3></td>       
        </tr>
        <tr>
            <td width="180px"><h3><font color="black">tanggal kembali :<font></h3></td>
            <td><h3><font color="black">:<?php echo $data['kembali']?></font></h3></td>      
        </tr><tr>
            <td width="180px"><h3><font color="black">mobil :<font></h3></td>
            <td><h3><font color="black">:<?php echo $data['nama_mobil']?></font></h3></td>       
        </tr>
    </table>
    <br>
    <a href="index.php" class="btn btn-primary" value="kembali">Kembali</a>
    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
</body>
</html>