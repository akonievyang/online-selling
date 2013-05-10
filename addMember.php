<?php
	
include'DAO/Online_SellingDAO.php';

$execute = new OnlineSelling;

$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$contactNum = $_POST['contactNum'];
$username = $_POST['username'];
$password = $_POST['password'];

$execute-> addMember($firstname, $middlename, $lastname, $address, $age, $gender, $contactNum, $username, $password);


?>
