<?php
	
	include'DAO/Online_SellingDAO.php';

 $execute = new Online_SellingDAO();

$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$username = $_POST['username'];
$password = $_POST['password'];
$type = $_POST['type'];

$execute->addMember($firstname, $middlename, $lastname, $age, $address, $gender, $username, $password, $type);


?>