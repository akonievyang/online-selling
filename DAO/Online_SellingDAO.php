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
      
      function ViewDisplay(){
      	$this->open();
      		$stmt=$this->dbh->prepare("Select item.item_id,gadgets.discription,gadgets.features,picture.large_pic,gadgets.price,gadgets.name,gadgets.brand
      											from item,gadgets,picture where item.gadget_id=gadgets.gadget_id and item.pic_id=picture.pic_id");
      		$stmt->execute();
      		
      		$status=false;
      		while($rows=$stmt->fetch()){
      			$status=true;
      			echo "<div>";
      			echo "<div class='shop' id='big_pic'>"."<img src='images/".$rows[3]."'/>"."</div>";      			
      			echo "<div class='shop' id='features'>"."<h3>"."Features"."</h3>".$rows[2]."</div>";
      			echo "</div>";
      			
      			echo "<div>";
      			echo "<div class='selling_status'>";
      			echo "<label>"."Price: ".$rows[4]." ONLY"."  "."<img src='images/add.png' onclick='BuyNow(".$rows[0],$rows[4],$rows[5],$rows[6].")'/>"."</label>";   			
      			echo "</div>";
      			echo "</div>";
      			
      			echo "<div class='describe'>";
					echo "<div id='descriptions'>"."<h3>"."Description"."</h3>".$rows[1]."</div>";
      			echo "</div>";
      			
      		
      		}if(!$status){
      			echo "<div > Not available here </div>";
  					    		
      		}
      	$this->close();
      }

       function LogInUser($username,$password, $type){

           $this->open();

           $stmt = $this->dbh->prepare("SELECT * FROM user WHERE username = ? AND password = ? AND type = ?");
           $stmt->execute(array($username, $password, $type));

           if($stmt->fetch()) {
               return true;
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
          $stmt = $this->dbh->prepare("INSERT INTO customer VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ");


          $stmt->bindParam(1, $firstname);
          $stmt->bindParam(2, $middlename);
          $stmt->bindParam(3, $lastname);
          $stmt->bindParam(4, $address);
          $stmt->bindParam(5, $age);
          $stmt->bindParam(6, $gender);
          $stmt->bindParam(7, $contactNum);
          $stmt->bindParam(8, $username);
          $stmt->bindParam(9, $password);

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

            $stmt = $this->dbh->prepare("UPDATE cuctomer set firstname = ?, middlename = ?, lastname = ?, age = ?, address =?, gender = ?, username = ?, password = ?, WHERE customer_id = ?");
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

       /*------------------------ ADD FUNCTION ------------------------------------------- */

       function AddItem($name,$brand,$features,$price,$filename){
            $this->open();
                $stmt=$this->dbh->prepare("INSERT INTO gadgets(gadget_name,brand,features,price,date_added) VALUES(?,?,?,?,NOW())");
                   $stmt->bindParam(1, $name);
                   $stmt->bindParam(2, $brand);
                   $stmt->bindParam(3, $features);
                   $stmt->bindParam(4, $price);
                   $stmt->execute();
                   $gad_id=$this->dbh->lastInsertId();

                $stmt=$this->dbh->prepare("Insert into picture values(null,?)");
                   $stmt->bindParam(1,$filename);
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

       function loginMember($username,$password){
           $this->open();

               $stmt=$this->dbh->prepare("SELECT username,password from customer where username=?  and password=password(?)  ");
               $stmt->bindParam(1,$username);
               $stmt->bindParam(2,$password);
               $stmt->execute();

               if($stmt->fetch()){
                   return true;
               }else{
                   return false;
               }
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
       function CustomerViewItem($search){
           $this->open();
               $stmt=$this->dbh->prepare("SELECT * FROM gadgets WHERE gadget_name like '".$search."%' or
                                       brand like '".$search."%' or price like '".$search."%'
                                       or features like '".$search."%'   ");

               $stmt->execute();

                   $status=false;
                   while($rows=$stmt->fetch()){
                       $status=true;


                       echo "<div id=".$rows[0].">";
                       echo "<p>".$rows[1]."</p>";
                       echo "<p>".$rows[3]."</p>";
                       echo "<p>".$rows[6]."</p>";
                       echo "<p>"."<input type='button' onclick='Buy(".$rows[0].")'/>"."</p>";
                       echo "</div>";
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

