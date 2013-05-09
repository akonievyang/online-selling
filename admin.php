<?php
    session_start();

?>

<!DOCTYPE html>

<html>
	<head>
        <script src="js/jquery.js"></script>
        <script src="js/admin.js"> </script>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/jquery-ui-sample.css"/>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/admin.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css"/>
	</head>
	<body>

        <div class="wholePage">

            <div class="upload_container">
                <?php
                if(isset($_SESSION['upload_pic'])):
                    echo  $_SESSION['not_supported'];
                endif;

                if(isset($_SESSION['exists'])):
                    echo $_SESSION['errors'];
                endif;

                if(isset($_SESSION['exists'])):
                    echo  $_SESSION['exists'];
                endif;

                session_unset();
                session_destroy();
                ?>
                <div id="pic">
                    <?php if(isset($_SESSION['upload_pic'])):
                              echo $_SESSION['upload_pic'];

                        endif;
                    ?>

                </div>

                <div class="right_side">
                    <input type="button" id="quanity" value="quantity"/>
                    <br/>
                    <p>Choose color:</p>

                    <p><input type="checkbox" id="cb"/>
                    <labe> black </labe>
                    <input type="text" id="black"  class="input-mini"/></p>
                    <br/>
                    <p> <input type="checkbox" id="cw"/>
                    <labe> white </labe>
                    <input type="text" id="white" class="input-mini"/></p>
                    <br/>
                    <p> <input type="checkbox" id="cr"/>
                    <labe> red </labe>
                    <input type="text" id="red" class="input-mini"/></p>
                    <br/>
                    <p><input type="checkbox" id="cy"/>
                    <labe> yellow </labe>
                    <input type="text" id="yellow" class="input-mini"/></p>
                    <br/>
                    <p><input type="checkbox" id="cblk"/>
                    <labe> bue </labe>
                    <input type="text" id="blue" class="input-mini"/></p>
                    <br/>
                    <p><input type="checkbox" id="cg"/>
                    <labe> green </labe>
                    <input type="text" id="green" class="input-mini"/></p>
                    <br/>
                    <p><input type="checkbox" id="cv"/>
                    <labe> violet </labe>
                    <input type="text" id="violet" class="input-mini"/></p>
                    <br/>
                </div>
                <div style="clear:both"></div>
               <div style="padding: 10px;">
                    <form action="uploadDemo.php" enctype="multipart/form-data" method="POST"">
                        <input type="file" name="uploadPic"/>
                        <input type="submit" id="upload" value="upload"/>

                    </form>
                </div>
                <input type="button" id="saveItem" value = "save" class="btn btn-primary"/>
                <input type="button" class="close_item" value = "close" class="btn "/>
            </div>

            <div class="main">

                <div class="content">

                        <div class="view_item">
                            <input type="text" class="search-query input-medium" id="search" placeholder="search"/>                                            <hr>
                            <table  class="table table-bordered table-hover ">
                                <tr>
                                <td></td>
                                <td>Name</td>
                                <td>Brand</td>
                                <td>Cost</td>
                                <td>Action</td>
                                </tr>
                                <tr>
                                <tbody id="items"></tbody>
                                </tr>
                            </table>
                             <input type="button" id="delete_item" value="delete" class="btn btn-primary"/>
                         </div>
                        <!--- end view item --->
                        <br/>
                        <div class="member">
                            <input type="text" class="search-query input-medium" id="searchM" placeholder="search"/>
                            <hr>
                            <table style="width: 730px;" class="table table-bordered table-hover">
                                <tr >
                                    <td>Fullname</td>
                                    <td>Username</td>
                                    <td>Gender</td>
                                    <td>Age</td>
                                    <td>Address</td>
                                    <td>Contact</td>
                                </tr>
                                <tr>
                                    <tbody id="member"></tbody>
                                </tr>
                            </table>
                        </div>
                        <!--- end content ---->
                </div>
                <!--- end content ---->
                <div   id="add_item">
                        <div class="inner">
                            <h4 style=" color: #FFFFFF;">Add Item</h4>
                            <div id="add_info">
                                    <form id="form_item">
                                        <span style="display: none;" class="warning"></span>
                                        <label>Name</label>
                                        <input type="text"  class="input-medium" id="name" name='name' required="required"/>
                                        <label>Brand</label>
                                        <input type="text"  class="input-medium"  id="brand" name='brand' required/>
                                        <label>Features</label>
                                        <input type="text"  class="input-medium"  id="features" name='features' required/>
                                        <label>Price</label>
                                        <input type="text"  class="input-medium"  id="price" name='price' onkeyup="Number()" required/>

                                    </form>

                            </div>
                            <!--- end add_info ---->
                            <input type="button" id="add" value="add item" class="btn btn-primary"/>
                        </div>
                         <!--- end inner ---->
                    <br/>
                    <div class="category">

                            <h4 style=" color: #FFFFFF;">Records</h4>
                            <ul>
                                <li id="li_item">Item</li>
                                <li id="li_customer">Customer</li>
                                <li id="li_sales">Sales</li>

                            </ul>

                    </div>

                </div>


                <!--- end add item ---->
            </div>
            <!--- main ---->
        </div>
        <!--- end wholePage ---->

	</body>
</html>