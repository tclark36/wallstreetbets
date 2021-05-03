<?php
    //variables for adding a recall
    $recalldate = "";
    $title = "";
    $description = "";
    $recallurl = "";
    $consumercontact = "";
    $lastpubdate = "";
    $sellerid = 0;

    //action to take when adding new recall
    if(isset($_POST["submit"])) {
        if(isset($_POST["recalldate"])) $recalldate=$_POST["recalldate"];
        if(isset($_POST["title"])) $title=$_POST["title"];
        if(isset($_POST["description"])) $description=$_POST["description"];
        if(isset($_POST["recallurl"])) $recallurl=$_POST["recallurl"];
        if(isset($_POST["consumercontact"])) $consumercontact=$_POST["consumercontact"];
        if(isset($_POST["lastpubdate"])) $lastpubdate=$_POST["lastpubdate"];
        if(isset($_POST["sellerid"])) $sellerid=$_POST["sellerid"];

        if(!empty($recalldate) && !empty($title) && !empty($description) && !empty($recallurl) && !empty($consumercontact) && !empty($lastpubdate) && $sellerid>0){
            include 'dbconnect.php';
            $sql = "insert into cpsc.recall(Recall_Date, Title, Description, Recall_URL, Consumer_Contact, Last_Publish_Date, Seller_ID)
                    values('$recalldate', '$title', '$description', '$recallurl', '$consumercontact', '$lastpubdate', $sellerid)";
            $result = $conn->query($sql);
            
            //javascript to display a confirmation message
            echo '<script type="text/javascript">';
            echo 'alert("Your new recall has been added!")';
            echo '</script>';
        }
    }

?>
<!DOCTYPE html>
<html lan="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recalls</title>
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
    #curitemtxt {
        text-align: left;
    }
    #additemtxt {
        text-align: right;
    }
    #importbtn {
        text-align: right;
    }
    #recallstable {
        table-layout: fixed;
    }
    .lsmallhdr {
        width: 20%;
    }
    #lbighdr {
        width: 60%;
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

        <!--Recalls title-->
        <div class="row">
            <div class="col s12"><h3><strong>Recalls</strong></h3></div>
        </div>

        <!--recalls options titles-->
        <div class="row">
            <div class="col s6" id="curitemtxt"><h5><strong>Current Recalls</strong></h5></div>
            <div class="col s6" id="additemtxt"><h5><strong>Add a Recall</strong></h5></div>
        </div>

        <div class="row">
            <!--current recalls table-->
            <div class="col s5">
                <?php
                    include 'dbconnect.php';
                    $sql = "select Recall_ID, Recall_Date, Recall_URL from cpsc.recall";
                    $result = $conn->query($sql);
                    if(!empty($result)) {?>
                        <table id="recallstable">
                            <thead><tr>
                                <th class="lsmallhdr">Recall ID</th><th class="lsmallhdr">Recall Date</th><th id="lbighdr">URL</th>
                            </tr></thead>
                            <?php
                                foreach($result as $row) {?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['Recall_ID']; ?></td>
                                        <td><?php echo $row['Recall_Date']; ?></td>
                                        <td class='tblcliptxt'><a href='<?php echo $row['Recall_URL']; ?>'><?php echo $row['Recall_URL']; ?></a></td>
                                    </tr>
                            <?php } ?>
                                </tbody>
                            
                        </table>
                <?php } ?>
            </div>

            <div class="col s5 push-s2">
                <!--import recalls button-->
                <form id="importbtn" class="row" action="recallimport.php">
                    <button class="btn waves-effect waves-light black" type="submit" name="import">
                        Import a CSV File <i class="material-icons right">input</i>
                    </button>
                </form>

                <!--add recall form on right-->
                <form class="col s12" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="input-field">
                        <label for="recalldate">Recall Date</label>
                        <input name="recalldate" type="date" placeholder=""/>
                    </div>
                    <div class="input-field">
                        <label for="title">Title</label>
                        <input name="title" type="text"/>
                    </div>
                    <div class="input-field">
                        <label for="description">Description</label>
                        <input name="description" type="text"/>
                    </div>
                    <div class="input-field">
                        <label for="recallurl">URL</label>
                        <input name="recallurl" type="text"/>
                    </div>
                    <div class="input-field">
                        <label for="consumercontact">Consumer Contact</label>
                        <input name="consumercontact" type="text"/>
                    </div>
                    <div class="input-field">
                        <label for="lastpubdate">Last Publish Date</label>
                        <input name="lastpubdate" type="date" placeholder=""/>
                    </div>
                    <div class="input-field">
                        <label for="sellerid">Seller ID</label>
                        <input name="sellerid" type="number"/>
                    </div>
                    <button class="btn waves-effect waves-light black" type="submit" name="submit">
                        Submit <i class="material-icons right">add</i>
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>