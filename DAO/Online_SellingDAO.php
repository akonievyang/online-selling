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

       function addMember($firstname, $middlename, $lastname, $age, $address, $gender, $username, $password, $type){
           $this->open();
           $type="buyer";
           $stmt = $this->dbh->prepare("INSERT INTO user VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");


           $stmt->bindParam(1, $firstname);
           $stmt->bindParam(2, $middlename);
           $stmt->bindParam(3, $lastname);
           $stmt->bindParam(4, $age);
           $stmt->bindParam(5, $address);
           $stmt->bindParam(6, $gender);
           $stmt->bindParam(7, $username);
           $stmt->bindParam(8, $password);
           $stmt->bindParam(9, $type);

           $stmt->execute();
           $id = $this->dbh->lastInsertId();

           echo "<tr id=".$id.">";
           echo "<td>".$id."</td>";
           echo "<td>".$firstname."</td>";
           echo "<td>".$middlename."</td>";
           echo "<td>".$lastname."</td>";
           echo "<td>".$age."</td>";
           echo "<td>".$address."</td>";
           echo "<td>".$gender."</td>";
           echo "<td>".$type."</td>";
           echo "<td><img src='images/delete.png' onclick='deleteEntry(".$id.")'/>";
           echo "<img src='images/edit.png' onclick='editEntry(".$id.")'/></td>";
           echo "</tr>";

           $this->close();
       }


   }
?>

