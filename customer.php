
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
    <div class="overlay">
        <div class="shopping_cart"  style="overflow:auto;">
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
                    <tbody id="cart"></tbody>
                </tr>
            </table>
            <br/>
            <div class="right" >
                <label>Total Price:<input type="text" class="input-medium" id="total" readonly='readonly'/></label>
                <input type="button" class="btn btn-primary" id="check_out" value="check out"/>
                <br/>
                <label id="shop_more"  style="text-decoration: underline;">or shop more?</label>
            </div>
            <div style="clear: both;"></div>


        </div>
    </div>
    <!--- end cart --->
    <div id="header">
        <h1>The Best GADGETS</a></h1>
        <h2>we offer</h2>

        <div class="topmenu">
            <div class="menu" id="top_category">category</div>
            <div class="menu">COmputer</div>
            <div class="menu" id="top_profile"> profile info </div>

            <div class="navigation">
                <div class="category">
                    <h4 style=" color: #ffeefe;">Category</h4>
                    <ul>
                        <li> Cellphones </li>
                        <li> Laptops </li>
                        <li> Cameras </li>

                    </ul>
                </div>
                <div class="profile">
                    <ul>
                        <li><a href="?page=setting">Setting</a></li>
                        <li><a href="log_out_customer.php">Log out</a></li>
                    </ul>
                </div>
            </div>
        </div>
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

                <div class="post">
                    <p class="meta">Products </p>
                    <div class="product">


                    </div>

                </div>
                <div class="post">
                    <p class="meta">Top Product </p>
                    <div id="body">
                        <div class="entry">

                        </div>
                        <!-- end .inner -->
                    </div>
                    <!-- end #body -->
                </div>
                <br/>

        </div>
        <!--- end content --->
    </div>
    <!--- end main --->
    </div>

    <!---end page --->



</body>

</html>
