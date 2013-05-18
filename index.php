<?php
session_start();

if(isset($_SESSION['user'])){
    header('location:customer.php');
}else{
    header('location:myhome.php');
}

?>
