<?php
    //variables for search
    $sviolationid = 0;
    $surl = "";
    $validsearch = false;

    //variables for add
    $violationurl = "";
    $listingid = 0;
    $listingdate = "";
    $employeeid = 0;
    $resellerusername = "";
    $marketid = 0;
    $error = false;

    //action to take when a new violation is addded
    if(isset($_POST["submit"])) {
        if(isset($_POST["violationurl"])) $violationurl=$_POST["violationurl"];
        if(isset($_POST["listingid"])) $listingid=$_POST["listingid"];
        if(isset($_POST["listingdate"])) $listingdate=$_POST["listingdate"];
        if(isset($_POST["employeeid"])) $employeeid=$_POST["employeeid"];
        if(isset($_POST["resellerusername"])) $resellerusername=$_POST["resellerusername"];
        if(isset($_POST["marketid"])) $marketid=$_POST["marketid"];

        if(!empty($violationurl) && $listingid>0 && !empty($listingdate) && $employeeid>0 && !empty($resellerusername) && $marketid>0){
            include 'dbconnect.php';
            //add a violation
            $sql = "insert into cpsc.violation(Violation_URL, Listing_ID, Listing_Date, Employee_ID, Username, Market_ID, Resolved, False_Positive)
                    values('$violationurl', $listingid, '$listingdate', $employeeid, '$resellerusername', $marketid, 0, 0)";
            $result = $conn->query($sql);

            //get violation id of newly added listing
            $sql = "select Violation_ID from cpsc.violation where Listing_ID=$listingid";
            $result = $conn->query($sql);
            $row = mysqli_fetch_array($result);
            $violationid = $row[0];
            
            //add a notice
            $sql = "insert into cpsc.notice1(Listing_ID, Violation_ID, Employee_ID, Username, Responded, Date_Sent, Market_ID)
                    values($listingid, $violationid, $employeeid, '$resellerusername', 0, curdate(), $marketid)
                    ";
            $result=$conn->query($sql);
            
            //javascript to display a confirmation message
            echo '<script type="text/javascript">';
            echo 'alert("Your new violation has been added!")';
            echo '</script>';
        } else {
            $error = true;
        }
    }

    //action to take when search button is clicked
    if(isset($_POST["search"])) {
        if(isset($_POST["violationid"])) $sviolationid=$_POST["violationid"];

        if($sviolationid>0){
            session_start();
            $_SESSION['editviolationid'] = $sviolationid;
            include 'dbconnect.php';
            $sql = "select Violation_ID, Violation_URL from cpsc.violation where Violation_ID=$sviolationid";
            $result = $conn->query($sql);
            while($row = mysqli_fetch_array($result)){
                if($row) $validsearch = true;
                $surl = $row["Violation_URL"];
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
  <title>Violations</title>
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
    #searchtxt {
        text-align: left;
    }
    #addtxt {
        text-align: right;
    }
    #searchtable {
        table-layout: fixed;
    }
    .tblcliptxt {
        white-space:nowrap;
        overflow: hidden;
    }
    #allcurvioltxt {
        text-align: center;
    }
    #violationstable {
        table-layout: fixed;
    }
    .lsmallhdr {
        width: 10%;
    }
    #lbighdr {
        width: 60%;
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

        <!--violations title-->
        <div class="row">
            <div class="col s12"><h3><strong>Violations</strong></h3></div>
        </div>

        <!--violations options titles-->
        <div class="row">
            <div class="col s6" id="searchtxt"><h5><strong>Search and Edit Violations</strong></h5></div>
            <div class="col s6" id="addtxt"><h5><strong>Add Violation</strong></h5></div>
        </div>
        
        <div class = "row">
            <!--search for a violation based on violation ID-->
            <form class="col s5" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="row">
                    <div class="col s8">
                        <div class="input-field">
                            <label for="violationid">Violation ID</label>
                            <input name="violationid" type="number"/>
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
                                echo "<table id='searchtable'><thead><th>Violation ID</th><th>URL</th><th></th></thead>";
                                echo "<tr><td>".$sviolationid."</td><td class='tblcliptxt'><a href='".$surl."'>".$surl."</a></td>";
                                echo "<td><a href='editviolation.php' class='btn waves-effect waves-light black'>Edit</a></td>";
                                echo "</tr></table>";
                            }
                            if(!$validsearch && $sviolationid>0){
                                echo "<label class='errlabel'>Error: That is not a valid Violation ID.</label>";
                            }
                        ?>
                    </div>
                </div>
            </form>
            

            <div class="col s5 push-s2">
                <!--add violation form on right-->
                <form class="col s12" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="input-field">
                        <label for="violationurl">Violation URL</label>
                        <input name="violationurl" type="text"/>
                    </div>
                    <div class="input-field">
                        <label for="listingid">Listing ID</label>
                        <input name="listingid" type="number"/>
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
                    <button class="btn waves-effect waves-light black" type="submit" name="submit">
                        Submit <i class="material-icons right">add</i>
                    </button>
                </form>
            </div>
        </div>
        </br>
        </br>
        </br>

        <!--view all current violations-->
        <div class = "row">
            <div class="col s12"><h5 id="allcurvioltxt"><strong>All Current Violations</strong></h5></div>
            <div class="col s12">
            <?php
                    include 'dbconnect.php';
                    $sql = "select Violation_ID, Violation_URL, Listing_Date, Employee_ID, Resolved from cpsc.violation";
                    $result = $conn->query($sql);
                    if(!empty($result)) {?>
                        <table id="violationstable">
                            <thead><tr>
                                <th class="lsmallhdr">Violation ID</th><th id="lbighdr">URL</th><th class="lsmallhdr">Listing Date</th><th class="lsmallhdr">Employee ID</th><th class="lsmallhdr">Resolved?</th>
                            </tr></thead>
                            <?php
                                foreach($result as $row) {?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['Violation_ID']; ?></td>
                                        <td class='tblcliptxt'><a href='<?php echo $row['Violation_URL']; ?>'><?php echo $row['Violation_URL']; ?></a></td>
                                        <td><?php echo $row['Listing_Date']; ?></td>
                                        <td><?php echo $row['Employee_ID']; ?></td>
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