<?php

    include "DAO/product&ordering_transaction.php";
    session_start();

    $address=$_POST['address'];
    $customer_id=$_SESSION['customer_id'];

    $action= new Product_and_ordering_transaction();
    for($ctr=0; $ctr<count($_SESSION['cart']); $ctr++){
        $action->Add_to_sales($customer_id,$_SESSION['cart'][$ctr]['productid'], $_SESSION['cart'][$ctr]['quantity'],$address);
    }


?>