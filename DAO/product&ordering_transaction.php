<?php
    include "BaseDAO.php";
    class Product_and_ordering_transaction extends BaseDAO{

<<<<<<< HEAD

        function CustomerViewItem($search){
            $this->open();
            $stmt=$this->dbh->prepare(" SELECT item.item_id, gadgets.gadget_name, gadgets.brand,
                                                gadgets.price, picture.large_pic,gadgets.features
                                                FROM item, gadgets, picture
                                                WHERE item.gadget_id = gadgets.gadget_id
                                                AND item.pic_id = picture.pic_id
                                               ");
            $stmt->execute();


            $status=false;
            while($rows=$stmt->fetch()){
                $status=true;x;

                $image="uploaded_file/$rows[4]";
                echo "<ul class='view_display' id='.$rows[0].'>";
                echo "<li>"."<img src=".$image."  />"."</li>";
                echo "<li>"."<h5>$rows[1]</h5>"." "."<h6>$rows[2]</h6>"."</li>";
                echo "<li>"."<h6>"."&#8369;".money_format('%!.2n',$rows[3])."</h5>"."</li>";
                echo "<li>"."<input type='button' value='buy now'
                    onclick=displayChoiceInfo(".$rows[0].") />"."</li>";
                echo "</ul>";

            }
            if(!$status){
                echo "<div > Not available </div>";

            }
            $this->close();
        }
=======
>>>>>>> d9f07b97d829da13851fc0bf1d5e5e3d533793c7
        function DisplayChoiceInfo($id){
            $this->open();
            $stmt=$this->dbh->query("  SELECT item.item_id, gadgets.gadget_name, gadgets.brand,
                                        gadgets.price, picture.large_pic,gadgets.features,gadgets.quantity
                                        FROM item, gadgets, picture
                                        WHERE item.gadget_id = gadgets.gadget_id
                                        AND item.pic_id = picture.pic_id and item_id=$id
                                       ");

            $rows=$stmt->fetch();

            $image="<img src='uploaded_file/$rows[4]'>";
            $status="";
             if(intval($rows[6])>0){

                 $status="In stock";
            }else{
                 $status="Out of stock";
             }

             $item_info=array("item_id"=>$rows[0],"item_unit"=>$rows[1],
                 "item_brand"=>$rows[2],"item_price"=>"&#8369;".money_format('%!.2n',$rows[3]),
                 "item_pic"=>$image,"item_features"=>$rows[5],"stock_status"=>$status,"stock_quantity"=>$rows[6]);

             echo json_encode($item_info);

            $this->close();

        }
        // cart
        function  Add_to_CArt($id,$quantity){
            $this->open();


                $stmt=$this->dbh->query(" SELECT item.item_id, gadgets.gadget_name, gadgets.brand,
                                            gadgets.price, picture.large_pic
                                            FROM item, gadgets, picture
                                            WHERE item.gadget_id = gadgets.gadget_id
                                            AND item.pic_id = picture.pic_id and item_id=$id
                                           ");
                $rows=$stmt->fetch();

                session_start();


                     if(is_array($_SESSION['cart'])){
                         $id=intval($id);
                         $max=count($_SESSION['cart']);
                         $flag=0;

                         for($i=0;$i<$max;$i++){
                             if($id==$_SESSION['cart'][$i]['productid']){
                                 $flag=1;

                             }
                         }
                         if(!$flag>=1){
                            $max=count($_SESSION['cart']);
                            $_SESSION['cart'][$max]['productid']=$rows[0];
                            $_SESSION['cart'][$max]['quantity']=$quantity;
                         }


                    }else{

                        $_SESSION['cart']=array();
                        $_SESSION['cart'][0]['productid']=$rows[0];
                        $_SESSION['cart'][0]['quantity']=$quantity;
                    }

            $this->close();
        }

        function viewCart(){
            $this->open();
            session_start();

            if(is_array($_SESSION['cart'])){
                $sum=0;
                $max=count($_SESSION['cart']);
                for($i=0;$i<$max;$i++){
                    $id=$_SESSION['cart'][$i]['productid'];
                    $quantity=$_SESSION['cart'][$i]['quantity'];
                    echo $quantity;

                    $stmt=$this->dbh->query(" SELECT item.item_id, gadgets.gadget_name, gadgets.brand,
                                            gadgets.price, picture.large_pic
                                            FROM item, gadgets, picture
                                            WHERE item.gadget_id = gadgets.gadget_id
                                            AND item.pic_id = picture.pic_id and item_id=$id
                                           ");

                    $rows=$stmt->fetch();

                    $image="uploaded_file/$rows[4]";
                    $price=$rows[3];
                    $sum+=$price*$quantity;

                    $total_price_all_item="&#8369;".money_format('%!.2n',$sum);

                     echo "<tr id='".$rows[0]."' >";
                     echo "<td>"."<img src='.$image.'/>"."<br/>".$rows[1]." ".$rows[2]."</td>";
                     echo "<td>"."<input type ='text' id='quantity' value=$quantity
                            onkeyup='get_cost_by_quantity(".$rows[0].",".$rows[3].")'>"."</td>";
                     echo "<td>".$rows[3]."</td>";
                     echo "<td >"."<input type='text' id='choice_total_price'.$rows[0].' readonly='readonly'/>"."</td>";
                     echo "<td>"."<img src='images/remove.png' onclick='removeFromCArt(".$rows[0].")'/>"."</td>";
                     echo "</tr>";

                }
            }else{
                echo "<tr>";
                echo "<td colspan='10'>"."There are no items in your shopping cart"."</td>";
                echo "</tr>";
            }
            $this->close();
        }
        function display_customer_pager($per_page){
            $this->open();


            $stmt_count=$this->dbh->query("SELECT COUNT(item_id) from item LIMIT 0,$per_page");
            $rows=$stmt_count->fetch();
            $num_rows=$rows[0];
            $total_page=ceil($num_rows/$per_page);
            $list = " ";
            for($ctr =1 ;$ctr<=$total_page;$ctr++){
                if($ctr==1){
                    $list .= "<li><a class='active' href='javascript:void(0)'>".$ctr."</a></li>";
                }else{
                  $list .= "<li><a href='javascript:void(0)'>".$ctr."</a></li>";
                }
            }
                echo "<ul>"."<li><a href='javascript:void(0)' class='previous_page'>  &lsaquo; previous  </a> </li>".$list."<li><a href='javascript:void(0)' class='next_page'> next  &rsaquo; </a> </li>"."</ul>";


            $this->close();

        }
        function Display_paginate_item($current_page){
            $this->open();
                $stmt=$this->dbh->query("SELECT item.item_id, gadgets.gadget_name, gadgets.brand,
                                                gadgets.price, picture.large_pic,gadgets.features
                                                FROM item, gadgets, picture
                                                WHERE item.gadget_id = gadgets.gadget_id
                                                AND item.pic_id = picture.pic_id  LIMIT $current_page,4");
            while($rows=$stmt->fetch()){
                $status=true;

                $image="uploaded_file/$rows[4]";

                echo "<ul class='view_display' id='.$rows[0].'>";

                echo "<li>"."<img src=".$image."  />"."</li>";
                echo "<li>".$rows[1]." ".$rows[2]."</li>";
                echo "<li>"."&#8369;".money_format('%!.2n',$rows[3])."</li>";
                echo "<li>"."<input type='button' value='buy now'
                    onclick=displayChoiceInfo(".$rows[0].") />"."</li>";
                echo "</ul>";

            }
            if(!$status){
                echo "<div > Not available </div>";

            }



            $this->close();
        }

        function RemoveFromCArt($id){
            $this->open();
            session_start();
            $id=intval($id);

            $max=count($_SESSION['cart']);
                for($i=0;$i<$max;$i++){
                    if($id==$_SESSION['cart'][$i]['productid']){
                        unset($_SESSION['cart'][$i]);
                        break;
                    }
                }

            $_SESSION['cart']=array_values($_SESSION['cart']);
            $this->close();
        }
        function Add_to_sales($customer_id, $item_id, $quantity,$address){

            $this->open();

                $sql = "select gadgets.gadget_id,gadgets.quantity from gadgets , item where gadgets.gadget_id=item.gadget_id and item_id=$item_id ";
                $stmt_id=$this->dbh->prepare($sql);
                $stmt_id -> execute();
                $row=$stmt_id->fetch();

                $sql = "Update gadgets set quantity=$row[1]-quantity where gadget_id=$row[0]";
                $stmt_id=$this->dbh->prepare($sql);
                $stmt_id -> execute();
                if ($quantity>$row[1] ){
                    echo "Quantity out of range !".$row[1];

                }else{
                    $sql = "INSERT INTO sales (item_id, customer_id, total_quantity,address) VALUES (?, ?, ?,?)";
                    $stmt=$this->dbh->prepare($sql);
                    $stmt -> bindParam(1, $item_id);
                    $stmt -> bindParam(2, $customer_id);
                    $stmt -> bindParam(3, $quantity);
                    $stmt -> bindParam(4, $address);
                    $stmt -> execute();
                    unset($_SESSION['cart']);
                }
            $this->close();
        }
        function SearchGadgets($search){
            $this->open();

            $stmt=$this->dbh->prepare("SELECT item.item_id, gadgets.gadget_name,
                                        gadgets.brand,gadgets.price, picture.large_pic FROM item, gadgets, picture
                                        WHERE item.gadget_id = gadgets.gadget_id AND item.pic_id = picture.pic_id
                                        AND gadget_name LIKE '".$search."%'  ");
            $stmt->execute();

            $status=false;
            while($row=$stmt->fetch()){

                $status=true;
                $image="uploaded_file/$row[4]";
                echo "<ul class='view_display' id='.$row[0].'>";

                echo "<li>"."<img src=".$image."  />"."</li>";
                echo "<li>".$row[1]." ".$row[2]."</li>";
                echo "<li>"."&#8369;".money_format('%!.2n',$row[3])."</li>";
                echo "<li>"."<input type='button' value='buy now'
                    onclick=displayChoiceInfo(".$row[0].") />"."</li>";
                echo "</ul>";


            }
            if(!$status){
                echo "<div > Not available </div>";

            }


            $this->close();
        }


}

?>