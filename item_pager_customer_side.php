<?php
    include "DAO/product&ordering_transaction.php";
    $per_page=$_POST['per_page'];

    $action= new Product_and_ordering_transaction();
   $action->display_customer_pager($per_page);


?>