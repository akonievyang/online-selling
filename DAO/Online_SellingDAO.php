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
      		$stmt->execute();


      		$status=false;
          $LI = "";
      		while($rows=$stmt->fetch()){
                $image="uploaded_file/$rows[4]";
                $status=true;
                $name = explode("",$rows[1]);
                echo "<div style='display:inline-block;'>";
                echo "<img src=".$image." alt=$rows[1] style='width:150px; height:150px;/>";
                echo "<label>".$rows[1]."</label>";
                echo "<label style='display:inline;'>"."<h5>"." Only Php ".$rows[3]."</h5>"."</label>";
                echo "<input type='button' value='buy now' onclick=buyNow(".$rows[0].",'".$name[0]."','".$name[1]."','".$rows[2]."','".$rows[3]."','".$image."','".$rows[5]."') />";
                echo "</div >";

      		}
            if(!$status){
      			echo "<div > Not available </div>";

      		}
      	$this->close();
      }
      /*-----------------------------LogInAdmin-----------------------------------------------------*/
       function LogInAdmin($username,$password){
           $this->open();



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

            $stmt = $this->dbh->prepare("UPDATE customer set firstname = ?, middlename = ?, lastname = ?, age = ?, address = ?, gender = ?, username = ?, password = ? WHERE customer_id = ?");
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
                   'desc'=>$rows[3],''=>$rows[4]);
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
      //$row = $stmt->fetch();
              // return $row[1];


              $rows=$stmt->fetch();
                   echo $rows[0];

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
       function AddToCart($id,$name,$brand,$price){
           $this->open();
           $stmt=$this->dbh->prepare("Select * from gadgets");
           $stmt->execute();

           $rows=$stmt->fetch();

           echo "<tr id='.$rows[0].'>";

           echo "<td>".$rows[1]."</td>";
           echo "<td>".$rows[6]."</td>";
           echo "<td>"."<input type = 'text' id='quantity'.$rows[0]. onkeyup='Quantity(".$rows[6].",".$rows[0].")'/>"."</td>";
           echo "<td>"."<input type = 'text' id='totalprice' readonly='readonly' />"."</td>";
           echo "</tr>";

           $this->close();

       }


   }
?>

