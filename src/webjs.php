

<script type="text/javascript">


//this funtion is used to hide all div elements

function hidealldiv()
{
   document.getElementById("products").style.display= "none";
   document.getElementById("login").style.display="none";
   document.getElementById("signup").style.display="none";
   document.getElementById("productpage").style.display="none";
   document.getElementById("signupbutton").style.display= "none";
   document.getElementById("purchasedpage").style.display="none";
   document.getElementById("accountspage").style.display="none";
}


//to display purchased products
function orderspage()
{
    hidealldiv();
    document.getElementById("purchasedpage").style.display="block";
}



//to display accounts page
function accountsclicked()
{
    hidealldiv();
    document.getElementById("accountspage").style.display="block";
}



 

//this is used to display just the login form

function loginform()
{
    hidealldiv();
    console.log("in login form");
    document.getElementById("login").style.display= "block";
    document.getElementById("signupbutton").style.display= "block";
}

//this funtion is used to display the signup form

function signup()
{  
    hidealldiv();
    document.getElementById("signup").style.display="block";
}


//this is used unhide all the cards

function home()
{   
   
    hidealldiv();
    unhidecards();
    document.getElementById("products").style.display= "block";
}


//used to hide all cards other than tv

function tv()
{   
    hidealldiv();
    unhidecards();
    document.getElementById("products").style.display= "block";
    var productcard=document.getElementById("products").children;
    console.log(productcard.length);
    for(i=0;i<productcard.length;++i)
    {
       if( productcard[i].children[1].className.localeCompare("container_tv")!=0)
          productcard[i].style.display="none";
            
    }
}


//used to hide all cards other than phone

function phone()
{   
    hidealldiv();
    unhidecards();
    document.getElementById("products").style.display= "block";
    var productcard=document.getElementById("products").children;
    console.log(productcard.length);
    for(i=0;i<productcard.length;++i)
    {
       if( productcard[i].children[1].className.localeCompare("container_phone")!=0)
          productcard[i].style.display="none";
            
    }


}


//used to hide all cards other than laptops

function laptop()
{   
    hidealldiv();
    unhidecards();
    document.getElementById("products").style.display= "block";
    var productcard=document.getElementById("products").children;
    console.log(productcard.length);
    for(i=0;i<productcard.length;++i)
    {
       if( productcard[i].children[1].className.localeCompare("container_laptop")!=0)
          productcard[i].style.display="none";
            
    }
}


//used to hide all cards other than accessories 

function accessories()
{   
    hidealldiv();
    unhidecards();
    document.getElementById("products").style.display= "block";
    var productcard=document.getElementById("products").children;
    console.log(productcard.length);
    for(i=0;i<productcard.length;++i)
    {
       if( productcard[i].children[1].className.localeCompare("container_accessories")!=0)
          productcard[i].style.display="none";
            
    }
}



//when a card is clicked it is used to move to products page

function cardclicked(card)
{   
    hidealldiv();
    var usertype="<?php echo $_SESSION["usertype"]; ?>";
    var uname="<?php echo $_SESSION["uname"]; ?>";
    var productpage=document.getElementById("productpage");
    productpage.style.display="block";
    productpage.children[0].children[0].src=card.children[0].src;
    productpage.children[1].children[0].innerHTML=card.children[1].children[0].innerHTML;
    productpage.children[1].children[1].innerHTML=card.children[1].className.slice(10);
    productpage.children[1].children[2].innerHTML=card.children[1].children[2].innerHTML;
    productpage.children[1].children[3].innerHTML=card.children[1].children[4].innerHTML;
    productpage.children[1].children[4].innerHTML=card.children[1].children[3].innerHTML;
    productpage.children[1].children[5].innerHTML=card.children[1].children[1].innerHTML;
    productpage.children[1].children[6].children[0].value=card.children[1].children[5].innerHTML;
    productpage.children[1].children[7].innerHTML="PID:"+productpage.children[1].children[6].children[0].value;
    productpage.children[1].children[8].innerHTML="Quantity:"+card.children[1].children[6].innerHTML;
    if(card.children[1].children[6].innerHTML < 1 || usertype=="superuser" || uname=="")
        productpage.children[1].children[6].children[1].disabled=true;
    else
    productpage.children[1].children[6].children[1].disabled=false;
    console.log("pid: "+productpage.children[1].children[6].children[0].value);
}


//used to unhide all cards 

function unhidecards()
{  
    var productcard=document.getElementById("products").children;
    for(i=0;i<productcard.length;++i)
    {
   
      productcard[i].style.display="block";    
    }
    
}


//used to change dimension of card elements on hover

function cardhover(a )
{  
  
  var c=a.children;
  c[0].style.transition="0.4s";
c[0].style.height="250px";
c[0].style.width="187px";
console.log(c[0]);

}


//used to revert the dimension to normal for card elements when mouse movves out

function cardunhover(a)
{  
  
  var c=a.children;
  c[0].style.transition="0.4s";
c[0].style.height="200px";
c[0].style.width="150px";
console.log(c[0]);

}

//for effects on account cards
function accounthover(a)
{
    var c=a.children;
    c[0].style.fontSize="290%";
    c[0].style.transition="0.4s";

}


//for effects on account cards
function accountunhover(a)
{
    var c=a.children;
    c[0].style.fontSize="200%";
    c[0].style.transition="0.2s";

}


//loads data to ensure user's login state is maintained after refreshes
function setuserdata()
{
  var uname="<?php echo $_SESSION["uname"]; ?>";
  console.log("<?php echo $_SESSION["uname"]; ?>");
  console.log("<?php echo $_SESSION["usertype"]; ?>");
  <?php 
  echo $_SESSION["tracker"]!=""?$_SESSION["tracker"]:"";
  $_SESSION["tracker"]="";
  echo $_SESSION["alertstatus"]!=""?$_SESSION["alertstatus"]:"";
  $_SESSION["alertstatus"]="";
  ?>
    
    if(uname!="")
    {
    loggedin();
    }

}


function loggedin()
{
document.getElementById("ordernav").style.display="block";
document.getElementById("accountnav").style.display="block";
document.getElementById("loginnav").style.display="none";
}


function deleteacount()
{
    document.getElementById("deleteaccount").style.display="none";
    document.getElementById("deletingaccount").style.display="block";
}


function updatecard()
{
    document.getElementById("updateaccount").style.display="none";
    document.getElementById("updatingaccount").style.display="block";
}

function removeproductcard()
{
    document.getElementById("removeproductcard").style.display="none";
    document.getElementById("removeproductpage").style.display="block";
}


function removeproductname(vtext)
{
   document.getElementById("productname").innerHTML=productname(vtext);
   if(document.getElementById("productname").innerHTML=="")
   document.getElementById("removeproductbutton").disabled=true;
   else
   document.getElementById("removeproductbutton").disabled=false;
}


function addproduct()
{
    document.getElementById("addproductcard").style.display="none";
    document.getElementById("addproductpage").style.display="block";
}





function updateproduct()
{
    document.getElementById("updateproductcard").style.display="none";
    document.getElementById("updateproductpage").style.display="block";
}



function updateproductname(vtext)
{
    
    document.getElementById("uproductname").innerHTML=productname(vtext);
    if(document.getElementById("uproductname").innerHTML=="")
   document.getElementById("updateproductbutton").disabled=true;
   else
   document.getElementById("updateproductbutton").disabled=false;
}


function productname(pid)
{
pid=parseInt(pid);
var productcard;
var products=document.getElementById("products");
console.log("product children="+products.children.length);
console.log("pid:"+pid);
var lastid =parseInt(products.children[products.children.length-1].children[1].children[5].innerHTML);
var firstid =parseInt(products.children[0].children[1].children[5].innerHTML);
console.log("fpid:"+lastid);
console.log("firstpid:"+firstid);
console.log(pid>lastid || pid<firstid);
if(pid>lastid || !pid)
{
    console.log("No match");
    return "";
}
for(var i=0;i<products.children.length;++i)
{
    console.log("inside loop");
productcard=products.children[i];
if(pid == productcard.children[1].children[5].innerHTML)
{   
   console.log("product name : "+productcard.children[1].children[0].innerHTML);
   console.log("product id : "+productcard.children[1].children[5].innerHTML);
   console.log( document.getElementById("productname").innerHTML);
   return productcard.children[1].children[0].innerHTML;
}
}
 return "";
}

</script>
