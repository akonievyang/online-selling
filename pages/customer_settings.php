
<?php


?>
<html>
     <head>

         <script src="js/Settings.js"></script>
         <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
         <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
         <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
         <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css"/>
         <link rel="stylesheet" href="/resources/demos/style.css" />

            <script>

                $(function() {
                    $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
                    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
                });
            </script>

            <style>
                .ui-tabs-vertical { width: 55em; }
                .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
                .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
                .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
                .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
                .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
            </style>
     </head>

        <title>Settings</title>

     <body>

            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1"> Personal Settings </a></li>
                    <li><a href="#tabs-2"> Account Settings </a></li>
                    <li><a href="#tabs-3"> Profile Settings </a></li>
                </ul>
                <div id="tabs-1">
                   
                        <h2>Personal Settings</h2>

                            <label>Firstname</label>
                            <input type="text" name="firstname"/>
                            <label>Middlename</label>
                            <input type="text" name="middlename"/>
                            <label>Lastname</label>
                            <input type="text" name="lastname"/>
                            <label>Age</label>
                            <input type="text" name="age"/>
                            <label>Gender</label>
                            <select name="gender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            <label>Address</label>
                            <input type="text" name="address"/>
                            <label>Contact</label>
                            <input type="text" name="contact"/>

                            <input id="saveto" type="submit" value="save" />
                            
                </div>
                <div id="tabs-2">
                    <h2>Account Settings</h2>
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
                <div id="tabs-3">
                    <h2>Profile Settings</h2>


                </div>
             </div>
     </body>

</html>
