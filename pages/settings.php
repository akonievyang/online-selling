<?php


?>

            <div class="container" id="tabs">
                <ul>
                    <li><a href="#tabs-1"> Account Settings </a></li>
                    <li><a href="#tabs-2"> Profile Settings </a></li>
                    <li><a href="#tabs-3"> Personal Settings </a></li>
                </ul>
                <!---------Account-------->
                <div id="tabs-1">
                         <tr> <h1> Account </h1> </tr>
                        <label>UserName</label>
                        <input type="text" id="user_name"/>

                        </p> <strong> Password </strong></p>

                        <label>Current password</label>
                        <input type="password" id="pass">

                        <form class="form-inline">

                           <input type="password" class="input-large" placeholder="New password">
                           <input type="password" class="input-large" placeholder="Confirm new password">
                        </form>
                    <button class="btn btn-primary" type="submit" style="float: right;" >
                        Save
                    </button>

                </div>
                <!---------Profile--------->
                <div id="tabs-2">
                    <h2> Profile </h2>

                    <p>afsdg</p>

                </div>
                <div id="tabs-3">
                  <!------Personal---------->
                    <h2> Personal </h2>

                    <form class="form-inline">

                        <input type="text" class="input-large" placeholder="firstname"/>
                        <input type="text" class="input-large" placeholder="middlename"/>
                    </form>

                    <form class="navbar-form">
                        <input type="text" class="input-large" placeholder="lastname"/>
                        <input type="text" class="input-large" placeholder="address"/>
                        <input type="text" class="input-large" placeholder="age"/>
                        <input type="text" class="input-large" placeholder="gender">

                   </form>
                    <button class="btn btn-primary" type="button" style="float: right;" >
                        Save Changes
                    </button>

                </div>
