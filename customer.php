
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
	<body>

            <div class="wholePage">
                <div class="main">
                    <div style="margin-bottom: 20px;">
                        <input class="input-xxlarge" type="text" placeholder="What you want?">
                        <input type="button" class="btn btn-primary btn-large" value="Search"/>
                    </div>


                    <div class="content">
                        <h1>Welcome!</h1>

                        <div class="post">
                            <p class="meta">Related Search</p>
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

                        <div class="shopping_cart" style="width: 750px; border: 1px solid #bbbbbb;">
                            <input type="button" id="clear_list" class="btn" value="clear list"/>

                            <table class="table table-bordered">
                                <tr>
                                    <td>Name</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                    <td>Total Price</td>

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
                        <!--- end content --->

                    </div>
                    <!--- content --->

                    <div class="category">
                        <div class="inner">
                            <h4 style=" color: #FFFFFF;">Category</h4>
                            <ul>
                                <li>Cellphones</li>
                                <li>Televesion</li>
                                <li>Computer</li>

                            </ul>
                        </div>
                    </div>
                    <!--- end category --->
                    <div style="clear: both;"></div>
                </div>
                <!--- end main --->
            <div>
            <!--- whole page --->
                <center><input type="submit" class="btn btn-primary" value="Edit"/></center>
	</body>

</html>
