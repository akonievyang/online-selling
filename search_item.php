<?php
include "DAO/Online_SellingDAO.php";

    $search=$_POST['search'];

    $action= new OnlineSelling();
    $action->SearchItem($search);
?>