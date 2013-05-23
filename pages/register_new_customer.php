<?php

?>
<div class="register_form">

    <h3>Register (New Member)</h3>

    <form action="register.php" method="POST">
        <label>Firstname</label>
        <input type="text" name="firstname" placeholder="Firstname" required/>
        <label>Middlename</label>
        <input type="text" name="middlename" placeholder="Middlename" required/>
        <label>Lastname</label>
        <input type="text" name="lastname" placeholder="Lastname" required/>
        <label>Age</label>
        <input type="text" name="age" placeholder="Age" required/>
        <label>Gender</label>
        <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <label>Address</label>
        <input type="text" name="address" placeholder="Address" required/>
        <label>Contact</label>
        <input type="text" name="contact" placeholder="Contact" required/>
        <label>username</label>
        <input type="text" name="username" placeholder="Username"/>
        <label>Password</label>
        <input type="password" name="password"/>
        <input type="submit"  value="create account"/>
    </form>
</div>

