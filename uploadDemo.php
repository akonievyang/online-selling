<?php
session_start();
include "DAO/Online_SellingDAO.php";

$filename=$_FILES['uploadPic']['name'];
$type=$_FILES['uploadPic']['type'];
$error=$_FILES['uploadPic']['error'];
$temp_name=$_FILES['uploadPic']['tmp_name'];
$directory="uploaded_file/";
$thumb_dir="uploaded_file/thumblr";



if($error>0){


    echo $_SESSION['errors']= "<p class='errorupload'>'Error'.$error</p>";

}else if($type=='image/jpeg'||$type=='image/jpg'||$type=='image/png') {
    if(file_exists($directory.$filename)){
        echo $_SESSION['exists']= "<p class='errorupload'>Already exist </p>";
    }else{

        move_uploaded_file($temp_name,$directory.$filename);


        echo $_SESSION['upload_pic'] = "<img src='".$directory.$filename."' />";


        // $action= new OnlineSelling();
      // $action->UploadItemPic($filename);
    }



}else{
    echo  $_SESSION['not_supported']= "<p class='errorupload'> Not supported file </p>";

}
    header("location:admin.php");

?>


