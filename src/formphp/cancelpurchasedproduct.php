<?php
session_start();
echo $_POST["pid"];
echo $_SESSION["email"];

$pid=$_POST["pid"];
$email=$_SESSION["email"];

$username=getenv('MYSQL_USER');
$password=getenv('MYSQL_PASSWORD');
$serverhost=getenv('MYSQL_HOST');
$database="ALPHA_STORE";

$con=new mysqli($serverhost,$username,$password,$database);
if($con->connect_error)
  die("failed to connect");

  if($con->query("DELETE FROM purchasedproducts  WHERE 
                purchasedproducts.pid=$pid AND purchasedproducts.email='$email' AND purchasedproducts.deliverystatus='F'
                 LIMIT 1 ;")===TRUE)
      {
        echo "order canceled";
        $_SESSION["alertstatus"]="alert('Purchase Cancelled');";
      }
  else
   { echo "cannot cancel order";
    $_SESSION["alertstatus"]="alert('Purchase Cancel failed');";}

$con->close();
$_SESSION["tracker"]="orderspage();";


header("Location:../web.php");

?>