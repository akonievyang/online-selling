<?php
session_start();
include "DAO/Online_SellingDAO.php";

$filename=$_FILES['uploadPic']['name'];
$type=$_FILES['uploadPic']['type'];
$error=$_FILES['uploadPic']['error'];
$temp_name=$_FILES['uploadPic']['tmp_name'];
$directory="uploaded_file/";
$thumb_dir="files/thumblr";



if($error>0){

    echo "Error".$error;

}else if($type=='image/jpeg'||$type=='image/jpg'||$type=='image/png') {
    if(file_exists($directory.$filename)){
        echo $filename."Already exist";
    }else{

        move_uploaded_file($temp_name,$directory.$filename);

        $_SESSION['ivysalos'] = "<img src='".$directory.$filename."'>";

        header("location:admin.php");


      // $action= new OnlineSelling();
      // $action->UploadItemPic($filename);
    }



}else{
    echo "Unsupported file";
}

?>


