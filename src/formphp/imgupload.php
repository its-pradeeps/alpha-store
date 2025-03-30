<?php

$targetfolder="../resources/productsimg/";
$fileloc=$targetfolder.basename($_FILES["pimage"]["name"]);
$imgtype=strtolower(pathinfo($fileloc,PATHINFO_EXTENSION));
$fileloc=$targetfolder.$pname.".".$imgtype;
//check if file exsists and if does modify its name to add it in
$i=1;
$imgname=$pname.".".$imgtype;
while(file_exists($fileloc))
{  
    $imgname=$pname;
    $imgname.=$i++;
    $imgname.=".".$imgtype;
    $fileloc=$targetfolder.$imgname;
}
echo $fileloc;

//CHECK IF FILE IS IMAGE
if(isset($_POST["addproduct"]))
{
    $check=getimagesize($_FILES["pimage"]["tmp_name"]);
    if($check !==false)
    {
        echo "fies is an img";
        $check["mime"].".";
    }
    else
    {
        echo "file is not an img";
        $uploadok=0;
    }
}

//limit file size
if($_FILES["pimage"]["size"]>1000000)
{
    echo "file too large";
    $uploadok=0;
}

//check file type
if($imgtype !=="jpg" && $imgtype !=="png" && $imgtype !=="jpeg" && $imgtype !=="gif" )
{
   echo "not jpg, jpeg, gif or png";
}

if($uploadok==1 && move_uploaded_file($_FILES["pimage"]["tmp_name"],$fileloc))
{
    echo "the product image ".$imgname."  added";
   
}
else
   echo "cannot upload image";
?>
