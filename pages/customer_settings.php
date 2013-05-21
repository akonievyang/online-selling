<?php


?>

    <ul class="nav nav-tabs" >

        <li class="active" id="li_setting_info"><a href="#profile_info" data-toggle="tab">Profile info</a></li>
        <li id="li_setting_account"><a href="#account_setting" data-toggle="tab">Account</a></li>

    </ul>

    <div class="tab-content" >
        <div class="tab-pane active" id="profile_info" >
            <form class="">
                <label>Firstname</label>
                <input type="text" name="firstname"/>
                <label>Middlename</label>
                <input type="text" name="middlename"/>
                <label>Lastname</label>
                <input type="text" name="lastname"/>
                <label>Age</label>
                <input type="text" name="age"/>
                <label>Gender</label>
                <select>
                    <option>Male</option>
                    <option>Female</option>
                </select>
                <label>Address</label>
                <input type="text" name="address"/>
                <label>Contact</label>
                <input type="text" name="contact"/>

                <input type="submit" value="save" />
            </form>
        </div>
        <div class="tab-pane" id="account_setting">
                <form>
                    <label>username</label>
                    <input type="text" id="username"/>
                    <label>new username</label>
                    <input type="text" id="new_username"/>
                    <label>password</label>
                    <input type="text" id="user_password"/>
                    <label>new password</label>
                    <input type="text" id="new_user_password"/>
                    <input type="submit" value="save" />
                </form>

        </div>
    </div>