<?php
	
include'DAO/Online_SellingDAO.php';

$execute = new Online_SellingDAO();

$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];

$execute->Addmember($firstname, $middlename, $lastname, $age, $address, $gender ,$contact);


?>
