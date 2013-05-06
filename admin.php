

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
                    <table class="table table-bordered table-hover">
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
            <div class="view_item">

            </div>

			<div class="add_item">
                <label>name</label>
                <input type="text" id="name"/>
                <label>brand</label>
                <input type="text" id="brand"/>
                <label>description</label>
                <input type="text" id="desc"/>
                <label>features</label>
                <input type="text" id="features"/>
                <label>price</label>
                <input type="text" id="price"/>

                <input type="button" value="add item" id="add_item"/>
			</div>


			</div>

					
			<div>
		</div>
	</body>
</html>