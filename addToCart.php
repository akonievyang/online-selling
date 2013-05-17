<?php
include "DAO/Online_SellingDAO.php";

$id=$_POST['id'];
$name=$_POST['name'];
$brand=$_POST['brand'];
$price=$_POST['price'];

$action= new OnlineSelling();
$action->AddToCart($id,$name,$brand,$price);


?>