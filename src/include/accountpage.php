<?php
     //user account
     if($_SESSION['usertype']=="user")
     {
      //delete account card
 
      echo  '<div  class="accountcard" id="deleteaccount"  style ="background-color: rgba(252, 16, 8, 0.815);"
       onmouseover="accounthover(this);"
              onmouseout="accountunhover(this);" onclick="deleteacount();" >
         <h1>DELETE ACCOUNT</h1>
         <h3>The account shall be permenently deleted with the order hidtory and
           all the orders scheduled to be delivered shall be canceled.
           If you are sure to delete the account.<br> CLICK ON THE CARD and account will be deleted.</h3>
     </div>';

    //delete user account page
     echo '<div  class="accountcard" id="deletingaccount"  style ="background-color: rgba(252, 16, 8, 0.815);
      display:none;">
         <h1>CONFIRM ACCOUNT DELETION</h1>
         <h3> '.$_SESSION["email"].' </h3>
         <form method="POST" action="formphp/deleteaccount.php">
         <input type="password" name="password" placeholder="password" style="background-color: rgba(252, 16, 8, 0);
          border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;"><br><br>
         <input type="submit" name="submit" value="DELETE ACCOUNT" style="background-color: rgba(252, 16, 8, 0.815);
          border:1px; color:black; border-color: black; border-style: solid;">
         </form> 
         
     </div>';

       //update account card
     echo '<div  class="accountcard" style="background-color: rgba(30, 143, 255, 0.836);"  onmouseover="accounthover(this);"
              onmouseout="accountunhover(this);" onclick="updatecard();" id="updateaccount">
        <h1>UPDATE ACCOUNT </h1>
        <h3>you can update your account fields such as address, phone number, user name multiple times,
          but you CANNOT change the EMAIL ID from here.<br> CLICK ON THE CARD  to update user details.</h3>
     </div>';


     //update account page
  echo '<div class="accountcard" style="background-color: rgba(30, 143, 255, 0.836); display: none;" id="updatingaccount">
  <h1>UPDATE ACCOUNT</h1>
        
        <h3><?php echo $_SESSION["email"]; ?><h3>
     <form autocomplete="on" method="POST" action="formphp/updateaccount.php">
       <div  style=" margin-right: 50px; ">
     
        
        <input type="password" id="upassword" name="password" placeholder="new password" 
        style="background-color: rgba(252, 16, 8, 0);
          border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
           <br><br>

        <input type="text" id="uname" name="name" placeholder="name"  style="background-color: rgba(252, 16, 8, 0);
          border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;"> 
        <br><br>
        
        <input type="text" id="uphone" name="phone" value="+91" placeholder="phone no."
          style="background-color: rgba(252, 16, 8, 0);
          border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
        <br><br>      
       
       </div>
       <div >
        
         ADRESS
         <br><br> 
         
         <input type="text" id="uhouse" name="houseno" placeholder="house name/no."
          style="background-color: rgba(252, 16, 8, 0);
          border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
         <br><br>
         
         
         
         <input type="text" id="ustreet" name="streetname" placeholder="street"
          style="background-color: rgba(252, 16, 8, 0);
          border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
         <br><br>
      
         <input type="text" id="udistrict" name="district" placeholder="district"
          style="background-color: rgba(252, 16, 8, 0);
          border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;"> 
         <br><br>

         <input type="text" id="ustate" name="state" placeholder="state"
          style="background-color: rgba(252, 16, 8, 0);
          border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
         <br> <br>

       </div>
       <input type="submit" name="signup" value="UPDATE ACCOUNT"
        style="background-color: rgba(252, 23, 8, 0);
          border:1px; color:black; border-color: black; border-style: solid;"> 
       
      </form>
  </div>';

   

   //account info card
   $username=getenv('MYSQL_USER');
   $password=getenv('MYSQL_PASSWORD');
   $serverhost=getenv('MYSQL_HOST');
   $database="ALPHA_STORE";
   
   $con=new mysqli($serverhost,$username,$password,$database);
    if($con->connect_error)
      die("failed to connect"); 
      
    $user=$con->query("SELECT * FROM userinfo WHERE userinfo.email='$_SESSION[email]';")->fetch_assoc();

    echo '<div  class="accountcard" style="background-color: rgba(92, 236, 92, 0.815);" onmouseover="accounthover(this);"
          onmouseout="accountunhover(this);">
          <h1>ACCOUNT DETAILS</h1>
          <h3>'.$user["uname"].'</h3>
          <h3>'.$user["email"].'</h3>
          <h3>'.$user["phno"].'</h3>
          <h3>'.$user["house"].'</h3>
          <h3>'.$user["street"].'</h3>
          <h3>'.$user ["district"].'</h3>
          <h3>'.$user["state"].'</h3>
       
         </div>';

      $con->close(); 
    }
  
  //superuser account.............................................................................
    else
    {
       //remove product card
 
    echo  '<div  class="accountcard" id="removeproductcard"  style ="background-color: rgba(252, 16, 8, 0.815);"
     onmouseover="accounthover(this);"
    onmouseout="accountunhover(this);" onclick="removeproductcard();" >
  <h1>REMOVE PRODUCT</h1>
  <h3>The product will be permenently removed with the scheduled orders associated.
    If you are sure to delete the product.<br> CLICK ON THE CARD and product will be removed.</h3>
</div>';

//remove product page
echo '<div  class="accountcard" id="removeproductpage" style ="background-color: rgba(252, 16, 8, 0.815); display:none;">
  <h1>CONFIRM PRODUCT REMOVAL</h1>
  <form method="POST" action="formphp/removeproduct.php">
  <input type="number" name="pid" placeholder="pid" onkeyup="removeproductname(this.value);"
   onchange="removeproductname(this.value);"  style="background-color: rgba(252, 16, 8, 0);
   border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;"><br><br>
   
  <input type="submit" name="submit" value="REMOVE PRODUCT" id="removeproductbutton" disabled style="background-color: rgba(252, 16, 8, 0.815);
   border:1px; color:black; border-color: black; border-style: solid;">
  </form> 
  <h4 id="productname"></h4>
  
</div>';




//update product card
echo '<div  class="accountcard" style="background-color: rgba(30, 143, 255, 0.836);"  onmouseover="accounthover(this);"
       onmouseout="accountunhover(this);" onclick="updateproduct();" id="updateproductcard">
 <h1>UPDATE PRODUCT INFO </h1>
 <h3>you can change product quantity field here multiple times,
   but you CANNOT change the product name and other fields from here. You will be logged out on update.<br>
    CLICK ON THE CARD to update product details.</h3>
</div>';


//update product page
echo '<div class="accountcard" style="background-color: rgba(30, 143, 255, 0.836); display: none;"
  id="updateproductpage">
<h1>UPDATE PRODUCT QUANTITY</h1>

<form method="POST" action="formphp/updateproduct.php">
<input type="number" name="pid" placeholder="pid" onkeyup="updateproductname(this.value);"
 onchange="updateproductname(this.value);"  style="background-color: rgba(252, 16, 8, 0);
border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;"><br><br>

<input type="number" name="quantity" placeholder="Quantity" style="background-color: rgba(252, 16, 8, 0);
   border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;"><br><br>

<input type="submit" name="updateproduct" value="UPDATE PRODUCT" id="updateproductbutton" disabled
 style="background-color: rgba(252, 23, 8, 0);
   border:1px; color:black; border-color: black; border-style: solid;"> 

</form>
<h4 id="uproductname"></h4>
</div>';




//add product  card

echo '<div  class="accountcard" style="background-color: rgba(92, 236, 92, 0.815);" onmouseover="accounthover(this);"
   onmouseout="accountunhover(this);" id="addproductcard" onclick="addproduct();">
   <h1>ADD NEW PRODUCT</h1>
   <h3>you can add a new product from this card by providing the necessary details,
   NO field is optional.<br>
    CLICK ON THE CARD to ADD product to database.</h3>
  </div>';


  //ADD PRODUCT PAGE
  
echo '<div  class="accountcard" style="background-color: rgba(92, 236, 92, 0.815); display: none;"
 id="addproductpage">
<h1>ADD NEW PRODUCT</h1>


<form method="POST" action="formphp/addproduct.php" enctype="multipart/form-data">
<input type="text" name="pname" placeholder="product name" style="background-color: rgba(92, 236, 92, 0);
border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;"><br><br>

<select name="category" placeholder="category" style="background-color: rgba(92, 236, 92, 0);
border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
  <option value="phone" selected>Phone</option>
  <option value="tv">Tv</option>
  <option value="laptop" >Laptop</option>
  <option value="accessories">Accessories</option>
  </select>
<br><br>

<input type="text" name="pdesc1" placeholder="short product decription" style="background-color: rgba(92, 236, 92, 0);
border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;"><br><br>

<input type="text" name="pdesc2" placeholder="product description" style="background-color: rgba(92, 236, 92, 0);
border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;"><br><br>

<input type="number" name="price" placeholder="price" style="background-color: rgba(92, 236, 92, 0);
border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;"><br><br>

<input type="number" name="quantity" placeholder="Quantity" style="background-color: rgba(92, 236, 92, 0);
border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;"><br><br>

<p>choose image<br></p>
<input type="file" name="pimage" placeholder="product image" style="background-color: rgba(92, 236, 92, 0);
border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;"><br><br>


<input type="submit" name="addproduct" value="ADD PRODUCT"
style="border:1px;border-bottom: 1px; color:black; border-color: black; border-style: solid;
background-color: rgba(92, 236, 92, 0.815);">


</form>

</div>';




  }
   ?>