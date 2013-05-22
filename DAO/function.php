<?php

   include "DAO/BaseDAO.php";
   function viewItemRecords(){
       $stmt=$this->dbh->query(" SELECT item.item_id, gadgets.gadget_name, gadgets.brand,
                                gadgets.price, picture.large_pic,gadgets.features
                                FROM item, gadgets, picture
                                WHERE item.gadget_id = gadgets.gadget_id
                                AND item.pic_id = picture.pic_id and item_id=$id
                               ");
       $rows=$stmt->fetch();


       $image="uploaded_file/$rows[4]";
       $item_info=array("item_id"=>$rows[0],"item_unit"=>$rows[1],
           "item_brand"=>$rows[2],"item_price"=>"&#8369;".money_format('%!.2n',$rows[3]),
           "item_pic"=>$image,"item_features"=>$rows[5]);
      return json_encode($item_info);





   }