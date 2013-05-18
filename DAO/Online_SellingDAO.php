<?php

include "DAO/BaseDAO.php";
class OnlineSelling extends BaseDAO {

function Messages($msg){
    $this->open();

    $stmt=$this->dbh->prepare("Insert into visitor values(null,?)");
    $stmt->bindParam(1,$msg);
    $stmt->execute();

    echo "<p id='you'>You:</p> ".$msg;
    $this->close();
}

function CustomerViewItem($search){
    $this->open();
    $stmt=$this->dbh->prepare(" SELECT item.item_id, gadgets.gadget_name, gadgets.brand,
                                        gadgets.price, picture.large_pic,gadgets.features
                                        FROM item, gadgets, picture
                                        WHERE item.gadget_id = gadgets.gadget_id
                                        AND item.pic_id = picture.pic_id
                                       ");
<<<<<<< HEAD
    $stmt->execute();


    $status=false;
    while($rows=$stmt->fetch()){
        $status=true;

        $image="uploaded_file/$rows[4]";
        $name = explode(" ",$rows[1]);

        echo "<div class='item_id' id='.$rows[0].'>";
        echo "<img src=".$image." title=".$name[0]."&nbsp;". $name[1]." />";
        echo "<label>"."<h4>$rows[1]</h4>"." "."<h5>$rows[2]</h5>"."</label>";
        echo "<label>"."<h5>"." Only Php ".$rows[3]."</h5>"."</label>";
        echo "<input type='button' value='buy now' onclick=buyNow(".$rows[0].",'".$name[0]."','".$name[1]."','".$rows[2]."','".$rows[3]."','".$image."','".$rows[5]."') />";
        echo "</div >";

    }
    if(!$status){
        echo "<div > Not available </div>";

    }
    $this->close();
}

function viewCart(){
    $this->open();
    $stmt=$this->dbh->prepare("Select c.cart_id,g.brand,g.gadget_name,g.price,p.large_pic
=======
      		$stmt->execute();


      		$status=false;
      		while($rows=$stmt->fetch()){
                $status=true;

                $image="uploaded_file/$rows[4]";
                $name = explode(" ",$rows[1]);

                echo "<div class='item_id' id='.$rows[0].'>";

                echo "<img src=".$image." title=".$name[0]."&nbsp;". $name[1]." />";
                echo "<label>"."<h4>$rows[1]</h4>"." "."<h5>$rows[2]</h5>"."</label>";
                echo "<label>"."<h5>"." Only Php ".$rows[3]."</h5>"."</label>";
                echo "<input type='button' value='buy now' onclick=displayChoiceInfo(".$rows[0].",'".$name[0]."','".$name[1]."','".$rows[2]."','".$rows[3]."','".$image."','".$rows[5]."') />";
                echo "</div >";

      		}
            if(!$status){
      			echo "<div > Not available </div>";

      		}
        $this->close();
      }
      function AddToCart($id){

           $this->open();
              $stmt=$this->dbh->prepare("Select * from gadgets where gadget_id=? ");
              $stmt->bindParam(1,$id);
              $stmt->execute();

              $rows=$stmt->feth();
              echo "<tr id='.$rows[0]'>";
              echo "<td>$rows[1]</td>";
              echo "<input type='text' id='choice_quantity' />";
              echo "<td>$rows[2]</td>";
              echo "<input type='text' id='choice_total' />";
              echo "<td><img src='images/remove.png' onclick='removeFromCArt(".$rows[0].")'/></td>";
              echo "</tr>";
           $this->close();

       }

      function viewCart(){
           $this->open();
               $stmt=$this->dbh->prepare("Select c.cart_id,g.brand,g.gadget_name,g.price,p.large_pic
>>>>>>> 098bf529f7a9357c7aa3cf4ce6b5ef75bd20e3bb
                                        from gadgets as g,picture as p,item as i,cart as c where
                                        g.gadget_id=i.gadget_id and p.pic_id=i.pic_id and
                                        i.item_id=c.item_id");

<<<<<<< HEAD
    $stmt->execute();
    $status=false;
    while($rows=$stmt->fetch()){
        $status=true;
        echo $rows[0];
        $image="uploaded_file/$rows[4]";
        echo "<tr id=$rows[0] >";
        echo "<td>"."<img src='.$image.'/>"."<br/>".$rows[1]." ".$rows[2]."</td>";
        echo "<td>"."<input type = 'text' id='quantity' onkeyup='Quantity(".$rows[3].",".$rows[0].")'/>"."</td>";
        echo "<td>".$rows[3]."</td>";
        echo "<td>"."<input type = 'text' id='totalprice' readonly='readonly' />"."</td>";
        echo "<td>"."<img src='images/remove.png' onclick='removeFromCArt(".$rows[0].")'/>"."</td>";
        echo "</tr>";
    }
    if(!$status){
        echo "<tr>";
        echo "<td colspan='10'>No Data </td>";
        echo "</tr>";

    }
    $this->close();
}
function AddToCart($id){
    $this->open();
    $stmt=$this->dbh->prepare("Insert into cart values(null,22,?)");
    $stmt->bindParam(1,$id);
    $stmt->execute();
    $this->close();

}
function RemoveFromCArt($id){
    $this->open();
    $stmt=$this->dbh->prepare("Delete from cart where cart_id=?");
    $stmt->bindParam(1,$id);
    $stmt->execute();
    $this->close();

}
/*-----------------------------LogInAdmin-----------------------------------------------------*/
function LogInAdmin($username,$password){

    /*-----------------------------LogInAdmin-----------------------------------------------------*/
    function LogInAdmin($adminUser,$adminPass){

        $this->open();

        $stmt=$this->dbh->prepare("SELECT adminUser, adminPass from admin where adminUser=?  and adminPass=password(?)  ");
        $stmt->bindParam(1,$adminUser);
        $stmt->bindParam(2,$adminPass);
        $stmt->execute();

        $this->close();

        $row = $stmt->fetch();
        return $row[0];


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
        $stmt = $this->dbh->prepare("INSERT INTO customer VALUES (null,?, ?, ?, ?, ?, ?, ?,password(?),?) ");


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
=======
               $stmt->execute();
               $status=false;
               while($rows=$stmt->fetch()){
                   $status=true;
                   echo $rows[0];
                   $image="uploaded_file/$rows[4]";
                   echo "<tr id=$rows[0] >";
                   echo "<td>"."<img src='.$image.'/>"."<br/>".$rows[1]." ".$rows[2]."</td>";
                   echo "<td>"."<input type = 'text' id='quantity' onkeyup='Quantity(".$rows[3].",".$rows[0].")'/>"."</td>";
                   echo "<td>".$rows[3]."</td>";
                   echo "<td>"."<input type = 'text' id='totalprice' readonly='readonly' />"."</td>";
                   echo "<td>"."<img src='images/remove.png' onclick='removeFromCArt(".$rows[0].")'/>"."</td>";
                   echo "</tr>";
               }
               if(!$status){
                   echo "<tr>";
                   echo "<td colspan='10'>No Data </td>";
                   echo "</tr>";

               }
           $this->close();
       }

       function RemoveFromCArt($id){
           $this->open();
           $stmt=$this->dbh->prepare("Delete from cart where cart_id=?");
           $stmt->bindParam(1,$id);
           $stmt->execute();
           $this->close();

       }


        /*-----------------------------LogInAdmin-----------------------------------------------------*/
       function LogInAdmin($adminUser,$adminPass){

           $this->open();

           $stmt=$this->dbh->prepare("SELECT adminUser, adminPass from admin where adminUser=?  and adminPass=password(?)  ");
           $stmt->bindParam(1,$adminUser);
           $stmt->bindParam(2,$adminPass);
           $stmt->execute();

           $this->close();

           $row = $stmt->fetch();
           return $row[0];


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
          $stmt = $this->dbh->prepare("INSERT INTO customer VALUES (null,?, ?, ?, ?, ?, ?, ?,password(?),?) ");


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
>>>>>>> 098bf529f7a9357c7aa3cf4ce6b5ef75bd20e3bb

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

    function delete_member($customer_id){

        $this-open();

        $stmt = $this->dbh->prepeare("DELETE FROM customer WHERE customer_id = ?");

        $stmt->bindParam(1,$customer_id);

        $stmt->execute();

        $this->close();

             }

        }

    function retrieve($customer_id){

        $this->open();

        $stmt = $this->dbh->prepare("SELECT * FROM customer WHERE customer_id = ?");
        $stmt->bindParam(1,$customer_id);
        $stmt->execute();

        $row = $stmt->fetch();

        $entry = array("customer_id"=>$row[0],"firstname"=>$row[1],"middlename"=>$row[2],"lastname"=>$row[3],"age"=>$row[4],"address"=>$row[5],"gender"=>$row[6],"username"=>$row[7],"password"=>$row[8]);
        $json_string = json_encode($entry);

        echo $json_string;

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

        $stmt=$this->dbh->prepare(" Delete From gadgets where gadget_id=? ");
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $this->close();

    }
    function Retrieve_item($id){

        $this->open();

        $stmt=$this->dbh->prepare("Select * from gadgets Where gadget_id=?");
        $stmt->bindParam(1,$id);
        $stmt->execute();

        $rows=$stmt->fetch();
        $video_retrieve=array('id'=>$rows[0],'name'=>$rows[1],'brand'=>$rows[2],
            'desc'=>$rows[3],'price'=>$rows[4]);
        $json_string=json_encode($video_retrieve);

        echo $json_string;



        $this->close();
    }

    function SaveVideo($id,$quantity,$title,$genre,$price){

        $this->open();

        $stmt=$this->dbh->prepare("Update cd SET Copies=?,Title=?,Genre=?,Price=? where video_id=?");
        $stmt->bindParam(1,$quantity);
        $stmt->bindParam(2,$title);
        $stmt->bindParam(3,$genre);
        $stmt->bindParam(4,$price);
        $stmt->bindParam(5,$id);
        $stmt->execute();

        echo "<td><input type='checkbox' name='checkVideo'
                    onclick='btnv_edit(".$id.")'/></td>";
        echo "<td>".$title."</td>";
        echo "<td>".$genre."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$price."</td>";
        echo "<td><input type='button'  value='edit' onclick='btnv_edit(".$id.")'/>";

        $this->close();

    }
    /*-----------------------------Log-In CUSTOMER-----------------------------------------------------*/
    function loginMember($username,$password){
        $this->open();

        $stmt=$this->dbh->prepare("SELECT customer_id from customer where username=?  and password=password(?)  ");
        $stmt->bindParam(1,$username);
        $stmt->bindParam(2,$password);
        $stmt->execute();

        $row = $stmt->fetch();
        return $row[0];

        $this->close();
    }
    function SearchUser($username,$password){
        $this->open();
        $stmt=$this->dbh->prepare("SELECT customer_id from customer where username=?  and password=password(?)");
        $stmt->bindParam(1,$username);
        $stmt->bindParam(2,$password);
        $stmt->execute();

        $rows=$stmt->fetch();

        echo $rows[0];

        $this->close();
    }

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
        $stmt=$this->dbh->prepare("SELECT * FROM gadgets WHERE gadget_name like '".$search."%' or brand like '".$search."%'
                                                           or color like '".$search."%' or quantity or  date_added like '".$search."%'   ");
        $stmt->execute();
        $status=false;

        while($rows=$stmt->fetch()){
            $status=true;

            echo "<tr id=".$rows[0].">";
            echo "<td>"."<input type='checkbox'/>"."</td>";
            echo "<td>".$rows[1]."</td>";
            echo "<td>".$rows[2]."</td>";
            echo "<td>".$rows[6]."</td>";
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


}

?>
