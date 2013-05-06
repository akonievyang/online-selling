<?php
    include "DAO/Online_SellingDAO.php";
    $name=$_POST['name'];
    $brand=$_POST['brand'];
    $desc=$_POST['desc'];
    $features=$_POST['features'];
    $price=$_POST['price'];

    $action= new OnlineSelling();
    $action->AddItem($name,$brand,$desc,$features,$price);
?>