<!DOCTYPE html>
<html lan="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search</title>
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
    #searchtable {
        table-layout: fixed;
    }
    .smalltblhdr {
        width: 10%;
    }
    .largetblhdr {
        width: 35%;
    }
    .tblcliptxt {
        white-space:nowrap;
        overflow: hidden;
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

        <!--search title-->
        <div class="row">
            <div class="col s12"><h3><strong>Search Listings</strong></h3></div>
        </div>

        <!--search bar and filters-->
        <div class="row">
            <form class="col s6 push-s3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="col s8">
                    <div class="input-field">
                        <label for="searchtxt">Search by keyword(s)</label>
                        <input name="searchtxt" type="text"/>
                    </div>
                </div>
                <div class="col s4">
                    <button class="btn waves-effect waves-light black" type="submit" name="search">
                        Search <i class="material-icons right">search</i>
                    </button>
                </div>
            </form>
        </div>
        </br>
        </br>

        <div class="row">
            <div class="col s12">
                <?php
                    $keywords = "";
                    $error = false;

                    //action to take when search button is clicked
                    if(isset($_POST["search"])) {
                        if(isset($_POST["searchtxt"])) $keywords=$_POST["searchtxt"];

                        include 'dbconnect.php';
                        $sql = "select Listing_ID, URL, Listing_Date, Username, Listing_Name from cpsc.listing2 where Listing_Name like '%$keywords%'";
                        $result = $conn->query($sql);
                        
                        echo "<table id='searchtable'><thead><th class='smalltblhdr'>Listing ID</th><th class='largetblhdr'>URL</th><th class='largetblhdr'>Listing Name</th><th class='smalltblhdr'>Username</th><th class='smalltblhdr'>Listing Date</th></thead>";
                        foreach ($result as $row) {
                            echo "<tr><td>".$row['Listing_ID']."</td><td class='tblcliptxt'><a href='".$row['URL']."'>".$row['URL']."</a></td>";
                            echo "<td>".$row['Listing_Name']."</td><td>".$row['Username']."</td><td>".$row['Listing_Date']."</td></tr>";
                        }
                        echo "</table>";
                    }
                ?>
            </div>
        </div>
        
    </div>
</body>
</html>