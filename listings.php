<?php
    //variables for post[submit]
    $listingurl = "";
    $productid = 0;
    $listingdate = "";
    $employeeid = 0;
    $resellerusername = 0;
    $marketid = 0;
    $email = "";
    $error = false;

    //variables for post[search]
    $slistingid = 0;
    $surl = "";
    $validsearch = false;

    //action to take when a new listing is addded
    if(isset($_POST["submit"])) {
        if(isset($_POST["listingurl"])) $listingurl=$_POST["listingurl"];
        if(isset($_POST["productid"])) $productid=$_POST["productid"];
        if(isset($_POST["listingdate"])) $listingdate=$_POST["listingdate"];
        if(isset($_POST["employeeid"])) $employeeid=$_POST["employeeid"];
        if(isset($_POST["resellerusername"])) $resellerusername=$_POST["resellerusername"];
        if(isset($_POST["marketid"])) $marketid=$_POST["marketid"];
        if(isset($_POST["email"])) $email=$_POST["email"];

        if(!empty($listingurl) && $productid>0 && !empty($listingdate) && $employeeid>0 && !empty($resellerusername) && $marketid>0 && !empty($email)){
            session_start();
            $_SESSION['sendemailto'] = $email;
            $_SESSION['listingurl'] = $listingurl;
            $_SESSION['productid'] = $productid;
            $_SESSION['listingdate'] = $listingdate;
            $_SESSION['employeeid'] = $employeeid;
            $_SESSION['resellerusername'] = $resellerusername;
            $_SESSION['marketid'] = $marketid;

            include 'dbconnect.php';
            $sql = "insert into cpsc.listing1(URL, Product_ID, Listing_Date, Employee_ID, Username, Market_ID)
                    values('$listingurl', $productid, '$listingdate', $employeeid, '$resellerusername', $marketid)";
            $result = $conn->query($sql);
            
            header("Location: addlistingsuccess.php");
        }
    }

    //action to take when search button is clicked
    if(isset($_POST["search"])) {
        if(isset($_POST["listingid"])) $slistingid=$_POST["listingid"];

        if($slistingid>0){
            session_start();
            $_SESSION['editlistingid'] = $slistingid;
            include 'dbconnect.php';
            $sql = "select Listing_ID, URL from cpsc.listing1 where Listing_ID=$slistingid";
            $result = $conn->query($sql);
            while($row = mysqli_fetch_array($result)){
                if($row) $validsearch = true;
                $surl = $row["URL"];
            }
        }
    }
?>
<!DOCTYPE html>
<html lan="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listings</title>
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
    #curlisttxt {
        text-align: left;
    }
    #addlisttxt {
        text-align: right;
    }
    #allcurlisttxt {
        text-align: center;
    }
    .lsmallhdr {
        width: 10%;
    }
    #lbighdr {
        width: 60%;
        word-wrap: break-word;
    }
    #importbtn {
        text-align: right;
    }
    #listingstable {
        table-layout: fixed;
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

        <!--Listings title-->
        <div class="row">
            <div class="col s12"><h3><strong>Listings</strong></h3></div>
        </div>

        <!--listings options titles-->
        <div class="row">
            <div class="col s6" id="curlisttxt"><h5><strong>Search and Edit Listings</strong></h5></div>
            <div class="col s6" id="addlisttxt"><h5><strong>Add Listing</strong></h5></div>
        </div>

            
        <div class = "row">
            <!--search for a listing based on listing ID-->
            <form class="col s5" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="row">
                    <div class="col s8">
                        <div class="input-field">
                            <label for="listingid">Listing ID</label>
                            <input name="listingid" type="number"/>
                        </div>
                    </div>
                    <div class="col s4">
                        <button class="btn waves-effect waves-light black" type="submit" name="search">
                            Search <i class="material-icons right">search</i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <?php
                            if($validsearch){
                                echo "<table><thead><th>Listing ID</th><th>URL</th><th></th></thead>";
                                echo "<tr><td>".$slistingid."</td><td><a href='".$surl."'>".$surl."</a></td>";
                                echo "<td><a href='editlisting.php' class='btn waves-effect waves-light black'>Edit</a></td>";
                                echo "</tr></table>";
                            }
                            if(!$validsearch && $slistingid>0){
                                echo "<label class='errlabel'>Error: That is not a valid Listing ID.</label>";
                            }
                        ?>
                    </div>
                </div>
            </form>
            

            <div class="col s5 push-s2">
                <!--import listings button-->
                <form id="importbtn" class="row" action="listingimport.php">
                    <button class="btn waves-effect waves-light black" type="submit" name="importlistings">
                        Import a CSV File <i class="material-icons right">input</i>
                    </button>
                </form>

                <!--add listing form on right-->
                <form class="col s12" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="input-field">
                        <label for="listingurl">Listing URL</label>
                        <input name="listingurl" type="text"/>
                    </div>
                    <div class="input-field">
                        <label for="productid">Product ID</label>
                        <input name="productid" type="number"/>
                    </div>
                    <div class="input-field">
                        <label for="listingdate">Listing Date</label>
                        <input name="listingdate" type="date" placeholder=""/>
                    </div>
                    <div class="input-field">
                        <label for="employeeid">Employee ID</label>
                        <input name="employeeid" type="number"/>
                    </div>
                    <div class="input-field">
                        <label for="resellerusername">Reseller Username</label>
                        <input name="resellerusername" type="text"/>
                    </div>
                    <div class="input-field">
                        <label for="marketid">Market ID</label>
                        <input name="marketid" type="number"/>
                    </div>
                    <div class="input-field">
                        <label for="email">Send Email To</label>
                        <input name="email" type="email"/>
                    </div>
                    <button class="btn waves-effect waves-light black" type="submit" name="submit">
                        Submit <i class="material-icons right">add</i>
                    </button>
                </form>
            </div>
        </div>
        </br>
        </br>
        </br>
        
        <!--view all current listings-->
        <div class = "row">
            <div class="col s12"><h5 id="allcurlisttxt"><strong>All Current Listings</strong></h5></div>
            <div class="col s12">
            <?php
                    include 'dbconnect.php';
                    $sql = "select Listing_ID, URL, Product_ID, Listing_Date, Resolved from cpsc.listing1";
                    $result = $conn->query($sql);
                    if(!empty($result)) {?>
                        <table id="listingstable">
                            <thead><tr>
                                <th class="lsmallhdr">Listing ID</th><th id="lbighdr">URL</th><th class="lsmallhdr">Product ID</th><th class="lsmallhdr">Listing Date</th><th class="lsmallhdr">Resolved?</th>
                            </tr></thead>
                            <?php
                                foreach($result as $row) {?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['Listing_ID']; ?></td>
                                        <td><a href='<?php echo $row['URL']; ?>'><?php echo $row['URL']; ?></a></td>
                                        <td><?php echo $row['Product_ID']; ?></td>
                                        <td><?php echo $row['Listing_Date']; ?></td>
                                        <td><?php echo $row['Resolved']; ?></td>
                                    </tr>
                            <?php } ?>
                                </tbody>
                            
                        </table>
            <?php } ?>
            </div>
        </div>
    </div>

</body>
</html>