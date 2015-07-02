<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['jabatan']);
header('location:index2.php');
?>

