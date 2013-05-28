
<!DOCTYPE html >
    <head>
        <script src = "js/jquery-latest.js"></script>
        <script src = "js/jquery-ui-192.js"></script>
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.form.js"></script>
        <script src = "js/customer.js"></script>
        <title>The Best Gadget </title>
        <link href="images/con.png" rel="shortcut icon">
        <link rel="stylesheet" type="text/css"  href="bootstrap/css/myhome.css" />
        <link rel="stylesheet" type="text/css"  href="bootstrap/css/design_model.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>


    </head>

    <body>
        <div id="header">
            <h1>The Best GADGETS</a></h1>
            <h2>we offer</h2>

            <div class="nav-container">
                <ul >
                    <li class="menu">
                        <a  href="#"> Login user </a>
                        <ul >
                            <li><a href="?page=admin_user">login admin</a></li>
                            <li><a href="?page=member">login member</a></li>
                            <li><a href="?page=register">Register</a> </li>
                        </ul>
                    </li>
                    <li class="menu" id="cart"><a href="#">shop cart</a></li>
                    <li class="menu"><a href="#">Computer</a></li>
                    <li class="menu">
                        <a  href="#">  category </a>
                        <ul >
                            <li> <a href="product.php">Cellphones </a></li>
                            <li><a href="laptop.php"> Laptops </a></li>
                            <li><a href="camera.php"> Cameras </a></li>
                        </ul>
                    </li>


                </ul>
            </div>

        </div>

        </div>

        <div class="page">
            <div id="content">
                  <?php
                        if($_REQUEST['page']=='register_new_user'){
                            include "pages/register_new_customer.php";

                        }else if($_REQUEST['page']=='admin_user'){
                            include "pages/login_admin.php";
                        }else if($_REQUEST['page']=='member'){
                            include "pages/login_customer.php";
                        }else if($_REQUEST['page']=='register'){
                            include "pages/register_new_customer.php";

                        }
                  ?>

                  <br/>
                <div class="post">
                    <p class="meta">Products </p>
                    <div class="product">

                    </div>
                    <div class="pagination">
                        <input type="hidden" id="current_page"  value="0"/>
                        <span class="customer_pager"></span>
                    </div>
                </div>

            </div>
            <!-- end content -->
            <div id="sidebar">
                <ul>
                    <li>
                        <h2>Search</h2>
                        <form method="get" action="">
                            <fieldset>
                            <input type="text" id="s" class="input_control" name="s" value="" />

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
                    
                </ul>
            </div>
            <!-- end sidebar -->
            <div style="clear: both;"></div>
        </div>
    </body>
</html>
