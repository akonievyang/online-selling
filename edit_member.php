<?php

    include "DAO/Online_SellingDAO.php";

    $id = $_POST['id'];

    $action = new OnlineSelling();
    $action->retrieve_member($id);
	
?>
