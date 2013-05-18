<?php

    include 'DAO/Online-_SellingDAO.php';

    $customer_id = $_POST[$customer_id];

    $action = new Online|_SellingDAO();
    $action->delete($customer_id);


?>