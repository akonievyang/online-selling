
<?php

    include "DAO/accountDAO.php";
    session_start();

    if(!isset($_SESSION['admin_id'])){
        header("location: index.php");
    }else{

        $result=null;
        $action = new Account();
        $result=$action->Search_admin_user($_SESSION['admin_id']);

        $_SESSION['admin_user']=$result;

    }


?>
<!DOCTYPE html>

<html>
<head>
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>

    <script src="js/admin.js"> </script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/jquery-ui-sample.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/admin.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/design_model.css"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>

</head>
<title>admin</title>
<body>

    <div id="header">
        <h1>The Best Gadget</a></h1>
        <h2>we offer</h2>

        <div class="nav-container">
            <ul >
                <li class="menu" id="cart"><a href="#">shop cart</a></li>
                <li class="menu"><a href="#">Computer</a></li>
                <li class="menu">
                    <a  href="#">  Records </a>
                    <ul >
                        <li> <a href="?page=itemRecords">item</a></li>
                        <li><a href="?page=salesRecords"> sales </a></li>
                        <li><a href="?page=customerRecords"> customer </a></li>
                    </ul>
                </li>

                <li class="menu">
                    <a  href="#"><?php echo  $_SESSION['admin_user'] ?></a>
                    <ul >
                        <li><a href="?page=setting">Setting</a></li>
                        <li><a href="log_out_admin.php">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
            <!--- end category --->
        </div>

    </div>

    <div class="overlay">
        <div class="add_item">

                        <span class="right" id="closed" ><img src="images/close.png"
                                                              style="border :1px dashed #bbbbbb;"/></span>
            <br/>
            <span style="display: none;" class="warning"></span>
            <br/>
            <div id="add_info" >
                <div class="inside">
                    <h4 style=" color: #FFFFFF;">Add Item</h4>
                    <form id="form_item" >
                        <input type="hidden" id="id"/>
                        <label>Name</label>
                        <input type="text"  class="input-medium" id="name" name='name' required/>
                        <label>Brand</label>
                        <input type="text" class="input-medium"  id="brand" name='brand' required/>
                        <label>Features</label>
                        <textarea rows="3" cols="200"  id="features" name='features' style="width: 150px;" required>  </textarea>
                        <label>Price</label>
                        <input type="text" class="input-medium"  id="price" name='price' onkeyup="Number()" required/>
                        <br/>


                    </form>
                </div>
            </div>

            <!--- end add_info ---->


            <div class="upload_container" >

                <div id='preview'> </div>

                <form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
                    <p>Upload your image</p>
                    <input type="file" name="photoimg" id="photoimg"  >
                    <br/>
                </form>

            </div>


            <div style="clear: both;"></div>
            <br/>
                        <span class="right">
                        <input type="button" id="saveitem"  value="save item" class="btn btn-primary"/>
                        <input type="button" id="save_changes"  value="save changes" class="btn btn-primary"/>
                        </span>
            <br/>

        </div>
        <!--- end add_item ---->
    </div>

    <div class="page">
        <div class="main">

            <div class="content">
                  
                    <?php

                        if($_REQUEST['page']=='customerRecords'){
                            include "pages/customer_records.php";
                        }else if($_REQUEST['page']=='itemRecords'){
                            include "pages/item_records.php";
                        }else if($_REQUEST['page']=='salesRecords'){
                            include "pages/sales_records.php";
                        }
                    ?>

            </div>

            <!--- end content ---->

        </div>
        <!--- main ---->

    </div>
    <!--- end page ---->


</body>
</html>