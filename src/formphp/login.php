<?php

session_start();

$username=getenv('MYSQL_USER');
$password=getenv('MYSQL_PASSWORD');
$serverhost=getenv('MYSQL_HOST');
$database="ALPHA_STORE";

$con=new mysqli($serverhost,$username,$password,$database);
if($con->connect_error)
  die("failed to connect");

  $password=$_POST["password"];
  $email=$_POST["email_id"];


  $result = $con->query("SELECT uname,email FROM (userinfo NATURAL JOIN logininfo) 
  WHERE logininfo.email='$email' AND logininfo.password='$password';");
  if($result->num_rows==1)
  {
    $row=$result->fetch_assoc();
     $_SESSION["uname"]=$row["uname"];
     $_SESSION["email"]=$row["email"];
     $_SESSION["usertype"]="user";
     $_SESSION["alertstatus"]="alert('Login Successful : Hi  ".$row['uname']."');";
   }
      
 else
 {$result = $con->query("SELECT oname,email FROM (ownerinfo NATURAL JOIN logininfo) 
  WHERE logininfo.email='$email' AND logininfo.password='$password';");
  if($result->num_rows==1)
  {$row=$result->fetch_assoc();
     $_SESSION["uname"]=$row["oname"];
     $_SESSION["email"]=$row["email"];
     $_SESSION["usertype"]="superuser";
     $_SESSION["alertstatus"]="alert('Login Successful : Hi SUPERUSER  ".$row['oname']."');";
     
  }
  else 
  {
     $_SESSION["uname"]=""; 
     $_SESSION["tracker"]="loginform();";
     $_SESSION["alertstatus"]="alert('Login failed : Invalid Email or Password');";
  }
  }  

  $con->close();
 header("Location:../web.php");
?>