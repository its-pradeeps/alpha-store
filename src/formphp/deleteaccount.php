<?php
session_start(); 
$password=$_POST["password"];
$email=$_SESSION["email"];
echo $email.'\n'.$password;

$username=getenv('MYSQL_USER');
$password=getenv('MYSQL_PASSWORD');
$serverhost=getenv('MYSQL_HOST');
$database="ALPHA_STORE";

$con=new mysqli($serverhost,$username,$password,$database);

if($con->connect_error)
  die("failed to connect");

$user=$con->query("SELECT * FROM logininfo WHERE logininfo.email='$email' AND logininfo.password='$password';");
if($user->num_rows==1)
{
  $con->query("DELETE FROM logininfo WHERE logininfo.email='$email' AND logininfo.password='$password';");  
  echo "Account Deleted";
  session_unset();
  $_SESSION["alertstatus"]="alert('Account Deleted');";
  $con->close();

}
else
{
  echo "Invalid password";
  $_SESSION["alertstatus"]="alert('Invalid Password');";
  $_SESSION["tracker"]="accountsclicked();";
 
}
header('LOCATION:../web.php');




?>
