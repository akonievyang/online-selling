<?php
include "DAO/Online_SellingDAO.php";
$id=$_POST['id'];
$name=$_POST['name'];
$brand=$_POST['brand'];
$features=$_POST['features'];
$price=$_POST['price'];
$picture=$_POST['picture'];

$action= new OnlineSelling();
$action->Save_item_changes($id,$name,$brand,$features,$price,$picture);
?>