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
					echo "<div id='discripttion'>"."<h3>"."Description"."</h3>".$rows[1]."</div>";   			
      			echo "</div>";
      			
      		
      		}if(!$status){
      			echo "<div > Not available here </div>";
  					    		
      		}
      	$this->close();
      }
     
   

   }
?>

