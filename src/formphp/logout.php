<?php
session_start();
session_unset();
$_SESSION["alertstatus"]="alert('Log out successful');";
header('LOCATION:../web.php');
?>