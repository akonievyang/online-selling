<?php

include "DAO/Online_sellingDAO.php";

echo $firstname = $_POST['firstname'];
echo $middlename = $_POST['middlename'];
echo $lastname = $_POST['lastname'];
echo $address = $_POST['address'];
echo $age = $_POST['age'];
echo $gender = $_POST['gender'];
echo $contactNum = $_POST['contactNum'];
echo $username = $_POST['username'];
echo $password = $_POST['password'];


header("location: myhome.php");

$action= new OnlineSelling();
$action->RegisterCustomer($firstname, $middlename, $lastname, $address, $age, $gender, $contactNum, $username, $password);
?>