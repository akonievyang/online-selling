<?php
session_start();
include "DAO/Online_SellingDAO.php";

if(isset($_POST['username']) && isset($_POST['password']) ){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $result=null;
    $action = new OnlineSelling();
    $result=$action->loginMember($username,$password);

    echo $result;

    if($result=="true"){
        echo "jfjsa";
            $_SESSION['username'] = $username;
            header('location:customer.php');
    }else{
       alert("Unable to login");
    }

}

?>