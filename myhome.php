<?php
session_start();
include "DAO/Online_SellingDAO.php";


if(isset($_POST['user']) && isset($_POST['pass']) ){

    $username=$_POST['user'];
    $password=$_POST['pass'];

    $result=null;
    $action = new OnlineSelling();
    $result=$action->loginMember($username,$password);

    if($result){

        $_SESSION['user_id']=$result;
        header('location:customer.php');

    }else{
        echo 'Unable to login';
    }
}

?>
<!DOCTYPE html >
    <head>
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.form.js"></script>
        <script src = "js/customer.js"></script>
        <title>The Best Gadget </title>
        <link href="bootstrap/css/myhome.css" rel="stylesheet" type="text/css" />

        <link rel = "stylesheet" type = "text/css" href = "bootstrap/css/jquery-ui-1.9.0.custom.min.css" />
        <link rel = "stylesheet" type = "text/css" href = "bootstrap/ccs/jquery-ui-1.9.0.custom.css"/>

    </head>

    <body>
        <div id="header">
            <h1>The Best Gadget</a></h1>
            <h2>we offer</h2>
        </div>
        <div id="page">
            <div id="content">
                <div class="post">

                    <h1 class="title">Welcome to Our Website!</h1>

                    <div class="entry">

                    </div>



                </div>

                <div class="post">
                    <p class="meta">Latest Product</p>
                    <div id="body">
                        <div class="inner">
                            <div class="leftbox">
                            </div>
                            <!-- end .leftbox -->
                            <div class="rightbox">
                            </div>
                            <!-- end .rightbox -->
                        </div>
                        <!-- end .inner -->
                    </div>
                    <!-- end #body -->
                </div>
                <!-- end .post -->
                <br/>
                <div class="post">
                    <p class="meta">Recommended Product</p>
                    <div id="body">
                        <div class="inner">
                            <div class="leftbox">
                            </div>
                            <!-- end .leftbox -->
                            <div class="rightbox">
                            </div>
                            <!-- end .rightbox -->
                        </div>
                        <!-- end .inner -->
                    </div>
                    <!-- end #body -->
                </div>
                <!-- end .post -->

                <br/>
                <div class="post">
                    <p class="meta">Top Product</p>
                    <div id="body">
                        <div class="inner">
                            <div class="leftbox">
                            </div>
                            <!-- end .leftbox -->
                            <div class="rightbox">
                            </div>
                            <!-- end .rightbox -->
                        </div>
                        <!-- end .inner -->
                    </div>
                    <!-- end #body -->
                </div>
                <!-- end .post -->


            </div>
            <!-- end content -->
            <div id="sidebar">
                <ul>
                    <li>
                        <h2>Login User</h2>

                            <fieldset>
                                <form method="POST" action="myhome.php">
                                    <label>Username:</label>
                                    <input type="text" name="user"  />
                                    <br />
                                    <label>Password:</label>
                                    <input type="password" name="pass" />
                                    <br />
                                    <input  type="submit" id="login" value="check me out" />
                                    <br> </br>
                                </form>
                            </fieldset>
                    </li>
                    <div id = 'Reg_Form'>

                        <h3>Register (New Member)</h3>

                        <form >

                            Firstname:	<input type="text" name ="firstname" required/>
                            Middlename:   <input type="text" name ="middlename" required/>
                            Lastname: <input type ="text" name ="lastname" required/>
                            Address: <input type ="text" name ="address" required/> <br>
                            Age: <br> <input type="text" name ="age" required/>
                            <tr>
                            Gender: <select id = "gender" name = "gender"/>
                                    <option value = "male"> Male</option>
                                    <option value = "female"> Female</option>
                                </select>
                            </tr> <br>
                            Contact Number: <input type = "text" name = "contactNum" required/>
                            Username:<input type="text" name="users" required/>
                            Password:<input type="password" name="pass"  required/>

                            <input type="reset" id="register" value="register"/>
                        </form>

                    </div>
                    <li>
                        <h2>Search</h2>
                        <form method="get" action="">
                            <fieldset>
                            <input type="text" id="s" name="s" value="" />
                            <br />
                            <input name="submit" type="submit" id="searchsubmit" value="Search" />
                            </fieldset>
                        </form>
                    </li>
                    <li>
                        <h2>Archives</h2>
                        <ul>
                            <li>August 2007 (1)</li>
                            <li>July 2007 (31)</li>
                            <li>June 2007 (30)</li>
                            <li>May 2007 (31)</li>
                            <li>April 2007 (30)</li>
                        </ul>
                    </li>
                    <li>
                        <h2>Categories</h2>

                        <ul>
                            <li> <a href="product.php"> <strong> Cellphones </strong> </a></li>
                            <li> <a href="laptop.php"> <strong> Laptops </strong> </a></li>
                            <li> <a href="camera.php"> <strong> Cameras' </strong> </a></li>

                        </ul>
                            <div id="Cellphone">
                            <div id="Computer">

                            </div>

                    </li>
                </ul>
            </div>
            <!-- end sidebar -->
            <div style="clear: both;"></div>
        </div>
    </body>
</html>
