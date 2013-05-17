
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
<<<<<<< HEAD

        <div class="wholePage">
            <div class="main">
=======

            <div id="header">
                <h1>The Best Gadget</a></h1>
                <h2>we offer</h2>

                <div class="topmenu">

                    <div class="menu" id="top_category">category</div>
                    <div class="menu">COmputer</div>
                    <div class="menu" id="top_profile" > profile info </div>

                    <div class="navigation">
                        <div class="category">
                            <h4 style=" color: #FFFFFF;">Category</h4>
                            <ul>
                                <li id="li_item">Item</li>
                                <li id="li_customer">Customer</li>
                                <li id="li_sales">Sales</li>

                            </ul>
                        </div>
                        <div class="profile">

                            <ul>
                                <li>Setting</li>
                                <li>Log out</li>

                            </ul>
                        </div>


                    </div>
                    <!--- end category --->
                </div>

            </div>
            <div class="overlay">
                <div class="add_item">

<<<<<<< HEAD
                        <ul>
                            <li><a href="Settings.php">Setting</a></li>
                            <li>Log out</li>
=======
                    <span style="float: right;" class="closed" ><img src="images/close.png"
                    style="border :1px dashed #bbbbbb;"/></span>
                    <br/>
                    <span style="display: none;" class="warning"></span>
                    <br/>
                    <div id="add_info" >
                        <div class="inside">
                        <h4 style=" color: #FFFFFF;">Add Item</h4>
                        <form id="form_item" >
>>>>>>> 5f9d2ad62a39f2d1a61051e6b93fb78217f4fbc2

                            <label>Name</label>
                            <input type="text"  class="input-medium" id="name" name='name' required/>
                            <label>Brand</label>
                            <input type="text" class="input-medium"  id="brand" name='brand' required/>
                            <label>Features</label>
                            <input type="text" class="input-medium"  id="features" name='features'required/>
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
                    <span >
                    <input type="button" id="saveitem"  value="save item" class="btn btn-primary"/>
                    </span>
                    <br/>

              </div>
              <!--- end add_item ---->
            </div>
            <div class="page">
                    <div class="main">

                    <div class="content">
                            <div class="view_item">
                                <input type="text" class="search-query input-medium" id="search" placeholder="search"/>
                                <span><input type="button" id='display_add' value="add more item" class="btn btn-inverse"/></span>
                                <hr>

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

<<<<<<< HEAD
=======
        </div>


        <div class="page">
                <div class="main">
>>>>>>> 098bf529f7a9357c7aa3cf4ce6b5ef75bd20e3bb

                <div class="content">
                    <div class="upload_container">
                        <div style="width:600px">
                            <div id='preview'> </div>
                            <form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
                                <form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
                                    <p>Upload your image</p>
                                    <input type="file" name="photoimg" id="photoimg"  />
                                    <br/>
                                    <input type="button" id="saveitem"  value="save" class="btn btn-primary"/>
                                </form>
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
                            <table class="table table-bordered table-hover">
                                <tr >
                                    <td>Fullname</td>
                                    <td>Username</td>
                                    <td>Gender</td>
                                    <td>Age</td>
                                    <td>Address</td>
                                    <td>Contact</td>
                                    <td>Action</td>
                                </tr>
                                <tr>
                                    <tbody id="member"></tbody>
                                </tr>
                            </table>
                               <input type="button" id="delete_member" value="delete" class="btn btn-primary"/>
                        </div>
                        <!--- end content ---->
>>>>>>> fdb45a2ee57720dee83059d6352848083a4ee6ae
                </div>
<<<<<<< HEAD
                <!--- end content ---->
                <div   id="leftside">
                        <div class="inner">
                            <h4 style=" color: #FFFFFF;">Add Item</h4>
                            <div id="add_info">
                                <form>
                                        <div id="item_form">
                                            <span style="display: none;" class="errorwarning"></span>
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
=======
                <!--- main ---->
>>>>>>> 098bf529f7a9357c7aa3cf4ce6b5ef75bd20e3bb

                    </div>
                     <!--- category---->
                </div>
                <!--- end leftside ---->
            </div>
            <!--- end wholePage ---->


	</body>
</html>