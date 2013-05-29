<?php
    include "DAO/product&ordering_transaction.php";
    $current_page=$_POST['current_page'];

    $action= new Product_and_ordering_transaction($current_page);
    $action->Display_paginate_item($current_page);
?>