<!DOCTYPE html>
<html lan="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <!--Google Icon Font Style-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Materialize.css style-->
  <link type="text/css" rel="stylesheet" href="Style/materialize/css/materialize.min.css"  media="screen,projection"/>
  <!--Materialize javascript style-->
  <script type="text/javascript" src="Style/materialize/js/materialize.min.js"></script>
  <!--personal style page-->
  <link href="Style/MainStyle.css" rel="stylesheet">
  <script src="jquery-3.1.1.min.js"></script>
  <!--initialize all materialize stuf-->
  <script>
      $(function(){
          M.AutoInit();
      })
  </script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-H921JMT6L9"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-H921JMT6L9');
  </script>

  <style type="text/css">
    h3 {
        text-align: center;
    }
    #editproftxt {
        text-align: left;
    }
    #curproftxt {
        text-align: right;
    }
  </style>
</head>
<body>
    <!--header-->
    <table class="light-blue darken-4">
        <thead>
            <tr>
                <th style="width:3%" class="headertbl"><img src="images/CPSCLogo.png" width="50" height="50"/></th>
                <th class="headertbl"><label class="headerlbl"><strong>CPSC</strong></label></th>
                <th style="text-align: right" class="headertbl">
                    <a class='dropdown-trigger btn light-blue darken-4' href='#' data-target='navdropdown'>Menu</a>
                    <ul id='navdropdown' class='dropdown-content'>
                        <li><a href="about.php">About</a>
                        <li><a href="items.php">Items</a>
                        <li><a href="listings.php">Listings</a>
                        <li><a href="#">Letters</a>
                        <li><a href="reports.php">Reports</a>
                        <li><a href="#">Search</a>
                        <li><a href="profile.php">Profile</a>
                        <li><a href="index.php">Logout</a>
                    </ul>
                </th>
            </tr>
        </thead>
    </table>

    <div class="container">

        <!--Profile title-->
        <div class="row">
            <div class="col s12"><h3><strong>Profile</strong></h3></div>
        </div>

        <!--profile options titles-->
        <div class="row">
            <div class="col s6" id="editproftxt"><h5><strong>Edit Profile</strong></h5></div>
            <div class="col s6" id="curproftxt"><h5><strong>Current Profile</strong></h5></div>
        </div>

        <div class="row">
            <form class="col s5 offset-s0" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="row">
                    <div class="input-field">
                        <label for="username">Username</label>
                        <input name="username" type="text"/>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        <label for="email">Email</label>
                        <input name="email" type="email"/>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        <label for="password">Password</label>
                        <input name="password" type="password"/>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        <label for="confpassword">Confirm Password</label>
                        <input name="confpassword" type="password"/>
                    </div>
                </div>
                <button class="btn waves-effect waves-light black" type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>