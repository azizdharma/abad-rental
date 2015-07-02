<div id="login">
  <?php
session_start();
$connect=mysql_connect("localhost","root");
mysql_select_db("rental");
?>
  <?php
      if(isset($_SESSION['blmdftr'])){
      echo "<center><font color=white>".$_SESSION['blmdftr']."</font></center>";}
      else if(isset($_SESSION['blmlg'])){
      echo "<center><font color=white>".$_SESSION['blmlg']."</font></center>";
      }
      else if(isset($_SESSION['pwslh'])){
      echo "<center><font color=white>".$_SESSION['pwslh']."</font></center>";}
      else {
      echo "<br><br>";}
      ?>
  <div id="triangle"></div>
  
  <h1><img src="images/logo_Small_bgt.png"></h1>
  <form action='proseslogin.php' method='post'>
    <input type="input" placeholder="Username" name='user'/>
    <input type="password" placeholder="Password" name='pw'/>
    <input type="submit" value="Login" />
  </form>
</div>


<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

*{margin:0;padding:0;}

body{
  background:#730B0B;
  font-family:'Open Sans',sans-serif;
}

.button{
  width:92%;
  background:#d82208;
  display:block;
  margin:0 auto;
  margin-top:1%;
  padding:10px;
  text-align:center;
  text-decoration:none;
  color:#fff;
  cursor:pointer;
  transition:background .3s;
  -webkit-transition:background .3s;
}

.button:hover{
  background:#2288bb;
}

#login{
  width:400px;
  margin:0 auto;
  margin-top:130px;
  margin-bottom:2%;
  transition:opacity 1s;
  -webkit-transition:opacity 1s;
}

#triangle{
  width:0;
  border-top:12x solid transparent;
  border-right:12px solid transparent;
  border-bottom:12px solid #d82208;
  border-left:12px solid transparent;
  margin:0 auto;
}

#login h1{
  background:#d82208;
  padding:20px 0;
  font-size:140%;
  font-weight:300;
  text-align:center;
  color:#fff;
}

form{
  background:#C8C8C8;
  padding:6% 4%;
}

input[type="email"],input[type="password"], input[type="input"]{
  width:100%;
  background:#fff;
  margin-bottom:4%;
  border:1px solid #ccc;
  padding:4%;
  font-family:'Open Sans',sans-serif;
  font-size:95%;
  color:#555;
}

input[type="submit"]{
  width:100%;
  background:#d82208;
  border:0;
  padding:4%;
  font-family:'Open Sans',sans-serif;
  font-size:100%;
  color:#fff;
  cursor:pointer;
  transition:background .3s;
  -webkit-transition:background .3s;
}

input[type="submit"]:hover{
  background:#2288bb;
}
</style>