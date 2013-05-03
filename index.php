
<?php
	session_start();
	
	include 'DAO/Online_SellingDAO.php';	
	$LogIn = new OnlineSelling();
	
	if(isset($_POST['username']) && isset($_POST['password'])){

		$verrified = $LogIn->LogInUser($_POST['username'], $_POST['password'], $_POST['type']);

		if($verrified && $_POST['type'] == "admin"){

			$_SESSION['username'] = $_POST['username'];
			$_SESSION['type'] = $_POST['type'];
			header('Location: admin.php');


		}else {
				if($verrified && $_POST['type'] == "buyer") {
					header('Location: buyer.php');
				} else {
					$errMsg = "You are not register!! ";
				}
			}
		}

?>
<!DOCTYPE HTML>
<html>
<head>

	<script src = "js/jquery-latest.js"></script>
	<script src = "js/jquery-ui-192.js"></script>
	<link rel = "stylesheet" type = "text/css" href = "bootstrap/css/jquery-ui-1.9.0.custom.min.css" />
	<link rel = "stylesheet" type = "text/css" href = "bootstrap/css/index.css"/>
	<link rel = "stylesheet" type = "text/css" href = "bootstrap/ccs/jquery-ui-1.9.0.custom.css"/>
	<script src = "js/index.js"></script>

</head>



<body>

    <button id="button_reg">REGISTER</button>
    <button id="button_log">Log-In</button>

    <header><b>MyPhone</b></header>

    <div id = 'Log-inForm'>
			
			<h1>LOG-IN</h1>
					
								<p>			
						<label for='username'>Username:</label>
						<input type='text' id='username' name='username' >
					</p>
					<p>
						<label for='password'>Password:</label>
						<input type='password' id='password' name='password' />
					</p>
					 <tr>
						<td>TYPE:</td>
						<td> <select name = "type">
								<option value = "admin">Admin</option>
								<option value = "buyer">Buyer</option>
							</select> </td>
					</tr>
					
					<br> </br>
				
					<input type='submit' value='Log-In'/>
				<p class='status'>
				<?php 
					if(isset($errMsg)){
						echo $errMsg;
					}
				?>
				</p>
						</br>

			</div>
		</div>

	<div id = 'Register_Form'>

			<h2>Register</h2>
 
		     <form>

                <p>
                 Firstname:	<input type="text" name ="firstname">
                 </p>
                 <p>
                 Middlename:   <input type="text" name ="middlename">
                 </p>
                 <p>
                 Lastname: <input type ="text" name ="lastname">
                 </p>
                 <p>
                 Address: <input type ="text" name ="address">
                 </p>
                 <p>
                 Age: 	<br><input type="text" name ="age">
                 </p>
                     <tr>
                 Gender: <select id = "gender" name = "gender">
                     <option value = "male">Male</option>
                     <option value = "female">Female</option>
                 </select>
                     </tr>
                 <p>
                 Username:<input type="text" name="username">
                 </p>
                 <p>
                 Password:<input type="password" name="password">
                 </p>

		       
		     </form>
              <input type='submit' value='Register'/>
		 </div>

                <div id = 'image'>
                    <img src= "images/mp.jpg"/>
                 </div>
                    <p>Simply Amazing.Mura na Gawang Pinoy pa.</p>


</body>
</html>