<?php
    session_start();
    $listingid = $_SESSION['editlistingid'];
    $error = false;

    include 'dbconnect.php';
    $sql = "select * from cpsc.listing1 where Listing_ID=$listingid";
    $result = $conn->query($sql);
    while($row = mysqli_fetch_array($result)){
        $url = $row["URL"];
        $productid = $row["Product_ID"];
        $listingdate = $row["Listing_Date"];
        $employeeid = $row["Employee_ID"];
        $resellerusername = $row["Username"];
        $marketid = $row["Market_ID"];
        $resolved = $row["Resolved"];
        $falsepositive = $row["False_Positive"];
    }

    //action to take when user submits their edits
    if(isset($_POST["submit"])) {
        if(isset($_POST["url"])) $url=$_POST["url"];
        if(isset($_POST["productid"])) $productid=$_POST["productid"];
        if(isset($_POST["listingdate"])) $listingdate=$_POST["listingdate"];
        if(isset($_POST["employeeid"])) $employeeid=$_POST["employeeid"];
        if(isset($_POST["resellerusername"])) $resellerusername=$_POST["resellerusername"];
        if(isset($_POST["marketid"])) $marketid=$_POST["marketid"];
        if(isset($_POST["resolved"])) $resolved=$_POST["resolved"];
        if(isset($_POST["falsepositive"])) $falsepositive=$_POST["falsepositive"];

        if(!empty($url) && $productid>0 && !empty($listingdate) && $employeeid>0 && !empty($resellerusername) && $marketid>0 && $resolved>=0 && $falsepositive>=0) {
            include 'dbconnect.php';
            $sql = "update cpsc.listing1 set URL='$url', Product_ID=$productid, Listing_Date='$listingdate', Employee_ID=$employeeid, Username='$resellerusername',
                    Market_ID=$marketid, Resolved=$resolved, False_Positive=$falsepositive where Listing_ID=$listingid";
            $result = $conn->query($sql);

            //javascript to display a confirmation message
            echo '<script type="text/javascript">';
            echo 'alert("Your changes have been made!")';
            echo '</script>';
        } else {
            $error = true;
        }
    }
?>

<!DOCTYPE html>
<html lan="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Listing</title>
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
    #editlistingfrm {
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

        <!--Edit Listing title-->
        <div class="row">
            <div class="col s12"><h3><strong>Edit Listing</strong></h3></div>
        </div>

        <!--edit listing form-->
        <div class="row">
            <form id="editlistingfrm" class="col s4 offset-s4" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="input-field">
                    <label for="listingid">Listing ID</label>
                    <input name="listingid" type="text" value="<?php echo $listingid ?>" disabled/>
                </div>

                <div class="input-field">
                    <label for="url">URL</label>
                    <input name="url" type="text" value="<?php echo $url ?>"/>
                </div>

                <div class="input-field">
                    <label for="productid">Product ID</label>
                    <input name="productid" type="number" value="<?php echo $productid ?>"/>
                </div>

                <div class="input-field">
                    <label for="listingdate">Listing Date</label>
                    <input name="listingdate" type="date" value="<?php echo $listingdate ?>"/>
                </div>

                <div class="input-field">
                    <label for="employeeid">Employee ID</label>
                    <input name="employeeid" type="number" value="<?php echo $employeeid ?>"/>
                </div>

                <div class="input-field">
                    <label for="resellerusername">Reseller Username</label>
                    <input name="resellerusername" type="text" value="<?php echo $resellerusername ?>"/>
                </div>

                <div class="input-field">
                    <label for="marketid">Market ID</label>
                    <input name="marketid" type="number" value="<?php echo $marketid ?>"/>
                </div>

                <div class="input-field">
                    <label for="resolved">Resolved?</label>
                    <input name="resolved" type="number" min="0" max="1" value="<?php echo $resolved ?>"/>
                </div>

                <div class="input-field">
                    <label for="falsepositive">False Positive?</label>
                    <input name="falsepositive" type="number" min="0" max="1" value="<?php echo $falsepositive ?>"/>
                </div>

                <?php
                    if ($error) {
                        echo "<label class='errlabel'>Error: Please enter valid information for all fields.</label><br/>";
                    }
                ?>

                <button class="btn waves-effect waves-light black" type="submit" name="submit">
                    Submit Changes <i class="material-icons right">arrow_forward</i>
                </button>
            </form>
        </div>

    </div>
</body>
</html>