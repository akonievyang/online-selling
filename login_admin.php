<?php

    session_start();

include "DAO/accountDAO.php";

    if(isset($_SESSION['admin_id'])){
        header('location: admin.php');
    }else{
        if(isset($_POST['user_admin']) && isset($_POST['pass_admin']) ){

            $username=$_POST['user_admin'];
            $password=$_POST['pass_admin'];

            $result=null;
            $action = new Account();
            $result=$action->LogInAdmin($username,$password);

             if($result){
                $_SESSION['admin_id']=$result;
                header('location: admin.php');

            }else{
                echo 'Unable to login';
            }


        }
    }
?>
