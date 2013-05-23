
<?php
session_start();

if(!isset($_SESSION['customer_id'])){
    header("location: myhome.php");
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>
    <script src="js/customer.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/jquery-ui-sample.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/customer.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/design_model.css"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>

</head>
<title>MyPage</title>


<body>



    <div id="header">
        <h1>The Best GADGETS</a></h1>
        <h2>we offer</h2>

       <ul class=".nav-container"">
            <li class="menu" id="cart"><a href="#">shop cart</a></li>
            <li class="menu"><a href="#">Computer</a></li>

            <li class="menu">
                <a  href="#">  category </a>
                <ul class="dropdown-menu">
                    <li> <a href="#">Cellphones </a></li>
                    <li><a href="#"> Laptops </a></li>
                    <li><a href="#"> Cameras </a></li>
                </ul>
            </li>
            <li class="menu">
                <a  href="#">  category </a>
                <ul class="dropdown-menu">
                    <li><a href="?page=setting">Setting</a></li>
                    <li><a href="log_out_customer.php">Log out</a></li>
                </ul>
            </li>
       </ul>

    </div>


    <div class="page">
        <div class="profile_pic">
            <div id='preview' class="thumbnail"> </div> <p>edit profile</p>
        </div>
    <div class="main">
        <div style="margin-bottom: 20px;">
            <input class="input-xxlarge" type="text" placeholder="What you want?:" id="search">
            <input type="button" class="btn btn-primary btn-large" value="Search"/>
        </div>


        <div class="content">

                <?php
                    if($_REQUEST['page']=='setting'){
                        include "pages/customer_settings.php";
                    }
                ?>
                <div class="post">
                    <p class="meta">Products </p>
                    <div class="product">

                    </div>

                </div>
                <div class="post">
                    <p class="meta">Top Product </p>
                    <div id="body">


                    </div>

                </div>
                <br/>
            <div class="choice_view">
                <input type='hidden'  id='id'/>
                <div class="left" style="float: left;">
                    <div id="choice_picture" ></div>
                    <input type='hidden' id="id"/>
                    <br/>
                    <span >Unit:<li id="choice_unit"></li></span>
                    <br/>
                    <span >Brand:<li id="choice_brand"></li> </span>
                    <br/>
                    <span >Price:<li id="choice_price"></li></span>

                </div>
                <div class="right" style="float:right;">
                    <h3>Features</h3>
                    <div id="choice_features">

                    </div>
                </div>
                <div style="clear: both"></div>

                <button  id="choice_add_to_cart" class="btn btn-primary">buy now</button>
            </div>


            <div class="overlay">
                <div class="shopping_cart">
                    <span style="float: right;" class="closed" ><img src='images/close.png' style="border :1px dashed #bbbbbb;"/></span>
                    <input type="button" id="clear_list" class="btn" value="clear list"/>
                    <br/>
                    <table class="table table-bordered" id="tb_cart" >
                        <tr >
                            <td>Name</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td>Total Price</td>
                            <td></td>
                        </tr>
                        <tr>
                            <tbody id="tbod_cart"></tbody>
                        </tr>
                    </table>
                    <br/>
                    <div class="right" >
                        <label>Total Price:<input type="text" class="input-medium" id="total_all_item" readonly='readonly'/></label>
                        <input type="button" class="btn btn-primary" id="check_out" value="check out"/>
                        <br/>
                        <label id="shop_more"  style="text-decoration: underline;">or shop more?</label>
                    </div>
                    <div style="clear: both;"></div>


                </div>
            </div>
            <!--- end cart --->

        </div>
    </div>
   </div>





</body>

</html>
