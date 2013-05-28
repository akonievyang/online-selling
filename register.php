<?php

include "DAO/Online_SellingDAO.php";

    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contactNum = $_POST['contact'];
    $password = "password(".$_POST['pass'].")";
    $username = $_POST['user'];


$action= new OnlineSelling();
$action->RegisterCustomer($firstname, $middlename, $lastname, $address, $age, $gender, $contactNum, $password, $username);


?>