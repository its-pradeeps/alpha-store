<?php

$username=getenv('MYSQL_USER');
$password=getenv('MYSQL_PASSWORD');
$serverhost=getenv('MYSQL_HOST');
$database="ALPHA_STORE";

$con=new mysqli($serverhost,$username,$password,$database);
if($con->connect_error)
  die("failed to connect");


  
$productarray=$con->query("SELECT pname,category,price,quantity,imgurl,pdesc1,pdesc2,pid from products;");
if($productarray->num_rows>0)
{
    while($product=$productarray->fetch_assoc())
{
echo '<div class="card" onmouseover="cardhover(this)" onmouseout="cardunhover(this)" onclick="cardclicked(this)" >
<img src="./resources/productsimg/'.$product["imgurl"].' "alt="'.$product["imgurl"].'" height=200px width=150px>
<div class="container_'.$product["category"].'">
   <h4 style="max-height:5; max-width:190;">'.$product["pname"].'</h4>
   <p style="max-height:5; max-width:190;">RS '.$product["price"].'</p>
   <p style="max-height:5; max-width:190;">'.$product["pdesc1"].'</p>
   <p style="max-height:5; max-width:190;">*'.($product["quantity"]>0?"in Stock":"Out of stock").'</P>
   <p style=" display: none;">'.$product["pdesc2"].'</p>
   <p style=" display: none;">'.$product["pid"].'</p>
   <p style=" display: none;">'.$product["quantity"].'</p>

</div> 
   
</div>'; 
}
}
$con->close();
?>




