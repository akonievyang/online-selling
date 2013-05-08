

<!DOCTYPE HTML>

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
            <div class="main">
                <div class="content">

                        <div class="view_item">
                            <input type="text" class="search-query input-medium" id="search" placeholder="search"/>                                            <hr>
                            <table class="table table-bordered table-hover ">
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
                </div>
                <!--- end content ---->
                <div   id="add_item">
                        <div id="add_info">
                            <form id="form_item">
                                <span style="display: none;" class="warning"></span>
                                <label>Name</label>
                                <input type="text"  class="input-medium" id="name" name='name'/>
                                <label>Brand</label>
                                <input type="text" class="input-medium"  id="brand" name='brand'/>
                                <label>Description</label>
                                <input type="text" class="input-medium"  id="desc" name='desc'/>
                                <label>Features</label>
                                <input type="text" class="input-medium"  id="features" name='features'/>
                                <label>Price</label>
                                <input type="text" class="input-medium"  id="price" name='price' onkeyup="Number()"/>

                            </form>
                        </div>
                    <!--- end add_info ---->
                        <input type="button" id="add" value="add item" class="btn btn-primary"/>
                </div>
                <!--- end add item ---->
            </div>
            <!--- main ---->
        </div>
        <!--- end wholePage ---->

	</body>
</html>