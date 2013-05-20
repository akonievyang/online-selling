<?php
    session_start();

    if(isset($_SESSION['customer_id'])){
        session_destroy();
        session_unset();
        header("location:myhome.php");


    }


?>