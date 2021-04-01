<?php
    include 'dbconnect.php';

    if(isset($_POST["import"])){
        $fileName = $_FILES["file"]["tmp_name"];

        if($_FILES["file"]["size"] > 0) {
            $file = fopen($fileName, "r");

            while(($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                $url = "";
                if(isset($column[0])) {
                    $url = mysqli_real_escape_string($conn, $column[0]);
                }

                $productid = 0;
                if(isset($column[1])) {
                    $productid = mysqli_real_escape_string($conn, $column[1]);
                }

                $listingdate = "";
                if(isset($column[2])) {
                    $listingdate = mysqli_real_escape_string($conn, $column[2]);
                }

                $employeeid = 0;
                if(isset($column[3])) {
                    $employeeid = mysqli_real_escape_string($conn, $column[3]);
                }

                $marketid = 0;
                if(isset($column[4])) {
                    $marketid = mysqli_real_escape_string($conn, $column[4]);
                }

                $resolved = 0;
                if(isset($column[5])) {
                    $resolved = mysqli_real_escape_string($conn, $column[5]);
                }

                $falsepositive = 0;
                if(isset($column[6])) {
                    $falsepositive = mysqli_real_escape_string($conn, $column[6]);
                }

                $sql = "insert into cpsc.listing1(URL, Product_ID, Listing_Date, Employee_ID, Market_ID, Resolved, False_Positive)
                    values('$url', $productid, '$listingdate', $employeeid, $marketid, $resolved, $falsepositive)";
                $result = $conn->query($sql);
                if(!empty($result)) {
                    $type = "success";
                    $message = "CSV Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing CSV Data";
                }


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
  <title>Import Listings</title>
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

  <!--script for importing csv file-->
  <script type="text/javascript">
    $(document).ready(function() {
        $("#frmCSVImport").on("submit", function () {

	        $("#response").attr("class", "");
            $("#response").html("");
            var fileType = ".csv";
            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
            if (!regex.test($("#file").val().toLowerCase())) {
        	        $("#response").addClass("error");
        	        $("#response").addClass("display-block");
                $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
                return false;
            }
            return true;
        });
    });
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
    h5 {
        text-align: center;
    }
    #frmCSVImport {
        text-align: center;
    }
    .lsmallhdr {
        width: 15%;
    }
    #lbighdr {
        width: 70%;
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
        <!--Import Reall title-->
        <div class="row">
            <div class="col s12"><h3><strong>Import Listings from a CSV File</strong></h3></div>
        </div>

        <!--csv file formatting instructions-->
        <div class="row">
            <div class="col s12"><h5>The CSV file must be formatted as below</h5></div>
            <div class="col s12">
                <table><thead><th>Column A</th><th>Column B</th><th>Column C</th><th>Column D</th>
                    <th>Column E</th><th>Column F</th><th>Column G</th></thead>
                        <tr><td>URL</td><td>Product ID</td><td>Listing Date (yyyy-mm-dd)</td><td>Employee ID</td>
                        <td>Market ID</td><td>Resolved?</td><td>False Positive?</td></tr>
                </table>
            </div>
        </div>

        <div class="row">
            <!--import form-->
            <div id="response" class="<?php if(!empty($type)) {echo $type."display-block";}?>">
                <?php if(!empty($message)) {echo $message;} ?>
            </div>
            <form class="col s12" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                <div class="input-field">
                    <label></label><input type="file" name="file" id="file" accept=".csv">
                    <button class="btn waves-effect waves-light black" type="submit" id="submit" name="import">
                        Import <i class="material-icons right">file_download</i>
                    </button>
                </div>
            </form>

            </br>
            </br>
            </br>
            </br>
            </br>
            </br>

            <!--display all listings after successful import-->
            <div class="col s12">
                <!--title-->
                <h5><strong>All Current Listings</strong></h5>
        
                <!--displaying current records-->
                <?php
                    include 'dbconnect.php';
                    $sql = "select Listing_ID, URL, Listing_Date from cpsc.listing1";
                    $result = $conn->query($sql);
                    if(!empty($result)) {?>
                        <table id="listingtable">
                            <thead><tr>
                                <th class="lsmallhdr">Listing ID</th><th id="lbighdr">URL</th><th class="lsmallhdr">Listing Date</th>
                            </tr></thead>
                            <?php
                                foreach($result as $row) {?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['Listing_ID']; ?></td>
                                        <td><?php echo $row['URL']; ?></td>
                                        <td><?php echo $row['Listing_Date']; ?></td>
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