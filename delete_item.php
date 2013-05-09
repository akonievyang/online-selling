<?php

include "DAO/Online_SellingDAO.php";

    $id=$_POST['id'];
    $id_delete=sizeof($id);

   $action= new OnlineSelling();

    for($i=0;$i<$id_delete;$i++){
        $action->DeleteItem($id[$i]);

    }
?>