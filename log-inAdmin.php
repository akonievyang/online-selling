<?php
session_start();
include "DAO/Online_SellingDAO.php";


if(isset($_POST['username']) && isset($_POST['password']) ){

    $username=$_POST['username'];
    $password=$_POST['password'];

    $action = new OnlineSelling();

    $result=$action->LogInAdmin($username,$password);

    if($result=="true"){
        echo "jfjsa";
        $_SESSION['users'] = $username;
        header('location:admin.php');
    }else{
        echo 'Unable to login';
    }

}

?>