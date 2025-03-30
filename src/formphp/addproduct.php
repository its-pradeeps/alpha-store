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

$pname=$_POST['pname'];
$category=$_POST["category"];
$desc1=$_POST['pdesc1'];
$desc2=$_POST["pdesc2"];
$price=$_POST['price'];
$quantity=$_POST["quantity"];
$uploadok=1;
If($pname=="" || $category=="" || $desc1=="" || $desc2=="" || $price=="" || $quantity=="")
$uploadok=0;

include "imgupload.php";
if($uploadok==0)
{
echo "Error: Product not uplaoded";
$_SESSION["alertstatus"]="alert('Failed to add product');";
$_SESSION["tracker"]="accountsclicked();";
}
//Adding product into database
else
{
//if($con->query("INSERT INTO `products`(`pname`, `category`, `pdesc1`, `pdesc2`, `price`, 
//`quantity`, `imgurl`) VALUES ('$pname','$category','$desc1','$desc2',$price,$quantity,'$imgname');")===TRUE)
 if($con->query("CALL addproducts( '$pname' , '$category' , '$desc1' , '$desc2' , '$price' , '$quantity' ,
 '$imgname');")===TRUE)
  { 
     echo "---product Added  Successfully";
     $_SESSION["alertstatus"]="alert('Product added');";
  }
else 
   {
      echo "---Failed adding product";
      $_SESSION["alertstatus"]="alert('Failed to add product');";
      $_SESSION["tracker"]="accountsclicked();";
   }
}
   header("LOCATION:../web.php");
?>