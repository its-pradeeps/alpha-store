<?php  
session_start();
$_SESSION["uname"]=isset($_SESSION["uname"])?$_SESSION["uname"]:"";
$_SESSION["usertype"]=isset($_SESSION["usertype"])?$_SESSION["usertype"]:"user";
$_SESSION["email"]=isset($_SESSION["email"])?$_SESSION["email"]:"";
$_SESSION["tracker"]=isset($_SESSION["tracker"])?$_SESSION["tracker"]:"";
$_SESSION["alertstatus"]=isset($_SESSION["alertstatus"])?$_SESSION["alertstatus"]:"";
?>


<!doctype>
<html>
<head>
<meta charset="UTF-8">
<meta name="author" content="Pradeep">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ALPHA STORE</title>
<link rel="stylesheet" href="style.css">

<?php require "webjs.php"; ?>

</head>


<body onload="setuserdata()">
  

  <!--top image LOGO-->

  <div id="logo">
    <img src="./resources/logo/alphalogodark.png" height=20% width="100%">
  </div>


  <!--navigation menu-->

  <div id="navmenu">
    <ul>
      <li onclick="home()"><a href="#HOME">HOME</a></li>
      <li onclick="tv()"><a href="#Tv">TV</a></li>
      <li onclick="phone()"><a href="#PHONE">PHONE</a></li>
      <li onclick="laptop()"><a href="#LAPTOP">LAPTOP</a></li>
      <li onclick="accessories()"><a href="#ACCESSORIES">ACCESSORIES</a></li>
      <li style="float:right" onclick="loginform()" id="loginnav"><a href="#LOGIN">LOGIN</a></li>
      <li style="float:right; display:none;" onclick="accountsclicked()" id="accountnav"><a href="#ACCOUNT">
      <?php echo $_SESSION["uname"]; ?></a></li>
      <li style="float:right; display:none;" id="ordernav" onclick="orderspage();"><a href="#orders">ORDERS</a></li>
      
    </ul>
  </div> 


  <!--products card view-->
     <div id="products">
      <?php include 'include/productcards.php'; ?>
     </div>


 <!-- code for the product page from  a card onclick -->

 <div id="productpage" style=" display: none; "  >
     <div class="productimage">
        <img style="float: left;" 
        height=500px width=410px class="img">
     </div>
     <div class="productdetail" >
      <h1></h1>
      <h2><br></h2>
      <h2><br></h2>
      <h2><br></h2>
      <h2><br></h2>
      <h1><br></h1>
      <form method="POST" action="formphp/buyproduct.php">
      <input type="text" name="pid" style="display:none;">
      <button type="submit" style="height: 20px;" >BUY</button>
      </form> 
      <h3 style="display:<?php echo $_SESSION["usertype"] == 'user'?"none":"block" ;?> ;"></h3>  
      <h3 style="display:<?php echo $_SESSION["usertype"] == 'user'?"none":"block" ;?> ;"></h3>  

       </div > 
       
  </div>

  <!--  orders page  -->
  <div id="purchasedpage" style="display: none;">
    <?php include 'include/orderspage.php' ?>
  </div>



 <!-- login page-->

  <div   id="login" style="display: none;" >
    <form autocomplete="on" method="POST" action="formphp/login.php"> 
     
        <h2 style="text-align: center;">Login</h2>
        
        <br>
        <input type="text" id="lemail_id" name="email_id" placeholder="email id"
        style=" border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
        <br>
      
        <br>
        <input type="password" id="lpassword" name="password" placeholder="password"
        style=" border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
        <br><br>
        <input type="submit" name="loginform" value="Login">
        <br>  
    </form>
  </div>

  <!--signup button-->
  <div onclick="signup();" id="signupbutton" style="display: none;">
    <h3 style="text-align: center;" >sign up</h3>
  </div>


  


<!-- sign up page-->

  <div style="display: none;"   id="signup" >
     <form autocomplete="on" method="POST" action="formphp/signup.php">
       <div  style=" margin-right: 50px; ">
      <h2 style="text-align: center;">SIGN UP</h2>
        <br>
        
        
        <input type="text" id="name" name="name" placeholder="name"
         style=" border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
        <br><br>
        
        
        <input type="text" id="phone" name="phone" value="+91" placeholder="phone no."
        style=" border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
        <br><br>

        
        
        <input type="text" id="semail_id" name="email_id" placeholder="eg:email id"
        style=" border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
        <br><br>
        
        
        <input type="password" id="spassword" name="password" placeholder="password"
        style=" border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
        <br><br>
       
       </div>


       <div >
        
         ADRESS
         <br><br>
         
         
         <input type="text" id="house" name="houseno" placeholder="house name/no."
         style=" border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
         <br><br>
         
         
         
         <input type="text" id="street" name="streetname" placeholder="street"
         style=" border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
         <br><br>
         
         
         
         <input type="text" id="district" name="district" placeholder="district"
         style=" border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
         
         <br>
         <br>
         <input type="text" id="state" name="state" placeholder="state"
         style=" border:0px;border-bottom: 1px; color:black; border-color: black; border-style: solid;">
         <br>
         <br>
       </div>
       <input type="submit" name="signup" value="Create Account" onclick="home()"> 
       
      </form>
  </div>


  <!--accounts page definition-->
 <div id="accountspage" style="display: none;">
    
    <?php include 'include/accountpage.php' ?>
    

       <a href="formphp/logout.php" style="color: black;">
     <div  class="accountcard" style=" background-color: rgb(253, 121, 44);
               " type="submit" onmouseover="accounthover(this)" onmouseout="accountunhover(this)">
      <h1>LOGOUT<br><br></h1>
      <h3>Sign out of this device.<br>CLICK ON THE CARD to logout.</h3>
      
     </div></a>
   

 </div>

 <!--footer definition-->
 <footer style="text-align: center;" id="footercard">
   <h5 >PROJECT-ALPHA</h5>
   <h5 >DESIGNED AND DEVELOPED BY :</h5>
   <h5 >MANOJ SINGH RAJ PUROHIT</h5>
   <h5 >PRADEEP SINGH RAJ PUROHIT</h5>
   ALL RIGHTS RESERVED, COPYRIGHT 2020,THIS SOFTWARE CANNOT BE REDISTRIBUTED<br>
   YOUR FEEDBACK IS VALUBLE.
   
 
 </footer>


</body>
</html>
