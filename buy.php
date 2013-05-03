<?php
	include "DAO/Online_SellingDAO.php";
	$item_id=$_POST[item_id];
	
	$action= new OnlineSelling();
	$action->Buy($item);

?>
