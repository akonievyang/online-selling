<?php
    include "BaseDAO.php";
    class Product_and_ordering_transaction extends BaseDAO{


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
        function DisplayChoiceInfo($id){
            $this->open();
            $stmt=$this->dbh->prepare(" SELECT item.item_id, gadgets.gadget_name, gadgets.brand,
                                        gadgets.price, picture.large_pic,gadgets.features
                                        FROM item, gadgets, picture
                                        WHERE item.gadget_id = gadgets.gadget_id
                                        AND item.pic_id = picture.pic_id and item_id=$id
                                       ");
            $stmt->execute();
            $rows=$stmt->fetch();

            $image="<img src='uploaded_file/$rows[4]'>";

            $item_info=array("item_id"=>$rows[0],"item_unit"=>$rows[1],
                "item_brand"=>$rows[2],"item_price"=>"&#8369;".money_format('%!.2n',$rows[3]),
                "item_pic"=>$image,"item_features"=>$rows[5]);
            echo json_encode($item_info);

            $this->close();

        }
        // cart
        function  Add_to_CArt($id,$quantity){
            $this->open();

            $stmt=$this->dbh->query(" SELECT item.item_id, gadgets.gadget_name, gadgets.brand,
                                        gadgets.price, picture.large_pic,gadgets.features
                                        FROM item, gadgets, picture
                                        WHERE item.gadget_id = gadgets.gadget_id
                                        AND item.pic_id = picture.pic_id and item_id=$id
                                       ");
            $rows=$stmt->fetch();

            session_start();


            if(is_array($_SESSION['cart'])){

                $max=count($_SESSION['cart']);
                $_SESSION['cart'][$max]['productid']=$rows[0];
                $_SESSION['cart'][$max]['qty']=$quantity;


            }
            else{

                $_SESSION['cart']=array();
                $_SESSION['cart'][0]['productid']=$rows[0];
                $_SESSION['cart'][0]['qty']=$quantity;
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
                    $quantity=$_SESSION['cart'][$i]['qty'];


                    $stmt=$this->dbh->query(" SELECT item.item_id, gadgets.gadget_name, gadgets.brand,
                                            gadgets.price, picture.large_pic,gadgets.features
                                            FROM item, gadgets, picture
                                            WHERE item.gadget_id = gadgets.gadget_id
                                            AND item.pic_id = picture.pic_id and item_id=$id
                                           ");
                    echo "SELECT item.item_id, gadgets.gadget_name, gadgets.brand,
                                            gadgets.price, picture.large_pic,gadgets.features
                                            FROM item, gadgets, picture
                                            WHERE item.gadget_id = gadgets.gadget_id
                                            AND item.pic_id = picture.pic_id and item_id=$id";
                    $rows=$stmt->fetch();
                    $image="uploaded_file/$rows[4]";
                    $price=$rows[3];
                    $sum+=$price*$quantity;
                    $total_price_all_item="&#8369;".money_format('%!.2n',$sum);

                    echo "<tr id='".$rows[0]."' >";
                     echo "<td>"."<img src='.$image.'/>"."<br/>".$rows[1]." ".$rows[2]."</td>";
                     echo "<td>"."<input type = 'text' id='quantity'.$rows[0].'   value ='$quantity'
                            onkeyup='get_cost_by_quantity(".$rows[0].",".$rows[3].",".$sum.")'>"."</td>";
                     echo "<td>".$rows[3]."</td>";
                     echo "<td>". $total_price="<p>"."&#8369;".money_format('%!.2n',$price)."</p>."."</td>";
                     echo "<td>"."<img src='images/remove.png' onclick='removeFromCArt(".$rows[0].")'/>"."</td>";

                     echo "</tr>";

                }
            }else{
                echo "There are no items in your shopping cart";
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
        function Add_to_sales($customer_id, $item_id, $quantity){
            $this->open();
                $sql = "INSERT INTO sales (item_id, customer_id, total_quantity) VALUES (?, ?, ?)";
                $stmt=$this->dbh->prepare($sql);
                $stmt -> bindParam(1, $item_id);
                $stmt -> bindParam(2, $customer_id);
                $stmt -> bindParam(3, $quantity);
                $stmt -> execute();

            $this->close();
        }


}

?>