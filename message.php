<?php
   include "DAO/Online_SellingDAO.php";
   $msg = $_POST['msg'];
   
   $action = new OnlineSelling();
   $action->Messages($msg);
   
   
?>
