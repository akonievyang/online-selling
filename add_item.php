<?php
    include "DAO/Online_SellingDAO.php";
    $name=$_POST['name'];
    $brand=$_POST['brand'];
    $features=$_POST['features'];
    $price=$_POST['price'];

    $action= new OnlineSelling();
    $action->AddItem($name,$brand,$features,$price);
?>