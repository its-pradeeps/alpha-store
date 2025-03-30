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


   $name=$_POST["name"];
   $password=$_POST["password"];
   $email=$_POST["email_id"];
   $phoneno=$_POST["phone"];
   $houseno=$_POST["houseno"];
   $streetname=$_POST["streetname"];
   $district=$_POST["district"];
   $state=$_POST["state"];
   $statusok=1;

//check if any of these values to be inserted are empty
if($name=="" || $password=="" || $email=="" || $phoneno=="+91" || $houseno=="" || $streetname=="" || $district=="" || $state=="")
{
  echo "Empty Field(s)";
  $_SESSION["tracker"]="signup();";
  $statusok=0;
  $_SESSION["alertstatus"]="alert('Empty Field(s)');";
}
  
//Query to insert login info of the user 
if($statusok==1)
{
 if($con->query("INSERT INTO logininfo(email,password) 
   VALUES ('$email','$password');")===TRUE)
 echo "inserted into login table";
 else
 {
 $_SESSION["tracker"]="signup();";
 echo "failed";
 $_SESSION["alertstatus"]="alert('Signin failed');";
 $statusok=0;
 }
}

//Query to insert user info 
if($statusok==1)
{
   if($con->query("INSERT INTO userinfo(uname,email,phno,house,street,district,state) 
     VALUES ('$name','$email','$phoneno','$houseno','$streetname','$district','$state');")===TRUE)
   {
     echo "inserted into userinfo table";
     $_SESSION["uname"]=$name;
     $_SESSION["email"]=$email;
     $_SESSION["usertype"]="user";
     $_SESSION["alertstatus"]="alert('Signin Successful : Hi  ".$name."');";
   }

   else
   {
   echo "failed";
   $_SESSION["tracker"]="signup();";
  }
}
   $con->close();

   header("Location:../web.php");

?>