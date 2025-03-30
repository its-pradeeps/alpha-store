<?php

session_start();

$pid=$_POST["pid"];
$email=$_POST["email"];
$username=getenv('MYSQL_USER');
$password=getenv('MYSQL_PASSWORD');
$serverhost=getenv('MYSQL_HOST');
$database="ALPHA_STORE";

$con=new mysqli($serverhost,$username,$password,$database);
if($con->connect_error)
  die("failed to connect");
  echo $pid;

  if($con->query("SELECT * FROM purchasedproducts WHERE 
  purchasedproducts.pid=$pid AND purchasedproducts.email='$email' AND purchasedproducts.deliverystatus='F';")->num_rows>0)
  {
       $con->query("UPDATE purchasedproducts SET purchasedproducts.deliverystatus='T' WHERE 
       purchasedproducts.pid=$pid AND purchasedproducts.email='$email' AND purchasedproducts.deliverystatus='F' LIMIT 1;");
       echo "item Delivered";
       $_SESSION["alertstatus"]="alert('Product Delivery successful');";
  }
  else
   {   echo "delivery fail";
    $_SESSION["alertstatus"]="alert('Product Delivery FAILED');";
   }

$con->close();
$_SESSION["tracker"]="orderspage();";

header('LOCATION:../web.php');
?>