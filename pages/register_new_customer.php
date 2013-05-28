<?php

?>
<div class="register_form">

        <h3>Register (New Member)</h3>
        <form id="register_form" >
           <label> Firstname:</label>	<input type="text" name ="firstname" required/>
            <label>Middlename:</label>   <input type="text" name ="middlename" required/>
            <label>Lastname:</label> <input type ="text" name ="lastname" required/>
            <label>Address:</label> <input type ="text" name ="address" required/> <br>
            <label>Age:</label> <input type="text" name ="age" required/>

            <label>Gender:</label> <select id = "gender" name = "gender"/>
                <option value = "male"> Male</option>
                <option value = "female"> Female</option>
                </select>

            <label>Contact Number:</label> <input type = "text" name = "contactNum" required/>
            <label>Username:</label><input type="text" name="user" required/>
            <label>Password:</label><input type="password" name="pass"  required/>
            <br/>
            <input type="submit" id="register" value="create account"/>
        </form>
    </div>
