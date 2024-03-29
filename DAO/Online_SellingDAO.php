<?php

include "BaseDAO.php";

class OnlineSelling extends BaseDAO {

    function Messages($msg){
        $this->open();

        $stmt=$this->dbh->prepare("Insert into visitor values(null,?)");
        $stmt->bindParam(1,$msg);
        $stmt->execute();

        echo "<p id='you'>You:</p> ".$msg;
        $this->close();
    }
    function ViewSales($search){
        $this->open();
            $stmt=$this->dbh->prepare(" SELECT s.sales_id,s.total_quantity,c.firstname,c.lastname,g.gadget_name,g.brand
                                           from  sales as s , gadgets as g,customer as c, item as i
                                        where s.item_id = i.item_id AND i.gadget_id = g.gadget_id
                                            AND s.customer_id = c.customer_id
                                           ");


            $stmt->execute();


        $stmt->execute();
                $status=false;
                while($rows=$stmt->fetch()){
                    $status=true;

                    echo "<tr id='.$rows[0].'>";
                    echo "<td>".$rows[2]." ".$rows[3]."</td>";
                    echo "<td>".$rows[4]." ".$rows[5]."</td>";
                    echo "<td>".$rows[1]."</td>";
                    echo "<td></td>";
                    echo "</tr>";
                }
                if(!$status){
                    echo "<div > Not available </div>";

                }

        $this->close();
    }




    /*---------------------------------add ug mga member----------------------------------------*/


    function addMember($firstname, $middlename, $lastname, $address, $age, $gender, $contactNum, $username, $password){

        $this->open();
        $stmt = $this->dbh->prepare("INSERT INTO customer VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");


        $stmt->bindParam(1, $firstname);
        $stmt->bindParam(2, $middlename);
        $stmt->bindParam(3, $lastname);
        $stmt->bindParam(4, $address);
        $stmt->bindParam(5, $age);
        $stmt->bindParam(6, $gender);
        $stmt->bindParam(7, $contactNum);
        $stmt->bindParam(8,$username );
        $stmt->bindParam(9,$password );

        $stmt->execute();
        $customer_id = $this->dbh->lastInsertId();

        echo "<tr id=".$customer_id.">";
        echo "<td>".$customer_id."</td>";
        echo "<td>".$firstname."</td>";
        echo "<td>".$middlename."</td>";
        echo "<td>".$lastname."</td>";
        echo "<td>".$age."</td>";
        echo "<td>".$address."</td>";
        echo "<td>".$contactNum."</td>";
        echo "<td>".$gender."</td>";
        echo "<td>".$username."</td>";
        echo "<td>".$password."</td>";
        echo "<td><img src='images/delete.png' onclick='deleteEntry(".$customer_id.")'/>";
        echo "<img src='images/edit.png' onclick='editEntry(".$customer_id.")'/></td>";

        echo "</tr>";

        $this->close();
    }
    function RegisterCustomer($firstname, $middlename, $lastname, $address, $age, $gender, $contactNum, $username, $password){
        $this->open();
        $stmt = $this->dbh->prepare("INSERT INTO customer(firstname,middlename,lastname,gender
                                    ,age,address,contact,password,username)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?,?) ");


        $stmt->bindParam(1, $firstname);
        $stmt->bindParam(2, $middlename);
        $stmt->bindParam(3, $lastname);
        $stmt->bindParam(4, $address);
        $stmt->bindParam(5, $age);
        $stmt->bindParam(6, $gender);
        $stmt->bindParam(7, $contactNum);
        $stmt->bindParam(8, $password);
        $stmt->bindParam(9, $username);

        $stmt->execute();
        $id = $this->dbh->lastInsertId();

        echo "<tr id=".$id.">";
        echo "<td>".$id."</td>";
        echo "<td>".$firstname."</td>";
        echo "<td>".$middlename."</td>";
        echo "<td>".$lastname."</td>";
        echo "<td>".$age."</td>";
        echo "<td>".$address."</td>";
        echo "<td>".$contactNum."</td>";
        echo "<td>".$gender."</td>";

        echo "</tr>";

        $this->close();
    }

    /*-------------------------edit para sa mga member-----------------------------------------*/

    function edit_member($customer_id,$firstname, $middlename, $lastname, $age, $address, $gender, $username, $password){

        $this->open();

        $stmt = $this->dbh->prepare("UPDATE customer set firstname = ?, middlename = ?, lastname = ?, age = ?, address =?, gender = ?, username = ?, password = ?, WHERE customer_id = ?");
        $stmt->bindParam(1,$firstname);
        $stmt->bindParam(2,$middlename);
        $stmt->bindParam(3,$lastname);
        $stmt->bindParam(4,$age);
        $stmt->bindParam(5,$address);
        $stmt->bindParam(6,$gender);
        $stmt->bindParam(7,$username);
        $stmt->bindParam(8,$password);
        $stmt->execute();

        echo "<td>".$customer_id."</td>";
        echo "<td>".$firstname."</td>";
        echo "<td>".$middlename."</td>";
        echo "<td>".$lastname."</td>";
        echo "<td>".$age."</td>";
        echo "<td>".$gender."</td>";
        echo "<td>".$username."</td>";
        echo "<td>".$password."</td>";
        echo "<td><img src='images/delete.png' onclick='deleteEntry(".$customer_id.")'/>";
        echo "<img src='images/edit.png' onclick='editEntry(".$customer_id.")'/></td>";
        echo "</tr>";

        $this->close();
    }

    function save_member($customer_id,$firstname,$middlename,$lastname,$age,$address,$gender,$username,$password){

        $this->open();

        $stmt = $this->dbh->prepare("UPDATE customer set firstname = ?, middlename = ?, lastname = ?,
                                         age = ?, address = ?, gender = ?, username = ?,
                                         password = ? WHERE customer_id = ?");
        $stmt->bindParam(1,$firstname);
        $stmt->bindParam(2,$middlename);
        $stmt->bindParam(3,$lastname);
        $stmt->bindParam(4,$age);
        $stmt->bindParam(5,$address);
        $stmt->bindParam(6,$gender);
        $stmt->bindParam(7,$username);
        $stmt->bindParam(8,$password);
        $stmt->bindParam(9,$customer_id);
        $stmt->execute();


        echo "<td><input type='checkbox' name='checkVideo'
                    onclick='btn_edit(".$customer_id.")'/></td>";
        echo "<td>".$firstname."</td>";
        echo "<td>".$middlename."</td>";
        echo "<td>".$lastname."</td>";
        echo "<td>".$age."</td>";
        echo "<td>".$address."</td>";
        echo "<td>".$gender."</td>";
        echo "<td>".$username."</td>";
        echo "<td>".$password."</td>";
        echo "<td><input type='button'  value='edit' onclick='btn_edit(".$customer_id.")'/>";

        $this->close();



    }


    /*------------------------ ADD FUNCTION ------------------------------------------- */

    function AddItem($name,$brand,$features,$price,$picture){
        $this->open();
        $stmt=$this->dbh->prepare("INSERT INTO gadgets(gadget_name,brand,features,price,date_added) VALUES(?,?,?,?,NOW())");
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $brand);
        $stmt->bindParam(3, $features);
        $stmt->bindParam(4, $price);
        $stmt->execute();
        $gad_id=$this->dbh->lastInsertId();

        $stmt=$this->dbh->prepare("Insert into picture values(null,?)");
        $stmt->bindParam(1,$picture);
        $stmt->execute();
        $pic_id=$this->dbh->lastInsertId();

        $stmt=$this->dbh->prepare("Insert into item values(null,?,?)");
        $stmt->bindParam(1,$gad_id);
        $stmt->bindParam(2,$pic_id);
        $stmt->execute();

        $this->close();
    }


    function DeleteItem($id){
        $this->open();

        $stmt=$this->dbh->prepare(" Delete From item where item_id=? ");
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $this->close();

    }
    function Retrieve_member($id){
        $this->open();
            $stmt=$this->dbh->prepare("SELECT * FROM customer");
            $stmt->execute();

            $rows=$stmt->fetch();
            $retrieve_info_member=array("customer_id"=>$rows[0],"firstname"=>$rows[1],
                                    "middlename"=>$rows[2],"lastname"=>$rows[3],
                                    "gender"=>$rows[4],"age"=>$rows[5],"address"=>$rows[6],
                                    "contact"=>$rows[7],"user_password"=>$rows[8]
                                    ,"user_username"=>$rows[9],"profile_pic"=>$rows[10]);
            echo json_encode($retrieve_info_member);

        $this->close();

    }
    function Retrieve_item($id){

        $this->open();

        $stmt=$this->dbh->prepare("SELECT item.item_id, gadgets.gadget_name, gadgets.brand,
                                   gadgets.price, picture.large_pic,gadgets.features,gadgets.quantity
                                   FROM item, gadgets, picture
                                   WHERE item.gadget_id = gadgets.gadget_id
                                   AND item.pic_id = picture.pic_id and item_id=?");
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $rows=$stmt->fetch();


        $image="<img src='uploaded_file/$rows[4]'>";

        $data_retrieve=array('item_id'=> $rows[0],'gadget_name'=> $rows[1],'brand'=> $rows[2],
            'features'=> $rows[5],'price'=> $rows[3],'filename'=>$rows[4],'image'=>$image);

        $item_data=json_encode($data_retrieve);

        echo $item_data;



        $this->close();
    }

    function Save_item_changes($id,$name,$brand,$features,$price,$picture){

        $this->open();

        $stmt=$this->dbh->prepare("Select * from item where item_id=?");
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $rows=$stmt->fetch();

        $stmt=$this->dbh->prepare("Update gadgets SET gadget_name=?,brand=?,features=?,price=? where gadget_id=?");
        $stmt->bindParam(1,$name);
        $stmt->bindParam(2,$brand);
        $stmt->bindParam(3,$features);
        $stmt->bindParam(4,$price);
        $stmt->bindParam(5,$rows[1]);
        $stmt->execute();


        $stmt=$this->dbh->prepare("Update picture SET large_pic=? where pic_id=?");
        $stmt->bindParam(1,$picture);
        $stmt->bindParam(2,$rows[2]);
        $stmt->execute();

        $this->close();

    }
    /*-----------------------------Log-In CUSTOMER-----------------------------------------------------*/


    function UploadItemPic($filename){
        $this->open();
        $stmt=$this->dbh->prepare("Insert into picture(large_pic) values(?)");
        $stmt->bindParam(1,$filename);
        $stmt->execute();
        $this->close();

    }

    function ViewAll(){
        $this->open();
        $stmt=$this->dbh->prepare("Select name,price from gadgets");
        $stmt->execute();
        $this->close();


    }

    function SearchItem($search){
        $this->open();
        $status=false;
        $stmt=$this->dbh->prepare("SELECT item.item_id, gadgets.gadget_name, gadgets.brand,
                                   gadgets.price, picture.large_pic,gadgets.features,gadgets.quantity
                                    FROM gadgets, item, picture
                                    WHERE gadgets.gadget_id = item.gadget_id
                                    AND picture.pic_id = item.pic_id
                                    ");
        $stmt->execute();
        $status=false;
        while($rows=$stmt->fetch()){
            $status=true;

            $image="uploaded_file/$rows[4]";
            $name = explode(" ",$rows[1]);

            echo "<tr id=".$rows[0].">";
            echo "<td>"."<input type='checkbox'/>"."</td>";
            echo "<td>"."<img src=".$image." title=".$name[0]." ". $name[1]."
                         style='width:30px; height:30px'/>"."&nbsp".$rows[3]."</td>";
            echo "<td>".$rows[3]."</td>";
            echo "<td>".$rows[7]."</td>";
            echo "<td><input type='button'  value='edit' onclick='Edit_item(".$rows[0].")'/>"."</td>";
            echo "</tr>";
        }
        if(!$status){
            echo "<tr>";
            echo "<td colspan='10'>No Data </td>";
            echo "</tr>";

        }
        $this->close();
    }

    function SearchMember($search){
        $this->open();
        $stmt=$this->dbh->prepare("SELECT * FROM customer WHERE firstname like '".$search."%' or
                                       lastname like '".$search."%' or username like '".$search."%'
                                       or gender like '".$search."%'  or age like '".$search."%' or
                                       contact like '".$search."%' or address like '".$search."%'  ");

        $stmt->execute();

        $status=false;
        while($rows=$stmt->fetch()){
            $status=true;

            echo "<tr id=".$rows[0].">";
            echo "<td>".$rows[1]." ".$rows[3]."</td>";
            echo "<td>".$rows[9]."</td>";
            echo "<td>".$rows[4]."</td>";
            echo "<td>".$rows[5]."</td>";
            echo "<td>".$rows[6]."</td>";
            echo "<td>".$rows[7]."</td>";
            echo "</tr>";
        }
        if(!$status){
            echo "<tr>";
            echo "<td colspan='10'>No Data </td>";
            echo "</tr>";

        }
        $this->close();

    }
    function CustomerProfilePicture($name,$customer_id){
        $this->open();
            $stmt=$this->dbh->prepare("Update customer SET profile_picture=? where customer_id=?");
            $stmt->bindParam(1,$name);
            $stmt->bindParam(2,$customer_id);
            $stmt->execute();
        $this->close();
    }

    function ViewCustomerPicture($customer_id){
        $this->open();
            $stmt=$this->dbh->prepare("Select profile_picture from customer where customer_id=?");
            $stmt->bindParam(1,$customer_id);
            $stmt->execute();

            $row=$stmt->fetch();
            $image="customer_profile/$row[0]";
            echo "<img src=$image />";
        $this->close();
    }


}
?>