<?php
require_once("initial.php");
//session_start();
$cpage=$_SESSION["cpage"];
session_unset();
    $_SESSION['FBID'] = NULL;
    $_SESSION['FULLNAME'] = NULL;
    $_SESSION['EMAIL'] =  NULL;
header("Location: ".$cpage);        
?>