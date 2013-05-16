
<!DOCTYPE HTML>
<html>
	<head>
			<script src="js/jquery-latest.js"></script>
			<script src="js/customer.js"></script>
			
			
			<link rel="stylesheet" type="text/css" href="bootstrap/css/jquery-ui-sample.css"/>
			<link rel="stylesheet" type="text/css" href="bootstrap/css/customer.css"/>
			<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
			<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css"/>
	</head>
    <title>MyPage</title>


	<body>

            <div class="wholePage">

                <div class="generalview">
                    <div id="left" style="float: left;"><div id="pic"></div><h4>Unit:</h4><span id="itemN"></span><h4>Brand:</h4><span id="itemB"></span>
                    <h4>Price:</h4><span id="itemp"></span></div>
                    <div id="right" style="float:right;"><h3>Features</h3><div id="itemF"></div></div>
                    <div style="clear: both"></div>

                    <input type="button" value="Buy" id="buyclick" class="btn btn-primary">
                </div>


                <div class="shopping_cart" style="width: 750px; border: 1px solid #bbbbbb;">
                    <input type="button" id="clear_list" class="btn" value="clear list"/>

                    <table class="table table-bordered" id="tb_cart">
                        <tr>
                            <td>Name</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td>Total Price</td>

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
                        <p id="shop_more"  style="text-decoration: underline;">or shop more?</p>
                    </div>

                </div>
                <!--- end cart --->

                <div class="main">
                    <input name="submit" id="logOut"  value="Log-Out"/>
                    <div style="margin-bottom: 20px;">
                        <input class="input-xxlarge" type="text" placeholder="What you want?:" id="search">
                        <input type="button" class="btn btn-primary btn-large" value="Search"/>
                    </div>


                    <div class="content">
                        <h1>Welcome!</h1>
                        <div class="post">
                            <p class="meta">Products </p>
                            <div id="body">
                                <div class="product">

                                </div>
                                <!-- end .inner -->
                            </div>
                            <!-- end #body -->
                        </div>
                        <br/>

                        <div class="post">
                            <p class="meta">The Best Gadgets </p>
                            <div id="body">
                                <div class="entry">

                                </div>
                                <!-- end .inner -->
                            </div>
                            <!-- end #body -->
                        </div>
                        <br/>

                        <div class="post">
                            <p class="meta">Related Search</p>
                            <div id="body">
                                <div class="entry">

                                </div>
                                <!-- end .inner -->
                            </div>
                            <!-- end #body -->
                        </div>
                        <!-- end .post -->
                        <br/>
                        <div class="post">
                            <p class="meta">Latest Product</p>
                            <div id="body">
                                <div class="entry">
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
                                <div class="entry">
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
                                <div class="entry">
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
                    <!--- end content --->

                    <div class="category">
                        <div class="inner">
                            <h4 style=" color: #FFFFFF;">Category</h4>
                            <ul>
                                <li> Cellphones </li>
                                <li> Laptops </li>
                                <li> Cameras </li>

                            </ul>
                        </div>
                    </div>
                    <!--- end category --->
                    <div style="clear: both;"></div>
                </div>
                <!--- end main --->
            <div>
            <!--- whole page --->


    </body>

</html>
