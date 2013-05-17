<?php
session_start();
include "DAO/Online_SellingDAO.php";


if(isset($_POST['username']) && isset($_POST['password']) ){

    $username=$_POST['adminUser'];
    $password=$_POST['adminPass'];

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
<!DOCTYPE html>
    <head>

    <script src = "js/jquery-latest.js"></script>
    <script src = "js/jquery-ui-192.js"></script>
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>
    <script src = "js/customer.js"></script>
    <link href="bootstrap/css/myhome.css" rel="stylesheet" type="text/css" />
    <link rel = "stylesheet" type = "text/css" href = "bootstrap/css/jquery-ui-1.9.0.custom.min.css" />
    <link rel = "stylesheet" type = "text/css" href = "bootstrap/ccs/jquery-ui-1.9.0.custom.css"/>

    </head>
<body>

</body>