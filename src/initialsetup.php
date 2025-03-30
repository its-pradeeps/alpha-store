<html>
<head>
<title>database</title>
<body bgcolor="black" text="green">

<?php
echo "________________________________________________________________________PROJECT-ALPHA
__________________________________________________________________________<br><br>
-------------------------------------------------------------------------------------------------------------DEVELOPED BY:
----------------------------------------------------------------------------------------------------------------<br>
----------------------------------------------------------------------------------------------------PRADEEP SINGH RAJ PUROHIT
--------------------------------------------------------------------------------------------------------<br>
-----------------------------------------------------------------------------------------------------MANOJ SINGH RAJ PUROHIT
----------------------------------------------------------------------------------------------------------<br><br><br>
...............................................................................";
$username=getenv('MYSQL_USER');
$password=getenv('MYSQL_PASSWORD');
$serverhost=getenv('MYSQL_HOST');
$database="ALPHA_STORE";

// $db_host = 
// $db_user = 
// $db_password = 
// $db_name = getenv('MYSQL_DATABASE');



//function for adding products
function inertingProducts($name , $category , $desc1 , $desc2 , $price , $quantity , $imgurl )
{
    $username=getenv('MYSQL_USER');
    $password=getenv('MYSQL_PASSWORD');
    $serverhost=getenv('MYSQL_HOST');
    $database="ALPHA_STORE";
    $con3=new mysqli($serverhost,$username,$password,$database);
    if($con3->connect_error)
    {
        echo "<br>---------------------------------------------------------------";
      echo "<br>CONNECTION FAILED WITH LOCALHOST insertinProducts";
     }
    else
    {
         if($con3->query("CALL addproducts( '$name' , '$category' , '$desc1' , '$desc2' , '$price' , '$quantity' ,
          '$imgurl');")===TRUE)
         { 
               echo "<br>--------- ADDED--".$name;
        }
         else
       {
              echo "<br>--------- CANNOT ADD--".$name;
       }
    }
    $con3->close();
}


echo "<br>---------------------------------------------------------------";
echo "<br>CONNECTING TO LOCAL HOST";
$con0=new mysqli($serverhost,$username,$password,$database);


//checking if the databse exists
if($con0->connect_error)
  {
    echo "<br>---------------------------------------------------------------"; 
    echo("<br>NO DATABASE EXISTS<br> CONNECTION FAILED".$con0->connect_error);
      
      //creating databse as no database exists and connecting with local host
      $con1=new mysqli($serverhost,$username,$password);
      if($con1->connect_error)
      {
            die("<br>CONNECTION FAILED WITH LOCALHOST".$con1->connect_error);
           

       }
        else
      {  
        echo "<br>---------------------------------------------------------------";
            echo "<br>CONNECTION SECURED WITH LOCAL HOST";
            echo "<br>---------------------------------------------------------------";
            echo "<br> CREATING DATABASE alpha_store";
            
            //creating database alpha_store
            if( $con1->query("CREATE DATABASE ALPHA_STORE")===TRUE)
            {    echo "<br>DATABASE CREATED";
                $con1->close();
                $con2=new mysqli($serverhost,$username,$password,$database);
                if($con2->error)
                     die("<br>CONNECTION FAILED".$con->connect_error);
                else
                {
                    echo "<br>---------------------------------------------------------------";
                    echo "<br>CREATING RELATIONS......";
                   
                   //creating products table
                   if($con2->query("CREATE TABLE 
                    products(pid integer PRIMARY KEY AUTO_INCREMENT,pname varchar(50) NOT NULL,
                    category varchar(20) NOT NULL,
                    pdesc1 varchar(20) NOT NULL, pdesc2 varchar(50) NOT NULL,
                    price integer NOT NULL,quantity integer NOT NULL,imgurl varchar(60) NOT NULL);")===TRUE)
                    {
                        echo "<br>---------------------------------------------------------------";
                        echo "<br>RELATION products CREATED";
                        if($con2->query("CREATE PROCEDURE `addproducts`
                        (IN `vpname` VARCHAR(50), IN `vcategory` VARCHAR(20), IN `vpdesc1` VARCHAR(20),
                         IN `vpdesc2` VARCHAR(50), IN `vprice` INT, IN `vquantity` INT, IN `vimgurl` VARCHAR(50))
                         NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER
                          INSERT INTO products (pname , category , pdesc1 , pdesc2 , price , quantity , imgurl)
                         VALUES (vpname , vcategory , vpdesc1 , vpdesc2 , vprice , vquantity , vimgurl)")===TRUE)
                         {
                            echo "<br>---------------------------------------------------------------";
                            echo "<br>ADDPRODUCTS PROCEDURE CREATED";
                            echo "<br>---------------------------------------------------------------";
                            echo "<br>---------------------------------------------------------------";
                         }
                         else
                         {
                            echo "<br>---------------------------------------------------------------";
                            echo "<br> CANNOT CREATE PROCEDURE addproducts";
                         }
                        
                         //ADD PRODUCTS TO THE PRODUCTS TABLE
                       
                         inertingProducts("MOTOROLA ONE" , "phone", "128 GB" ,
                         "android one 2 with snapdragon 625" , "11999" , "10" , "moto_one.jpg" );

                         inertingProducts("MOTO EDGE PLUS" , "phone", "256 GB" ,
                         "with latest snapdrogon 875" , "24999" , "10" , "moto_edge_plus.png" );

                         inertingProducts("LG WING" , "phone", "128 GB" ,
                         "with latest snapdrogon 875" , "98999" , "10" , "lg_wing.png" );

                         inertingProducts("IPHONE 12 PRO" , "phone", "16 GB" ,
                         "with latest A14 bionic chip" , "129999" , "10" , "iphone_12_pro.png" );

                         inertingProducts("PIXEL 5" , "phone", "128 GB,8GB RAM" ,
                         "with latest snapdrogon 765G" , "57999" , "10" , "pixel_5.jpg" );


                         inertingProducts("S20 ULTRA" , "phone", "128 GB" ,
                         "with latest snapdrogon 875" , "87999" , "10" , "samsung_s20_ultra.png" );

                         inertingProducts("MOTOROLA RAZR 5G" , "phone", "128 GB" ,
                         "with snapdrogon 765G" , "124999" , "10" , "moto_razr.png" );

                         inertingProducts("SAMSUNG FOLD" , "phone", "512 GB" ,
                         "with latest snapdrogon 875" , "149999" , "10" , "samsung_fold.png" );

                         inertingProducts("SAMSUNG TV" , "tv", "QLED 55\" ",
                         "16GB ROM 2GB RAM" , "119999" , "10" , "samsung_qled.png" );

                         inertingProducts("SAMSUNG TV" , "tv", "LED 32\" ",
                         "8GB ROM 2GB RAM" , "29999" , "10" , "samsung_tv.jpg" );

                         inertingProducts("MOTOROLA REVOU" , "tv", "LED 43\" ",
                         "32GB ROM 2.5GB RAM" , "42999" , "10" , "moto_revou.png" );
                         
                         inertingProducts("NOTE 20 ULTRA" , "phone", "512GB",
                         "with latest EXYNOS 990" , "92999" , "10" , "samsung_note_20_ultra.png" );

                         inertingProducts("PIXEL 4" , "phone", "128GB",
                         "with latest snapdrogon 855" , "84999" , "10" , "pixel_4.jpg" );

                         inertingProducts("MAC BOOK AIR" , "laptop", "14 inch",
                         "with Apple  M1 chip 20M Cache L1" , "109990" , "10" , "mac_book_14.jpg" );

                         inertingProducts("DELL INSPIRION" , "laptop", "SSD 256GB",
                         "with Intel i5-10650k processor 5M Cache" , "69990" , "10" , "dell_inspirion.jpg" );

                         inertingProducts("HP PAVILION" , "laptop", "SSD 512GB",
                         "with Intel i7-10850k processor 20M Cache" , "78999" , "10" , "hp_pavilion.jpg" );
                    
                         inertingProducts("HP GAME SERIES" , "laptop", "SSD 1TB",
                         "with AMD RYZEN 7000 processor 20M Cache" , "124990" , "10" , "hp_pavilion_gaming_laptop.jpg" );

                         inertingProducts("DELL GAME SERIES" , "laptop", "SSD 512GB",
                         "with AMD RYZEN 5000 processor 20M Cache" , "94998" , "10" , "gaming_laptop.jpg" );                     
                         
                         inertingProducts("MAC BOOK " , "laptop", "13\" SSD 128GB",
                         "with Intel i9-10850k processor 20M Cache" , "89990" , "10" , "mac_booc_13.png" );

                         inertingProducts("MOTOROLA TV 2019" , "tv", "LED 32\" ",
                         "32GB ROM 2.5GB RAM" , "22999" , "10" , "moto_tv.jpg" );

                         inertingProducts("LG ROLL TV" , "tv", "QLED 65\" ",
                         "32GB ROM 2GB RAM" , "132999" , "10" , "lg_roll.jpg" );

                         inertingProducts("SAMSUNG BUDS" , "accessories", "true wireless ",
                         "active noice cancelation" , "18999" , "10" , "samsong_buds.jpg" );

                         inertingProducts("APPLE AIRPODS" , "accessories", "true wireless ",
                         "active noice cancelation" , "19999" , "10" , "apple_airpods.jpg" );

                         inertingProducts("AIRPODS PRO" , "accessories", "5 hours battery ",
                         "active noice cancelation" , "24999" , "10" , "apple_airpods_pro.jpg" );

                         inertingProducts("ONEPLUS Z" , "accessories", "8 hours battery ",
                         "active noice cancelation" , "2999" , "10" , "wireless_earphones.png" );
                         
                         inertingProducts("SONY TWS" , "accessories", "IP68 RATED ",
                         "active noice cancelation" , "21999" , "10" , "sony_tws.jpg" );

                         inertingProducts("BOAT EARPHONES" , "accessories", "braded cable ",
                         "active noice cancelation" , "1999" , "10" , "boat_earphones.jpg" );
                  
                         inertingProducts("MOTO CHARGER" , "accessories", "30 watt ",
                         "with cable" , "1599" , "10" , "moto_charger.jpg" );
                         
                         inertingProducts("APPLE CHARGER" , "accessories", "5 watts ",
                         "nocable included" , "1999" , "10" , "apple_charger.png" );
                         
                         inertingProducts("VOOC CHARGER" , "accessories", "65 watts ",
                         "output 15w ,30w ,65w" , "2499" , "10" , "vooc_charger.png" );
                          
                         inertingProducts("SAMSUNG CHARGER" , "accessories", "15w ",
                         "with cable" , "999" , "10" , "charger.png" );
                         
                         inertingProducts("ONEPLUS CABLE" , "accessories", "type-c to type-c",
                         "150 cm" , "899" , "10" , "oneplus_type_c_cable.png" );

                         inertingProducts("MOTO CABLE" , "accessories", "type-c to type-A",
                         "150 cm" , "499" , "10" , "type_m_cable.jpg" );

                         inertingProducts("APPLE CABLE" , "accessories", "type-c to type-A",
                         "100 cm" , "1499" , "10" , "type_c_to_a_cable.jpg" );
                    }
                    else{
                        echo "<br>---------------------------------------------------------------";
                        echo "<br>CANNOT CREATE RELATION products ";
                    }



                    //creating logininfo table
                    if($con2->query("CREATE TABLE 
                    logininfo(email varchar(25) PRIMARY KEY,password varchar(50)  NOT NULL);")===TRUE)
                    {
                        echo "<br>---------------------------------------------------------------";
                        echo "<br>RELATION logininfo CREATED";
                        echo "<br>---------------------------------------------------------------";
                        echo "<br>---------------------------------------------------------------";
                        if($con2->query("INSERT INTO `logininfo`(`email`, `password`)
                         VALUES ('pradeep@gmail.com' , 'pradeep')")===TRUE)
                         {
                            echo "<br>---------------------------------------------------------------";
                            echo "<br>---------------------------------------------------------------";
                            echo "<br>----------welcome PRADEEP-----------";
                         }
                         if($con2->query("INSERT INTO `logininfo`(`email`, `password`)
                         VALUES ('manoj@gmail.com' , 'manoj')")===TRUE)
                         {
                            echo "<br>---------------------------------------------------------------";
                            echo "<br>---------------------------------------------------------------";
                            echo "<br>----------welcome MANOJ-------------";
                         }



                    }
                    else{
                        echo "<br>---------------------------------------------------------------";
                        echo "<br>CANNOT CREATE RELATION logininfo";
                    }



                    //creating ownerinfo table
                    if($con2->query("CREATE TABLE 
                    ownerinfo(email varchar(25) PRIMARY KEY,oname varchar(50)  NOT NULL,phno varchar(11)  NOT NULL,
                     FOREIGN KEY (email) REFERENCES logininfo(email) ON DELETE CASCADE);")===TRUE)
                    {
                        echo "<br>---------------------------------------------------------------";
                        echo "<br>RELATION ownerinfo CREATED";
                        if($con2->query(" INSERT INTO `ownerinfo`(`email`, `oname`, `phno`)
                         VALUES ('pradeep@gmail.com', 'pradeep singh' , '8473258201')")===TRUE)
                         {
                            echo "<br>---------------------------------------------------------------";
                            echo "<br>---------------------------------------------------------------";
                            echo "<br>--------------owner added";

                         }
                         if($con2->query(" INSERT INTO `ownerinfo`(`email`, `oname`, `phno`)
                         VALUES ('manoj@gmail.com', 'manoj singh' , '9834756210')")===TRUE)
                         {
                            echo "<br>--------------owner added";
                         }


                    }
                    else{
                        echo "<br>---------------------------------------------------------------";
                        echo "<br>CANNOT CREATE RELATION ownerinfo ";
                    }



                    //creating userinfo table
                    if($con2->query("CREATE TABLE 
                    userinfo(email varchar(25) PRIMARY KEY,
                     uname varchar(50)  NOT NULL,phno varchar(11)  NOT NULL,
                    house varchar(20)  NOT NULL,street varchar(20)  NOT NULL, district varchar(20)  NOT NULL,
                    state varchar(20)  NOT NULL,FOREIGN KEY (email) REFERENCES logininfo(email) ON DELETE CASCADE);")===TRUE)
                    {
                        echo "<br>---------------------------------------------------------------"; 
                        echo "<br>RELATION userinfo CREATED";


                    }
                    else{
                        echo "<br>---------------------------------------------------------------";
                        echo "<br>CANNOT CREATE RELATION userinfo ";
                    }


                     //creating purchasedproducts table
                     if($con2->query("CREATE TABLE purchasedproducts(orderno integer PRIMARY KEY AUTO_INCREMENT
                     ,email varchar(25),pid integer,deliverystatus CHARACTER,
                                       FOREIGN KEY (email) REFERENCES userinfo(email) ON DELETE CASCADE, 
                                       FOREIGN KEY (pid) REFERENCES products(pid) ON DELETE CASCADE);"
                      )===TRUE)
                     {
                        echo "<br>---------------------------------------------------------------"; 
                        echo "<br>RELATION purchasedproducts CREATED";


                        //CREATING TRIGGERS
                        if($con2->query("CREATE TRIGGER `updatequantityonbuy` AFTER INSERT ON `purchasedproducts`
                         FOR EACH ROW
                        UPDATE products SET products.quantity=products.quantity-1 WHERE products.pid=NEW.pid;")===TRUE)
                        {
                          echo "<br>.......TRIGGER updatequantityonbuy CREATED"; 
                        }
                        else
                        {
                          echo "<br>.......CANNOT CREATE TRIGGER updatequantityonbuy "; 
                        }

                        if($con2->query("CREATE TRIGGER `updatequantityoncancel` AFTER DELETE ON `purchasedproducts`
                         FOR EACH ROW
                         UPDATE products SET products.quantity=products.quantity+1 WHERE products.pid=OLD.pid;")===TRUE)
                       {
                         echo "<br>.......TRIGGER updatequantityoncancel CREATED"; 
                       }
                       else
                       {
                         echo "<br>.......CANNOT CREATE TRIGGER updatequantityoncancel "; 
                       }
                     }
                     else
                     {
                        echo "<br>---------------------------------------------------------------";
                        echo "<br>CANNOT CREATE RELATION purchasedproducts ";
                     }





                    $con2->close();

                }
          


            
            }
            else
           { echo "<br>---------------------------------------------------------------";
            echo "<br>DATABASE CREATION FAILED <br> EXITING.....";
           }
       }
    }
  else
  {
    echo "<br>---------------------------------------------------------------";
    echo "<br>CONNECTION SUCCESSFUL<br>DATABSE EXSISTS";
  }
  echo "<br><br> EXITING INITIALISER<br>
  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
echo "<a style='color:red;' href=web.php><br>|--------------------------|<br>|||||ALPHA_STORE|||||<br>|--------------------------|</a>";
  
  ?>

  </body>
  </html>
  