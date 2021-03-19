<!DOCTYPE html>
<html lan="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listing Successfully Added</title>
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

    <!--Listing Success title-->
    <div class="container">
        <div class="row">
            <div class="col s12"><h3><strong>Listing Successfully Added!</strong></h3></div>
        </div>
        <div class="row">
            <div class="col s12">
                <?php
                    session_start();
                    
                    //gets the listing id for the listing that was just created
                    include 'dbconnect.php';
                    $sql = "select Listing_ID from cpsc.listing where URL='".$_SESSION['listingurl']."' and Product_ID=".$_SESSION['productid']." 
                            and Listing_Date='".$_SESSION['listingdate']."' and Employee_ID=".$_SESSION['employeeid']." and Reseller_ID=".$_SESSION['resellerid']." 
                            and Market_ID=".$_SESSION['marketid'].";";
                    $result = $conn->query($sql);
                    $row = mysqli_fetch_array($result);
                    $listingid = $row[0];

                    //gets the specified information and displays in table for the listing that was just created
                    $sql = "select URL, Recall_Date, Product_Name, Recall_URL FROM cpsc.listing l, cpsc.product p, cpsc.recall r
                    WHERE l.Product_ID=p.Product_ID and p.Recall_ID=r.Recall_ID and l.Listing_ID=".$listingid."";
                    $result = $conn->query($sql);

                    echo "<table>";
                    echo "<thead>";
                    echo "<th>Listing ID</th><th>Listing URL</th><th>Recall Date</th><th>Product Name</th><th>Recall URL</th><th>Send Email To</th>";
                    echo "</thead>";

                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>".$listingid."</td>";
                        echo "<td>".$row["URL"]."</td>";
                        echo "<td>".$row["Recall_Date"]."</td>";
                        echo "<td>".$row["Product_Name"]."</td>";
                        echo "<td>".$row["Recall_URL"]."</td>";
                        echo "<td>".$_SESSION['sendemailto']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    
                ?>
            </div>
        </div>
    </div>

</body>
</html>