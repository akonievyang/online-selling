<?php
    include "DAO/product&ordering_transaction.php";

    $id=$_POST['id'];

    $action= new Product_and_ordering_transaction();
    $action->DisplayChoiceInfo($id);

?>
