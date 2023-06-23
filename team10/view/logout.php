<?php 
session_start(); 
session_destroy(); 
setcookie("cookieAccount","",time());
setcookie("cookiePassword","",time());
header('location:./loginPage.php');