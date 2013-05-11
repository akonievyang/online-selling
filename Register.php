<?php

include "DAO/Online_sellingDAO.php";

 $firstname = $_POST['firstname'];
 $middlename = $_POST['middlename'];
 $lastname = $_POST['lastname'];
$address = $_POST['address'];
$age = $_POST['age'];
 $gender = $_POST['gender'];
 $contactNum = $_POST['contact'];
$username = $_POST['username'];
 $password = $_POST['password'];




$action= new OnlineSelling();
$action->RegisterCustomer($firstname, $middlename, $lastname, $address, $age, $gender, $contactNum, $username, $password);
?>