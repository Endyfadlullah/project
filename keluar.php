<?php 
session_start();
session_destroy();
header("location:login.php");
// header("location:login.html");
?>
