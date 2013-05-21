<?php
include "DAO/Online_SellingDAO.php";

session_start();
   $id=$_POST['id'];
   $quantity=$_POST['quantity'];



if(is_array($_SESSION['cart'])){
    if(product_exists($pid));
    $max=count($_SESSION['cart']);
    $_SESSION['cart'][$max]['productid']=$id;
    $_SESSION['cart'][$max]['qty']=$quantity;

}
else{
    $_SESSION['cart']=array();
    $_SESSION['cart'][0]['productid']=$id;
    $_SESSION['cart'][0]['qty']=$quantity;
}


?>