
<!DOCTYPE html>

<html>
	<head>
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.form.js"></script>
        <script src="js/admin.js"> </script>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/jquery-ui-sample.css"/>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/admin.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css"/>
	</head>
    <title>admin</title>
	<body>

        <div class="wholePage">
            <div class="main">

                <div class="content">
                    <div class="upload_container">
                        <div style="width:600px">
                            <form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
                                <form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
                                    Upload your image <input type="file" name="photoimg" id="photoimg" />
                                    <input type="button" id="saveitem"  value="save" class="btn btn-primary"/>
                                </form>

                                <div id='preview'> </div>
                        </div>
                    </div>


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
                <div   id="leftside">
                        <div class="inner">
                            <h4 style=" color: #FFFFFF;">Add Item</h4>
                            <div id="add_info">
                                <form>
                                        <div id="item_form">
                                            <span style="display: none;" class="warning"></span>
                                            <label>Name</label>
                                            <input type="text"  class="input-medium" id="name" name='name' required="required"/>
                                            <label>Brand</label>
                                            <input type="text"  class="input-medium"  id="brand" name='brand' required/>
                                            <label>Features</label>
                                            <input type="text"  class="input-medium"  id="features" name='features' required/>
                                            <label>Price</label>
                                            <input type="text"  class="input-medium"  id="price" name='price' onkeyup="Number()" required/>
                                            <input type="button" id="add" value="add item" class="btn btn-primary"/>
                                        </div>
                                        <!--- end add_item_form ---->

                                </form>
                            </div>
                            <!--- end add_info ---->
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
                     <!--- category---->
                </div>
                <!--- end leftside ---->
            </div>
            <!--- main ---->
        </div>
        <!--- end wholePage ---->

	</body>
</html>