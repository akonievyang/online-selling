<?php
    include "DAO/product&ordering_transaction.php";

    $search=$_POST['search'];

    $action= new Product_and_ordering_transaction();
    $action->CustomerViewItem($search);


?>