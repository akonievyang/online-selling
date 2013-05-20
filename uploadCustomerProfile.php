<?php
include "DAO/Online_SellingDAO.php";
    session_start();

    $customer_id=$_SESSION['customer_id'];
    $path = "customer_profile/";

    $valid_formats = array("jpg", "png", "gif", "bmp");
    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_FILES['photoimg']['name'];
        $size = $_FILES['photoimg']['size'];

        if(strlen($name))
        {
            list($txt, $ext) = explode(".", $name);
            if(in_array($ext,$valid_formats))
            {
                if($size<(1024*1024))
                {

                    $tmp = $_FILES['photoimg']['tmp_name'];
                    if(move_uploaded_file($tmp, $path.$name))
                    {
                        echo "<img src='".$path."/".$name."'  class='preview'>";

                        $action = new OnlineSelling();
                        $action->CustomerProfilePicture($name,$customer_id);

                    }
                    else
                        echo "failed";
                }
                else
                    echo "Image file size max 1 MB";
            }
            else
                echo "Invalid file format..";
        }

        else
            echo "Please select image..!";

        exit;
    }




?>