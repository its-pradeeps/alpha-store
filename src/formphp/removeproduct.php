<?php
session_start(); 

$username=getenv('MYSQL_USER');
$password=getenv('MYSQL_PASSWORD');
$serverhost=getenv('MYSQL_HOST');
$database="ALPHA_STORE";

$con=new mysqli($serverhost,$username,$password,$database);
if($con->connect_error)
  die("failed to connect");

  $pid=$_POST["pid"];
  $product=$con->query("SELECT pname,imgurl FROM products WHERE products.pid=$pid;");
  if($product->num_rows==1)
  {
  $con->query("DELETE FROM products WHERE products.pid=$pid;");
  echo "product image delete status: ".unlink("../resources/productsimg/".$product->fetch_assoc()["imgurl"]);
  echo "product removed PID:  ".$pid;
  $_SESSION["alertstatus"]="alert('Product removed successfully');";
  }
  else
  echo "no such product";

 header("LOCATION:../web.php");
?>