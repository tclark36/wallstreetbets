<!DOCTYPE html>
<html lan="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reports</title>
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
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-192315482-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-192315482-1');
  </script>

  <style type="text/css">
    h3 {
        text-align: center;
    }
    #center {
        text-align: center;
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
                        <li><a href="items.php">Recalls</a>
                        <li><a href="listings.php">Listings</a>
                        <li><a href="violations.php">Violations</a>
                        <li><a href="reports.php">Reports</a>
                        <li><a href="search.php">Search</a>
                        <li><a href="index.php">Logout</a>
                    </ul>
                </th>
            </tr>
        </thead>
    </table>

    <div class="container">

        <!--reports header-->
        <div class="row">
            <div class="col s12"><h3><strong>Reports</strong></h3></div>
        </div>

        <!--dropdown for reports-->
        <div class="row">
            <div class="col s12" id="center">
                <a class='dropdown-trigger btn light-blue darken-4' href='#' data-target='reportsdropdown'>Choose a Report</a>
                <ul id='reportsdropdown' class='dropdown-content'>
                    <li><a href="report1.php">Recalls Reports</a>
                    <li><a href="report2.php">Google Analytics Reports</a>
                    <li><a href="report3.php">Violations Reports</a>
                </ul>
            </div>
        </div>
    </div>

</body>
</html>