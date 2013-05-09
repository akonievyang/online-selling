<?php
session_start();

if(isset($_SESSION['username']){
        header('location:customer.php');
}else{
    header('location:myhome.php');


?>