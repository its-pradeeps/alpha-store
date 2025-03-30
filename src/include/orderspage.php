
   <!--purchased products page-->
  <?php

$username=getenv('MYSQL_USER');
$password=getenv('MYSQL_PASSWORD');
$serverhost=getenv('MYSQL_HOST');
$database="ALPHA_STORE";

$con=new mysqli($serverhost,$username,$password,$database);
  if($con->connect_error)
    die("failed to connect");


if($_SESSION["uname"]!="")
{  
  if($_SESSION["usertype"]=="user")
  {//TO DISPLAY USER WITH HIS ORDERS
    $email = $_SESSION["email"];
     $userinfo=$con->query("SELECT * FROM userinfo WHERE userinfo.email='$email' ;");    
     $userrow=$userinfo->fetch_assoc();
    
  
      $productspurchased=$con->query("SELECT * FROM (`purchasedproducts` NATURAL JOIN `products`)
       WHERE purchasedproducts.email='$email' ORDER BY purchasedproducts.deliverystatus;");
      while ($product=$productspurchased->fetch_assoc())
      { 
        echo  '<div class="purchasedcard">
         <div style="height: 230px; width: 416px; float: left;">
             <img src="./resources/productsimg/'.$product["imgurl"].'" alt="'.$product["category"].
             '" height=210px width=150px style="padding-left: 90px;">
         </div> 

      
         <div style="height: 230px; width: 416px; float: left; text-align: center;">
             <h2>'.$product["pname"].'</h2>
             <h2>Rs '.$product["price"].'</h2>
             <h3 >status:</h3>
             <h3>'.($product["deliverystatus"]=="T"?"delivered":"not delivered").'</h3>
             '.($product["deliverystatus"]=="F"?"<form method='POST' action='formphp/cancelpurchasedproduct.php'>
              <input type='text' style='display:none;' name='pid' value=".$product['pid']."><button type='submit'
               name='cancelproduct'>CANCEL</button></form>":"").'
        </div>


           <div style="height: 230px; width: 416px; float: left; text-align: center;">
           <h2 style="text-align: center;">'.$userrow["uname"].'</h2>
           <h3 style="color:  rgb(77, 73, 73);">'.$userrow["phno"].'</h3>
           <h3 style="color:  rgb(77, 73, 73);">'.$userrow["house"].' , '.$userrow["street"].'</h3>
           <h3 style="color:  rgb(77, 73, 73);">'.$userrow["district"].'</h3>
           <h3 style="color:  rgb(77, 73, 73);">'.$userrow["state"].'</h3> 
        </div >
    </div>';
      }

    }
    else
    {//TO DISPLAY ORDERS TO THE SUPER USER
      $productspurchased=$con->query("SELECT * FROM (`purchasedproducts` NATURAL JOIN `products`)
       NATURAL JOIN `userinfo` 
      ORDER BY purchasedproducts.deliverystatus ;");
      while ($product=$productspurchased->fetch_assoc())
      {
        
        echo  '<div class="purchasedcard">
         <div style="height: 230px; width: 416px; float: left;">
             <img src="./resources/productsimg/'.$product["imgurl"].'" alt="'.$product["category"].
             '" height=210px width=150px style="padding-left: 90px;">
         </div> 

      
         <div style="height: 230px; width: 416px; float: left; text-align: center;">
             <h2>'.$product["pname"].'</h2>
             <h2>Rs '.$product["price"].'</h2>
             <h3 >status:</h3>
             <h3>'.($product["deliverystatus"]=="T"?"delivered":"not delivered").'</h3>
             '.($product["deliverystatus"]=="F"?"<form method='POST' action='formphp/deliverproduct.php'>
             <input type='text' style='display:none;' name='pid' value=".$product['pid'].">
             <input type='text' style='display:none;'name='email' value=".$product['email'].">
             <button type='submit' name= 'deliverproduct'>Deliver</button></form>":"").'
        </div>


           <div style="height: 230px; width: 416px; float: left; text-align: center;">
           <h2 style="text-align: center;">'.$product["uname"].'</h2>
           <h3 style="color:  rgb(77, 73, 73);">'.$product["phno"].'</h3>
           <h3 style="color:  rgb(77, 73, 73);">'.$product["house"].' , '.$product["street"].'</h3>
           <h3 style="color:  rgb(77, 73, 73);">'.$product["district"].'</h3>
           <h3 style="color:  rgb(77, 73, 73);">'.$product["state"].'</h3> 
        </div >
    </div>';
      }

      
    }

 }
  $con->close();

    ?>

