<?php
include "DAO/Online_SellingDAO.php";

session_start();
global $msg;

if(isset($_POST['username']) && isset($_POST['password']) ){
    echo "pass";
    $username=$_POST['username'];
    $password=$_POST['password'];

    $action = new OnlineSelling();
    $result=null;

     $result=$action->loginMember($username,$password);

    if($result){
            echo "pass";
            $_SESSION['username'] = $username;
            header('location:customer.php');
    }else{
       echo 'Unable to login';
    }
}

?>