<?php
session_start();

//Establishing Database Connection
$username=getenv('MYSQL_USER');
$password=getenv('MYSQL_PASSWORD');
$serverhost=getenv('MYSQL_HOST');
$database="ALPHA_STORE";

$con=new mysqli($serverhost,$username,$password,$database);
if($con->connect_error)
  die("failed to connect");

$pid=$_POST['pid'];
$quantity=$_POST["quantity"];


echo $pid,$quantity ;

if($quantity!="" && ($con->query("UPDATE products SET products.quantity=$quantity WHERE products.pid=$pid;")===TRUE))
   {echo "update product successful";
   $_SESSION["alertstatus"]="alert('Product quantity updated successfully');"; 
   }
else
{
   echo "update product failed";
   $_SESSION["alertstatus"]="alert('Failed to update product');";
   $_SESSION["tracker"]="accountsclicked();";
}

   header("LOCATION:../web.php");
?>