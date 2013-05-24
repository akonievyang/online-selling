<?php
    include "DAO/Online_SellingDAO.php";

 $data = $_POST['data'];
 $decoded_data = json_decode($data, true);

 foreach($decoded_data as $content) {
        $$content['name'] = $content['value'];
 }

   $execute = new Online_SellingDAO();
    $execute->saveto($firstname, $middlename, $lastname, $age, $gender, $address, $contact);
?>