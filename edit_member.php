`<?php

    include "DAO/Online_SellingDAO.php";

    session_start();
    $customer_id=$_SESSION['customer_id'];

    $action = new OnlineSelling();
    $action->retrieve_member($customer_id);
	
?>
