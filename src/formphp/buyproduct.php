<?php
session_start();
$email=$_SESSION["email"];
$pid=$_POST["pid"];
$username=getenv('MYSQL_USER');
$password=getenv('MYSQL_PASSWORD');
$serverhost=getenv('MYSQL_HOST');
$database="ALPHA_STORE";

$con=new mysqli($serverhost,$username,$password,$database);

if($con->connect_error)
  die("failed to connect");

if($con->query("INSERT INTO purchasedproducts(email, pid, deliverystatus) VALUES ('$email' , '$pid' , 'F')")===TRUE)
    echo "order placed";
else
   echo "purchase failed";
$con->close();

$_SESSION["alertstatus"]="alert('Product Purchased');";

header("Location:../web.php");

?>