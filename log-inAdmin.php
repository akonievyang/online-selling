<?php
session_start();
include "DAO/Online_SellingDAO.php";


if(isset($_POST['adminUser']) && isset($_POST['adminPass']) ){

    $username=$_POST['adminUser'];
    $password=$_POST['adminPass'];

    $action = new OnlineSelling();

    $result=$action->LogInAdmin($adminUser,$adminPass);

    if($result){

        $_SESSION['adminUser']=$result;
        header('location: admin.php');

    }else{
        echo 'Unable to login';
    }

}
?>