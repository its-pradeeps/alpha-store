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

$email=$_SESSION['email'];
$name=$_POST["name"];
$password=$_POST["password"];
$phoneno=$_POST["phone"];
$houseno=$_POST["houseno"];
$streetname=$_POST["streetname"];
$district=$_POST["district"];
$state=$_POST["state"];

//check if any of these values to be inserted are empty
if($name=="" || $password=="" || $email=="" || $phoneno=="+91" || $houseno=="" || $streetname=="" || $district=="" || $state=="")
{
  echo "Empty Field(s)";
  $_SESSION["tracker"]="accountsclicked();";
  $_SESSION["alertstatus"]="alert('Empty Field(s) in update');";
  header('LOCATION:../web.php');
  die();
}
  

echo $name,$password,$phoneno,$houseno,$streetname,$state,$district ;

if($con->query("UPDATE logininfo SET logininfo.password='$password' WHERE logininfo.email='$email';")===TRUE)
{ echo "update password successful";
  if($con->query("UPDATE userinfo SET userinfo.uname='$name',userinfo.phno='$phoneno',userinfo.house='$houseno',
   userinfo.street='$streetname',userinfo.district='$district',userinfo.state='$state' WHERE userinfo.email='$email';"
   )===TRUE)
   {
      echo "update info successful";
      session_unset();
      $_SESSION["alertstatus"]="alert('Update Successful. Logged Out');";
   }

  else
   echo "update failed";
}
else
echo "updation failed"; 
$con->close();


header('LOCATION:../web.php');

?>
