<!doctype html>

 <html>

     <head>
            <title>Settings</title>

            <script src="js/jquery.js"></script>
            <script type="text/javascript" src="js/jquery.form.js"></script>

            <script src="js/admin.js"> </script>
            <link rel="stylesheet" type="text/css" href="bootstrap/css/jquery-ui-sample.css"/>
            <link rel="stylesheet" type="text/css" href="bootstrap/css/admin.css"/>
            <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
            <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css"/>

            <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
            <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
            <link rel="stylesheet" href="/resources/demos/style.css" />
            <script>
                $(function() {
                    $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
                    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
                });
            </script>
            <style>
                .ui-tabs-vertical { width: 50em; }
                .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
                .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
                .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
                .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
                .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 35em;}
            </style>
     </head>

     <body>

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
                </div>
        </div>

        <div class="page">

           <div class="">

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
            </div>
        </div>
       </div>
      </body>
 </html>