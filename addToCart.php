<?php
include "DAO/product&ordering_transaction.php";


   $id=$_POST['id'];
   $quantity=1;

    $action = new Product_and_ordering_transaction();
    $action->Add_to_CArt($id,$quantity);



?>