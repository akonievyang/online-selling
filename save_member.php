<?php

	include "DAO/Online_SellingDAO.php";

	$customer_id = $_POST['customer_id'];
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$lastname = $_POST['lastname'];
	$age = $_POST['age'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$action = new Online_SellingDAO();
	$action->save_member($customer_id,$firstname,$middlename,$lastname,$age,$address,$gender,$username,$password);


?>