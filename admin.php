

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
			<div class="content">

                    <div class="view_item">
                        <span ><input type="text" id="search" placeholder="search"/></span>
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
            </div>
            <div   id="add_item">
                <div id="inner_item">
                    <div id="item_info" ">
                        <label>Name</label>
                        <input type="text" id="name"/>
                        <label>Brand</label>
                        <input type="text" id="brand"/>
                        <label>Description</label>
                        <input type="text" id="desc"/>
                        <label>Features</label>
                        <input type="text" id="features"/>
                        <label>Price</label>
                        <input type="text" id="price" onkeyup="Number()"/>
                    </div>

                <input type="button" id="add" value="add item" class="btn btn-primary"/>
            </div>

            <div>
		</div>
        </div>
        <div id="item_pic" class="right">
            <div class="pic">
                <form enctype="multipart/form-data" action="uploadDemo.php" method="POST">
                    <input type="file" name="uploadPic"/>
                    <input type="submit" id="save" value="upload"/>
                </form>
            </div>

        </div>
        <br/>


	</body>
</html>