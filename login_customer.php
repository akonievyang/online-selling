<?php
    include "DAO/accountDAO.php";
    session_start();


    if(isset($_SESSION['customer_id'])){
        header('location:customer.php');

    }else{

        if(isset($_POST['user']) && isset($_POST['pass']) ){

            $username=$_POST['user'];
            $password=$_POST['pass'];

            $result=null;
            $action = new Account();
            $result=$action->loginMember($username,$password);

            if($result){

                $_SESSION['customer_id']=$result;
                header('location:customer.php');

            }else{
                echo 'Unable to login';
           }
        }
    }

?>