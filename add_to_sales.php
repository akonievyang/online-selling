<?php

    include "DAO/product&ordering_transaction.php";
    session_start();
    $item_id=$_POST['id'];

    $customer_id=$_SESSION['customer_id'];


    for($i=0;$i<$size;$i++){
        $action= new Product_and_ordering_transaction();
        $action->Add_to_sales($customer_id,$item_id[$i]);
    }


?>