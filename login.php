<?php
session_start();
include "DAO/Online_SellingDAO.php";


if(isset($_POST['username']) && isset($_POST['password']) ){

    $username=$_POST['username'];
    $password=$_POST['password'];

    $result=null;
    $action = new OnlineSelling();
    $result=$action->loginMember($username,$password);

    if($result){
           $userID=null;

           $_SESSION['user_id'] = $userID;
           // $_SESSION['users'] = $username;
           // header('location:customer.php');
    }else{
       echo 'Unable to login';
    }

}

?>