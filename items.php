<!DOCTYPE html>
<html lan="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Items</title>
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
    #curitemtxt {
        text-align: left;
    }
    #additemtxt {
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

        <!--Items title-->
        <div class="row">
            <div class="col s12"><h3><strong>Items</strong></h3></div>
        </div>

        <!--items options titles-->
        <div class="row">
            <div class="col s6" id="curitemtxt"><h5><strong>Current Items</strong></h5></div>
            <div class="col s6" id="additemtxt"><h5><strong>Add Item</strong></h5></div>
        </div>

        <!--add item form on right-->
        <div class = "row">
            <form class="col s5 offset-s7" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="row">
                    <div class="input-field">
                        <label for="itemname">Name</label>
                        <input name="itemname" type="text"/>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        <label for="datecreated">Date Created</label>
                        <input name="datecreated" type="date" placeholder=""/>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        <label for="thirdfield">Third Field</label>
                        <input name="thirdfield" type="text"/>
                    </div>
                </div>
                <button class="btn waves-effect waves-light black" type="submit" name="submit">
                    Submit <i class="material-icons right">add</i>
                </button>
            </form>
        </div>
    </div>

</body>
</html>