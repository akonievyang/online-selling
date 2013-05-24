<?php

    session_start();

    $_SESSION['quantity']=$_POST['quantity'];
    $quantity=$_SESSION['quantity'];
    $id=$_POST['id'];


        for($i=0; $i<count($_SESSION['cart']); $i++){
            if($id==$_SESSION['cart'][$i]['productid']){
              $_SESSION['cart'][$i]['quantity']=$quantity;
            }

        }


?>