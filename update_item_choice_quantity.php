<?php
session_start();
$_SESSION['new_qty']=$_POST['quantity'];
$quantity=$_SESSION['new_qty'];
$id=$_POST['id'];


    for($i=0; $i<count($_SESSION['cart']); $i++){
        if($id==$_SESSION['cart'][$i]['productid']){
           echo $_SESSION['cart'][$i]['quantity']=$quantity;
        }

    }


?>